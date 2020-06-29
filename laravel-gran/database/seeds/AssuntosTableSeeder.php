<?php

use Illuminate\Database\Seeder;

class AssuntosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('assuntos')->delete();
        
        \DB::table('assuntos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'titulo_assunto' => 'Teoria da administração',
                'raiz_id' => NULL,
                'created_at' => '2020-06-25 14:57:54',
                'updated_at' => '2020-06-25 14:57:54',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'titulo_assunto' => 'Teoria da Taylor',
                'raiz_id' => 1,
                'created_at' => '2020-06-25 14:58:24',
                'updated_at' => '2020-06-25 14:58:24',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'titulo_assunto' => 'Engenharia de Software',
                'raiz_id' => NULL,
                'created_at' => '2020-06-26 22:53:29',
                'updated_at' => '2020-06-26 22:53:29',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'titulo_assunto' => 'Arquitetura MVC',
                'raiz_id' => 3,
                'created_at' => '2020-06-26 22:53:45',
                'updated_at' => '2020-06-26 22:53:45',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'titulo_assunto' => 'Arquitetura em camadas',
                'raiz_id' => 3,
                'created_at' => '2020-06-26 23:13:05',
                'updated_at' => '2020-06-26 23:13:05',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'titulo_assunto' => 'Modelo em Cascata',
                'raiz_id' => 3,
                'created_at' => '2020-06-26 23:52:40',
                'updated_at' => '2020-06-26 23:52:40',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'titulo_assunto' => 'Modelo Iterativo e Incremental',
                'raiz_id' => 3,
                'created_at' => '2020-06-26 23:55:15',
                'updated_at' => '2020-06-26 23:55:15',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'titulo_assunto' => 'Governança de TI',
                'raiz_id' => NULL,
                'created_at' => '2020-06-28 22:06:49',
                'updated_at' => '2020-06-28 22:06:49',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'titulo_assunto' => 'CMMI',
                'raiz_id' => 8,
                'created_at' => '2020-06-28 22:07:08',
                'updated_at' => '2020-06-28 22:07:08',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'titulo_assunto' => 'COBIT 5',
                'raiz_id' => 8,
                'created_at' => '2020-06-28 22:07:56',
                'updated_at' => '2020-06-28 22:07:56',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'titulo_assunto' => 'PMBOK 5',
                'raiz_id' => 8,
                'created_at' => '2020-06-28 22:08:17',
                'updated_at' => '2020-06-28 22:08:17',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'titulo_assunto' => 'ITIL V.3',
                'raiz_id' => 8,
                'created_at' => '2020-06-28 22:08:25',
                'updated_at' => '2020-06-28 22:08:25',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'titulo_assunto' => 'Balanced Scorecard',
                'raiz_id' => 8,
                'created_at' => '2020-06-28 22:08:48',
                'updated_at' => '2020-06-28 22:08:48',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'titulo_assunto' => 'MPS.BR',
                'raiz_id' => 8,
                'created_at' => '2020-06-28 22:09:04',
                'updated_at' => '2020-06-28 22:09:04',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'titulo_assunto' => 'PETI',
                'raiz_id' => 8,
                'created_at' => '2020-06-28 22:09:16',
                'updated_at' => '2020-06-28 22:09:16',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'titulo_assunto' => 'ISO 38500',
                'raiz_id' => 8,
                'created_at' => '2020-06-28 22:09:26',
                'updated_at' => '2020-06-28 22:09:26',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'titulo_assunto' => 'UML',
                'raiz_id' => 3,
                'created_at' => '2020-06-28 22:10:11',
                'updated_at' => '2020-06-28 22:10:11',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'titulo_assunto' => 'Eng. de Requisitos',
                'raiz_id' => 3,
                'created_at' => '2020-06-28 22:10:19',
                'updated_at' => '2020-06-28 22:10:19',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'titulo_assunto' => 'XP',
                'raiz_id' => 3,
                'created_at' => '2020-06-28 22:10:27',
                'updated_at' => '2020-06-28 22:10:27',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'titulo_assunto' => 'SCRUM',
                'raiz_id' => 3,
                'created_at' => '2020-06-28 22:10:33',
                'updated_at' => '2020-06-28 22:10:33',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'titulo_assunto' => 'Prototipação',
                'raiz_id' => 3,
                'created_at' => '2020-06-28 22:10:54',
                'updated_at' => '2020-06-28 22:10:54',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'titulo_assunto' => 'Métricas de Software',
                'raiz_id' => 3,
                'created_at' => '2020-06-28 22:11:05',
                'updated_at' => '2020-06-28 22:11:05',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'titulo_assunto' => 'Orientação a Objetos',
                'raiz_id' => 3,
                'created_at' => '2020-06-28 22:11:19',
                'updated_at' => '2020-06-28 22:11:19',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'titulo_assunto' => 'RUP',
                'raiz_id' => 3,
                'created_at' => '2020-06-28 22:11:40',
                'updated_at' => '2020-06-28 22:11:40',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'titulo_assunto' => 'Arquitetura de Computadores',
                'raiz_id' => NULL,
                'created_at' => '2020-06-28 22:12:19',
                'updated_at' => '2020-06-28 22:12:19',
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'titulo_assunto' => 'Arquitetura RISC, CISC',
                'raiz_id' => 25,
                'created_at' => '2020-06-28 22:13:00',
                'updated_at' => '2020-06-28 22:13:00',
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'titulo_assunto' => 'Barramento',
                'raiz_id' => 25,
                'created_at' => '2020-06-28 22:13:12',
                'updated_at' => '2020-06-28 22:13:12',
                'deleted_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'titulo_assunto' => 'Memória',
                'raiz_id' => 25,
                'created_at' => '2020-06-28 22:13:21',
                'updated_at' => '2020-06-28 22:13:21',
                'deleted_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'titulo_assunto' => 'Processadores',
                'raiz_id' => 25,
                'created_at' => '2020-06-28 22:13:29',
                'updated_at' => '2020-06-28 22:13:29',
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'titulo_assunto' => 'Placa-mãe',
                'raiz_id' => 25,
                'created_at' => '2020-06-28 22:13:41',
                'updated_at' => '2020-06-28 22:13:41',
                'deleted_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'titulo_assunto' => 'Sistemas de Arquivos',
                'raiz_id' => 25,
                'created_at' => '2020-06-28 22:13:53',
                'updated_at' => '2020-06-28 22:13:53',
                'deleted_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'titulo_assunto' => 'Sistemas distribuídos',
                'raiz_id' => 25,
                'created_at' => '2020-06-28 22:14:03',
                'updated_at' => '2020-06-28 22:14:03',
                'deleted_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'titulo_assunto' => 'Banco de dados',
                'raiz_id' => NULL,
                'created_at' => '2020-06-28 22:14:28',
                'updated_at' => '2020-06-28 22:14:28',
                'deleted_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'titulo_assunto' => 'BI',
                'raiz_id' => 33,
                'created_at' => '2020-06-28 22:14:50',
                'updated_at' => '2020-06-28 22:14:50',
                'deleted_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'titulo_assunto' => 'Banco de dados distribuídos',
                'raiz_id' => 33,
                'created_at' => '2020-06-28 22:14:59',
                'updated_at' => '2020-06-28 22:14:59',
                'deleted_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'titulo_assunto' => 'Data Mining',
                'raiz_id' => 33,
                'created_at' => '2020-06-28 22:15:12',
                'updated_at' => '2020-06-28 22:15:12',
                'deleted_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'titulo_assunto' => 'Data Warehouse',
                'raiz_id' => 33,
                'created_at' => '2020-06-28 22:15:20',
                'updated_at' => '2020-06-28 22:15:20',
                'deleted_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'titulo_assunto' => 'Data Mart',
                'raiz_id' => 33,
                'created_at' => '2020-06-28 22:15:25',
                'updated_at' => '2020-06-28 22:15:25',
                'deleted_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'titulo_assunto' => 'DER diagrama de entidade e relacionamento',
                'raiz_id' => 33,
                'created_at' => '2020-06-28 22:15:40',
                'updated_at' => '2020-06-28 22:15:40',
                'deleted_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'titulo_assunto' => 'ETL',
                'raiz_id' => 33,
                'created_at' => '2020-06-28 22:15:52',
                'updated_at' => '2020-06-28 22:15:52',
                'deleted_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'titulo_assunto' => 'Formas Normais',
                'raiz_id' => 33,
                'created_at' => '2020-06-28 22:15:58',
                'updated_at' => '2020-06-28 22:15:58',
                'deleted_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'titulo_assunto' => 'Modelo Relacional',
                'raiz_id' => 33,
                'created_at' => '2020-06-28 22:16:11',
                'updated_at' => '2020-06-28 22:16:11',
                'deleted_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'titulo_assunto' => 'PostgreSQL',
                'raiz_id' => 33,
                'created_at' => '2020-06-28 22:16:39',
                'updated_at' => '2020-06-28 22:16:39',
                'deleted_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'titulo_assunto' => 'MySQL',
                'raiz_id' => 33,
                'created_at' => '2020-06-28 22:16:43',
                'updated_at' => '2020-06-28 22:16:43',
                'deleted_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'titulo_assunto' => 'Oracle',
                'raiz_id' => 33,
                'created_at' => '2020-06-28 22:16:47',
                'updated_at' => '2020-06-28 22:16:47',
                'deleted_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'titulo_assunto' => 'SGBD',
                'raiz_id' => 33,
                'created_at' => '2020-06-28 22:16:55',
                'updated_at' => '2020-06-28 22:16:55',
                'deleted_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'titulo_assunto' => 'NoSql',
                'raiz_id' => 33,
                'created_at' => '2020-06-28 22:17:01',
                'updated_at' => '2020-06-28 22:17:01',
                'deleted_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'titulo_assunto' => 'MongoDB',
                'raiz_id' => 33,
                'created_at' => '2020-06-28 22:17:05',
                'updated_at' => '2020-06-28 22:17:05',
                'deleted_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'titulo_assunto' => 'Teoria Neoclássica',
                'raiz_id' => 1,
                'created_at' => '2020-06-28 22:18:23',
                'updated_at' => '2020-06-28 22:18:23',
                'deleted_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'titulo_assunto' => 'Teoria da contingência',
                'raiz_id' => 1,
                'created_at' => '2020-06-28 22:18:28',
                'updated_at' => '2020-06-28 22:18:28',
                'deleted_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'titulo_assunto' => 'Teoria de Sistemas',
                'raiz_id' => 1,
                'created_at' => '2020-06-28 22:18:35',
                'updated_at' => '2020-06-28 22:18:35',
                'deleted_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'titulo_assunto' => 'Estratégia Organizacional',
                'raiz_id' => 1,
                'created_at' => '2020-06-28 22:18:52',
                'updated_at' => '2020-06-28 22:18:52',
                'deleted_at' => NULL,
            ),
            52 => 
            array (
                'id' => 53,
                'titulo_assunto' => 'Análise SWOT',
                'raiz_id' => 1,
                'created_at' => '2020-06-28 22:19:06',
                'updated_at' => '2020-06-28 22:19:06',
                'deleted_at' => NULL,
            ),
            53 => 
            array (
                'id' => 54,
                'titulo_assunto' => 'Matriz GUT',
                'raiz_id' => 1,
                'created_at' => '2020-06-28 22:19:13',
                'updated_at' => '2020-06-28 22:19:13',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}