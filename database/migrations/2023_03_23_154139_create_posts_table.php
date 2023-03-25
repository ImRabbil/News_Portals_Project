<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->integer('district_id');
            $table->integer('subdistrict_id')->nullable();
            $table->integer('user_id');
            $table->string('title_en');
            $table->string('title_hin');
            $table->string('image');
            $table->text('details_en')->nullable();
            $table->text('details_hin')->nullable();
            $table->text('tags_en')->nullable();
            $table->text('tags_hin')->nullable();
            $table->integer('headline')->nullable();
            $table->integer('first_section')->nullable();
            $table->integer('first_section_thumbnail')->nullable();
            $table->integer('big_thumbnail')->nullable();
            $table->string('post_date')->nullable();
            $table->string('post_month')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
