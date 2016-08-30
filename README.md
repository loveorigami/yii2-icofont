# Yii 2 [IcoFont](http://icofont.com) Asset Bundle
[![Latest Stable Version](https://poser.pugx.org/loveorigami/yii2-icofont/v/stable)](https://packagist.org/packages/loveorigami/yii2-icofont)
[![Total Downloads](https://poser.pugx.org/loveorigami/yii2-icofont/downloads)](https://packagist.org/packages/loveorigami/yii2-icofont)
[![License](https://poser.pugx.org/loveorigami/yii2-icofont/license)](https://packagist.org/packages/loveorigami/yii2-icofont)

This extension provides a assets bundle with IcoFont for Yii framework 2.0 applications and helper to use icons.

## Installation

The preferred way to install this extension is through [composer](https://getcomposer.org/).

Either run

```bash
composer require "lo/yii2-icofont:*"
```

or add

```
"lo/yii2-icofont": "*",
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

## IcoHelper (IH) examples

```php
use lo\icofont\IH;

// normal use
echo IH::icon('home'); // <i class="icofont icofont-home"></i>

// shortcut
echo IH::i('home'); // <i class="icofont icofont-home"></i>

// icon with additional attributes
echo IH::icon(
    'arrow-left', 
    ['class' => 'big', 'data-role' => 'arrow']
); // <i class="big icofont icofont-arrow-left" data-role="arrow"></i>

// icon in button
echo Html::submitButton(
    Yii::t('app', '{icon} Save', ['icon' => IH::icon('check')])
); // <button type="submit"><i class="icofont icofont-check"></i> Save</button>

// icon with additional methods
echo IH::icon('arrow-right')->pullLeft();   // <i class="icofont icofont-arrow-right pull-left"></i>
echo IH::icon('arrow-right')->pullRight();  // <i class="icofont icofont-arrow-right pull-right"></i>

// autocomplete icons name in IDE
echo IH::icon(IH::_MAGIC);
echo IH::icon(IH::_ARROW_RIGHT);
```

## License

**loveorigami/yii2-icofont** is released under the MIT License. See the bundled `LICENSE.md` for details.