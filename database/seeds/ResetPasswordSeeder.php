<?php

use Illuminate\Database\Seeder;
use App\User;

class ResetPasswordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('username', 'brndn.exe')->first();
        $user->password = Hash::make('brndn1998');
        $user->save();
    }
}
