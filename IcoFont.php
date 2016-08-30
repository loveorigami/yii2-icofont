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
     * Creates an `Icon` component that can be used to FontAwesome html icon
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
}