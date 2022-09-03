<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqHeadTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faq_head_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();
            $table->unsignedBigInteger('faq_head_id')->index();
            $table->unique(['faq_head_id', 'locale']);
            $table->foreign('faq_head_id')->references('id')->on('faq_heads')->onDelete('cascade');

            $table->string('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faq_head_translations');
    }
}
