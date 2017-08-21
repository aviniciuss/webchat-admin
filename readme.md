# admin

### Apresentação

Aplicação desenvolvida para compor um produto de atendimento para websites via chat.

Essa aplicação é responsável por todo o gerênciamento do produto, é onde será cadastrado os domínios onde o chat será
adicionado, cadastro de antendentes, relatórios de atendimento, atendentes online, acompanhar atendimento em tempo real 
e outras funcionalidades futuras como:
    
   - Criação de chatbots para atendimento.
   - Chamadas de voz.
   - Customização do web app.

### Utilizando
* Atenção o Redis deve estar rodando na porta padrão. 

Clonar e configurar váriaveis de ambiente do banco de dados.

```
$ git clone https://github.com/avinisilva/webchat-admin.git
$ cp .env.example .env
$ php artisan key:generate
```

Instalar dependências e fazer a migração do banco de dados

```
$ composer install
$ yarn install
$ php artisam migrate
$ php artisan db:seed
```

Subir o servidor
```
$ php artisan serve
```

#### Login
- User: admin@localhost.com
- Password: secret
