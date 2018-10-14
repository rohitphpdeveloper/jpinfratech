<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('job_title');
            $table->integer('company_id');
            $table->integer('category_id');
            $table->integer('country');
            $table->integer('state');
            $table->integer('city_id');
            $table->string('address');
            $table->integer('min_salary');
            $table->integer('max_salary');
            $table->integer('salary_type');
            $table->integer('job_type');
            $table->text('description');
            $table->string('contact_name');
            $table->string('contact_email');
            $table->string('contact_number');
            $table->tinyInteger('contect_number_hidden')->default(0);
            $table->tinyInteger('contact_email_hidden')->default(0);
            $table->string('url');
            $table->integer('archived')->default(0);
            $table->integer('visits')->default(0);
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
