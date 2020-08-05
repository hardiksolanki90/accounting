<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_id');
            $table->string('invoice_number', 191);
            $table->double('amount', 8,2);
            $table->enum('type', ['cash', 'bank']);
            $table->date('date_of_transaction')->nullable()->comment('Add only when Type is bank');
            $table->string('transaction_id', 191)->nullable()->comment('Add only when Type is bank');
            $table->unsignedBigInteger('bank_id')->nullable()->comment('Get it from Bank section');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('modified_by');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('modified_by')->references('id')->on('users');
            $table->foreign('bank_id')->references('id')->on('banks');
            $table->foreign('invoice_id')->references('id')->on('invoices');

            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('incomes');
    }
}
