<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisaRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visa_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('visa_type');
            $table->date('expected_date');
            $table->mediumInteger('travelers_number');
            $table->string('interview_place');
            $table->string('request_status');
            $table->unsignedBigInteger('appointment'); // Get from appointment table
            $table->decimal('total_price'); 
            $table->string('payment_method'); 
            $table->string('request_number');
            $table->tinyInteger('is_complete')->default(1);
            $table->timestamps();


            // Constraint
            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');
            
            // Constraint
            $table->foreign('country_id')->references('id')->on('countries')
            ->onUpdate('cascade')->onDelete('cascade');

            // Constraint
            $table->foreign('appointment')->references('id')->on('appointments')
            ->onUpdate('cascade')->onDelete('cascade');
            
            // Constraint
            $table->foreign('city_id')->references('id')->on('cities')
            ->onUpdate('cascade')->onDelete('cascade');

            // Constraint
            $table->foreign('visa_type')->references('id')->on('visas')
            ->onUpdate('cascade')->onDelete('cascade');
            
            
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visa_requests');
    }
}
