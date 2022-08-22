<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhoneAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('phone_areas')->insert([
            'number' => 21]);
        DB::table('phone_areas')->insert([
            'number' => 22]);
        DB::table('phone_areas')->insert([
            'number' => 24]);
        DB::table('phone_areas')->insert([
            'number' => 11]);
        DB::table('phone_areas')->insert([
            'number' => 12]);
        DB::table('phone_areas')->insert([
            'number' => 31]);
        DB::table('phone_areas')->insert([
            'number' => 32]);
        DB::table('phone_areas')->insert([
            'number' => 67]);

    }
}
