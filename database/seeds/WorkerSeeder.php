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
        //----------1 level---------
       factory(App\Worker::class)->create(['parent_id' =>0,'position' =>'big boss']);
        //----------2 level---------
      factory(App\Worker::class,30)->create(['parent_id' =>1]);
        //----------3 level---------
         factory(App\Worker::class,300)->create(['parent_id' =>5]);
        factory(App\Worker::class,300)->create(['parent_id' =>8]);
        factory(App\Worker::class,300)->create(['parent_id' =>12]);
        factory(App\Worker::class,300)->create(['parent_id' =>19]);
         //----------4 level---------
        factory(App\Worker::class,300)->create(['parent_id' =>1953]);
        factory(App\Worker::class,300)->create(['parent_id' =>2400]);
        factory(App\Worker::class,300)->create(['parent_id' =>2276]);
        factory(App\Worker::class,300)->create(['parent_id' =>2598]);
        factory(App\Worker::class,300)->create(['parent_id' =>2185]);
         //----------5 level---------
         factory(App\Worker::class,48000)->create();

    }
}
