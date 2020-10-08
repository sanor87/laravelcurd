<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StudentInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('student_info',function(Blueprint $table)
        {
            $table->charset = 'utf8mb4';	
            $table->collation = 'utf8mb4_unicode_ci';	
            $table->id();
            $table->integer('student_number')->index();
            $table->string('firstname_en',100)->nullable($value = false);
            $table->string('lastname_en',100)->nullable($value = false);
            $table->string('fathername_en',100)->nullable($value = false);
            $table->string('mothername_en',100);
            $table->string('firstname_ar',100)->nullable($value = false);
            $table->string('lastname_ar',100)->nullable($value = false);
            $table->string('fathername_ar',100)->nullable($value = false);
            $table->string('mothername_ar',100);
            $table->date('birthdate')->nullable($value = false);
            $table->string('birth_country',100)->nullable($value = false);
            $table->string('birth_city',100);
            $table->string('nationality',100)->nullable($value = false);
            $table->string('email',100)->nullable($value = false);
            $table->string('mobile',100)->nullable($value = false)->unique();
            $table->string('home_phone',100);
            $table->string('work_phone',100);
            $table->string('gender',15);
            $table->string('doc_type',15);
            $table->string('doc_number',20)->nullable($value = false)->unique();
            $table->string('residence_country',100);
            $table->string('residence_city',100);
            $table->text('address');
            $table->enum('residence_type',['1','2','3']);
            $table->string('residence_number',10); 

            $table->timestamps();


        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('student_info');
    }
}
