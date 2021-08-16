<?php

use Illuminate\Database\Seeder;

class ChatsTableSeeder extends Seeder
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
            'supply_user_id' => '1',
            'chat' => 'はじめまして、お話が聞きたいです。',
            'user_id' => '2',
        ];
        DB::table('chats')->insert($param);

        $param = [
            'id' => '2',
            'supply_user_id' => '1',
            'chat' => 'はじめまして。お話とはどんなことでしょうか？なんでも聞いてください。',
            'user_id' => '1',
        ];
        DB::table('chats')->insert($param);

        $param = [
            'id' => '3',
            'supply_user_id' => '2',
            'chat' => 'はじめまして、お話が聞きたいです。',
            'user_id' => '2'
        ];
        DB::table('chats')->insert($param);

        $param = [
            'id' => '4',
            'supply_user_id' => '1',
            'chat' => '算数ブロックですが、数は全部揃ってますか？',
            'user_id' => '2',
        ];
        DB::table('chats')->insert($param);

        $param = [
            'id' => '5',
            'supply_user_id' => '2',
            'chat' => 'はい、なんでも聞いてください！',
            'user_id' => '3',
        ];
        DB::table('chats')->insert($param);
    }
}
