<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToTransactionsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('service');
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('state')->nullable();
            $table->string('recipient_account_type')->nullable();
            $table->string('recipient_teleco')->nullable();
            $table->string('recipient_msisdn')->nullable();
            $table->string('recipient_service')->nullable();
            $table->string('recipient_service_product')->nullable();
            $table->string('recipient_customer_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}
