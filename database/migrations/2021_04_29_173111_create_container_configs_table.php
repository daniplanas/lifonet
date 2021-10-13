<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContainerConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('container_configs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('container_id')->constrained()->onDelete('cascade');
            $table->string('parameter')->default(0);
            $table->integer('value_num')->nullable();
            $table->string('value_text')->nullable();
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
        Schema::dropIfExists('container_configs');
    }
}
