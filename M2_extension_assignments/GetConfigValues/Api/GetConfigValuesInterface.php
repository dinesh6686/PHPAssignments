<?php
namespace Celigo\GetConfigValues\Api;

/**
 * Interface GetConfigValuesInterface
 * @api
 */
interface GetConfigValuesInterface
{
    
    const SCOPE_TYPE_DEFAULT = 'default';
     /**
     * Returns config value for the given path and scope.
     *
     * @param string $pathSection
     * @param string $pathGroup
     * @param string $pathField
     * @param string $scope The scope to use to determine config value, e.g., 'store' or 'default'
     * @return string config value
     * @throws /Magento/Framework/Exception/NoSuchEntityException
     */
     public function getConfigValue($pathSection, $pathGroup, $pathField, $scope = GetConfigValuesInterface::SCOPE_TYPE_DEFAULT);
 }