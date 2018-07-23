<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnsInBeneficiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::table('beneficiaries', function (Blueprint $table) {
            $table->string('address')->nullable()->change();
            $table->string('city')->nullable()->change();
            $table->string('postal_code')->nullable()->change();
            $table->string('state')->nullable()->change();
            $table->string('recipient_account_type')->nullable()->change();
            $table->string('recipient_teleco')->nullable()->change();
            $table->string('recipient_msisdn')->nullable()->change();
            $table->string('recipient_service')->nullable()->change();
            $table->string('recipient_service_product')->nullable()->change();
            $table->string('recipient_customer_id')->nullable()->change();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
