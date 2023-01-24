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
        Schema::create('post_tag', function (Blueprint $table) {
           // $table->id();

           // RELAZIONE CON I POST
            // 1. creo la colonna FK per i post
            $table->unsignedBigInteger('post_id');
            // 2. creo la FK per questa colonna
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->cascadeOnDelete(); // all'eliminazione di un tag o di un post viene eliminato il record relativo nella tabella ponte


            // RELAZIONE CON I TAG
            // 3. creo la colonna FK per i tag
            $table->unsignedBigInteger('tag_id');
            // 4. creo la FK per questa colonna
            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->cascadeOnDelete();

            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tag');
    }
};
