<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\SantaList;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       User::factory(10)->create();

        $users = User::get();

        foreach ($users as $user) {
            if (!$user->santa) {
                $newWard = User::doesntHave('ward')
                    ->where('id','<>', $user->id)
                    ->inRandomOrder()
                    ->first();

                if ($newWard) {
                    SantaList::insert([
                        'santa_user_id' => $user->id,
                        'ward_user_id' => $newWard->id,
                    ]);
                }
            }

        }
    }
}
