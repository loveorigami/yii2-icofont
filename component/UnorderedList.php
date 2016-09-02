<?php
/**
 * Created by PhpStorm.
 * User: Lukyanov Andrey <loveorigami@mail.ru>
 * Date: 30.08.2016
 * Time: 9:45
 */

namespace lo\icofont\component;

use lo\icofont\FI;
use yii\helpers\Html;

/**
 * Class UnorderedList
 * @package lo\icofont\component
 * @author Lukyanov Andrey <loveorigami@mail.ru>
 */
class UnorderedList
{
    /** @var string */
    public static $defaultTag = 'ul';

    /** @var string */
    private $tag;

    /** @var array */
    private $options = [];

    /** @var array */
    private $items = [];

    /**
     * @param array $options
     */
    public function __construct($options = [])
    {
        Html::addCssClass($options, FI::$cssPrefix . '-ul');
        $this->options = $options;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }

    /**
     * @param string|Icon $icon
     * @param string|null $label
     * @param array $options
     * @return static
     */
    public function item($icon, $label = null, $options = [])
    {
        if (is_string($icon)) {
            $icon = new Icon($icon);
        }
        $content = trim((string)$icon->li() . $label);
        $this->items[] = Html::tag('li', $content, $options);
        return $this;
    }

    /**
     * Change html tag.
     * @param string $tag
     * @return static
     */
    public function tag($tag)
    {
        $this->tag = $tag;
        return $this;
    }

    /**
     * @param string|null $tag
     * @param array $options
     * @return string
     */
    public function render($tag = null, $options = [])
    {
        $tag = empty($tag)
            ? (empty($this->tag) ? static::$defaultTag : $this->tag)
            : $tag;
        $options = array_merge($this->options, $options);
        $items = $this->items;
        return Html::tag($tag, implode($items), $options);
    }
}