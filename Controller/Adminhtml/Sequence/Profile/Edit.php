<?php
/**
 * Copyright © Jyotiranjan Behera
 * See COPYING.txt for license details.
 */
namespace Helloworld\SalesSequence\Controller\Adminhtml\Sequence\Profile;

use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Exception\LocalizedException;
use Helloworld\SalesSequence\Controller\Adminhtml\Sequence\Profile as Action;

/**
 * Profile edit controller
 */
class Edit extends Action
{
    /**
     * Init active menu and set breadcrumb
     *
     * @return $this
     */
    protected function initAction()
    {
        $this->_view->loadLayout();
        $this->_view->getPage()->getConfig()->getTitle()->prepend(
            __('Sequence Profiles')
        );

        $this->_setActiveMenu(
            'Helloworld_Sequence::profile'
        )->_addBreadcrumb(
            __('Sequence Profiles'),
            __('Sequence Profiles')
        );
        return $this;
    }

    /**
     * Editing existing profile form
     *
     * @return ResponseInterface
     */
    public function execute()
    {
        try {
            $profile = $this->initProfile();
        } catch (LocalizedException $e) {
            $this->messageManager->addError(
                $e->getMessage()
            );
            return $this->_redirect('*/*/*');
        } catch (\Exception $e) {
            $this->logger->critical($e);
            return $this->_redirect('*/*/');
        }

        // set entered data if was error when we do save
        $data = $this->_session->getProfileData(true);
        if (!empty($data)) {
            $profile->addData($data);
        }

        $this->initAction();

        $this->_view->getPage()->getConfig()->getTitle()->prepend(
            __('Edit Profile')
        );

        $this->_addBreadcrumb(
            __('Edit Profile'),
            __('Edit Profile')
        );

        $this->_view->renderLayout();
    }
}
