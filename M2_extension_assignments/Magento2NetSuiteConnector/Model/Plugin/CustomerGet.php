<?php

namespace Celigo\Magento2NetSuiteConnector\Model\Plugin;

use \Magento\Framework\Exception\NoSuchEntityException;
use \Celigo\Magento2NetSuiteConnector\Logger\Logger;

class CustomerGet
{
    /** @var \Celigo\Magento2NetSuiteConnector\Api\CeligoCustomerRepositoryInterface */
    private $celigoCustomerRepository;
    
    private $logger;

    /**
     * Init plugin
     *
     * @param \Celigo\Magento2NetSuiteConnector\Api\CeligoCustomerRepositoryInterface $celigoCustomerRepository
     */
    public function __construct(
        \Celigo\Magento2NetSuiteConnector\Api\CeligoCustomerRepositoryInterface $celigoCustomerRepository,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository,
        Logger $logger
    ) {
        $this->celigoCustomerRepository = $celigoCustomerRepository;
        $this->customerRepository = $customerRepository;
        $this->logger = $logger;
    }

    /**
     * Get CeligoCustomer
     *
     * @param \Magento\Customer\Api\CustomerRepositoryInterface $subject
     * @param \Magento\Customer\Api\Data\CustomerInterface $resultCustomer
     * @return \Magento\Customer\Api\Data\CustomerInterface
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function afterGet(
        \Magento\Customer\Api\CustomerRepositoryInterface $subject,
        \Magento\Customer\Api\Data\CustomerInterface $resultCustomer)
    {
        $resultCustomer = $this->getCeligoCustomer($resultCustomer);

        return $resultCustomer;

        // /** get current extension attribute from database **/
        // $customerData = "test_attribute";
        // $extensionAttributes = $resultCustomer->getExtensionAttributes();
        // /** set extension attributes by value you have gotten **/
        // //$customerCustomAttribute = $extensionAttributes->getCustomerCustomAttribute();
        // $extensionAttributes->setCustomerCustomAttribute($customerData);
        // $resultCustomer->setExtensionAttributes($extensionAttributes);

        // return $resultCustomer;
    }

    /**
     * Get gift message for customer
     *
     * @param \Magento\Customer\Api\Data\CustomerInterface $customer
     * @return \Magento\Customer\Api\Data\CustomerInterface
     */
    public function getCeligoCustomer(\Magento\Customer\Api\Data\CustomerInterface $customer)
    {
        $extensionAttributes = $customer->getExtensionAttributes();
        if ($extensionAttributes && $extensionAttributes->getCeligoCustomer()) {
            return $customer;
        }
        
        $this->logger->addInfo("Customer id" . $customer->getEntityId());
        $customerAttribute = "test_attribute";

        /** @var \Magento\Customer\Api\Data\CustomerExtension $customerExtension */
        $customerExtension = $extensionAttributes;
        $customerExtension->setCustomerCustomAttribute($customerAttribute);
        $customer->setExtensionAttributes($customerExtension);

        return $customer;
    }

    /**
     * @param \Magento\Customer\Api\CustomerRepositoryInterface $subject
     * @param \Magento\Customer\Model\ResourceModel\Customer\Collection $resultCustomer
     * @return \Magento\Customer\Model\ResourceModel\Customer\Collection
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function afterGetList(
        \Magento\Customer\Api\CustomerRepositoryInterface $subject,
        \Magento\Customer\Model\ResourceModel\Customer\Collection $resultCustomer
    ) {
        /** @var  $customer */
        foreach ($resultCustomer->getItems() as $customer) {
            $this->afterGet($subject, $customer);
        }
        return $resultCustomer;
    }
}