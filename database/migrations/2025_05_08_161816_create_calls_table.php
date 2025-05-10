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
    $table->text('text');
    $table->text('complaint_text');
    $table->text('stat_text')->nullable();

    $table->foreignId('complaint_type_id')->constrained('complaint_types');

    $table->foreignId('status_id')->constrained('statuses');

    $table->foreignId('client_id')->constrained('clients');

    $table->foreignId('employee_id')->constrained('employees');

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
