<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\plan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $plans = 
        [
                    [
                            'name' => 'Basic',
                            'price' => 9,
                            'description' => 'This is Plan 1 description.'
                    ],

                    [
                            'name' => 'standard',
                            'price' => 19,
                            'description' => 'This is Plan 2 description.'
                    ],

                    [
                            'name' => 'premium',
                            'price' => 29,
                            'description' => 'This is Plan 3 description.'
                    ],
                ];
          foreach ($plans as $key => $value) {
            Plan::create($value);
        }
    }
}
