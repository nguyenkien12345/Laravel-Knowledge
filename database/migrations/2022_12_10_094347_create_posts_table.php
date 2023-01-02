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
        Schema::create('posts', function (Blueprint $table) {
            $table->id('post_id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('content')->nullable();
            $table->string('image')->nullable();
            $table->integer('view_counts')->default(0);
            $table->boolean('new_post')->default(0);
            $table->boolean('highlight_post');
            $table->string('slug');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            // Khi 1 user bị xóa thì những bài viết của user đó cũng sẽ bị xóa theo
            // Gắn khóa ngoại cho field user_id tham chiếu đến khóa chính user_id của bảng users
            $table->foreign('user_id')->references('user_id')->on('users')->cascadeOnDelete();


            // Khi 1 category bị xóa thì những bài viết của category đó cũng sẽ bị xóa theo
            // Gắn khóa ngoại cho field category_id tham chiếu đến khóa chính category_id của bảng categories
            $table->foreign('category_id')->references('category_id')->on('categories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
