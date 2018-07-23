<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyColumnsInTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('transactions', function (Blueprint $table) {            
            $table->string('recipient_name')->nullable()->change();
            $table->string('recipient_email')->nullable()->change();
            $table->string('recipient_phone')->nullable()->change();
            $table->string('recipient_bank')->nullable()->change();
            $table->string('recipient_account_number')->nullable()->change();
            $table->string('purpose')->nullable()->change();            
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
