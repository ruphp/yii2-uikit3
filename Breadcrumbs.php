<?php
namespace wm-apps\yii2_uikit3;

use Yii;
use yii\helpers\Html;

/**
 * Class Breadcrumbs
 * @package frontend\widgets
 * @see http://schema.org/BreadcrumbList
 */
class Breadcrumbs extends \yii\widgets\Breadcrumbs
{
    public $options = ['class' => 'uk-breadcrumb', 'itemscope itemtype' => "http://schema.org/BreadcrumbList"];
    public $encodeLabels = false;

    protected $itemPosition = 0;

    /**
     * @return mixed
     */
    public function run()
    {
        $this->itemPosition = 0;
        return parent::run();
    }

    /**
     * @param array $link
     * @param string $template
     * @return string
     */
    protected function renderItem($link, $template)
    {
        $this->itemPosition++;

        if (!array_key_exists('label', $link)) {
            throw new InvalidConfigException('The "label" element is required for each link.');
        }
        $link['itemprop'] = 'item';
        $link['label'] = Html::tag('span', $link['label'], ['itemprop' => "name"]);

        if (isset($link['url'])) {
            $link['template'] = "<li itemprop=\"itemListElement\" itemscope itemtype=\"http://schema.org/ListItem\">{link}<meta itemprop=\"position\" content=\"{$this->itemPosition}\" /></li>\n";
        } else {
            $link['template'] = "<li class=\"uk-active\" itemprop=\"itemListElement\" itemscope itemtype=\"http://schema.org/ListItem\">{link}<meta itemprop=\"position\" content=\"{$this->itemPosition}\" /></li>\n";
        }

        return parent::renderItem($link, $template);
    }
}
