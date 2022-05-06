<?php
namespace Deegitalbe\PipedriveClient\Services\Pipedrive\Contracts;

use Deegitalbe\PipedriveClient\Services\Pipedrive\Contracts\Models\OrganizationContract;

interface OrganizationApiContract
{
    /**
     * Getting organization details
     * 
     * @return OrganizationContract|null
     */
    public function find(int $organizationId): ?OrganizationContract;

    /**
     * Updating given organization in pipedrive API.
     * 
     * @param OrganizationContract $organization
     * @return OrganizationContract|null Null if any error.
     */
    public function update(OrganizationContract $organization): ?OrganizationContract;
}