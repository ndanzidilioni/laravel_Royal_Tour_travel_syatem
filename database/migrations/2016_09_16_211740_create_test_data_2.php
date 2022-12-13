<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestData2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::table('loyalty')->insert([
            [
                'type' => 'Regular',
                'description' => 'Regular Customers',
                'discount' => '0'
            ],
            [
                'type' => 'Gold',
                'description' => 'Special guess we give 25% discount for them',
                'discount' => '25'
            ],
            [
                'type' => 'silver',
                'description' => 'silver 15% discount for them',
                'discount' => '15'
            ],
            [
                'type' => 'bronze',
                'description' => 'bronze 5% discount for them',
                'discount' => '5'
            ]

        ]);

        //enter details into Packages
        DB::table('package')->insert([
            [
                'code' => '#0001',
                'name' => 'Dabhadiwa Wandana 8 Days',
                'country' => 'India',
                'destination' => 'Delhi',
                'days' => '8',
                'price' => '85000',
                'description' => 'testing inputs'
            ],
            [
                'code' => '#0002',
                'name' => 'Dabhadiwa Wandana 6 Days',
                'country' => 'India',
                'destination' => 'Delhi',
                'days' => '6',
                'price' => '75000',
                'description' => 'testing inputs'
            ],
            [
                'code' => '#0003',
                'name' => 'Malaysia',
                'country' => 'malaysia',
                'destination' => 'Kuala Lumpur',
                'days' => '10',
                'price' => '100000',
                'description' => 'testing inputs'
            ]
        ]);

        //enter hotel
        DB::table('hotels')->insert([
            [
                'name' => 'Hilton',
                'phone' => '0777304016',
                'email' => 'achalakavinda25r@gmail.com',
                'city' => 'Colombo',
                'expenses' => '750000'
            ]

        ]);

        //insert values to tours

        DB::table('tours')->insert([
            [
                'package_id' => 1,
                'name' => 'Test 1',
                'code' => '#ewer',
                'arrival' => '2016-09-04',
                'departure' => '2016-09-04',
                'departure_time' => '11:11:11',
                'arrival_time' => '11:11:11',
                'description' => 'Auto Generated tested value',
            ],
            [
                'package_id' => 2,
                'name' => 'Test 1',
                'code' => '#ewer',
                'arrival' => '2016-09-04',
                'departure' => '2016-09-04',
                'departure_time' => '11:11:11',
                'arrival_time' => '11:11:11',
                'description' => 'Auto Generated tested value',
            ],
            [
                'package_id' => 3,
                'name' => 'Test 1',
                'code' => '#ewer',
                'arrival' => '2016-09-04',
                'departure' => '2016-09-04',
                'departure_time' => '11:11:11',
                'arrival_time' => '11:11:11',
                'description' => 'Auto Generated tested value',
            ],
            [
                'package_id' => 1,
                'name' => 'Test 1',
                'code' => '#ewer',
                'arrival' => '2016-09-04',
                'departure' => '2016-09-04',
                'departure_time' => '11:11:11',
                'arrival_time' => '11:11:11',
                'description' => 'Auto Generated tested value',
            ],
            [
                'package_id' => 3,
                'name' => 'Test 1',
                'code' => '#ewer',
                'arrival' => '2016-09-04',
                'departure' => '2016-09-04',
                'departure_time' => '11:11:11',
                'arrival_time' => '11:11:11',
                'description' => 'Auto Generated tested value',
            ],
            [
                'package_id' => 3,
                'name' => 'Test 1',
                'code' => '#ewer',
                'arrival' => '2016-09-04',
                'departure' => '2016-09-04',
                'departure_time' => '11:11:11',
                'arrival_time' => '11:11:11',
                'description' => 'Auto Generated tested value',
            ]

        ]);

        //SK
        //Fill values to critical tables
        //employee_types
        DB::table('employee_types')->insert([
            ['id'=>'5','name'=>'driver']

        ]);

        DB::table('employee_type_user')->insert([
            ['employee_type_id'=>'5','user_id'=>'1']

        ]);





    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        return null;
    }
}
