<?php

namespace Database\Seeders;

use App\Models\Inscription;
use App\Models\InscriptionTrait;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PizzaNinjasSeeder extends Seeder
{
    protected string $json_path;

    public function __construct(string $file_name = 'pizzaninjas-collection.json')
    {
        $this->json_path = database_path($file_name);
    }

    public function getJsonAsCollection(): Collection
    {
        if (! File::exists($this->json_path)) {
            throw new \Exception('The JSON file does not exist at the specified path: '.$this->json_path);
        }

        $json_content = File::get($this->json_path);
        $data = json_decode($json_content, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('Invalid JSON format in file: '.$this->json_path);
        }

        if (! is_array($data)) {
            throw new \Exception('The JSON file does not contain an array.');
        }

        return collect($data);
    }

    public function run(): void
    {
        $this->getJsonAsCollection()->each(function ($item, $key) {
            $inscriptionId = $item['id'];
            $name = $item['meta']['name'];

            if (! $inscriptionId) {
                $this->command->warn("Missing inscriptionId for key: {$key}");

                return false;
            }

            if (! $name) {
                $this->command->warn("Missing name for id: {$inscriptionId}");

                return false;
            }

            Inscription::create([
                'inscription_id' => $inscriptionId,
                'name' => $name,
            ]);
        });
    }
}
