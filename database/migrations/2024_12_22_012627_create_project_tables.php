<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('user_id')->constrained('users');
            $table->string('name');
            $table->string('type');
            $table->string('status');
            $table->string('link')->nullable();
            $table->string('hook_size')->nullable();
            $table->string('needle_size')->nullable();
            $table->string('yarn');
            $table->string('yarn_weight')->nullable();
            $table->string('dye_lot')->nullable();
            $table->json('steps');
            $table->longText('notes')->nullable();
            $table->integer('row')->default(0);
            $table->timestamps();
        });

        Schema::create('stitches', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name_us')->nullable();
            $table->string('name_uk')->nullable();
            $table->string('abbreviation_us')->nullable();
            $table->string('abbreviation_uk')->nullable();
            $table->string('type');
            $table->json('steps');
            $table->timestamps();
        });

        Schema::create('project_stitches', function (Blueprint $table) {
            $table->foreignUlid('project_id')->references('id')->on('projects');
            $table->foreignUlid('stitch_id')->references('id')->on('stitches');
            $table->unique(['project_id', 'stitch_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_stitches');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('stitches');
    }
};
