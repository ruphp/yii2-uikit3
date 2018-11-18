<?php

namespace ruwmapps\yii2_uikit3;

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
 * @author Aleksandr Smirnov <dev@ruwmapps.ru>
 * @since 2.0
 */
class NavBar extends Widget
{

    public $brandLabel = false;//содержимое логотипа
    public $brandUrl = false;// ссылка логотипа
    public $classLinkLogo = 'uk-navbar-item uk-logo';// класс ссылки логотипа
    public $offcanvas;// вкл или нет offcanvas
    public $offcanvasTextMenu;// текст возле иконки меню
    public $classOffcanvasLink = 'uk-navbar-toggle uk-navbar-right uk-hidden@m';// класс сылки на офканвас
    public $classNavBar = 'uk-navbar-center';// класс меню определяющий расположение в блоке
    public $idOffcanvas = 'offcanvas';// ид блока offcanvas который надо раскрывать


    public function init()
    {
        parent::init();
        $this->clientOptions = false;

        Html::addCssClass($this->options, 'uk-navbar-container');
        $this->options['uk-navbar'] = '';
        echo Html::beginTag('nav', $this->options);

        if ($this->brandLabel !== false) {

            echo Html::a($this->brandLabel, $this->brandUrl === false ? Yii::$app->homeUrl : $this->brandUrl, ['class'=>$this->classLinkLogo]);
        }
        echo Html::beginTag('div', ['class' => $this->classNavBar]);

    }

    public function run()
    {
        echo Html::endTag('div');
        if (!empty($this->offcanvas)) {

            echo Html::beginTag('a', ['class' => $this->classOffcanvasLink, 'href' => '#', 'uk-toggle' => 'target:#'.$this->idOffcanvas]);
            if (!empty($this->offcanvasTextMenu)) {
                echo Html::tag('span', $this->offcanvasTextMenu, ['class' => 'uk-margin-small-right']);
            }
            echo Html::tag('span', '', ['uk-navbar-toggle-icon' => '']);

            echo Html::endTag('a');
        }
        echo Html::endTag('nav');
    }
}