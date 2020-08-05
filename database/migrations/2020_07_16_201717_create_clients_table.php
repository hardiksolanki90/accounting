<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name', 191);
            $table->string('address', 191);
            $table->string('email', 191);
            $table->double('hourly_rate', 8, 2);
            $table->enum('billing_currency', ['usd', 'eur', 'inr']);
            $table->string('company_name', 191);
            $table->text('description');
            $table->double('applicable_tax_percentage', 18,2)->default(0)->nullable();
            $table->unsignedBigInteger('created_by')->comment('Logged user id');
            $table->unsignedBigInteger('modified_by')->comment('Modify Logged user id');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('modified_by')->references('id')->on('users');

            // $table->unsignedBigInteger('created_by')->comment('Logged user id');
            // $table->unsignedBigInteger('modified_by')->comment('Modify Logged user id');

            // $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');

            // $table->foreign('created_by')->references('id')->on('users');
            // $table->foreign('modified_by')->references('id')->on('users');

            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
