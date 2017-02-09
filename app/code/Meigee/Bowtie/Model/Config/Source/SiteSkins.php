<?php
namespace Meigee\Bowtie\Model\Config\Source;

class SiteSkins implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
		return [
			  ['value' => 'default.css', 'label' => __('Default'), 'img' => 'Meigee_Bowtie::images/language_select.png'],
			  ['value' => 'art.css', 'label' => __('Art'), 'img' => 'Meigee_Bowtie::images/language_select.png'],
			  ['value' => 'car_parts.css', 'label' => __('Car Parts'),  'img' => 'Meigee_Bowtie::images/language_select.png']
		];
    }
}