<?php

namespace App\Imports;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class PostsImport implements ToModel, WithStartRow, WithValidation,WithHeadingRow
{
    use Importable;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if ($row['actions'] === 'create' && $row['id'] == null) {

            $post = new Post;
            $post->title = $row['title'];
            $post->body = $row['body'];
            $post->user_id = Auth::user()->id;
            $post->save();
          
            $categoryCsv = explode("|",$row['categories']);
            $categoryDb = Category::pluck('name')->toArray();
            $result=array_diff($categoryCsv,$categoryDb);
            if(count($result) == 0){
                foreach($categoryCsv as $category){
                    $cat = Category::where('name', '=', $category)->first();
                    $post->categories()->attach($cat->id);
                }
            }

            return $post;
        }
        if ($row['actions'] === 'edit' && $row['id'] != null) {

            $post = Post::findOrFail($row['id']);
            $post->id = $row['id'];
            $post->title = $row['title'];
            $post->body = $row['body'];
            $post->user_id = Auth::user()->id;
            $post->update();

            $categoryCsv = explode("|",$row['categories']);
            $categoryDb =  Category::pluck('name')->toArray();
            
            $result=array_diff($categoryCsv,$categoryDb);
    
            if(count($result) == 0){
                $catArray=[];
                for($i=0; $i< count($categoryCsv); $i++){
 
                    $cat = Category::where('name', '=', $categoryCsv[$i])->first();
                    $catArray[$i]=$cat->id;
                }
                
                $post->categories()->sync($catArray);
            }
        
            return $post;
        }
        if ($row['actions'] === 'delete' && $row['id'] != null) {

            $post = Post::find($row['id']);
            $post->delete();
        }


    }
    public function startRow(): int
    {
        return 2;
    }
    /**
     * Rules for excel data
     *
     * @return array
     */
    public function rules(): array
    {
        return [

            '*.id' => 'nullable|integer|exists:posts,id',
            '*.title' => 'required|string|max:255',
            '*.body' => 'required|string|min:4',
            '*.categories' => 'required',
            '*.actions' => Rule::in(['required','create','edit','delete']),

        ];
    }


}
