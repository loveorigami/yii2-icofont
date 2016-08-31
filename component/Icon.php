<?php
/**
 * Created by PhpStorm.
 * User: Lukyanov Andrey <loveorigami@mail.ru>
 * Date: 30.08.2016
 * Time: 9:45
 */

namespace lo\icofont\component;

use lo\icofont\FI as FontIco;
use yii\base\InvalidConfigException;
use yii\helpers\Html;

/**
 * Class Icon
 * @package lo\icofont\component
 * @author Lukyanov Andrey <loveorigami@mail.ru>
 */
class Icon
{
    /** @var string */
    public static $defaultTag = 'i';

    /** @var string */
    private $tag;

    /** @var array */
    private $options = [];

    /**
     * @param string $name
     * @param array $options
     */
    public function __construct($name, $options = [])
    {
        Html::addCssClass($options, FontIco::$cssPrefix);
        if (!empty($name)) {
            Html::addCssClass($options, FontIco::$cssPrefix . '-' . $name);
        }
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
     * @return self
     */
    public function inverse()
    {
        return $this->addCssClass(FontIco::$cssPrefix . '-inverse');
    }

    /**
     * @return self
     */
    public function spin()
    {
        return $this->addCssClass(FontIco::$cssPrefix . '-spin');
    }

    /**
     * @return self
     */
    public function fixedWidth()
    {
        return $this->addCssClass(FontIco::$cssPrefix . '-fw');
    }

    /**
     * @return self
     */
    public function ul()
    {
        return $this->addCssClass(FontIco::$cssPrefix . '-ul');
    }

    /**
     * @return self
     */
    public function li()
    {
        return $this->addCssClass(FontIco::$cssPrefix . '-li');
    }

    /**
     * @return self
     */
    public function pullLeft()
    {
        return $this->addCssClass('pull-left');
    }

    /**
     * @return self
     */
    public function pullRight()
    {
        return $this->addCssClass('pull-right');
    }

    /**
     * @param string $value
     * @return self
     * @throws InvalidConfigException
     */
    public function size($value)
    {
        return $this->addCssClass(
            FontIco::$cssPrefix . '-' . $value,
            in_array((string)$value, [
                FontIco::SIZE_LARGE,
                FontIco::SIZE_2X,
                FontIco::SIZE_3X,
                FontIco::SIZE_4X,
                FontIco::SIZE_5X
            ], true),
            sprintf(
                '%s - invalid value. Use one of the constants: %s.',
                'FI::size()',
                'FI::SIZE_LARGE, FI::SIZE_2X, FI::SIZE_3X, FI::SIZE_4X, FI::SIZE_5X'
            )
        );
    }

    /**
     * @param string $value
     * @return self
     * @throws InvalidConfigException
     */
    public function rotate($value)
    {
        return $this->addCssClass(
            FontIco::$cssPrefix . '-rotate-' . $value,
            in_array((string)$value, [
                FontIco::ROTATE_90,
                FontIco::ROTATE_180,
                FontIco::ROTATE_270
            ], true),
            sprintf(
                '%s - invalid value. Use one of the constants: %s.',
                'FI::rotate()',
                'FI::ROTATE_90, FI::ROTATE_180, FI::ROTATE_270'
            )
        );
    }

    /**
     * @param string $value
     * @return self
     * @throws InvalidConfigException
     */
    public function flip($value)
    {
        return $this->addCssClass(
            FontIco::$cssPrefix . '-flip-' . $value,
            in_array((string)$value, [FontIco::FLIP_HORIZONTAL, FontIco::FLIP_VERTICAL], true),
            sprintf(
                '%s - invalid value. Use one of the constants: %s.',
                'FI::flip()',
                'FI::FLIP_HORIZONTAL, FI::FLIP_VERTICAL'
            )
        );
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
     * @param string $class
     * @param bool $condition
     * @param string|bool $throw
     * @return Icon
     * @throws InvalidConfigException
     * @codeCoverageIgnore
     */
    public function addCssClass($class, $condition = true, $throw = false)
    {
        if ($condition === false) {
            if (!empty($throw)) {
                $message = !is_string($throw)
                    ? 'Condition is false'
                    : $throw;
                throw new InvalidConfigException($message);
            }
        } else {
            Html::addCssClass($this->options, $class);
        }
        return $this;
    }

    /**
     * @param string|null $tag
     * @param string|null $content
     * @param array $options
     * @return string
     */
    public function render($tag = null, $content = null, $options = [])
    {
        $tag = empty($tag)
            ? (empty($this->tag) ? static::$defaultTag : $this->tag)
            : $tag;
        $options = array_merge($this->options, $options);
        return Html::tag($tag, $content, $options);
    }
}