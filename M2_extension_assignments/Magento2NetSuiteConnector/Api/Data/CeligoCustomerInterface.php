<?php
/**
 * Created by PhpStorm.
 * User: Celigo Developer
 * Date: 6/30/2016
 * Time: 1:58 PM
 */
namespace Celigo\Magento2NetSuiteConnector\Api\Data;

use \Magento\Framework\Api\ExtensibleDataInterface;

/**
 * Interface CeligoCustomerInterface
 * @api
 */
interface CeligoCustomerInterface extends ExtensibleDataInterface
{

    /**
     * @param $id string
     * @return void
     */
    public function setCustomerCustomAttribute($id);

    /**
     * Retrieve existing extension attributes object or create a new one.
     *
     * @return \Celigo\Magento2NetSuiteConnector\Api\Data\CeligoCustomerInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     *
     * @param \Celigo\Magento2NetSuiteConnector\Api\Data\CeligoCustomerInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Celigo\Magento2NetSuiteConnector\Api\Data\CeligoCustomerInterface $extensionAttributes
    );
}
