<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'is_admin' => 1 ,
        ]);
        \App\Models\User::factory()->create([
            'name' => 'John Doe',
            'email' => 'John@Doe.com',
            'is_admin' => 0 ,
        ]);

        // Structure seeders
        \App\Models\Structure::factory()->create([
            'name' => 'Direction General',
            'slug' => 'direction-general',
            'position' => 0,
            'parent_id' => null,
        ]);
        \App\Models\Structure::factory()->create([
            'name' => 'direction adjoint',
            'slug' => 'direction adjoint',
            'position' => 1,
            'parent_id' => 1,
        ]);
        \App\Models\Structure::factory()->create([
            'name' => 'Direction Technique',
            'slug' => 'direction technique',
            'position' => 0,
            'parent_id' => null,
        ]);
        \App\Models\Structure::factory()->create([
            'name' => 'direction des services techniques',
            'slug' => 'direction des services techniques',
            'position' => 0,
            'parent_id' => null,
        ]);
        \App\Models\Structure::factory()->create([
            'name' => 'direction sous-adjoint',
            'slug' => 'direction sous-adjoint',
            'position' => 2,
            'parent_id' => 2,
        ]);
        \App\Models\Structure::factory()->create([
            'name' => 'rectorat',
            'slug' => 'rectorat',
            'position' => 3,
            'parent_id' => 5,
        ]);


        // Sieges seeders

        \App\Models\Siege::factory()->create([
            'designation' => 'Alger',
        ]);
        \App\Models\Siege::factory()->create([
            'designation' => 'Oran',
        ]);
    }
}
