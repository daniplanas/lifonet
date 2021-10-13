<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContainerAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('container_alerts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('container_id')->constrained()->onDelete('cascade');
            $table->integer('type')->default(0);
            $table->string('alarmeable_type')->nullable();
            $table->uuid('alarmeable_id')->nullable();
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
        Schema::dropIfExists('container_alerts');
    }
}
