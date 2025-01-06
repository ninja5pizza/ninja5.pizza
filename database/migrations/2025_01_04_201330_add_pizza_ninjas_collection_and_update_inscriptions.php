<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $collection_id = DB::table('collections')->insertGetId([
            'name' => 'Pizza Ninjas',
            'slug' => 'pizza-ninjas',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('inscriptions')
            ->where('name', 'like', 'Pizza Ninjas%')
            ->update(['collection_id' => $collection_id]);
    }

    public function down()
    {
        $collection = DB::table('collections')
            ->where('slug', 'pizza-ninjas')
            ->first();

        if (! $collection) {
            return;
        }

        DB::table('inscriptions')->where('collection_id', $collection->id)->update([
            'collection_id' => null,
        ]);

        DB::table('collections')->where('id', $collection->id)->delete();
    }
};
