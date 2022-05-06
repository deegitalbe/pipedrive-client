<?php
namespace Deegitalbe\PipedriveClient\Services\Pipedrive\Contracts\Models;

use stdClass;

interface OrganizationContract
{
    /**
     * Instanciating model based on given api data.
     * 
     * @param stdClass $attributes
     * @return OrganizationContract
     */
    public function setAttributes(stdClass $attributes): OrganizationContract;

    /**
     * Getting id.
     * 
     * @return ?int
     */
    public function getId(): ?int;

    /**
     * Getting name.
     * 
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * Getting associated label id.
     * 
     * @return int|null
     */
    public function getLabel(): ?int;

    /**
     * Telling if organization is concerning an active client
     * 
     * @return bool
     */
    public function isActiveClient(): bool;

    /**
     * Setting name.
     * 
     * @param string $name
     * @return static
     */
    public function setName(string $name): OrganizationContract;

    /**
     * Setting related label id.
     * 
     * @param ?int $label
     * @return static
     */
    public function setLabel(?int $label): OrganizationContract;

    /**
     * Activating organization.
     * 
     * @return static
     */
    public function setAsActiveClient(): OrganizationContract;
}