<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Ramsey\Uuid\v1;

class CreateQuestionsModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('questions_user_id');
            $table->foreign('questions_user_id')->references('id')->on('users');
            $table->integer('question1');
            $table->integer('question2');
            $table->integer('question3');
            $table->integer('question4');
            $table->integer('question5');
            $table->integer('question6');
            $table->integer('question7');
            $table->integer('question8');
            $table->integer('question9');
            $table->integer('question10');
            $table->integer('question11');
            $table->integer('question12');
            $table->integer('question13');
            $table->integer('question14');
            $table->integer('question15');
            $table->integer('question16');
            $table->integer('question17');
            $table->integer('question18');
            $table->integer('question19');
            $table->integer('question20');
            $table->integer('question21');
            $table->integer('question22');
            $table->integer('question23');
            $table->integer('question24');
            $table->integer('question25');
            $table->timestamp('errorcase')->nullable();
            


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
        Schema::dropIfExists('questions_models');
    }
}
