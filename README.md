<p align="center">
	<a href="#"  target="_blank" title="Sistema de gestão de freezers">
		<img src="/public/images/brands/logo-v-1024.png" alt="Sistema de gestão de freezers" width="440px">
	</a>
</p>

<br>

<p align="center">:rocket: Revolucionando a forma como você compra bebidas :sparkles: <a href="https://github.com/icarojobs/freezer-control">Freezer Control</a></p>

<p align="center">
	<img src="https://img.shields.io/badge/version project-1.0-brightgreen" alt="version project">
    <img src="https://img.shields.io/badge/Php-8.2-informational" alt="stack php">
    <img src="https://img.shields.io/badge/Laravel-10.46-informational&color=brightgreen" alt="stack laravel">
    <img src="https://img.shields.io/badge/Filament-3.2-informational" alt="stack Filament">
    <img src="https://img.shields.io/badge/TailwindCss-3.1-informational" alt="stack Tailwind">
	<a href="https://opensource.org/licenses/GPL-3.0">
		<img src="https://img.shields.io/badge/license-MIT-blue.svg" alt="GPLv3 License">
	</a>
</p>

<h4 align="center"> 
	🚧  Projeto 🚀 de teste e aprendizado  🚧
</h4>

<br>

##### REPOSITORIO DE TESTE
- User APP está acessando area ADMIN, ajustar, pois não pode.
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
- Criado um `Customer Observer` para observar todos eventos de `created` | `php artisan make:observer CustomerObserver --model=Customer`. [REFERÊNCIA *1]
- Ajustado o metodo created do observer do Customer para criar user e `enviar E-Mail ao cliente`.
- Adicionado a model Customer ao `array observers` em `app/Providers/EventServiceProvider.php`.
- Ciado uma `classe de Mail` Mailable com implemantação para trabalhar em `fila`.
- `Ajustado os metodos` construct, envelope e content, dados de envio.
- Criado a `view do E-mail`.
- Ajustado os dados de e-mail do `.ENV`.
- Customização da pagina de registrar user [REFERÊNCIA *2]
        - path: App\Filament\Pages\Auth
        - Sobreescrita `Override` do metodo `register`.
- Criação de logotipo e atualização de logo nas views login e register.
- Criação da view home `/` redirecionando para admin/login.
- Instalação da Lib SimpleSoftwareIO `composer require simplesoftwareio/simple-qrcode "~4"` [REFERÊNCIA *5]
- Criação do controller qrcode e rota para a view criada qrcode.
- Criação da model Product e ProductTransaction e magrations.
- criação da factorie de product.
- criação do Enum dos tipos de transações.
- Ajustando campos de form e table das resources de Product e ProductTransaction
- add storage link `php artisan storage:link`
- Criação da relação entre Product e ProductTransaction `HasMany/BelongsTo`
- Ajusta da Enum ProducTransactionTypeEnum com getLabels() para campo de option da movimentação.
- Criação da Hook do Filament para ajustar as movimentações e estoque do produto. [REFERÊNCIA *3]
- add metodos de atualização de movimentações e estoque de produtos na pasta em `app\Filament\Resources\ProductTransactionResource\Pages\CreateProductTransaction`
- add type font em AdminPanel
- Add class format money PtbrMoney -> app/Filament/Forms/Components/PtbrMoney e add in resources form e table. (PR de user do projeto)
- Adicionando processo de pedido dos clientes e pagamento:
    - Create model Order, migrate with `customer_id, items, total, status`
    - Create Enum status order.
    - Create resource Filament `php artisan make:filament-resource Order --generate`
    - Add component filament `repeater` [REFERÊNCIA *4]
    - Add component filament `wizard` [REFERÊNCIA *6]
- Adicionando Profile user [REFERÊNCIA *8-9-10]
    - `php artisan make:filament-page Auth/EditProfile`
    -
- Customize the navbar [REFERÊNCIA *7]
- Add integração com feature de pagemento ASAAS
    - Criação de conta no ASAAS API [REFERÊNCIA *11 - 13]
    - Criação da conta de teste SENDBOX API [REFERÊNCIA *12]
    - Criação da classe de config [config\asaas.php]
    - criação do diretório SERVICES [app\Services] e arquivos de integração

    - 

##### REFERÊNCIAS

### Features

- [x] Cadastro de usuário
- [x] Cadastro de cliente
- [ ] Cadastro de produtos

- [*1](https://laravel.com/docs/10.x/eloquent#observers)
- [*2](https://filamentphp.com/docs/3.x/panels/users#customizing-the-authentication-features)
- [*3](https://filamentphp.com/docs/3.x/panels/resources/creating-records#customizing-data-before-saving)
- [*4](https://filamentphp.com/docs/3.x/forms/fields/repeater)
- [*5](https://harrk.dev/qr-code-generator-in-laravel-10-tutorial/)
- [*6](https://filamentphp.com/docs/3.x/forms/layout/wizard)
- [*7](https://www.youtube.com/watch?v=mEfkoeEirrM)
- [*8](https://filamentphp.com/docs/3.x/panels/pages)
- [*9](https://filamentphp.com/docs/3.x/panels/users#customizing-the-authentication-features)
- [*10](https://www.youtube.com/watch?v=heu_ZLx7Q34&list=PL9zLINrtn0_pNgp-PjrvQXi7fctF-idNC&index=18&t=2s&pp=gAQBiAQB)
- [*11 Conta ASAAS - producão](https://www.asaas.com/)
- [*12 Conta ASAAS - sendbox](https://sandbox.asaas.com/)
- [*13 Documentação ASAAS](https://docs.asaas.com/reference/comece-por-aqui)
- []()
- []()
- []()
- []()
- []()
- [widget botões nos paineis emcima da listagem, como nos artigos app corporatix](https://filamentphp.com/docs/3.x/panels/resources/widgets#creating-a-resource-widget)


### CONSTRIBUIÇÕES

