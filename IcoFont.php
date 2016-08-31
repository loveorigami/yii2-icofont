<?php
/**
 * Created by PhpStorm.
 * User: Lukyanov Andrey <loveorigami@mail.ru>
 * Date: 30.08.2016
 * Time: 9:45
 */

namespace lo\icofont;

use lo\icofont\component;

/**
 * Class IcoFont
 * @package lo\icofont
 * @author Lukyanov Andrey <loveorigami@mail.ru>
 */
class IcoFont
{
    /** @var string CSS Class prefix */
    public static $cssPrefix = 'icofont';

    /**
     * Creates an `Icon` component that can be used to IcoFont html icon
     *
     * @param string $name
     * @param array $options
     * @return component\Icon
     */
    public static function icon($name, $options = [])
    {
        return new component\Icon($name, $options);
    }

    /**
     * Shortcut for `icon()` method
     * @see icon()
     *
     * @param string $name
     * @param array $options
     * @return component\Icon
     */
    public static function i($name, $options = [])
    {
        return static::icon($name, $options);
    }

    /**
     * Creates an `Stack` component that can be used to IcoFont html icon
     *
     * @param array $options
     * @return component\Stack
     */
    public static function stack($options = [])
    {
        return new component\Stack($options);
    }
    /**
     * Shortcut for `stack()` method
     * @see stack()
     *
     * @param array $options
     * @return component\Stack
     */
    public static function s($options = [])
    {
        return static::stack($options);
    }

    /**
     * Size values
     * @see component\Icon::size
     */
    const SIZE_LARGE = 'lg';
    const SIZE_2X = '2x';
    const SIZE_3X = '3x';
    const SIZE_4X = '4x';
    const SIZE_5X = '5x';

    /**
     * Rotate values
     * @see component\Icon::rotate
     */
    const ROTATE_90 = '90';
    const ROTATE_180 = '180';
    const ROTATE_270 = '270';

    /**
     * Flip values
     * @see component\Icon::flip
     */
    const FLIP_HORIZONTAL = 'horizontal';
    const FLIP_VERTICAL = 'vertical';
}