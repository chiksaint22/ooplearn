<h1 align="center">Мои документы</h1>
<p align="center">
    Приложение для хранения документов;
    Поддерживаемые типы документов: doc, docx, xls, xlsx, pdf;
</p>

Используемые технологии
------------
Приложение разработано на yii2
<p>
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
</p>
   
Требования
------------

Минимальное требование проекта - поддержка сервером PHP 5.6.0.


Установка
------------

Скопируйте проект на свой сервер  используя команду:

~~~
git clone https://github.com/chiksaint22/ooplearn.git
~~~

Конфигурация
-------------

### БД

Отредактируйте файл `config/db.php` согласно примеру:
~~~

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=ooplearn',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
~~~
Миграции 
-------------
Выполните команду:
~~~
yii migrate
~~~
и установите все предложенные миграции:

~~~
m220224_181926_create_document_table
m220308_084311_add_name_column_to_document_table
m220308_084718_add_access_column_to_document_table
m220315_173207_create_user_table
m220323_163226_create_type_access_table
~~~
Приложение готово использованию!
