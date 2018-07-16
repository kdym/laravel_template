# Template padrão para projetos Laravel

Template padrão do Laravel utilizando o AdminLTE, com algumas funcionalidades pré-programadas e totalmente customizável.

Versões utilizadas nesse projeto atualmente:

- [Laravel 5.6](https://laravel.com/docs/5.6)
- [AdminLTE 2](https://adminlte.io/themes/AdminLTE/index2.html)

## Índice

- [Instalação](#install)
- [Bibliotecas externas utilizadas](#vendors)
- [Template](#template)
- [Formulários](#forms)

## <a name="install"></a>Instalação

- GIT Clone ou download do ZIP desse projeto
- `composer install`
- `npm install`

## <a name="vendors"></a>Bibliotecas externas utilizadas

- [AdminLTE](https://adminlte.io/themes/AdminLTE/index2.html)
- [Laravel Collective](https://laravelcollective.com/docs/master/html)
- [jQuery Validation](https://jqueryvalidation.org/)

## <a name="template"></a>Template

### Views

Todos as views dos templates foram exportadas pro diretório `/resources/views/vendor/adminlte`. Você pode alterar os templates se quiser.

### Cores

As cores padrão utilizadas nos templates e demais funcionalidades do projeto estão em `/resources/assets/sass/_variables.scss`.

### Menu

O layout do menu principal se encontra em `/resources/views/menus/main_menu.blade.php`. Ele utiliza as variáveis `$controller` e `$action` para identificar o Controller e o Action sendo utilizado na página atual. 

### Área do Usuário

A área do usuário é composta do nome do usuário atualmente logado e um botão para logout. Ao clicar no nome do usuário, será redirecionado para a página de Perfil. O arquivo se encontra em `/resources/views/user_area/user_area.blade.php`.

## <a name="forms"></a>Formulários

Os formulários já vêm pré-programados com um template padrão do [Twitter Bootstrap 3](https://getbootstrap.com/docs/3.3/). O template padrão de cada componente se encontra em `/resources/views/components/form`. Para alterar a chamada dos métodos e as variáveis utilizadas, altere as funções dentro de `/app/Providers/AppServiceProvider.php`.

### restModel

```php
{{ Form::restModel($model, 'form-id', 'route-name', 'model-name', $attributes) }}
```

- `$model` - Model a ser usado
- `form-id` - ID HTML do formulário (usado pro JQuery Validation)
- **Opcional** `route-name` - nome da rota a ser utilizada
- **Opcional** `model-name` - nome do Model a ser utilizado
- **Opcional** `$attributes` - array com atributos a serem utilizados no form

Cria um formulário baseado no padrão REST.

O array `$attributes` é o mesmo utilizado na função `Form::model` ou `Form::open` do [Laravel Collective](https://laravelcollective.com/docs/master/html). 

#### Exemplo de Insert com o Model User

```php
$user = new User;

{{ Form::restModel($user, 'user-form') }}
```

A função abre uma tag Form com o método **POST**, um campo hidden para o token CSRF e um campo hidden com o nome ID vazio.

A URL do form vai procurar por uma Named Route dentro de `/routes/web.php` do tipo `Route::post('/user', 'UsersController@storeUser')->name('users.store');`, por exemplo. O atributo `route-name` altera o `users` dentro do `->name()`.

#### Exemplo de Update com o Model User

```php
$user = User::find($id);

{{ Form::restModel($user, 'user-form') }}
```

A função abre uma tag Form com o método **PUT**, um campo hidden para o token CSRF e um campo hidden com o ID do Model.

A URL do form vai procurar por uma Named Route dentro de `/routes/web.php` do tipo `Route::put('/user/{user}', 'UsersController@updateUser')->name('users.update');`, por exemplo. O atributo `route-name` altera o `users` dentro do `->name()`. O atributo `model-name` altera o `{user}` dentro do `put()`.

### bsText

```php
{{ Form::bsText('name', 'label', $attributes, 'default') }}
```

- `name` - Nome do campo
- `label` - Label do campo
- **Opcional** `$attributes` - array com atributos a serem utilizados no input
- **Opcional** `default` - valor padrão do campo