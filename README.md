
# [ZAPFY] Desafio de nota fiscal

O objetivo desse código é criar uma agenda para verificar a qualidade e arquitetura do código.



## Tecnologia

- [Laravel](https://laravel.com/docs/10.x)
- [Docker](https://docs.asaas.com/docs/cobrancas-via-cartao-de-credito)
- [MySQL](https://dev.mysql.com/doc/refman/8.0/en/)
- [RabbitMQ](https://rabbitmq.com/)
## Instalação
Para executar o projeto execute os seguintes passos:

- Abra o terminal e execute o seguinte comando dentro da pasta do projeto

```bash
  mv .env.example .env
```

Faça as devidas alterações nas chaves de configração de e-mail e deixe as configurações do banco de dados como no exemplo abaixo.

```bash
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=00000000000000
MAIL_PASSWORD=00000000000000
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="hello@example.com"

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=azapfy
DB_USERNAME=azapfy
DB_PASSWORD=123456
```

Após isso, rode os seguintes comandos:

```bash
  php artisan key:generate
  make start
```

## Arquivo makefile

Caso não tenha instalado o pacote makefile, você pode seguir os passos para realizar a instalação.

Se desejar utilizar os comandos docker, pode fazer isso manualmente, basta ler o arquivo makefile.

**Ubuntu**

```bash
sudo apt-get install build-essential
sudo apt-get -y install make
make -v
```

**Mac OSX**
```bash
https://formulae.brew.sh/formula/make
```

**Windows**
```bash
https://earthly.dev/blog/makefiles-on-windows/
```

## Migrations

Você irá precisar rodar as migrations, para isso execute o sguinte comando:

```bash
  make migrate
```
## Health Check

Acesse `http://localhost:8000/api` para ver ser o projeto está rodando

## Débito técnicos

- Teste unitários
- Swaggwer

