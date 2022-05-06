<?php
namespace Deegitalbe\PipedriveClient\Services\Pipedrive\Credentials;

use Deegitalbe\PipedriveClient\Contracts\PackageContract;
use Henrotaym\LaravelApiClient\Contracts\RequestContract;
use Henrotaym\LaravelApiClient\JsonCredential;

class PipedriveCredential extends JsonCredential
{
    /**
     * Preparing request.
     * 
     * @param RequestContract $request
     * @return void
     */
    public function prepare(RequestContract &$request)
    {
        parent::prepare($request);
        $request->addQuery(['api_token' => $this->getPackageFacade()->getApiToken()])
            ->setBaseUrl($this->getPackageFacade()->getApiUrl());
    }

    /**
     * Getting package facade.
     * 
     * @return PackageContract
     */
    protected function getPackageFacade(): PackageContract
    {
        return $this->facade ?? $this->facade = app()->make(PackageContract::class);
    }
}
