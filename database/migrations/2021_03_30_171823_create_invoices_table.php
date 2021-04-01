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
            $table->string('token')->nullable();
            $table->BigInteger('user_id')->nullable();
            $table->string('cookie_id')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('customer_address')->nullable();
            $table->text('invoice_details')->nullable(); // تفاصيل الفاتورة
            $table->decimal('amount', 8, 2)->default(0);
            $table->tinyInteger('status')->default(0);
            $table->string('message_status')->nullable();
            $table->string('tap_token')->nullable();
            $table->string('tap_id')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
