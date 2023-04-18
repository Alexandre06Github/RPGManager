<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('persos', function (Blueprint $table) {
            $table->id();
            $table->string('name_perso');
            $table->text('content_perso');
            $table->string('type');
            $table->integer('mage_perso');
            $table->integer('for_perso');
            $table->integer('agi_perso');
            $table->integer('int_perso');
            $table->integer('pv_perso');
            $table->string('invite_groupe');
            $table->string('id_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persos');
    }
};