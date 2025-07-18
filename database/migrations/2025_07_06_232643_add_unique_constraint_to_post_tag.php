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
        Schema::table('post_tag', function (Blueprint $table) {
            $table->unique(['post_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('post_tag', function (Blueprint $table) {
            // Supprimer les clés étrangères d'abord
            $table->dropForeign(['post_id']);
            $table->dropForeign(['tag_id']);

            // Ensuite supprimer l'index unique
            $table->dropUnique(['post_id', 'tag_id']);
        });
    }
};
