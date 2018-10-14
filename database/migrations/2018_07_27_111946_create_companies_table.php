<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name',250);
            $table->string('logo',50);
            $table->string('website',100);
            $table->text('address',500);
            $table->string('no_of_emp',11);
            $table->string('estb_time',11);
            $table->text('about_company');
            $table->string('email',100);
            $table->string('ceo_name',100);
            $table->string('ceo_name_hidden');
            $table->string('url');
            $table->enum('status',['active','inactive']);
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
      Schema::dropIfExists('companies');
    }
}
