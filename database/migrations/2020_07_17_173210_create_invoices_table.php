<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('number', 191);
            $table->date('date');
            $table->date('due_date');
            $table->unsignedBigInteger('client_id');
            $table->enum('billing_type', ['fixed', 'hourly']);
            $table->char('applicable_tax_percentage', 20);
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('modified_by');
            $table->enum('status', ['billed', 'completed']);
            
            $table->string('fdescription', 191)->nullable()->comment('if billing type is fixed');
            $table->double('cost', 18,2)->default('0.00')->comment('if billing type is fixed');

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('modified_by')->references('id')->on('users');

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
        Schema::dropIfExists('invoices');
    }
}
