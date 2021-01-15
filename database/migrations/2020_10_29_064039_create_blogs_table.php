<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->text('content');
            $table->string('thumbnil');
            $table->integer('likes')->default(0);
            $table->integer('comments')->default(0);

            $table->unsignedBigInteger('author');
            $table->foreign('author')->references('id')->on('employers')->onUpdate('cascade');
            $table->unsignedBigInteger('author_avater');
            $table->foreign('author_avater')->references('id')->on('employers')->onUpdate('cascade');
            
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
