<?php
namespace Deegitalbe\PipedriveClient\Tests;

use Deegitalbe\PipedriveClient\Package;
use Henrotaym\LaravelPackageVersioning\Testing\VersionablePackageTestCase;
use Deegitalbe\PipedriveClient\Providers\PipedriveClientServiceProvider;

class TestCase extends VersionablePackageTestCase
{
    public static function getPackageClass(): string
    {
        return Package::class;
    }
    
    public function getServiceProviders(): array
    {
        return [
            PipedriveClientServiceProvider::class
        ];
    }
}