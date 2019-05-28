<?php

use Illuminate\Database\Seeder;

class SexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sex = new \App\Sex();
        $sex->text = "ชาย";
        $sex->save();

        $sex = new \App\Sex();
        $sex->text = "หญิง";
        $sex->save();
    }
}
