<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('notifications')->insert([
            ['id' => 'dc39c010-0365-4459-b69d-2b7b9cc6bddc', 'type' => 'App\Notifications\TicketAdded', 'notifiable_type' => 'App\Models\User', 'notifiable_id' => 7, 'data' => '{"id":7,"massage":"User Submitted a New Ticket"}', 'created_at' => '2021-03-31 05:25:30', 'updated_at' => '2021-03-31 05:25:30'],
            ['id' => 'e79f8a0e-8ed2-4b34-a122-4ba501572417', 'type' => 'App\Notifications\AnswerNotification', 'notifiable_type' => 'App\Models\User', 'notifiable_id' => 1, 'data' => '{"id":1,"massage":"Dr. Answered Patient ticket"}', 'created_at' => '2021-03-31 05:25:30', 'updated_at' => '2021-03-31 05:25:30'],
        ]);
    }
}
