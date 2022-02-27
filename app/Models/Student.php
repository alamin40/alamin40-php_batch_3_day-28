<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $student;

    public function newStudent()
    {
        $this->student = new Student();
        $this->student->name =      'Riaz';
        $this->student->email =     'riaj@gmail.com';
        $this->student->mobile =     '01256698';
        $this->student->save();
    }

    public static function getAllStudent()
    {
        return [
            0 =>  [
                'id'        =>  1,
                'name'      =>  'Alamin',
                'email'     =>  'alamin@gmail.com',
                'mobile'    =>  '01751414104'
            ],
            1 =>  [
                'id'        =>  2,
                'name'      =>  'Shawon',
                'email'     =>  'Shawon@gmail.com',
                'mobile'    =>  '01741410451'
            ],
            2 =>  [
                'id'        =>  3,
                'name'      =>  'Roman',
                'email'     =>  'Roman@gmail.com',
                'mobile'    =>  '01751041414'
            ],
        ];
    }
}
