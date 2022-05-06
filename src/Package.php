<?php
namespace Deegitalbe\PipedriveClient;

use Deegitalbe\PipedriveClient\Contracts\PackageContract;
use Henrotaym\LaravelPackageVersioning\Services\Versioning\VersionablePackage;

class Package extends VersionablePackage implements PackageContract
{
    public static function prefix(): string
    {
        return "pipedrive_client";
    }

    /**
     * Getting api key from config.
     * 
     * @return string
     */
    public function getApiToken(): string
    {
        return $this->getConfig('pipedrive.token');
    }

    /**
     * Getting api url from config.
     * 
     * @return string
     */
    public function getApiUrl(): string
    {
        return $this->getConfig('pipedrive.url');
    }
}