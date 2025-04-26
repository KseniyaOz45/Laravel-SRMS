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
        Schema::table('Users', function (Blueprint $table) {
            //
            $table->string('phone')->unique();
            $table->string('avatar')->nullable();
            $table->string('role')->default('client');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Users', function (Blueprint $table) {
            //
            $table->dropColumn('phone');
            $table->dropColumn('email');
            $table->dropColumn('avatar');
            $table->dropColumn('role');
        });
    }
};
