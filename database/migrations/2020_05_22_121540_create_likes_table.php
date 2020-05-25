<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // this is a polymorphic relation table
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');         // primary id of the model where 'like' belongs to
            $table->foreignId('likeable_id');   // primary id of the model where 'like' belongs to
            $table->string('likeable_type');    // model location which is being refered to
            $table->boolean('like');            // 1 for like 0 for dislike
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
        Schema::dropIfExists('likes');
    }
}
