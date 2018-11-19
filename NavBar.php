<?php

namespace ruwmapps\yii2_uikit3;

use Yii;
use yii\helpers\Html;

/**
 * NavBar renders a navbar HTML component.
 * @see http://www.getuikit.com/docs/navbar.html
 * @author Aleksandr Smirnov <dev@wmapps.ru>
 * @since 2.0
 */
class NavBar extends Widget
{

    public $brandLabel = false;//содержимое логотипа
    public $brandUrl = false;// ссылка логотипа
    public $classLinkLogo = 'uk-navbar-item uk-logo';// класс ссылки логотипа
    public $offcanvas = 0;// вкл или нет offcanvas
    public $offcanvasTextMenu = 'menu';// текст возле иконки меню
    public $classOffcanvasLink = 'uk-navbar-toggle uk-navbar-right uk-hidden@m';// класс сылки на офканвас
    public $classNavBar = 'uk-navbar-center  uk-visible@m';// класс меню определяющий расположение в блоке
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
        if ($this->offcanvas!=0) {

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