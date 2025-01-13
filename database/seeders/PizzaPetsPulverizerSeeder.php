<?php

namespace Database\Seeders;

use App\Models\Inscription;
use App\Models\OrdinalsCollection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PizzaPetsPulverizerSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $collection = OrdinalsCollection::create([
            'name' => 'Pizza Pets Pulverizers',
            'slug' => 'pizza-pets-pulverizers',
        ]);

        $parentInscription = Inscription::where('inscription_id', '269730d6cd8c0795317bb8fd043fc7cecb147bb98ae0fed1a1ca9cc646a0c6a2i0')->first();
        $parentId = $parentInscription ? $parentInscription->id : null;

        Inscription::create([
            'collection_id' => $collection->id,
            'parent_id' => $parentId,
            'inscription_id' => '14580fd5072a0e96d8e0e6b1526319fde391d788b80a17eee23bf91ee1f961b2i0',
            'name' => 'Black Pineapple Pulverizer',
            'created_at_block' => 874105,
            'created_at' => Carbon::createFromTimestamp(1733835406),
        ]);

        Inscription::create([
            'collection_id' => $collection->id,
            'parent_id' => $parentId,
            'inscription_id' => '14580fd5072a0e96d8e0e6b1526319fde391d788b80a17eee23bf91ee1f961b2i1',
            'name' => 'Blue Pineapple Pulverizer',
            'created_at_block' => 874105,
            'created_at' => Carbon::createFromTimestamp(1733835406),
        ]);

        Inscription::create([
            'collection_id' => $collection->id,
            'parent_id' => $parentId,
            'inscription_id' => '14580fd5072a0e96d8e0e6b1526319fde391d788b80a17eee23bf91ee1f961b2i2',
            'name' => 'Green Pineapple Pulverizer',
            'created_at_block' => 874105,
            'created_at' => Carbon::createFromTimestamp(1733835406),
        ]);

        Inscription::create([
            'collection_id' => $collection->id,
            'parent_id' => $parentId,
            'inscription_id' => '14580fd5072a0e96d8e0e6b1526319fde391d788b80a17eee23bf91ee1f961b2i3',
            'name' => 'Red Pineapple Pulverizer',
            'created_at_block' => 874105,
            'created_at' => Carbon::createFromTimestamp(1733835406),
        ]);

        Inscription::create([
            'collection_id' => $collection->id,
            'parent_id' => $parentId,
            'inscription_id' => '14580fd5072a0e96d8e0e6b1526319fde391d788b80a17eee23bf91ee1f961b2i4',
            'name' => 'White Pineapple Pulverizer',
            'created_at_block' => 874105,
            'created_at' => Carbon::createFromTimestamp(1733835406),
        ]);

        Inscription::create([
            'collection_id' => $collection->id,
            'parent_id' => $parentId,
            'inscription_id' => '14580fd5072a0e96d8e0e6b1526319fde391d788b80a17eee23bf91ee1f961b2i5',
            'name' => 'Yellow Pineapple Pulverizer',
            'created_at_block' => 874105,
            'created_at' => Carbon::createFromTimestamp(1733835406),
        ]);
    }
}
