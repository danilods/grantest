<h1 align="center">
<img src="tela-inicial.png" title="granerd"></h1>

<h3 align="center">
  :mortar_board: GranNERD - Programa dinâmico de estudos
</h3>

<p align="center">
  <img alt="GitHub top language" src="https://img.shields.io/github/languages/top/danilods/grantest?color=%FF9000">

  <a href="https://www.linkedin.com/in/danilo-de-sousa-97594b187/">
    <img alt="Made by" src="https://img.shields.io/badge/made%20by-Danilo%20de%20Sousa-orange">
  </a>
  
  <img alt="Repository size" src="https://img.shields.io/github/repo-size/danilods/grantest?color=%235636D3">
  
 
  
  <img alt="GitHub" src="https://img.shields.io/github/license/danilods/grantest?style=flat-squaret?color=%235636D3">
</p>

<p align="center">
  <a href="#-about-the-project">Sobre o projeto</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-technologies">Tecnologias</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-getting-started">Iniciando o projeto</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-how-to-contribute">Como contribuir</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-license">Licença</a>
</p>




## 💰 Sobre o projeto

  GraNerD é uma aplicação desenvolvida para gerar um mapeamento de estudos direcionados a partir da escolha de determinada banca organizadora e o Órgão público. Além do mais, o módulo possui funcionalidades para gerenciar bancas, órgão, assunto, disciplinas e questões, de modo que o usuário possa manter sua uma base de dados com informações sobre certames públicos.

## Disposições:

 - :tent: Home
  -  :pencil:  Programas: área para gerar programa de questões por assunto, mediante a escolha de uma banca e um órgão;
  -  :office: Órgãos: área para o cadastro, edição e exclusão de órgão;
  -  :post_office: Bancas: área para a gestão de bancas;
  -  :blue_book: Assuntos área para o gerenciamento de assuntos/disciplinas;
  -     * Caso o campo de disciplina não seja preenchido, este assunto será raiz;
  -     * Assuntos que não possuem filhos são considerados pais na estrutura hierárquica;
  -  :bulb:  Questões: área para o gerenciamento de questões;
  -      * entidades relacionadas: bancas, orgaos e assuntos;

## 🚀 Tecnologias utilizadas

- [Vuejs](https://br.vuejs.org/)
- [Laravel](https://laravel.com/)
- [Mysql](https://www.mysql.com/)
- [PHP](https://www.php.net/manual/pt_BR/intro-whatis.php)


## 💻 Iniciando


### Requisitos

- [Node.js](https://nodejs.org/en/)
- [Yarn](https://classic.yarnpkg.com/) or [npm](https://www.npmjs.com/)
- [Composer](https://getcomposer.org/)


**Clone o projeto e acesse o diretório /grantest, conforme o comando abaixo **

```bash
$ git clone https://github.com/danilods/grantest.git && cd grantest
```

```bash
# Acesse o diretório para acessar o backend com a API Laravel
$ cd /grantest/laravel-gran

# baixe as dependencias do laravel e do PHP
$ composer.phar install ou composer install

# Acompanhe o download dos pacotes...

# concluída instalação dos pacotes, acesse o arquivo .env e forneça os dados de conexão com o banco de dados (HOST/DATABASE_NAME/USER/PASSWORD)
#

```
### Banco de dados 

## Modelo de dados
![Alt text](modelo-dados.png?raw=true "grantest")


### Você precisará de uma instância do MySql rodando, seja em container ou em ambiente local;

```bash

# Banco de dados iniciado, schema criado conforme informado no arquivo .env, siga para os seguintes passos:

## Rodando as migrations do projeto
$ php artisan migrate

## Populando a base de dados com seeders (Localizados no diretório database/migrations e database/seeds)
$ php artisan db:seed 
ou
$ php artisan db:seed --class=NomeDoArquivoSeeder

## Aguarde alguns segundos até a carga total do banco, pois serão gerados 
## aproximadamente 30 mil registros falsos para simulação.

## para concluir, inicie o servidor
$ php artisan serve

```

### Foram gerados cerca de 30 mil registros para a simulação da aplicação.
## Você poderá aumentar a carga de mocks a partir da edição do arquivo QuestoesTableSeeder.php, localizada no diretório /database/seeds, 
## por meio do laço de repetição responsável por gerar os dados.


### Aplicação

Obs.: Antes de continuar, verifique se a API está incializada.

```bash
# Acesse o diretório da aplicação
$ cd vuegran

# Instale as dependências
$ yarn or npm install

# Rode a aplicação
$ yarn dev ou npm run dev

# acesse em http://localhost:8080
```


## 🤔 Como contribuir?

**Faça um fork para este repositório**

```bash
# Usando o github CLI:
$ gh repo fork danilods/grantest

# Se você não tem GitHub CLI, use o website para isto.
```

**Siga os passos abaixo**

```bash
# Clone seu fork
$ git clone your-fork-url && cd grantest

# Criar branch com sua feature
$ git checkout -b my-feature

# Faça um commit com suas alterações
$ git commit -m 'feat: My new feature'

# Envie seu código para o repo remoto
$ git push origin my-feature
```

Depois que seu pull request for mesclado (merged), você poderá excluir sua branch.

## 📝 Licença

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

Desenvolvido por 💜 Danilo de Sousa 👋 [Veja meu linkedin](https://www.linkedin.com/in/danilo-de-sousa-97594b187/)
