<?php

namespace ruphp\yii2_uikit3;

class Captcha extends \yii\captcha\Captcha
{
	public $template = '<div class="uk-grid"><div class="uk-width-2-3">{input}</div><div class="uk-width-1-3 uk-text-right">{image}</div></div>';

	public $options = [];
}