Yii 2 [IcoFont](http://icofont.com) Asset Bundle
==============================
This extension provides a assets bundle with IcoFont for Yii framework 2.0 applications and helper to use icons.

Installation
------------

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

Usage
-----

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


## License

**loveorigami/yii2-icofont** is released under the MIT License. See the bundled `LICENSE.md` for details.