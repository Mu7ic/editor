Editor Компонент для Yii 2
===========================

Editor — свободный WYSIWYG-редактор, который может быть использован на веб-страницах.


## Установка

Удобнее всего установить это расширение через [composer](http://getcomposer.org/download/).

Либо запустить

```
php composer.phar require --prefer-dist muzich/first-editor "*"
```

или добавить

```json
"muzich/first-editor": "*"
```

в разделе `require` вашего composer.json файла.

## Использование

добавить в конфиг строку `config/main.php`

```php
'editor' => [
            'class' => 'muzich\first\Editor',
        ],
```

добавить в контроллере `controllers/SiteController.php` строку

```php
return Yii::$app->editor->demo();
```