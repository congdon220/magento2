<?php
namespace Expert\HomeCategory\Block;

use Magento\Store\Model\ScopeInterface;

class Home extends \Magento\Framework\View\Element\Template
{
    protected $categoryFactory;
    protected $categoryHelper;

    public function __construct(
    \Magento\Framework\View\Element\Template\Context $context,
    \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryFactory,
    \Magento\Catalog\Helper\Category $categoryHelper,
    array $data = []
    ) { 
        $this->categoryFactory = $categoryFactory;
        $this->categoryHelper = $categoryHelper;

        parent::__construct($context);
    }

    /**
     * Retrieve loaded category collection
     *
     * @return AbstractCollection
     */
    public function _getCategoryCollection()
    {

        $collection = $this->categoryFactory->create();
        $collection->addAttributeToSelect("*");
        $collection->addAttributeToFilter("is_home_visible",1);

        return $collection;
    }
    public function _getChildCategories($_category)
    {

        $collection = $this->categoryFactory->create();
        $collection->addAttributeToSelect("*");
        $collection->addIdFilter($_category->getChildren());
        return $collection;
    }




}
