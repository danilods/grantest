<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BancasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('bancas')->delete();

        DB::table('bancas')->insert(array (
            0 =>
            array (
                'id' => 1,
                'nome_banca' => 'Fundação Getúlio Vargas - FGV',
                'created_at' => '2020-06-25 14:39:11',
                'updated_at' => '2020-06-26 18:59:01',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'nome_banca' => 'CESPE/CEBRASPE',
                'created_at' => '2020-06-25 14:42:04',
                'updated_at' => '2020-06-25 14:42:04',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'nome_banca' => 'Instituto de Formação e Capacitação - IBFC',
                'created_at' => '2020-06-26 02:12:52',
                'updated_at' => '2020-06-26 02:12:52',
                'deleted_at' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'nome_banca' => 'VUNESP',
                'created_at' => '2020-06-26 02:17:22',
                'updated_at' => '2020-06-26 02:17:22',
                'deleted_at' => NULL,
            ),
            4 =>
            array (
                'id' => 5,
                'nome_banca' => 'Instituto AOCP',
                'created_at' => '2020-06-28 22:01:18',
                'updated_at' => '2020-06-28 22:01:18',
                'deleted_at' => NULL,
            ),
            5 =>
            array (
                'id' => 6,
                'nome_banca' => 'Instituto Quadrix',
                'created_at' => '2020-06-28 22:02:12',
                'updated_at' => '2020-06-28 22:02:12',
                'deleted_at' => NULL,
            ),
            6 =>
            array (
                'id' => 7,
                'nome_banca' => 'Fundaçao Carlos Chagas - FCC',
                'created_at' => '2020-06-28 22:03:04',
                'updated_at' => '2020-06-28 22:03:04',
                'deleted_at' => NULL,
            ),
            7 =>
            array (
                'id' => 8,
                'nome_banca' => 'Fundação Cesgranrio',
                'created_at' => '2020-06-28 22:04:14',
                'updated_at' => '2020-06-28 22:04:14',
                'deleted_at' => NULL,
            ),
            8 =>
            array (
                'id' => 9,
                'nome_banca' => 'Instituto Americano de Desenvolvimento - IADES',
                'created_at' => '2020-06-28 22:04:35',
                'updated_at' => '2020-06-28 22:04:35',
                'deleted_at' => NULL,
            ),
        ));


    }
}
