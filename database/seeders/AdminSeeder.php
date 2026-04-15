<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'smpwaringin@smpwaringinbdg.sch.id'],
            [
                'name'     => 'SMP Waringin',
                'email'    => 'smpwaringin@smpwaringinbdg.sch.id',
                'password' => Hash::make('Cois@209Wars'),
            ]
        );
    }
}
