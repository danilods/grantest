<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrgaosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('orgaos')->delete();

        DB::table('orgaos')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Ministério Público do Distrito Federal',
                'sigla_orgao' => 'MP-DF',
                'created_at' => '2020-06-26 17:51:56',
                'updated_at' => '2020-06-26 17:52:42',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Tribunal de Justiça do Pará',
                'sigla_orgao' => 'TJ-PA',
                'created_at' => '2020-06-26 17:52:27',
                'updated_at' => '2020-06-26 17:52:27',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Tribunal de Justiça do Tocantins',
                'sigla_orgao' => 'TJ-TO',
                'created_at' => '2020-06-28 00:22:04',
                'updated_at' => '2020-06-28 00:22:04',
                'deleted_at' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Polícia Federal',
                'sigla_orgao' => 'PF',
                'created_at' => '2020-06-28 22:23:25',
                'updated_at' => '2020-06-28 22:23:25',
                'deleted_at' => NULL,
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'Polícia Rodoviária Federal',
                'sigla_orgao' => 'PRF',
                'created_at' => '2020-06-28 22:23:37',
                'updated_at' => '2020-06-28 22:23:37',
                'deleted_at' => NULL,
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'Senado Federal',
                'sigla_orgao' => 'SENADO',
                'created_at' => '2020-06-28 22:31:33',
                'updated_at' => '2020-06-28 22:31:33',
                'deleted_at' => NULL,
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'Ministério Público da União',
                'sigla_orgao' => 'MPU',
                'created_at' => '2020-06-28 22:32:20',
                'updated_at' => '2020-06-28 22:32:20',
                'deleted_at' => NULL,
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'Departamento Penitenciário Federal',
                'sigla_orgao' => 'DEPEN',
                'created_at' => '2020-06-28 22:32:52',
                'updated_at' => '2020-06-28 22:32:52',
                'deleted_at' => NULL,
            ),
        ));


    }
}
