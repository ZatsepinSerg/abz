<?php

use Illuminate\Database\Seeder;


class WorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(App\Worker::class)->create(['parent_id' =>0]);
       factory(App\Worker::class,2000)->create();
    }
}
