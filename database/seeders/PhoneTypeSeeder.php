<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhoneTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('phone_types')->insert([
            'name' => 'Celular pessoal']);
        DB::table('phone_types')->insert([
            'name' => 'Celular funcional']);
        DB::table('phone_types')->insert([
            'name' => 'Fixo residencial']);
        DB::table('phone_types')->insert([
            'name' => 'Fixo trabalho']);
        DB::table('phone_types')->insert([
            'name' => 'Recado']);
    }
}
