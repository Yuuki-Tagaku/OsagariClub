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
            'category' => '音楽',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'id' => '3',
            'school_id' => '1',
            'category' => '図工',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'id' => '4',
            'school_id' => '1',
            'category' => '算数',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'id' => '5',
            'school_id' => '1',
            'category' => '国語',
        ];
        DB::table('categories')->insert($param);
    }
}
