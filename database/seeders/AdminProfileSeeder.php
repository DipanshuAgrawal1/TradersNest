<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Vendor;

class AdminProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'admin@gmail.com')->first();
        $vendor = new Vendor();
        $vendor->banner = 'uploads/1234.jpg';
        $vendor->phone = '123123123';
        $vendor->email = 'admin@gmail.com';
        $vendor->address = 'nepal';
        $vendor->description = 'description string';
        $vendor->user_id = $user->id;
        $vendor->save();
    }
}
