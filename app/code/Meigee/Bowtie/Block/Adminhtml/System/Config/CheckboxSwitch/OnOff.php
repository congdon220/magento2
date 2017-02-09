<?php
namespace Meigee\Bowtie\Block\Adminhtml\System\Config\CheckboxSwitch;

class OnOff extends \Meigee\Bowtie\Block\Adminhtml\System\Config\CheckboxSwitch
{
    function getOnLabel()
    {
        return __('On');
    }
    function getOffLabel()
    {
        return __('Off');
    }
}