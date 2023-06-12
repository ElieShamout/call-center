<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Employee;
use App\Models\EmployeeNumbers;
use App\Models\PhoneNumbers;
use App\Models\SessionInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        // PhoneNumbers::factory()->count(500)->create();
        // Employee::factory()->count(100)->create();
        for ($i=1;$i<=500;$i++){
            EmployeeNumbers::create([
                'employee_id' => Employee::find(rand(1,100))->id,
                'phone_number_id' => $i
            ]);
        }
        Client::factory()->count(250)->create();


        for ($i=1;$i<=250;$i++){
            SessionInfo::create([
                'employee_id' => Employee::find(rand(1,100))->id,
                'client_id' => $i,
                'appointment_id' => '',
                'note' => '',
                'appointment_date' => '2023-06-02 10:00:00 AM',
            ]);
        }

 
    }
}
