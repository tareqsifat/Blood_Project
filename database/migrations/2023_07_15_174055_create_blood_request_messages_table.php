<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodRequestMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_request_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->nullable()->default("NULL");
            $table->integer('donor_id')->nullable()->default(null);
            $table->string('user_id')->nullable()->default(null);
            $table->string('number',100)->nullable()->default("NULL");
            $table->string('hospital_name',100)->nullable()->default("NULL");
            $table->string('district',100)->nullable()->default("NULL");
            $table->string('thana',100)->nullable()->default("NULL");
            $table->string('blood_group',100)->nullable()->default("NULL");
            $table->string('donation_date',100)->nullable()->default("NULL");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blood_request_messages');
    }
}
