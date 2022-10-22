<?php

namespace Database\Seeders;

use App\Models\User;
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
        // Adding an admin user
        User::factory()->create([
            'name' => 'Bryan Sajbochol',
            'email' => 'bsajbochols@miumg.edu.gt',
        ]);
        $this->call(PermissionsSeeder::class);
    }
}
