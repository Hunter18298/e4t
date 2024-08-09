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
      Schema::create('accept_forms', function (Blueprint $table) {
            $table->bigIncrements('accept_id');
            $table->jsonb('user_data');
            $table->integer('types');
            $table->boolean('paid')->default(false);
            $table->float('paid_amount')->default(0.0);
            $table->bigInteger('group_id');
            $table->bigInteger('content_id');
            $table->bigInteger('certificate_id');
            $table->bigInteger('color_id')->nullable();
            $table->bigInteger('social_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accept_forms');
    }
};
