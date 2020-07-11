<?php

use App\Settings\SettingsCommonsDatabase;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            SettingsCommonsDatabase::addId($table);
            $table->string('name', SettingsCommonsDatabase::getDefaultLength());
            $table->string('last_name_mat', SettingsCommonsDatabase::getDefaultLength());
            $table->string('last_name_pat', SettingsCommonsDatabase::getDefaultLength());
            $table->string('ci', 60);
            $table->integer('age');
            SettingsCommonsDatabase::addAuditFields($table);
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
        Schema::dropIfExists('persons');
    }
}
