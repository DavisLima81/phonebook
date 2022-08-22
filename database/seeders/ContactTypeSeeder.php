<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact_types')->insert([
            'name' => 'Família']);
        DB::table('contact_types')->insert([
            'name' => 'Trabalho']);
        DB::table('contact_types')->insert([
            'name' => 'Amigos']);
        DB::table('contact_types')->insert([
            'name' => 'Faculdade']);
        DB::table('contact_types')->insert([
            'name' => 'Outros']);
    }
}
