<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'code' => Str::random(3),
            'nama' => Str::random(20),
            'merk' => Str::random(8),
            'satuan' => 'L',
            'jenis' => Str::random(5),
            'netto' => 5,
        ]);
    }
}
