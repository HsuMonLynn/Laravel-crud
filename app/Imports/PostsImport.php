<?php

namespace App\Imports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\ToModel;


class PostsImport implements ToModel
{   
    // use Importable;
    // public function startRow(): int
    // {
    //     return 2;
    // }
    // public function getCsvSettings(): array
    // {
    //     return [
    //         'delimiter' => ';'
    //     ];
    // }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {  
        return new Post([
            'id' => $row[0],
            'title' => $row[1],
            'body' => $row[2],
            'user_id' => $row[3],
            'categories' => $row[4],
            'actions' => $row[5]
        ]);
    }
}
