<?php
namespace ruwmapps\yii2_uikit3;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

class Nav extends Widget
{

    public $items = []; // label, url, linkOptions

    public $containerTag = 'div';
    public $containerOptions = [];

    public $encodeLabels = false;

    public $activateItems = true;

    public $route;

    public $params;

    public $accordion = false;

     public $navbar = false;

     public $ukNavAttr;



    public $navClass = 'uk-navbar-nav uk-visible@m'; // класс блока с меню

    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();
        if ($this->route === null && Yii::$app->controller !== null) {
            $this->route = Yii::$app->controller->getRoute();
        }
        if ($this->params === null) {
            $this->params = $_GET;
        }
        Html::addCssClass($this->options, $this->navbar ? 'uk-navbar-nav' : $this->navClass);
        //Html::addCssClass($this->options,  $this->navClass);

        if ($this->accordion) {
            $this->options['uk-nav'] = $this->ukNavAttr;
        }
    }
    /**
     * Renders the widget.
     */
    public function run()
    {
        $it=$this->items;

        if ($this->accordion) {
           // $pItems = ArrayHelper::getColumn($it, 'arrChilds');
           // print_r($pItems);

/*            if(count($pItems)) {

                foreach ($pItems as $i => $item) {
                    $test = $this->registerAsset($item);
                }
                echo $this->renderItems($it,$test);

            }*/
        }else{
            echo $this->renderItems($it);
        }
    }
    /**
     * Renders widget items.
     */
    public function renderItems($it)
    {
        $items = [];

        foreach ($it as $i => $item) {
            $pItems = [];
            if (ArrayHelper::keyExists('arrChilds', $item, false)){
                $pItems = ArrayHelper::getValue($item, 'arrChilds');
            }

            if(count($pItems)) {

              /*  foreach ($pItems as $i => $item) {
                    $test = $this->registerAsset($item);
                }*/
                $items[] = $this->renderItem($item,$pItems);

            }else{
                $items[] = $this->renderItem($item,0);
            }

/*            if (isset($item['visible']) && !$item['visible']) {
                unset($items[$i]);
                continue;
            }*/

        }

        if (count($this->containerOptions)) {
            return Html::tag($this->containerTag,Html::tag('ul', implode("\n", $items), $this->options),$this->containerOptions);
        }
        else {
            return Html::tag('ul', implode("\n", $items), $this->options);
        }
        
    }
    /**
     * Renders a widget's item.
     * @param string|array $item the item to render.
     * @return string the rendering result.
     * @throws InvalidConfigException
     */
    public function renderItem($item,$test)
    {
        if (is_string($item)) {
            return $item;
        }
        if (!isset($item['label'])) {
            throw new InvalidConfigException("The 'label' option is required.");
        }
        $label = $this->encodeLabels ? Html::encode($item['label']) : $item['label'];
        $options = ArrayHelper::getValue($item, 'options', []);
        $items = ArrayHelper::getValue($item, 'items');        //gh
        $items=is_array($items)?count($items):null;
        $url = Url::to(ArrayHelper::getValue($item, 'url', false));
        $linkOptions = ArrayHelper::getValue($item, 'linkOptions', []);
        if (isset($item['active'])) {
            $active = ArrayHelper::remove($item, 'active', false);
        } else {
            $active = $this->isItemActive($item);
        }
        if ($active) {
            Html::addCssClass($options, 'uk-active');
        }
        if ($items !== null && is_array($items) && count($items)) {
            Html::addCssClass($options, 'uk-parent');

            if ($this->navbar) {
                $options['data-uk-dropdown'] = "{pos:'bottom'}";
                $items = self::widget(['items' => $items,'containerOptions'=>['class'=>'uk-navbar-dropdown'], 'options' => ['class' => 'uk-nav uk-navbar-dropdown-nav']]);
            }
            else {
                $items = self::widget(['items' => $items, 'options' => ['class' => 'uk-nav-sub']]);
            }            
        }
        $link = $label;
        if ($url) {
            $link = Html::a($label, $url, $linkOptions);
        }
        if(is_array($test)){
            return Html::tag('li', $link . $this->registerAsset($test) . $items, $options);
        }else{
            return Html::tag('li', $link . $items, $options);
        }

    }
    /**
     * Checks whether a menu item is active.
     * This is done by checking if [[route]] and [[params]] match that specified in the `url` option of the menu item.
     * When the `url` option of a menu item is specified in terms of an array, its first element is treated
     * as the route for the item and the rest of the elements are the associated parameters.
     * Only when its route and parameters match [[route]] and [[params]], respectively, will a menu item
     * be considered active.
     * @param array $item the menu item to be checked
     * @return boolean whether the menu item is active
     */
    protected function isItemActive($item)
    {
        if (isset($item['url']) && is_array($item['url']) && isset($item['url'][0])) {
            $route = $item['url'][0];
            if ($route[0] !== '/' && Yii::$app->controller) {
                $route = Yii::$app->controller->module->getUniqueId() . '/' . $route;
            }
            if (ltrim($route, '/') !== $this->route) {
                return false;
            }
            unset($item['url']['#']);
            if (count($item['url']) > 1) {
                $params = $item['url'];
                unset($params[0]);
                foreach ($params as $name => $value) {
                    if ($value !== null && (!isset($this->params[$name]) || $this->params[$name] != $value)) {
                        return false;
                    }
                }
            }
            return true;
        }
        return false;
    }
    public function registerAsset($pItems)
    {
        $items2 = [];
        if (count($pItems)) {

        foreach ($pItems as $i => $item) {
            if (isset($item['visible']) && !$item['visible']) {
                unset($items[$i]);
                continue;
            }
            $items2[] = $this->renderItems($item);
        }


            return Html::tag('div', implode("\n", $items2), ['uk-dropdown'=>'']);

        }
    }

}