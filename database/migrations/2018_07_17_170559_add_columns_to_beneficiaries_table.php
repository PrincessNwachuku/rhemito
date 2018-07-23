<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToBeneficiariesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::table('beneficiaries', function (Blueprint $table) {
            $table->string('service');
            $table->string('address');
            $table->string('city');
            $table->string('postal_code');
            $table->string('state');
            $table->string('recipient_account_type');
            $table->string('recipient_teleco');
            $table->string('recipient_msisdn');
            $table->string('recipient_service');
            $table->string('recipient_service_product');
            $table->string('recipient_customer_id');
            
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
