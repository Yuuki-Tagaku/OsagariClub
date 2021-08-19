<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
            'name' => '山田花子',
            'email' => 'yamada@yamada.com',
            'password' => bcrypt('yamada1234'),
            'school_id' => '1',
            'appleal' => 'これはテスト用アカウントです。',
        ];
        DB::table('users')->insert($param);

            //id2に関してはマッチングのために作成したアカウントで、apllealがnullで登録できるか確認用です。
        $param = [
            'id' => '2',
            'name' => '田中花子',
            'email' => 'tanaka@tanaka.com',
            'password' => bcrypt('tanaka1234'),
            'school_id' => '1',
        ];
        DB::table('users')->insert($param);

        $param = [
            'id' => '3',
            'name' => '鈴木花子',
            'email' => 'suzuki@suzuki.com',
            'password' => bcrypt('suzuki1234'),
            'school_id' => '1',
            'appleal' => '消してもいい用予備アカウントです。'
        ];
        DB::table('users')->insert($param);

        $param = [
            'id' => '4',
            'name' => '佐藤花子',
            'email' => 'satou@satou.com',
            'password' => bcrypt('satou1234'),
            'school_id' => '1',
            'appleal' => '３人以上とやりとりできるか確認用アカウントです。'
        ];
        DB::table('users')->insert($param);
    }
}
