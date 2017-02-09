<?php
namespace Expert\HomeCategory\Observer;
 
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\Filesystem\DirectoryList;
 
class categorySavebefore implements ObserverInterface
{
    protected $_uploaderFactory;
    protected $_fileSystem;

    /**
     * Upload constructor.
     *
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Catalog\Model\ImageUploader $imageUploader
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\MediaStorage\Model\File\UploaderFactory $uploaderFactory,
        \Magento\Framework\Filesystem $fileSystem
    ) {
        $this->_uploaderFactory = $uploaderFactory;
        $this->_fileSystem = $fileSystem;
    }
 
    /**
     * customer register event handler
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {

        
        #Save Thumbnail
        if(file_exists($_FILES['thumbnail']['tmp_name']) && is_uploaded_file($_FILES['thumbnail']['tmp_name']))
        {
            try {
                $category = $observer->getCategory(); 

                $mediaDir = $this->_fileSystem
                            ->getDirectoryWrite(DirectoryList::MEDIA);

                $mediaPath = $mediaDir->getAbsolutePath('/');

                $destinationPath = $mediaPath."/catalog/category";

                $uploader = $this->_uploaderFactory->create(['fileId' => "thumbnail"])
                    ->setAllowCreateFolders(true)
                    ->setAllowRenameFiles(true)
                    ->setAllowedExtensions(['jpg','png','jpeg'])
                    ->addValidateCallback('validate', $this, 'validateFile');
                if (! $result = $uploader->save($destinationPath)) {
                    throw new LocalizedException(
                        __('File cannot be saved to path: $1', $destinationPath)
                    );
                }
                else
                {
                    $category->setThumbnail($result['file']);
                    $category->save();
                }

                
            } catch (\Exception $e) {
                $this->messageManager->addError(
                    __($e->getMessage())
                );
            }
        }


          
        
        #echo $category->getId();
        // echo "<pre>";
        // print_r($_REQUEST);
        // die("asdas");
    }
}