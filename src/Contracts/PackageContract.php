<?php
namespace Deegitalbe\PipedriveClient\Contracts;

use Henrotaym\LaravelPackageVersioning\Services\Versioning\Contracts\VersionablePackageContract;
use Henrotaym\LaravelContainerAutoRegister\Services\AutoRegister\Contracts\AutoRegistrableContract;

/**
 * Versioning package.
 */
interface PackageContract extends VersionablePackageContract, AutoRegistrableContract
{
    /**
     * Getting api key from config.
     * 
     * @return string
     */
    public function getApiToken(): string;

    /**
     * Getting api url from config.
     * 
     * @return string
     */
    public function getApiUrl(): string;
}