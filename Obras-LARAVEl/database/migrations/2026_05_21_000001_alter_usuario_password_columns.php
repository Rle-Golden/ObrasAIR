<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE `usuario` MODIFY `password` VARCHAR(255) NOT NULL");
        DB::statement("ALTER TABLE `usuario` MODIFY `confirmar_password` VARCHAR(255) NOT NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE `usuario` MODIFY `password` VARCHAR(10) NOT NULL");
        DB::statement("ALTER TABLE `usuario` MODIFY `confirmar_password` VARCHAR(10) NOT NULL");
    }
};
