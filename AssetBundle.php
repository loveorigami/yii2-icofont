<?php
/**
 * AssetBundle.php
 * @author Lukyanov Andrey
 */
namespace lo\icofont;

/**
 * Class AssetBundle
 * @package lo\icofont
 */
class AssetBundle extends \yii\web\AssetBundle
{
    /**
     * @inherit
     */
    public $css = [
        'css/icofont.css',
    ];
    /**
     * Initializes the bundle.
     * Set publish options to copy only necessary files (in this case css and font folders)
     * @codeCoverageIgnore
     */
    public function init()
    {
        parent::init();
		
        $this->publishOptions['beforeCopy'] = function ($from, $to) {
            return preg_match('%(/|\\\\)(fonts|css)%', $from);
        };
		
		$this->sourcePath = __DIR__."/assets";
    }
}