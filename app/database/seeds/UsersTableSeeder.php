<?php

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        // to use non eloquent-functions we need to unguard
        Eloquent::unguard();

        // all existing users are deleted
        DB::table('users')->truncate();

        // add user using Eloquent
        $user = new User;
        $user->username = 'admin';
        $user->email = 'bguser@mailinator.com';
        $user->name = 'John Doe';
        $user->password = Hash::make('abc123');
        $user->save();
    }

}
