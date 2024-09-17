<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('document_types')->truncate();
        
        $types = [
            ['name' => 'Cnic', ],
            ['name' => 'Certificate'],
            ['name' => 'Affidavit'],
        ];

        DB::table('document_types')->insert($types);
    }
}
