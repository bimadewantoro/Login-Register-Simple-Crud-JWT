<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users")->onUpdate("cascade")->onDelete("cascade");
            $table->string("ink_judul");
            $table->text("ink_abstrak");
            $table->text("ink_latarbelakang");
            $table->text("ink_tujuan");
            $table->text("ink_manfaat");
            $table->text("ink_metode");
            $table->text("ink_keunggulan");
            $table->text("ink_penerapan");
            $table->text("ink_prospek");
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
        Schema::dropIfExists('proposals');
    }
}
