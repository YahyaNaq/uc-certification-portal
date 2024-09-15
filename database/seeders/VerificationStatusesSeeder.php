<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VerificationStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('verification_statuses')->truncate();
        
        $statuses = [
            ['name' => 'Pending', 'label' => 'Pending'],
            ['name' => 'Remotely Verified', 'label' => 'Remotely Verified'],
            ['name' => 'Rejected', 'label' => 'Rejected'],
            ['name' => 'Completely Verified', 'label' => 'Completely Verified'],
            ['name' => 'Certificate Issued', 'label' => 'Certificate Issued'],
        ];

        DB::table('verification_statuses')->insert($statuses);
    }
}
