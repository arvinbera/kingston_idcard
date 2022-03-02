<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (!Student::where('college_id', '=', $row['college_id'])->exists()) {

            return new Student([
                'college_id' => $row['college_id'],
                'college_name' => $row['college_name'],
                'student_name' => $row['student_name'],
                'student_session' => $row['student_session'],
                'student_blood_group' => $row['student_blood_group'],
                'student_mobile' => $row['student_mobile'],
            ]);
        }
    }
}
