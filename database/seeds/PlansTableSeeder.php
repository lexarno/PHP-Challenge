<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([
            'name' => "Plano 01",
            'amount' => 50.00,
            'description' => 'Um ótimo plano para quem quer começar.',
        ]);
        
        DB::table('plans')->insert([
            'name' => "Plano 02",
            'amount' => 75.00,
            'description' => 'Plano intermediário para usuário mais experiêntes.',
        ]);

        DB::table('plans')->insert([
            'name' => "Plano 03",
            'amount' => 110.00,
            'description' => 'Plano profissional.',
        ]);
    }
}
