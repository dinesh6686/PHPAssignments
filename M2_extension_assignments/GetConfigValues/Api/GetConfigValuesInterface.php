<?php
namespace Celigo\GetConfigValues\Api;

/**
 * Interface GetConfigValuesInterface
 * @api
 */
interface GetConfigValuesInterface
{
    
   const SCOPE_TYPE_DEFAULT = 'stores';

    /**
    * Retrieve config value by path and scope.
    *
    * @param string $path The path through the tree of configuration values, e.g., 'general/store_information/name'
    * @param string $scopeType The scope to use to determine config value, e.g., 'store' or 'default'
    * @return mixed
    */
    public function getConfigValue($path, $scope = GetConfigValuesInterface::SCOPE_TYPE_DEFAULT);
}
