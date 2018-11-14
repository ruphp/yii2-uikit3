# yii2-uikit3 Расширение для Yii2
Виджет и стили от фреймворка [UiKit3](http://getuikit.com/) 

Демо и подробные инструкции смотрите на сайте [Yii2.Wmapps.ru](https://yii2.wmapps.ru/uikit)

Установка 
------------------------------------

Установка через [composer](http://getcomposer.org/download/). Выполнить команду

```
php composer.phar require --prefer-dist ruphp/yii2_uikit3
```
или

```
composer require "ruphp/yii2_uikit3:*"
```
Подключение основных файлов css и js фреймворка UiKit3
-------------

```php
\ruphp\yii2_uikit3\UikitAsset::register($this);
```

Примеры использования Slideshow:
----------

Подключение файла Slideshow.php

```php
<? use ruphp\yii2_uikit3\widgets\Slideshow; ?>
```
Пример Uikit3 Slideshow без оверлея 2мя способами:
 * указания полного пути к папке с картинками
```php
<?= Slideshow::widget(['path' => '/img/slideshow/','ukSlideshow' => 'animation:fade; autoplay:true; autoplay-interval: 3000','downLi' => 1]); ?>
```
 * или указания конкретных изображений
```php
<?= Slideshow::widget(['images' => ['/img/slideshow/dark.jpg','/img/slideshow/light.jpg'],'ukSlideshow' => 'animation:fade; autoplay:true; autoplay-interval: 3000','downLi' => 1]); ?>
```
Пример Uikit3 Slideshow с оверлеем:

```php
<?= Slideshow::widget(['items' => [
                    ['img'=>'/img/slideshow/dark.jpg','overlay'=>'<h3 class="uk-margin-remove">Заголовок</h3><p class="uk-margin-remove">Текст к первой картинке.</p>','classOver'=>'uk-position-bottom uk-position-medium uk-text-center uk-light'],
                    ['img'=>'/img/slideshow/light.jpg','overlay'=>'<h3 class="uk-margin-remove">Заголовок</h3><p class="uk-margin-remove">Текст ко второй картинке.</p>','classOver'=>'uk-overlay uk-overlay-primary uk-position-bottom uk-text-center'],
                ]
                ]); ?>
```