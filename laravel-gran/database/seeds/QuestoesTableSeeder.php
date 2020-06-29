<?php
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use Illuminate\Support\Facades\DB;
use App\Models\Assuntos;
use App\Models\Bancas;
use App\Models\Orgaos;

class QuestoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fakeQuestionCommand = [
            'Um gestor de uma unidade de assessoria tem autoridade sobre seus subordinados diretos, mas não tem ação de comando sobre outras unidades.',
            'Em um fluxograma organizacional, cada retângulo indica uma unidade organizacional.',
            'É correto afirmar que uma empresa que utilize uma estrutura híbrida, compartilhando a departamentalização funcional e por produto, está adotando a departamentalização por processos.',

            'Um dos conceitos do paradigma orientado a objetos consiste na alteração do funcionamento interno de um método herdado de um objeto pai. Assinale a alternativa correta que apresenta este conceito.',
            'No âmbito do Guia PMBOK 5ª edição ocorre, algumas vezes, uma certa confusão entre o que é grupo de processos, o que é processo e o que é área de conhecimento. Assim, um Programador de Sistemas, que conhecia bem o assunto, deu o seguinte exemplo correto de cada um deles, explicando que, no grupo de processos de',
            'Considerando as boas práticas para a modelagem da análise de requisitos, assinale a alternativa correta.',
            'Considerando as técnicas de Negociação de requisitos, assinale a alternativa INCORRETA.
            ',
            'Considerando a fase inicial do Processo de Engenharia de Requisitos, assinale a alternativa correta.
            ',
            'O principal objetivo da revisão técnica é encontrar erros durante o processo, de modo que estes não se tornem defeitos após a liberação do software. Sobre essa prática, assinale a alternativa correta.',

            'A intenção do padrão de projeto Abstract Factory é
            ',
            'Sobre a interface de integração SOAP (Simple Object Access Protocol), assinale a alternativa INCORRETA.
            ',
            'Com base no modelo SOLID utilizado como referência para padrões de projeto e princípios arquiteturais, um dos seus princípios denominados de LSP (Liskov substitution principle) diz respeito ao fato de que',
            'Com base no Modelo de Maturidade Proposto por Leonard Richardson para utilização de REST, assinale a alternativa que se refere aos seus níveis de maturidade e estruturas abordadas.',
            'Em relação aos padrões de projeto de software e princípios arquiteturais, em programação orientada a objetos, existe um princípio denominado de SOLID. Ele, por sua vez, é composto por 05 princípios de acordo com as suas iniciais, sendo eles:',
            'Em bancos de dados SQL, um recurso é utilizado como um tipo especial de procedimento armazenado, que é executado sempre que há uma tentativa de modificar os dados de uma tabela que é protegida por ele, antes ou depois das operações de INSERT, UPDATE e DELETE de registros. Esse recurso é denominado:',
            'Assinale a alternativa que apresenta uma instrução SQL capaz de apresentar a quantidade de itens (produtos) que tenham o preço (prod_preco) entre 100 e 200 e que façam parte das categorias (cat_cod) de número 1, 3 ou 5.',
            'Em uma consulta SQL, podem existir diversas cláusulas sendo que nem todas exigem utilização obrigatória. Assinale a alternativa que apresenta as cláusulas em sua ORDEM de especificação correta.',
            'A qualidade de serviço (QoS) de comunicação pode ser estabelecida por meio de protocolos de diferentes camadas dos modelos de referência OSI e TCP/IP. Caso se escolha implementar a QoS na camada de Enlace de Dados da Tecnologia Ethernet, o campo a ser utilizado para estabelecer a prioridade é denominado',
            'Os diversos protocolos utilizados para prover os serviços na internet e também realizar o gerenciamento da rede de computadores são mapeados nas camadas hierarquicamente distribuídas no modelo/arquitetura TCP/IP. Um correto relacionamento entre o protocolo e a respectiva camada é:',
            'Considerando os vários tipos e tecnologias de meios de transmissão, um Programador de Sistemas foi designado para implementar uma rede geograficamente distribuída no estado do Maranhão. Considerando que essa rede é do tipo WAN, a correta escolha foi o',
            'Assinale a alternativa que apresenta valor equivalente a Um Gigabyte.
            ',
            'Um supercomputador consiste em centenas ou milhares de processadores e serve para realizar cálculos científicos e de engenharia de alta capacidade, entre outros.',
            'Análise as afirmativas sobre o resultado da seguinte soma na base binária: 111 + 1001'
    ];

        $faker = Faker::create();
        $assuntos = Assuntos::pluck('id')->all();
        $bancas = Bancas::pluck('id')->all();
        $orgaos = Orgaos::pluck('id')->all();

        for ($i = 1; $i < 30000; $i++) {
            DB::table('questoes')->insert([
                'cod_questao' => $faker->randomDigit('QUEST'),
                'enunciado' => $faker->randomElement($fakeQuestionCommand),
                'modalidade' => $faker->randomDigitNotNull,
                'assunto_id' => $faker->randomElement($assuntos),
                'banca_id'     => $faker->randomElement($bancas),
                'orgao_id'  => $faker->randomElement($orgaos),

            ]);
        }
    }
}
