<?php
namespace Celigo\GetConfigValues\Model;

use \Celigo\GetConfigValues\Logger\Logger;

class GetConfigValues implements \Celigo\GetConfigValues\Api\GetConfigValuesInterface
{

    private $logger;
    
    protected $_scopeConfig;

    public function __construct(
        Logger $logger,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->logger = $logger;
        $this->_scopeConfig = $scopeConfig;
    }
    
    /**
     * {@inheritDoc}
     */
    public function getConfigValue(
        $path = null,
        $scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT
    ) {  
        if($scope==="stores"){
            $configScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORES;
        }
        elseif($scope==="websites"){
            $configScope = \Magento\Store\Model\ScopeInterface::SCOPE_WEBSITES;
        }
        elseif($scope==="store"){
            $configScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        }
        elseif($scope==="group"){
            $configScope = \Magento\Store\Model\ScopeInterface::SCOPE_GROUP;
        }
        elseif($scope==="website"){
            $configScope = \Magento\Store\Model\ScopeInterface::SCOPE_WEBSITE;
        }
        $configPath  = $scope;
        if ($path) {
            $configPath .= '/' . $path;
        }
        return $this->_scopeConfig->getValue($configPath, $configScope);
    }
}