<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRssFeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rss_feeds', function (Blueprint $table) {
          $table->foreign('user_id', 'fk_user_rss_feeds')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rss_feeds', function (Blueprint $table) {
            $table->dropForeign('fk_user_rss_feeds');
        });
    }
}
