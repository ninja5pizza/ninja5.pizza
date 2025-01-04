<?php

namespace Database\Seeders;

use App\Models\OrdinalsCollection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdinalsCollectionSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run()
    {
        OrdinalsCollection::create([
            'name' => 'Pizza Ninjas',
            'slug' => 'pizza-ninjas',
        ]);
    }
}
