<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student_info extends Model
{
    protected $table ="student_info" ;

    protected $fillable=['student_number','firstname_en','lastname_en','fathername_en','mothername_en',
                         'firstname_ar','lastname_ar','fathername_ar','mothername_ar',
                         'birthdate','birth_country','bitrth_city','nationality','email',
                         'mobile','home_phone','work_phone','gender','doc_type','doc_number',
                         'residence_country','residence_city','address',
                         'residence_type','residence_number'
];

    protected $hidden=['created_at','update_at'];
}
