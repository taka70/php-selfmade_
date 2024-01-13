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
    public function up(): void
    {
        // stores テーブルの作成
        Schema::create('stores', function ($table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->integer('postal_code');
            $table->string('prefecture', 50);
            $table->string('address1', 50);
            $table->string('address2', 50);
            $table->integer('tel');
            $table->integer('user_id');
            $table->string('file', 100)->nullable();
            $table->timestamps(); // created_at と updated_at のカラムを作成
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
