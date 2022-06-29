<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('item_image');
            $table->integer('price')->unsigned();
            $table->text('comment')->nullable();
            $table->timestamps();

            $table->foreignId('user_id')
                   ->constrained()
                   ->onDelete('cascade');
            $table->foreignId('category_id')
                   ->constrained()
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
        Schema::dropIfExists('items');
    }
}
