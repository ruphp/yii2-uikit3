<?php

namespace ruphp\yii2_uikit3;

use Yii;
use yii\helpers\Html;

/**
 * NavBar renders a navbar HTML component.
 *
 * Any content enclosed between the [[begin()]] and [[end()]] calls of NavBar
 * is treated as the content of the navbar. You may use widgets such as [[Nav]]
 * or [[\yii\widgets\Menu]] to build up such content. For example,
 *
 * ```php
 * use yii\yii2_uikit3\NavBar;
 * use yii\yii2_uikit3\Nav;
 *
 * NavBar::begin();
 * echo Nav::widget([
 *     'items' => [
 *         ['label' => 'Home', 'url' => ['/site/index']],
 *         ['label' => 'About', 'url' => ['/site/about']],
 *     ],
 * ]);
 * NavBar::end();
 * ```
 *
 * @see http://www.getuikit.com/docs/navbar.html
 * @author Aleksandr Smirnov <dev@wmapps.ru>
 * @since 2.0
 */
class NavBar extends Widget
{

    public $brandLabel ;//содержимое логотипа
    public $brandUrl ;// ссылка логотипа
    public $brandOptions;//опции ссылки логотипа
    public $offcanvas;// вкл или нет меню для мобилок
    public $offcanvasTextMenu;// текст возле иконки меню


    public function init()
    {
        parent::init();
        $this->clientOptions = false;

        Html::addCssClass($this->options, 'uk-navbar-container');
        $this->options['uk-navbar'] = '';
        echo Html::beginTag('nav', $this->options);
        echo Html::beginTag('div', ['class' => 'uk-navbar-left']);
        if (!empty($this->offcanvas)) {

            echo Html::beginTag('a', ['class' => 'uk-navbar-toggle uk-hidden@m', 'href' => '#', 'uk-toggle' => 'target: #offcanvas']);
            echo Html::tag('span', '', ['uk-navbar-toggle-icon' => '']);
            if (!empty($this->offcanvasTextMenu)) {
                echo Html::tag('span', $this->offcanvasTextMenu, ['class' => 'uk-margin-small-left']);
            }
            echo Html::endTag('a');
        }
        if ($this->brandLabel !== false) {
            Html::addCssClass($this->brandOptions, ['widget' => 'uk-navbar-item uk-logo']);
            echo Html::a($this->brandLabel, $this->brandUrl === false ? Yii::$app->homeUrl : $this->brandUrl, $this->brandOptions);
        }
    }

    public function run()
    {
        echo Html::endTag('div');
        echo Html::endTag('nav');
    }
}