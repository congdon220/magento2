<?php
namespace Meigee\Bowtie\Model\Config\Source;

class CurrencySwitcher implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
		return [
			  ['value' => 'Meigee_Bowtie::currency_select.phtml', 'label' => __('Select Box'), 'img' => 'Meigee_Bowtie::images/currency_select.png'],
			  ['value' => 'Meigee_Bowtie::currency_list.phtml', 'label' => __('Flags'), 'img' => 'Meigee_Bowtie::images/currency_images.png']
		];
    }
}