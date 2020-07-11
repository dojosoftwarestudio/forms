<?php

use App\Settings\SettingsCommonsDatabase;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypesFormsTable extends Migration
{
    public function up()
    {
        Schema::create('types_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', SettingsCommonsDatabase::getDefaultLength());
            $table->string('code', SettingsCommonsDatabase::getCodeLength());
            SettingsCommonsDatabase::addAuditFields($table);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('types_forms');
    }
}
