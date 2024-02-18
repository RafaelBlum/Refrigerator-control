### VIDEO 03 - 51:20
https://www.youtube.com/watch?v=bCv9hTlipuA&list=PL9zLINrtn0_pNgp-PjrvQXi7fctF-idNC&index=3&t=1201s&ab_channel=TioJobs

### PENDENCIAS 
User APP está acessando area ADMIN, ajustar, pois não pode.



OBSERVER:: https://laravel.com/docs/10.x/eloquent#observers
- Criado CustomerObserver para Customer


refrigerator-controll@menu-digital.online
123Ab10@

SMTP

smtp.hostinger.com

465

SSL

### Desenvolvimento
##### PENDENCIAS
- Add condição na movimentação `sale` caso estoque 0 e user queira vender.
- Verificar format money Filament example.

##### CONCLUÍDAS
- Configurações em `config/app.php`.
- Criado Customer `php artisan make:model Customer -mfs`.
- Ajustes dados do User e Customer e relações `HasOne/BelognsTo`.
- Populado banco com User Admin e Customers e seu Users. `php artisan migrate:refresh --seed`.
- Criado painel ADMINISTRATIVO com Filament `conforme Documentação`.
- Add forma de acesso ao painel no metodo `canAccessPanel` do User model.
- Criado Enum class para definir type acesso aos paineis ADMIN e APP. `app/Enums`.
- Criado os Resources do Filament `conforme Documentação` de User e Customer.
- Inseridos os dados de `form e table` do painel administrativos `admin e app` de users e customers.
- Criado um `Customer Observer` para observar todos eventos de `created` | `php artisan make:observer CustomerObserver --model=Customer`.
- Ajustado o metodo created do observer do Customer para criar user e `enviar E-Mail ao cliente`.
- Adicionado a model Customer ao `array observers` em `app/Providers/EventServiceProvider.php`.
- Ciado uma `classe de Mail` Mailable com implemantação para trabalhar em `fila`.
- `Ajustado os metodos` construct, envelope e content, dados de envio.
- Criado a `view do E-mail`.
- Ajustado os dados de e-mail do `.ENV`.
- Customização da pagina de registrar user [Filament authenticate](https://filamentphp.com/docs/3.x/panels/users#customizing-the-authentication-features)
        - path: App\Filament\Pages\Auth
        - Sobreescrita `Override` do metodo `register`.
- Criação de logotipo e atualização de logo nas views login e register.
- Criação da view home `/` redirecionando para admin/login.
- Instalação da Lib SimpleSoftwareIO `composer require simplesoftwareio/simple-qrcode "~4"` | doc: `https://harrk.dev/qr-code-generator-in-laravel-10-tutorial/`
- Criação do controller qrcode e rota para a view criada qrcode.
- Criação da model Product e ProductTransaction e magrations.
- criação da factorie de product.
- criação do Enum dos tipos de transações.
- Ajustando campos de form e table das resources de Product e ProductTransaction
- add storage link `php artisan storage:link`
- Criação da relação entre Product e ProductTransaction `HasMany/BelongsTo`
- Ajusta da Enum ProducTransactionTypeEnum com getLabels() para campo de option da movimentação.
- Criação da Hook do Filament para ajustar as movimentações e estoque do produto. [link doc](https://filamentphp.com/docs/3.x/panels/resources/creating-records#customizing-data-before-saving)
- add metodos de atualização de movimentações e estoque de produtos na pasta em `app\Filament\Resources\ProductTransactionResource\Pages\CreateProductTransaction`
- add type font em AdminPanel
- Add class format money PtbrMoney -> app/Filament/Forms/Components/PtbrMoney e add in resources form e table. (PR de user do projeto)
- Adicionando processo de pedido dos clientes e pagamento:
    - links: https://filamentphp.com/docs/3.x/forms/fields/repeater, 
    - 
    - 
    - 
