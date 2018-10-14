<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',250);
            $table->string('url',250);
            $table->string('image',100);
            $table->string('home',['active', 'inactive']);
            $table->string('meta_title');
            $table->text('short_description');
            $table->text('description');
            $table->enum('status',['active', 'inactive']);       
            $table->string('meta_description');   
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
       Schema::dropIfExists('blogs');
    }
}
