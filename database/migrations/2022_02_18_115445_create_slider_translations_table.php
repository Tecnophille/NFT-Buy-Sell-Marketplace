<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSliderTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();
            $table->unsignedBigInteger('slider_id')->index();
            $table->unique(['slider_id', 'locale']);
            $table->foreign('slider_id')->references('id')->on('sliders')->onDelete('cascade');

            $table->string('short_description');
            $table->string('long_desc_header');
            $table->string('long_desc_middle');
            $table->string('long_desc_footer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slider_translations');
    }
}
