<?php

namespace App\Http\Controllers;

use App\Model\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function GuzzleHttp\Promise\all;

class stuCURD extends Controller
{
    public function add(){
        return view('stucurd');
    }
    
    public function create(Request $request){
        
        $msg = $this->getmessages();
        $rules = $this->getrules();
        //vlaidate data be4 insert 
        $validata=validator::make($request->all(),$rules,$msg);
        if ($validata -> fails()){
            //return $validata->errors();
            return redirect()->back()->withErrors($validata) -> withInputs($request->all());
        }
        
    
        
        
        //insert to student table
        Student::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'birthdate' => $request->birthdate,
            'birthplace' => $request->birthplace,
            'mobile' => $request->mobile,
            'place' => $request->place
        ]);
        
    }
    protected function getmessages()
    {
        return $msg=[
            'firstname.unique' => __('messages.firstname-unique'),
            'mobile.max' => __('messages.mobile-max'),
            
            'mobile.numeric'=>__('messages.mobile-numeric'),

        ];
    }
    protected function getrules(){
        return $rules = 
            [
                'firstname' => 'required|max:10|unique:student,firstname',
                'lastname' => 'required|max:11',
                'mobile' => 'required|max:11|min:11|numeric',
            ];
        
    } 

}
