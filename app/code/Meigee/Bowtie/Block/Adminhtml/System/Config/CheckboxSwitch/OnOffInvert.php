<?php
namespace Meigee\Bowtie\Block\Adminhtml\System\Config\CheckboxSwitch;

class OnOffInvert extends \Meigee\Bowtie\Block\Adminhtml\System\Config\CheckboxSwitch
{
    protected $invert = true;
    
    function getOnLabel()
    {
        return __('On');
    }
    function getOffLabel()
    {
        return __('Off');
    }
}