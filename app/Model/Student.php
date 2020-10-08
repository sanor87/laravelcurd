<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "student";
    //this attribute for fillable cloumn in table 
    protected $fillable = ['firstname','lastname','birthdate','birthplace','mobile','place'

    ];

    //this attribute for hidden cloumn in table 
    protected $hidden =['created_at','updated_at'
          
    ];
}
