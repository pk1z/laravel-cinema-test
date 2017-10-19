<?php

use Illuminate\Database\Seeder;

class TicketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FilmsTableSeeder::class);

        $this->call(RoomTableSeeder::class);

        factory(App\Seance::class, 10)->create()->each(function (App\Seance $s) {
            $s->tickets()->saveMany(factory (App\Ticket::class, 10)->create());

        });

    }
}
