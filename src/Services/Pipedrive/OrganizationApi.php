<?php
namespace Deegitalbe\PipedriveClient\Services\Pipedrive;

use Deegitalbe\PipedriveClient\Services\Pipedrive\Contracts\Models\OrganizationContract;
use Deegitalbe\PipedriveClient\Services\Pipedrive\Contracts\OrganizationApiContract;
use Henrotaym\LaravelApiClient\Contracts\ClientContract;
use Henrotaym\LaravelApiClient\Contracts\RequestContract;
use stdClass;

class OrganizationApi implements OrganizationApiContract
{
    /**
     * Underlying client.
     * @var ClientContract
     */
    protected $client;

    /**
     * Instanciating dependencies.
     * 
     * @param ClientContract $client
     */
    public function __construct(ClientContract $client)
    {
        $this->client = $client;
    }

    /**
     * Getting organization details
     * 
     * @return OrganizationContract|null
     */
    public function find(int $organizationId): ?OrganizationContract
    {
        $request = $this->newRequest()
            ->setVerb('GET')
            ->setUrl("organizations/$organizationId");

        $response = $this->client->try($request, "Unable to find organization [$organizationId].");

        if ($response->failed()):
            report($response->error());
            return null;
        endif;

        return $this->toOrganization($response->response()->get()->data);
    }

    /**
     * Updating given organization in pipedrive API.
     * 
     * @param OrganizationContract $organization
     * @return OrganizationContract|null Null if any error.
     */
    public function update(OrganizationContract $organization): ?OrganizationContract
    {
        $request = $this->newRequest()
            ->setVerb('PUT')
            ->setUrl("organizations/{$organization->getId()}")
            ->addData([
                'name' => $organization->getName(),
                'label' => $organization->getLabel()
            ]);

        $response = $this->client->try($request, "Unable to update organization [{$organization->getId()}].");

        if ($response->failed()):
            report($response->error());
            return null;
        endif;

        return $this->toOrganization($response->response()->get()->data);
    }

    /**
     * Instanciating a new empty request.
     * 
     * @return RequestContract
     */
    protected function newRequest(): RequestContract
    {
        return app()->make(RequestContract::class);
    }

    /**
     * Instanciating organization based on response.
     * 
     * @param stdClass $attributes
     */
    public function toOrganization(stdClass $attributes): OrganizationContract
    {
        /** @var OrganizationContract */
        $organization = app()->make(OrganizationContract::class);

        return $organization->setAttributes($attributes);
    }
}