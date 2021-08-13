<?php

use Illuminate\Database\Seeder;

class Supply_userTableSeeder extends Seeder
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
            'user_id' => '2',
            'supply_id' => '1',
            'contract' => '1',
        ];
        DB::table('supply_user')->insert($param);

        $param = [
            'id' => '2',
            'user_id' => '2',
            'supply_id' => '2',
            'contract' => '1',
        ];
        DB::table('supply_user')->insert($param);
    }
}
