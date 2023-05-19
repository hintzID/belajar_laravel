<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class CreateFormidbc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formidbcs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('member_id');
            $table->enum('presence', ['hadir', 'izin', 'sakit', 'alpha']);
            $table->text('note')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('created_at_custom', 19)->CURRENT_TIMESTAMP();
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
        });
        
        DB::statement("ALTER TABLE formidbcs CHANGE created_at created_at TIMESTAMP NULL");
        DB::statement("ALTER TABLE formidbcs CHANGE updated_at updated_at TIMESTAMP NULL");
        DB::statement("UPDATE formidbcs SET created_at_custom = DATE_FORMAT(NOW(), '%d/%m/%Y %H:%i:%s')");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formidbcs');
    }
}
?>
