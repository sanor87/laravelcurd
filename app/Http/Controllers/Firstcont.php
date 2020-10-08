<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Firstcont extends Controller
{
    public function show(){
        return "hi every thing is bad";
    }

    public function show2(){
        return "hi every thing is bad 22222222222";
    }

    public function getindex()
    {
        $CV=[];
        $CV['name']= "Aladdin Taijan";
        $CV['pos']="IT Administrator";
        $CV['skill1']='MCITP'; 
        $CV['skill2']= 'RED HAT';
        $CV['skill3']= 'PHP';
        
        
        return view('index',$CV);
    }
}
