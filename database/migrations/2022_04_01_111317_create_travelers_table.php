<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('travelers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_id');
            $table->unsignedBigInteger('passport_id')->nullable();
            $table->string('fname');
            $table->string('lname');
            $table->string('passport_number');
            $table->date('passport_issuance');
            $table->date('passport_expiry');
            $table->string('gender');
            $table->string('social_status')->nullable();
            $table->string('address');
            $table->timestamps();

            // Constraint
            $table->foreign('request_id')->references('id')->on('visa_requests')
            ->onUpdate('cascade')->onDelete('cascade');

            // Constraint
            $table->foreign('passport_id')->references('id')->on('passports')
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
        Schema::dropIfExists('travelers');
    }
}
