<?php

use Illuminate\Database\Seeder;

class GitarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gitars')->insert([
            'codemerk' => 'FJCE',
            'cat' => 'PUSS-51221 HV',
            'pemakaian' => 250
        ]);
        DB::table('gitars')->insert([
            'codemerk' => 'FJCE',
            'cat' => 'PUSS-51221 HV',
            'pemakaian' => 250
        ]);
    }
}
