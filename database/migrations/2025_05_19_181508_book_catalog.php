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
        Schema::create('book_catalog', function (Blueprint $table) {
            $table->unsignedInteger("book_id")->comment("Связь с книгой");
            $table->unsignedInteger("catalog_book_id")->comment("Связь с каталогом");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
