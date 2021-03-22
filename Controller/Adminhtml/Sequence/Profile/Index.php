<?php
/**
 * Copyright © Jyotiranjan Behera
 * See COPYING.txt for license details.
 */
namespace Helloworld\SalesSequence\Controller\Adminhtml\Sequence\Profile;

use Magento\Framework\App\ResponseInterface;
use Helloworld\SalesSequence\Controller\Adminhtml\Sequence\Profile as Action;

/**
 * Profile index controller
 */
class Index extends Action
{
    /**
     * Profile grid page
     *
     * @return ResponseInterface
     */
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_setActiveMenu(
            'Helloworld_Sequence::profile'
        );
        $this->_view->getPage()->getConfig()->getTitle()->prepend(
            __('Sequence Profiles')
        );
        $this->_view->renderLayout();
    }
}
