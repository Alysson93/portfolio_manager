# Portfolio Manager

O "MeuPortfolio" é um projeto de gerenciamento de portfólio, onde o usuário poderá criar e editar seu portfólio, bem como visualizar portólios de outros usuários. O projeto ainda está em fase inicial. A ideia aqui é, com o  uso do PHP, aprender e praticar os principais conceitos do desenvolvimento web.

## Instalação

* Este projeto precisa do PHP8.3 e do PostgreSQL. Caso não tenha estas ferramentas, use o gerenciador de pacotes do Linux [apt] para executar a instalação em sua máquina:

```
$ sudo apt install postgresql
$ sudo apt install php-8.3 php-pgsql php-curl
```


## Iniciar o projeto

* Crie o arquivo 'consts.php' nos diretórios 'webapp' e 'api' seguindo os moldes do arquivo de seus arquivos 'consts.example.php' correspondentes.

* Acessando seu usuário postgres, execute os comandos listados no arquivo 'infra/database.sql' para configurar seu banco de dados.

* Enquanto não adicionamos um servidor como Nginx ou Apache, podemos rodar o sistema com o servidor embutido do php:

```
$ php -S <endereco-colocado-no-arquivo-consts.php> -t api/public
$ php -S <endereco-colocado-no-arquivo-consts.php> -t webapp/public
```
