<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Celigo\Magento2NetSuiteConnector\Api;

/**
 * Interface CeligoCustomerRepositoryInterface
 * @api
 */
interface CeligoCustomerRepositoryInterface
{
    /**
     * Return the gift message for a specified customer.
     *
     * @param int $customerId The customer ID.
     * @return \Celigo\Magento2NetSuiteConnector\Api\Data\CeligoCustomerInterface Celigo Customer.
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function get($customerId);

    /**
     * @api
     *
     * @param Celigo\Magento2NetSuiteConnector\Api\Data\CeligoCustomerInterface $celigoCustomer
     * @return Celigo\Magento2NetSuiteConnector\Api\Data\CeligoCustomerInterface
     */
    public function update($celigoCustomer);
}
