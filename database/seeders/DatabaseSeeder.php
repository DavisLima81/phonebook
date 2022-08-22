<?php

namespace Database\Seeders;

use App\Models\ContactType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();     //FACTORY Users
        // \App\Models\Contact::factory(22)->create();     //FACTORY Contacts
        $this->call([
            ContactTypeSeeder::class,
            PhoneAreaSeeder::class,
            PhoneTypeSeeder::class
        ]);
    }
}
