<?php

use App\Settings\SettingsCommonsDatabase;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypesInputsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('types_inputs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', SettingsCommonsDatabase::getDefaultLength());
            $table->string('label', SettingsCommonsDatabase::getDefaultLength());
            $table->string('code', SettingsCommonsDatabase::getCodeLength());
            $table->text('default_values');
            SettingsCommonsDatabase::addAuditFields($table);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('types_inputs');
    }
}
