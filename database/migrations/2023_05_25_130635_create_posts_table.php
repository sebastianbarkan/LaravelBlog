<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
            $table->timestamps();
            $table->string("type");
            $table->string("title");
            $table->string("flairs");
            $table->string("community");
            $table->longText("content");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('posts');
        Schema::enableForeignKeyConstraints();
    }
};
