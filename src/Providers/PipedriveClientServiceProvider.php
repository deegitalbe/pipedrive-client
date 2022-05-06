<?php
namespace Deegitalbe\PipedriveClient\Providers;

use Deegitalbe\PipedriveClient\Package;
use Deegitalbe\PipedriveClient\Services\Pipedrive\Contracts\Models\OrganizationContract;
use Deegitalbe\PipedriveClient\Services\Pipedrive\Contracts\OrganizationApiContract;
use Deegitalbe\PipedriveClient\Services\Pipedrive\Credentials\PipedriveCredential;
use Deegitalbe\PipedriveClient\Services\Pipedrive\Models\Organization;
use Deegitalbe\PipedriveClient\Services\Pipedrive\OrganizationApi;
use Henrotaym\LaravelApiClient\Contracts\ClientContract;
use Henrotaym\LaravelPackageVersioning\Providers\Abstracts\VersionablePackageServiceProvider;
use Illuminate\Foundation\Application;

class PipedriveClientServiceProvider extends VersionablePackageServiceProvider
{
    public static function getPackageClass(): string
    {
        return Package::class;
    }

    protected function addToRegister(): void
    {
        $this->app->bind(OrganizationApiContract::class, function(Application $app) {
            $client = $app->make(ClientContract::class, ['credential' => new PipedriveCredential()]);
            return $app->make(OrganizationApi::class, ['client' => $client]);
        });

        $this->app->bind(OrganizationContract::class, Organization::class);
    }

    protected function addToBoot(): void
    {
        //
    }
}