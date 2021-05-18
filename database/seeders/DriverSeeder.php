<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Driver;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $driver1=new Driver();
        $driver1->name="Asif";
        $driver1->phone="01723232323";
        $driver1->nid="2312321331";
        $driver1->save();

        $driver2=new Driver();
        $driver2->name="Bashar";
        $driver2->phone="01795263968";
        $driver2->nid="654654";
        $driver2->save();

        $driver3=new Driver();
        $driver3->name="Chan Mia";
        $driver3->phone="01723548454";
        $driver3->nid="23125464564";
        $driver3->save();

        $driver4=new Driver();
        $driver4->name="Dilu";
        $driver4->phone="01723545455";
        $driver4->nid="231254546";
        $driver4->save();

        $driver5=new Driver();
        $driver5->name="Enam";
        $driver5->phone="01765485454";
        $driver5->nid="2385494544";
        $driver5->save();

    }
}
