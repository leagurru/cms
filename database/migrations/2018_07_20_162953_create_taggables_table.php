<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaggablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taggables', function (Blueprint $table) {
            $table->integer('tag_id');
            $table->integer('taggable_id');
            $table->string('taggable_type');  // irá el modelo que relaciona
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('taggables');
    }
}

//Tinker
//$post = App\Post::create(['title'=>'PHP post from tinker','content'=>'PHP content from tinker'])
//$post = App\Post::find(4)
//$post->title = 'New titulo para php post from tinker id 4'
//$post->content = 'New content para php post from tinker id 4'
//$post->save()
//$post = App\Post::onlyTrashed()
//$post -> forceDelete()



