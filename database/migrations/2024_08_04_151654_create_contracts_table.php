<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->enum('status', \App\Enums\StatusContract::values())->default(\App\Enums\StatusContract::NEW->value);

            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name');

            $table->date('birth_date');
            $table->string('phone');
            $table->string('passport');
            $table->string('address');
 
            $table->string('equipment');
            $table->date('first_date');
            $table->date('last_date');
            $table->integer('total_days')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            
           
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
