<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class PostsExport implements FromView
{   
   

    // public function headings(): array
    // {
    //     return ["id","title","body"];
    // }
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return Post::select('id','title','body')->get();
    // }
    public function view(): View
    {
        return view('exports.posts', [
            'posts' => Post::all()
        ]);
    }
}
