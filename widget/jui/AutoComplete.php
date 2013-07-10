<?php

namespace GeCi\widget\jui;

use \GeCi\component\Html;
use \GeCi\widget\jui\Widget;
use \GeCi\widget\iWidget;

class AutoComplete extends Widget implements iWidget
{
	public $catcomplete=false;
	
	public function run()
	{
		parent::init();
		
		echo Html::textField($this->htmlOptions);
		
		if($this->catcomplete)
		{
			$this->catcompleteActive();
			$this->jQueryScript('catcomplete');
		}
		else
			$this->jQueryScript('autocomplete');
	}
	
	public function catcompleteActive()
	{
Html::registerScriptBottom('$.widget( "custom.catcomplete", $.ui.autocomplete, {
    _renderMenu: function( ul, items ) {
        var self = this,
            currentCategory = "";
        $.each( items, function( index, item ) {
            if ( item.category != currentCategory ) {
                ul.append( "<li class=\'ui-autocomplete-category\'>" + item.category + "</li>" );
                currentCategory = item.category;
            }
            self._renderItem( ul, item );
        });
    }
});'); 
Html::registerStyle('.ui-autocomplete-category {
    font-weight: bold;
    padding: .2em .4em;
    margin: .8em 0 .2em;
    line-height: 1.5;
}');
	}
}