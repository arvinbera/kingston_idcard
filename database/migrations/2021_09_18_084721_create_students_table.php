<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->String('college_id', 200)->unique();
            $table->String('college_name', 200);
            $table->String('student_name', 200);
            $table->String('student_photo', 200);
            $table->String('student_session', 200);
            $table->String('student_blood_group', 200);
            $table->String('student_mobile', 200);
            $table->string('idcard_status', 200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
