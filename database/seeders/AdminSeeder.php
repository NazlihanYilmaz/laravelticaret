<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    
    public function run(): void
    {
        AdminModel::create([
            "adsoyad" => "Yakup Kul",
            "email" => "ykp@gmail.com",
            "kuladi" => "ykp",
            "password" => bcrypt("123"),
            "created_at" => now(),
            "updated_at" => now(),
        ]);
    }
}
