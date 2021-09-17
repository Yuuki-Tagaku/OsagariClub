<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
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
            'school_id' => '1',
            'category' => '体育',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'id' => '2',
            'school_id' => '1',
            'category' => '図工',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'id' => '3',
            'school_id' => '1',
            'category' => '音楽',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'id' => '4',
            'school_id' => '1',
            'category' => '書写',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'id' => '5',
            'school_id' => '1',
            'category' => 'クラブ',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'id' => '6',
            'school_id' => '1',
            'category' => '国語',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'id' => '7',
            'school_id' => '1',
            'category' => '算数',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'id' => '8',
            'school_id' => '1',
            'category' => '理科',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'id' => '9',
            'school_id' => '1',
            'category' => '社会',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'id' => '10',
            'school_id' => '1',
            'category' => '英語',
        ];
        DB::table('categories')->insert($param);
    }
}
