<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('payslips', function (Blueprint $table) {
            $table->decimal('advance_salary', 8, 2)->nullable();
            // Add other columns as needed
        });
    }
    
    public function down()
    {
        Schema::table('payslips', function (Blueprint $table) {
            $table->dropColumn('advance_salary');
            // Drop other columns if needed
        });
    }
    
};
