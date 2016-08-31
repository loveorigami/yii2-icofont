<?php
/**
 * Created by PhpStorm.
 * User: Lukyanov Andrey <loveorigami@mail.ru>
 * Date: 31.08.2016
 * Time: 12:25
 */

namespace lo\icofont\component;

use yii\base\InvalidConfigException;
use yii\base\InvalidParamException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Class Stack
 * @package lo\icofont\component
 * @author Lukyanov Andrey <loveorigami@mail.ru>
 */
class Stack
{
    /** @var string */
    public static $defaultTag = 'span';

    /** @var string */
    private $tag;

    /** @var array */
    private $options = [];

    /** @var Icon */
    private $icon_front;

    /** @var Icon */
    private $icon_back;

    /**
     * @param array $options
     */
    public function __construct($options = [])
    {
        Html::addCssClass($options, 'icofont-stack');
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
     * @param array $options
     * @return self
     */
    public function icon($icon, $options = [])
    {
        if (is_string($icon)) {
            $icon = new Icon($icon, $options);
        }
        $this->icon_front = $icon;
        return $this;
    }

    /**
     * @param string|Icon $icon
     * @param array $options
     * @return self
     */
    public function on($icon, $options = [])
    {
        if (is_string($icon)) {
            $icon = new Icon($icon, $options);
        }
        $this->icon_back = $icon;
        return $this;
    }

    /**
     * Change html tag.
     * @param string $tag
     * @return static
     * @throws InvalidParamException
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
     * @throws InvalidConfigException
     */
    public function render($tag = null, $options = [])
    {
        $tag = empty($tag)
            ? (empty($this->tag) ? static::$defaultTag : $this->tag)
            : $tag;
        $options = array_merge($this->options, $options);
        $template = ArrayHelper::remove($options, 'template', '{back}{front}');
        $icon_back = $this->icon_back instanceof Icon
            ? $this->icon_back->addCssClass('icofont-stack-2x')
            : null;
        $icon_front = $this->icon_front instanceof Icon
            ? $this->icon_front->addCssClass('icofont-stack-1x')
            : null;
        return Html::tag(
            $tag,
            str_replace(['{back}', '{front}'], [$icon_back, $icon_front], $template),
            $options
        );
    }
}