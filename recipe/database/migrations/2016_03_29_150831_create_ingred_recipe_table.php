<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredRecipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingred_recipe', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('recipe_id');
            $table->integer('ingred_id');
            $table->foreign('recipe_id')
				  ->references('id')
				  ->on('recipe')
				  ->onDelete('cascade');
				  
			$table->foreign('ingred_id')
				  ->references('id')
				  ->on('ingred')
				  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ingred_recipe');
    }
}
