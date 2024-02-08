
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

#### Database
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

