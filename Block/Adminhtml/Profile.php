<?php
/**
 * Copyright © Jyotiranjan Behera
 * See COPYING.txt for license details.
 */
namespace Helloworld\SalesSequence\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;

/**
 * Profile container
 *
 * @api
 */
class Profile extends Container
{
    /**
     * Initialize container
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_profile';
        $this->_headerText = __('Sequence Profiles');

        parent::_construct();
        $this->buttonList->remove('add');
    }
}
