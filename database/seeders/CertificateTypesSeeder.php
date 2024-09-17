<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CertificateTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('certificate_types')->truncate();
        
        $types = [
            ['name' => 'Birth', ],
            ['name' => 'Death'],
            ['name' => 'Divorce'],
            ['name' => 'Marriage'],
        ];

        DB::table('certificate_types')->insert($types);
    }
}
