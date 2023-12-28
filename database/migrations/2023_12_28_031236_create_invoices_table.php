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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('document_code', 9)->unique();
            $table->float('amount', 15, 2);
            $table->date('date_of_issue');
            $table->string('document_sender', 14);
            $table->string('sender_name', 100);
            $table->string('document_transporter', 14);
            $table->string('transporter_name', 100);
            $table->boolean('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
