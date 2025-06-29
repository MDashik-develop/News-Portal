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
        Schema::create('websites', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('favicon')->nullable();
            $table->string('meta_tags')->nullable();
            $table->string('fb_app_id')->nullable();
            $table->text('meta_description')->nullable();

            $table->string('youtube_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable(); // For X/Twitter
            $table->string('instagram_url')->nullable();
            $table->string('reddit_url')->nullable();
            $table->string('google_news_url')->nullable(); // For Google News
            $table->string('linkedin_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('websites');
    }
};