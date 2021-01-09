<?php

namespace App\Imports;

use App\Models\quiz;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuestionsImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new quiz([
            'title'     => $row['question'],
            'option1'    => $row['option1'],
            'option2' => $row['option2'],
            'option3' => $row['option3'],
            'option4' => $row['option4'],
            'correctoption' => $row['correctoption'],
            'image'=> $row['image']

            //
        ]);
    }
}
