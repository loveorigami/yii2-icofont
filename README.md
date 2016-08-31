# Yii 2 [IcoFont](http://icofont.com) Asset Bundle
[![Latest Stable Version](https://poser.pugx.org/loveorigami/yii2-icofont/v/stable)](https://packagist.org/packages/loveorigami/yii2-icofont)
[![Total Downloads](https://poser.pugx.org/loveorigami/yii2-icofont/downloads)](https://packagist.org/packages/loveorigami/yii2-icofont)
[![License](https://poser.pugx.org/loveorigami/yii2-icofont/license)](https://packagist.org/packages/loveorigami/yii2-icofont)

This extension provides a assets bundle with [IcoFont](http://icofont.com) for Yii framework 2.0 applications and helper to use icons.

## Installation

The preferred way to install this extension is through [composer](https://getcomposer.org/).

Either run

```bash
composer require "loveorigami/yii2-icofont:*"
```

or add

```
"loveorigami/yii2-icofont": "*",
```

to the `require` section of your `composer.json` file.

## Usage

In view

```php
lo\icofont\IcoFontAsset::register($this);
```

or as dependency in your main application asset bundle

```php
class AppAsset extends AssetBundle
{
	// ...

	public $depends = [
		// ...
		'lo\icofont\IcoFontAsset'
	];
}
```

## FontIcoHelper (FI) examples

```php
use lo\icofont\FI;

// normal use
echo FI::icon('home'); // <i class="icofont icofont-home"></i>

// shortcut
echo FI::i('home'); // <i class="icofont icofont-home"></i>

// icon with additional attributes
echo FI::icon(
    'arrow-left', 
    ['class' => 'big', 'data-role' => 'arrow']
); // <i class="big icofont icofont-arrow-left" data-role="arrow"></i>

// icon in button
echo Html::submitButton(
    Yii::t('app', '{icon} Save', ['icon' => FI::icon('check')])
); // <button type="submit"><i class="icofont icofont-check"></i> Save</button>

// icon with additional methods
echo FA::icon('arrow-right')->inverse();    // <i class="icofont icofont-arrow-right icofont-inverse"></i>
echo FA::icon('spinner')->spin();           // <i class="icofont icofont-spinner icofont-spin"></i>
echo FA::icon('home')->fixedWidth();        // <i class="icofont icofont-home icofont-fw"></i>
echo FA::icon('home')->li();                // <i class="icofont icofont-home icofont-li"></i>
echo FA::icon('home')->border();            // <i class="icofont icofont-home icofont-border"></i>
echo FI::icon('arrow-right')->pullLeft();   // <i class="icofont icofont-arrow-right icofont-pull-left"></i>
echo FI::icon('arrow-right')->pullRight();  // <i class="icofont icofont-arrow-right icofont-pull-right"></i>

// icon size
echo FI::icon('adjust')->size(FI::SIZE_3X);
// values: FI::SIZE_LARGE, FI::SIZE_2X, FI::SIZE_3X, FI::SIZE_4X, FI::SIZE_5X
// <i class="icofont icofont-adjust icofont-size-3x"></i>

// icon rotate
echo FI::icon('adjust')->rotate(FI::ROTATE_90); 
// values: FI::ROTATE_90, FI::ROTATE_180, FI::ROTATE_180
// <i class="icofont icofont-adjust icofont-rotate-90"></i>

// icon flip
echo FI::icon('adjust')->flip(FI::FLIP_VERTICAL); 
// values: FI::FLIP_HORIZONTAL, FI::FLIP_VERTICAL
// <i class="icofont icofont-adjust icofont-flip-vertical"></i>

// icon with multiple methods
echo FI::icon('home')
        ->spin()
        ->fixedWidth()
        ->pullLeft()
        ->size(FI::SIZE_LARGE);
// <i class="icofont icofont-home icofont-spin icofont-fw icofont-pull-left icofont-size-lg"></i>

// icons stack
echo FI::stack()
        ->on('square')
        ->icon('shield');
// <span class="icofont-stack">
//   <i class="icofont icofont-shield icofont-stack-2x"></i>
//   <i class="icofont icofont-square icofont-stack-1x"></i>
// </span>

// icons stack with additional attributes
echo FI::stack(['data-role' => 'stacked-icon'])
     ->on(FI::icon('square')->inverse())
     ->icon(FI::icon('shield')->spin());
// <span class="icofont-stack" data-role="stacked-icon">
//   <i class="icofont icofont-square-o icofont-inverse icofont-stack-2x"></i>
//   <i class="icofont icofont-cog icofont-spin icofont-stack-1x"></i>
// </span>

// autocomplete icons name in IDE
echo FI::icon(FI::_MAGIC);
echo FI::icon(FI::_ARROW_RIGHT);
echo FI::stack()
     ->on(FA::_SQUARE)
     ->icon(FA::_SHIELD);
```

## See also

* [FontAwesome](https://github.com/rmrevin/yii2-fontawesome)

## License

**loveorigami/yii2-icofont** is released under the MIT License. See the bundled `LICENSE.md` for details.