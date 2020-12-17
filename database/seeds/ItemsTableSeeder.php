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
            'code' => 'HV',
            'nama' => 'PUSS-51221',
            'suplier' => 'PROPAN',
            'jenis' => 'SEALER',
            'netto' => 20000,
        ]);
        DB::table('items')->insert([
            'code' => 'HV',
            'nama' => 'PUH-57104/13SD',
            'suplier' => 'PROPAN',
            'jenis' => 'SEALER',
            'netto' => 5000,
        ]);
    }
}
