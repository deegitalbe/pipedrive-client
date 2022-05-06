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
}