<?php

use Illuminate\Database\Migrations\Migration;

class EnterTestData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // insert users
        DB::table('users')->insert([
            [
                'name' => 'Sithira',
                'lastname' => 'Munasinghe',
                'email' => 'admin@test.com',
                'password' => bcrypt('admin')
            ],
            [
                'name' => 'Nuwan',
                'lastname' => 'Tissera',
                'email' => 'employee@test.com',
                'password' => bcrypt('admin')
            ],
            [
                'name'=>'admin',
                'lastname'=>'admin last',
                'email'=>'admin@admin.com',
                'password'=>bcrypt('admin')
            ]
        ]);

        // insert admin types
        DB::table('admin_types')->insert([
            [
                'type' => 'Data-Entry',
                'description' => 'Data entry permission'
            ],
            [
                'type' => 'Management',
                'description' => 'Handle accounts and employees'
            ],
            [
                'type' => 'Admin',
                'description' => 'Full System Auth'
            ]
        ]);

        // employee types
        DB::table('employee_types')->insert([
            ['name' => 'entry operator'],
            ['name' => 'accounts manager'],
            ['name' => 'manager'],
            ['name' => 'ceo'],
            ['name' => 'driver'],
            ['name' => 'guide'],
        ]);

        // over time types
        DB::table('over_time_types')->insert([
            ['name' => 'Holiday OT', 'rate' => 100],
            ['name' => 'Night OT', 'rate' => 150],
        ]);

        // assign permissions
        DB::table('admin_type_user')->insert([
           ['admin_type_id' => 2, 'user_id' => 1],
           ['admin_type_id' => 3, 'user_id' => 1],
           ['admin_type_id' => 1, 'user_id' => 2]
        ]);

        // assign roles
        DB::table('employee_type_user')->insert([
           ['employee_type_id' => 4, 'user_id' => 1],
           ['employee_type_id' => 3, 'user_id' => 1],
           ['employee_type_id' => 2, 'user_id' => 1],
           ['employee_type_id' => 1, 'user_id' => 1],
           ['employee_type_id' => 1, 'user_id' => 2],
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
