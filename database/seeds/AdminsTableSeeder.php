<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'id' => '1',
            'name' => '管理者',
            'password' => bcrypt('kanri1234'),
            'school_id' => '1',
            'master_flag' => '1',
        ];
        DB::table('admins')->insert($param);
    }
}
