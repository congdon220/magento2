<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Expert\HomeCategory\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;


class InstallData implements InstallDataInterface
{
    private $eavSetupFactory; 
    /**
     * Init
     *
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        /**
         * Add attributes to the eav/attribute
         */ 

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            'thumbnail',
            [

              'type' => 'varchar',
              'label' => 'Thumbnail',
              'input' => 'image',
              'backend' => 'Magento\Catalog\Model\Category\Attribute\Backend\Image',
              'sort_order' => 999,
              'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
              'group' => 'General Information',
              'is_used_in_grid' => false,
              'is_visible_in_grid' => false,
              'is_filterable_in_grid' => false,
              'required' => false,
            ]
        );  


        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            'subtitle',
                      [
                        'type' => 'text',
                        'label' => 'Subtitle',
                        'input' => 'text',
                        'required' => false,
                        'sort_order' => 100,
                        'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                        'group' => 'General Information',
                        'is_used_in_grid' => false,
                        'is_visible_in_grid' => false,
                        'is_filterable_in_grid' => false,
            ]
        );

        // $eavSetup->addAttribute(
        //     \Magento\Catalog\Model\Category::ENTITY,
        //     'is_home_visible',
        //     [

        //       'type' => 'int',
        //       'label' => 'Is Home Visible',
        //       'input' => 'select',
        //       'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
        //       'sort_order' => 999,
        //       'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
        //       'group' => 'General Information',
        //       'is_used_in_grid' => false,
        //       'is_visible_in_grid' => false,
        //       'is_filterable_in_grid' => false,
        //       'required' => false,
        //     ]
        // );

        // $eavSetup->addAttribute(
        //     \Magento\Catalog\Model\Category::ENTITY,
        //     'sale_timer',
        //     [

        //       'type' => 'datetime',
        //       'label' => 'Sale Timer',
        //       'input' => 'date',
        //       'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\Datetime',
        //       'required' => false,
        //       'sort_order' => 999,
        //       'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_WEBSITE
        //       'group' => 'General Information',
        //       'is_used_in_grid' => false,
        //       'is_visible_in_grid' => false,
        //       'is_filterable_in_grid' => false,
        //       'required' => false,
        //     ]
        // );


    }
}