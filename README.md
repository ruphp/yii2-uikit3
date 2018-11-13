# yii2-uikit3 Расширение для Yii2
Виджет и стили от фреймворка [UiKit3](http://getuikit.com/) 

Демо и подробные инструкции смотрите на сайте [Yii2.Wmapps.ru](https://yii2.wmapps.ru/)

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

Примеры использования:
-------------

Подключение основных файлов css & js фреймворка UiKit3

```php
\ruphp\yii2_uikit3\UikitAsset::register($this);
```
Пример Uikit3 Slideshow без оверлея:
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
<?= \ruphp\uikit\widgets\Slideshow::widget(['items' => [
		['img'=>'/img/slideshow/dark.jpg','overlay'=>'Какойто текст к первой картинке <a href="#">кнопка</a> e.g.'],
		['img'=>'/img/slideshow/light.jpg','overlay'=>'Какойто текст ко второй картинке <a href="#">кнопка</a> e.g.'],
	]
]); ?>
```