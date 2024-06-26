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
        Schema::create("contact_form_submissions", function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string("from");
            $table->string("email");
            $table->string("subject");
            $table->text("message");
            $table->boolean("is_handled")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("contact_form_submissions");
    }
};
