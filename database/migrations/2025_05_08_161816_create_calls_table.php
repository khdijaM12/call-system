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
    Schema::create('calls', function (Blueprint $table) {
        $table->id();
        $table->string('client_name');
        $table->string('client_phone');
        $table->text('complaint_text');
        $table->enum('complaint_type', ['طلب خدمة', 'شكوى', 'استفسار']);
        $table->enum('status', ['قيد المراجعة', 'تم المراجعة'])->default('قيد المراجعة');
        $table->foreignId('assigned_to')->constrained('employees')->onDelete('cascade');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calls');
    }
};
