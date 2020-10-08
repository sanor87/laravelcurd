<?php

namespace App\Http\Controllers;

use App\Model\Student_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection ;


class studentcurd extends Controller
{
    //
    public function add(){
        return view('stucurd');

    }

    public function create(Request $request)
    {
        $rules = $this->getrules();
        $messages= $this->getMSG();
        

        //valudate data
        $validate = validator::make($request->all(),$rules,$messages);

        if ($validate ->fails()){
            return redirect('stucurd')->withErrors($validate)->withInput();
        }
        //insert data

       // $last_student_number=Student_info::latest('student_number')->first();
       $last_student_number=Student_info::max('student_number');

        //$asd=$last_student_number->student_number;
         //$last_student_number;
        if (is_null($last_student_number))
        {
            $last_student_number=1999;
        }
        else $last_student_number = $last_student_number + 1;
        //$request->request->add(['student_number'=> "$last_student_number"]) ;
        //return $request;
       Student_info::create([
            'student_number' => $last_student_number,
            'firstname_ar'=>$request->firstname_ar,
            'firstname_en'=>$request->firstname_en,
            'lastname_ar'=>$request->lastname_ar,
            'lastname_en'=>$request->lastname_en,
            'fathername_ar'=>$request->fathername_ar,
            'fathername_en'=>$request->fathername_en,
            'mothername_ar'=>$request->mothername_ar,
            'mothername_en'=>$request->mothername_en,
            'birthdate'=>$request->birthdate,
            'birth_country'=>$request->birth_country,
            'birth_city'=>$request->birth_city,
            'nationality'=>$request->nationality,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'home_phone'=>$request->home_phone,
            'work_phone'=>$request->work_phone,
            'gender'=>$request->gender,
            'doc_type'=>$request->type_identify,
            'doc_number'=>$request->document_number,
            'residence_country'=>$request->residence_country,
            'residence_city'=>$request->residence_city,
            'address'=>$request->address,
            'residence_type'=>$request->residence_type,
            'residence_number'=>$request->residence_number,

        ]);

        return redirect()->back()->with(['yournumber'=> $last_student_number,'success'=>__('messages.insertedisdone')]);
       
    } 
    protected function getrules(){
       return $rules=[
            'firstname_en'=>'required|alpha',
            'lastnamename_en'=>'required|string',
            'fathername_en'=>'required|string',
            'mothername_en'=>'string',
            'firstname_ar'=>'required|string',
            'lastnamename_ar'=>'required|string',
            'fathername_ar'=>'required|string',
            'mothername_ar'=>'string',
            'birthdate'=>'required|date',
            'birth_country'=>'required',
            'nationality'=>'required',
            'type_identify'=>'min:1',
            'document_number'=>'required|numeric',
            'residence_type'=>'min:1',
            'mobile'=>'required|unique:student_info,mobile',
            
        


        ];
    }
    protected function getMSG(){
       return $messages=[
            
            'firstname_en.required'=>__('messages.firstname_en_required'),
            'firstname_en.string'=>__('messages.firstname_en_string'),
            'lastname_en.required'=>__('messages.lastname_en_required'),
            'lastname_en.string'=>__('messages.lastname_en_string'),
            'fathername_en.required'=>__('messages.fathername_en_required'),
            'fathername_en.string'=>__('messages.fathername_en_string'),
            'firstname_ar.required'=>__('messages.firstname_ar_required'),
            'firstname_ar.string'=>__('messages.firstname_ar_string'),
            'lastname_ar.required'=>__('messages.lastname_ar_required'),
            'lastname_ar.string'=>__('messages.lastname_ar_string'),
            'fathername_ar.required'=>__('messages.fathername_ar_required'),
            'fathername_ar.string'=>__('messages.fathername_ar_string'),
            'mothername_en.string'=>__('messages.mothername_en_string'),
            'mothername_ar.string'=>__('messages.mothername_ar_string'),
            'birthdate.required'=>__('messages.birthdate_required'),
            'mobile.required'=>__('messages.mobile_required'),
            'mobile.unique'=>__('messages.mobile_unique'),
            

        ];
    }
}
