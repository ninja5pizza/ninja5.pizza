<?php

namespace Database\Seeders;

use App\Models\Inscription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PizzaPetsPulverizerChildrenSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->blackPulverizerChildren();
        $this->bluePulverizerChildren();
        $this->greenPulverizerChildren();
        $this->whitePulverizerChildren();
    }

    protected function blackPulverizerChildren(): void
    {
        $parentInscription = Inscription::where('inscription_id', '14580fd5072a0e96d8e0e6b1526319fde391d788b80a17eee23bf91ee1f961b2i0')->first();
        $parentId = $parentInscription ? $parentInscription->id : null;

        Inscription::create([
            'parent_id' => $parentId,
            'inscription_id' => 'ca11462aff5348d9b7590b6a0a426c0e27cd867a558ea24ba1d4eb236ff49d4di0',
            'created_at_block' => 877861,
            'created_at' => Carbon::createFromTimestamp(1736040221),
        ]);

        Inscription::create([
            'parent_id' => $parentId,
            'inscription_id' => '8e11a2e535773629ed7afadab5dccff5ce3459d91ab44b7f614985f78c82b385i0',
            'created_at_block' => 877909,
            'created_at' => Carbon::createFromTimestamp(1736065478),
        ]);
    }

    protected function bluePulverizerChildren(): void
    {
        $parentInscription = Inscription::where('inscription_id', '14580fd5072a0e96d8e0e6b1526319fde391d788b80a17eee23bf91ee1f961b2i1')->first();
        $parentId = $parentInscription ? $parentInscription->id : null;

        Inscription::create([
            'parent_id' => $parentId,
            'inscription_id' => 'f31c1439b34b2635969ac1a074d82592dd9eb16570026e7b5345151bc509bcf6i0',
            'created_at_block' => 878058,
            'created_at' => Carbon::createFromTimestamp(1736144887),
        ]);

        Inscription::create([
            'parent_id' => $parentId,
            'inscription_id' => '09fb44a2c6fd423ae362f49761ef9a41aefbc878f6e9bb41778428ee8f418292i0',
            'created_at_block' => 878084,
            'created_at' => Carbon::createFromTimestamp(1736163294),
        ]);
    }

    protected function greenPulverizerChildren(): void
    {
        $parentInscription = Inscription::where('inscription_id', '14580fd5072a0e96d8e0e6b1526319fde391d788b80a17eee23bf91ee1f961b2i2')->first();
        $parentId = $parentInscription ? $parentInscription->id : null;

        Inscription::create([
            'parent_id' => $parentId,
            'inscription_id' => 'cacb75c66cedb360a98a6159ad7378ef5a7e506da4358ec6b9ebf627160f5350i0',
            'created_at_block' => 878289,
            'created_at' => Carbon::createFromTimestamp(1736300128),
        ]);
    }

    protected function whitePulverizerChildren(): void
    {
        $parentInscription = Inscription::where('inscription_id', '14580fd5072a0e96d8e0e6b1526319fde391d788b80a17eee23bf91ee1f961b2i4')->first();
        $parentId = $parentInscription ? $parentInscription->id : null;

        Inscription::create([
            'parent_id' => $parentId,
            'inscription_id' => '5cd56d91c845fe9905aa079c19c00dfe8e3379b876c2af484d7952e821933a45i0',
            'created_at_block' => 877704,
            'created_at' => Carbon::createFromTimestamp(1735946955),
        ]);

        Inscription::create([
            'parent_id' => $parentId,
            'inscription_id' => '8fb29b5a4c6d829905439f7a3c7ca411e8a5d32750429ca582feab2878ecc258i0',
            'created_at_block' => 877905,
            'created_at' => Carbon::createFromTimestamp(1736063768),
        ]);
    }
}
