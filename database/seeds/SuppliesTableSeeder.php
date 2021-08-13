<?php

use Illuminate\Database\Seeder;

class SuppliesTableSeeder extends Seeder
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
            'user_id' => '1',
            'category_id' => '4',
            'item' => '算数ブロック',
            'size' => 'なし',
            'condition' => '3',
            'years_used' => '２年間',
            'gender' => '1',
            'remarks' => '1年生と2年生でしか使わなかった算数ブロックです。あまり使わないので汚れもないです。',
            /*これはテストに入れてる画像PATHなので、実際に表示はされないです。
            表示するかどうかの確認はstorage/app/publicにimagesファイルを作成して、そこに画像を入れてください。*/
            'image_path1' => 'test.png',
        ];
        DB::table('supplies')->insert($param);

        $param = [
            'id' => '2',
            'user_id' => '4',
            'category_id' => '1',
            'item' => '体操服',
            'size' => '150',
            'condition' => '3',
            'years_used' => '6ヶ月',
            'gender' => '2',
            'remarks' => 'サイズが合わなくて仕方なく買ったもので6年生最後の半年間しか使ってません。目立った汚れはないです。',
            /*これはテストに入れてる画像PATHなので、実際に表示はされないです。
            表示するかどうかの確認はstorage/app/publicにimagesファイルを作成して、そこに画像を入れてください。*/
            'image_path1' => 'test.png',
        ];
        DB::table('supplies')->insert($param);

        $param = [
            'id' => '3',
            'user_id' => '3',
            'category_id' => '2',
            'item' => '鍵盤ハーモニカ',
            'size' => 'なし',
            'condition' => '4',
            'years_used' => '6年間',
            'gender' => '2',
            'remarks' => '卒業するのでもう使わないです。高学年になると1年に1回使うかどうかのもので、ほとんど使ってません。',
            /*これはテストに入れてる画像PATHなので、実際に表示はされないです。
            表示するかどうかの確認はstorage/app/publicにimagesファイルを作成して、そこに画像を入れてください。*/
            'image_path1' => 'test.png',
        ];
        DB::table('supplies')->insert($param);
    }
}
