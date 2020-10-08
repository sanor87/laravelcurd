@extends('layout.master')

@section('title','Aladdin Taijan')

@section('content')
@if (Session::has('success'))
<div class="alert alert-success text-right" role="alert">
  {{__('messages.insertedisdone')}}<br/>
  {{Session::get('yournumber')}}<br/>
  {{$success ?? ''}}
</div>    
@endif

<form method="POST" action="{{route('add')}}" style="text-align: right;">
    @csrf<form   method="POST" enctype="multipart/form-data" class="text-right" autocomplete="off" >
      <section dir="rtl" style="font-size: large;font-family:DroidKufi-Regular" class=" register input-group justify-content-center"> 
      <fieldset class="container border p-2" >
        <legend class="w-auto">{{__('messages.personal_info')}}</legend>
      
      <div class="  form-row">
          <div class="form-group col-md-3">
            <label class=""> {{__('messages.firstname_ar')}}</label>
            <input class="form-control" type="text" id="firstname_ar" name="firstname_ar" placeholder="{{__('messages.firstname_ar')}}" >
            @error('firstname_ar')
          <small class="alert alert-fail text-right">{{$message}}</small>
            @enderror
          </div>
  
          <div class="form-group col-md-3">
              <label>{{__('messages.lastname_ar')}}</label>
          <input class="form-control" type="text" id="lastname_ar" name="lastname_ar" placeholder="{{__('messages.lastname_ar')}}" value="{{ old('lastname_ar') }}" required>
          </div>
        
          <div class="form-group col-md-3">
              <label>{{__('messages.fathername_ar')}}</label>
              <input class="form-control" type="text" id="fathername_ar" name="fathername_ar" value="{{ old('fathername_ar') }}" placeholder="{{__('messages.fathername_ar')}}" >
          </div>
  
          <div class="form-group col-md-3">
              <label> {{__('messages.mothername_ar')}}</label>
              <input class="form-control" type="text" id="mothername_ar" name="mothername_ar" placeholder="{{__('messages.mothername_ar')}}" >
          </div>
      </div>  
  
      <div class=" form-row">
          <div class="form-group col-md-3">
              <label>{{__('messages.firstname_en')}}</label>
              <input class="form-control" type="text" id="firstname_en" name="firstname_en" placeholder="{{__('messages.firstname_en')}}" required>
            </div>
    
            <div class="form-group col-md-3 ">
                <label> {{__('messages.lastname_en')}}</label>
                <input class="form-control" type="text" id="lastname_en" name="lastname_en" placeholder="{{__('messages.lastname_en')}}" required>
            </div>
    
            <div class="form-group col-md-3">
                <label> {{__('messages.fathername_en')}}</label>
                <input class="form-control" type="text" id="fathername_en" name="fathername_en" placeholder="{{__('messages.fathername_en')}}" >
            </div>
    
            <div class="form-group col-md-3">
                <label>{{__('messages.mothername_en')}}</label>
                <input class="form-control" type="text" id="mothername_en" name="mothername_en" placeholder="{{__('messages.mothername_en')}}" >
            </div>        
      </div>
          
      <div class=" form-row">
            <div class="form-group col-md-3">
            <label for="stu_birth"> {{__('messages.birthdate')}}</label>
              <input class="form-control" type="date"   id="birthdate" name="birthdate"  required >
            </div>
            <div class="form-group col-md-3">
              <label for="stu_birth_country">{{__('messages.birth_country')}}</label>
              <input class="form-control" type="text" id="bitrh_country" name="birth_country" placeholder="{{__('messages.birth_country')}}" required>
              
              <!--<select class="form-control" type="text" id="stu_bitrh_country" name="stu_birth_country" placeholder="{{__('messages.birth_country')}}" required>
              <option value="0">دولة الميلاد</option>-->
              {{$country ?? ""}}
            <!--</select>-->
            </div>
            <div class="form-group col-md-3">
              <label for="stu_birth_city"> {{__('messages.birth_city')}}</label>
              <input class="form-control" type="text" id="birth_city" name="birth_city" placeholder="{{__('messages.birth_city')}}" >
            </div>
            <div class="form-group col-md-3">
              <label for="stu_gender"> {{__('messages.sex')}}</label>
              <select class="form-control" type="text" id="gender" name="gender" placeholder="{{__('messages.sex')}}" >
                <option value="male">ذكر</option>
                <option value="female">أنثى</option> 
              </select>                 
              </div>
      </div>
          
          <div class=" form-row">
            <div class="form-group col-md-3">
              <label for="stu_nationality"> {{__('messages.nationality')}}</label>
              <input class="form-control" type="text" id="nationality" name="nationality" required>
              <!--
              <select class="form-control" id="stu_nationality" name="stu_nationality" required>
                <option value="0"> الجنسية</option>
               {{$country ?? ""}}
              </select>-->
            </div>
            <div class="form-group col-md-3">
              <label for="stu_type_identify"> {{__('messages.document_type')}}</label>
              <select class="form-control" id="type_identify" name="type_identify" required>
                <option value="0">نوع الوثيقة</option>
                <option value="1">هوية</option>
                <option value="2">جواز سفر</option>
              </select>
            </div>
            <div class="form-group col-md-3" >
              <label for="stu_num_identify"> {{__('messages.document_number')}}</label>
              <input class="form-control" type="text" id="document_number" name="document_number" placeholder="{{__('messages.document_number')}}" required>
  
            </div>
          </div>  
          <div class=" form-row ">
            <div class="form-group col-md-3">
               <label for="stu_res"> {{__('messages.residence_type')}}</label>
               <select class="form-control" id="residence_type" name="residence_type">
                 <option value="0"></option>
                 <option value="1">بطاقة لجوء</option>
                 <option value="2">إقامة عمل</option>
                 <option value="3">إقامة سياحية</option>
               </select> 
            </div> 
          
          <div class="form-group col-md-3">
            <label for="stu_tc">{{__('messages.residence_number')}}</label>
            <input class="form-control" id="residence_number" name="residence_number" type="number" placeholder="{{__('messages.residence_number')}} ">
          </div> 
          </div>
        </fieldset>
        <fieldset class="container border p-2" >
          <legend class="w-auto">{{__('messages.contact')}}</legend>
            <div class=" form-row">
              <div class="form-group col-md-3">
                <label for="stu_email"> {{__('messages.email')}}</label>
              <input class="form-control" type="email" id="email" name="email" placeholder="{{__('messages.email')}}" value="{{ Auth::user()->email }}" required>
              </div>
              <div class="form-group col-md-3">
                  <label for="stu_mobile"> {{__('messages.mobile')}}</label>
              <input class="form-control" type="tel" id="mobile" name="mobile" placeholder="{{__('messages.mobile')}} " value="{{Auth::user()->mobile}}" required>
              @error('mobile')
              <small class="alert alert-warning text-right">{{$message}}</small>                
              @enderror
              </div>
              <div class="form-group col-md-3">
                  <label for="stu_home_phone"> {{__('messages.home_phone')}}</label>
                  <input class="form-control" type="tel" id="home_phone" name="home_phone" placeholder="{{__('messages.home_phone')}}">
                  
              </div>
              <div class="form-group col-md-3">
                  <label for="stu_work_phone"> {{__('messages.work_phone')}}</label>
                  <input class="form-control" type="tel" id="work_phone" name="work_phone" placeholder="{{__('messages.work_phone')}}">
              </div>
            </div>
  
          <div class=" form-row">
            <div class="form-group col-md-3">
            <label for="stu_address_country"> {{__('messages.residence_country')}}</label>
            <input class="form-control" type="text" id="residence_country" name="residence_country" required>
            <!--  <select class="form-control" id="stu_address_country" name="stu_address_country" required>
                <option value="0"> بلد اﻹقامة</option>
                {{$country ?? ""}}
              </select>-->
            </div>
            <div class="form-group col-md-3">
              <label for="stu_address_city"> {{__('messages.residence_city')}}</label>
              <input class="form-control" type="text" id="residence_city" name="residence_city" placeholder="{{__('messages.residence_city')}}" required>
            </div>
            <div class="form-group col-md-6">
              <label for="stu_address">  {{__('messages.address')}}</label>
              <input class="form-control" type="text" id="address" name="address" placeholder="المنطقة-الشارع">
            </div>
  
          </div>
  
        </fieldset>
        <!--<fieldset class="container border p-2">
          <legend class="w-auto">{{__('messages.academic_info')}}</legend>
        
          <div class=" form-row">
          <div class="form-group col-md-3">
            <label for="stu_secondary_name">{{__('messages.issuing_authority')}}</label>
            <input class="form-control" id="stu_secondary_name" name="stu_secondary_name" placeholder="اسم الوزارة-اسم الدولة" required>
          </div>
          <div class="form-group col-md-3">
              <label for="stu_secondary_section">{{__('messages.branch')}}</label>
              <select class="form-control" id="stu_secondary_section" name="stu_secondary_section" placeholder="" required>
                <option value="علمي">علمي</option>
                <option value="أدبي">أدبي</option>
                <option value="شرعي">شرعي</option>
                <option value="غير ذلك">غير ذلك</option>
              </select>  
          </div>
          <div class="form-group col-md-3">
              <label for="stu_secondary_average"> {{__('messages.average')}}</label>
              <input class="form-control" id="stu_secondary_average" name="stu_secondary_average" placeholder="{{__('messages.average')}}" required>
          </div>
          <div class="form-group col-md-3">
              <label for="stu_secondary_year"> {{__('messages.year')}}</label>
              <input type="tel" class="form-control" id="stu_secondary_year" name="stu_secondary_year" placeholder="2### أو ###1" pattern="[1-2]{1}[0-9]{1}[0-9]{1}[0-9]{1}" required>
          </div>
            
        </div>
      </fieldset>
    -->
    <!-- Attachment section 
    <fieldset class="container border p-2">
      <legend class="w-auto">المرفقات</legend>
    
    <div class="form-row">
   
    
    <div dir="auto" class="form-group col-md-9">
      <input  type="file" class="custom-file-input" id="stu_photo" name="stu_photo" accept=".jpg,.png,.bmp" onchange="validate_fileupload(this.id,'photo_feedback');" required>
      <label dir="ltr" class="custom-file-label text-center" for="stu_photo">الصورة الشخصية</label>
    </div>
    <div id="photo_feedback" class="form-group col-md-3" style="color: red;">لم تقم بتحميل الملف المطلوب</div> 
      <div dir="auto" class="form-group col-md-9">
        <input  type="file" class="custom-file-input" id="stu_passport_doc" name="stu_passport_doc" onchange="validate_fileupload(this.id,'passport_feedback');" required>
        <label dir="ltr" class="custom-file-label text-center" for="stu_passport_doc">الوثيقة الرسمية</label>
      </div>
      <div id="passport_feedback" class="form-group col-md-3" style="color: red;">لم تقم بتحميل الملف المطلوب</div>
        <div dir="auto" class="form-group col-md-9">
          <input  type="file" class="custom-file-input" id="stu_secondary_doc" name="stu_secondary_doc" onchange="validate_fileupload(this.id,'secondary_feedback');" required>
          <label class="custom-file-label text-center" for="stu_secondary_doc">الشهادة الثانوية</label>
        </div>
        <div id="secondary_feedback" class="form-group col-md-3" style="color: red;">لم تقم بتحميل الملف المطلوب</div>
  </div>
</fieldset>
-->
  
  <div class="input-group justify-content-center">
    <br />
    <!--onclick="return valid_form();"-->
  <input type="submit" name="submit" id="submit" class="btn btn-primary btn-lg"  value="{{__('messages.student_rejester')}}">
  </div>  
          
          <!--<button type="submit" class="btn btn-primary">Submit</button>-->
        </section>         
      </form>


<br /><br /> 
@endsection