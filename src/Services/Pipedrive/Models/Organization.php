<?php
namespace Deegitalbe\PipedriveClient\Services\Pipedrive\Models;

use Deegitalbe\PipedriveClient\Services\Pipedrive\Contracts\Models\OrganizationContract;
use stdClass;

class Organization implements OrganizationContract
{
    /**
     * Pipedrive api attributes.
     * 
     * @var stdClass
     */
    protected $attributes;

    /**
     * Active label id.
     * 
     * @var int
     */
    protected $activeLabel = 16;

    /**
     * Instanciating model based on given api data.
     * 
     * @param stdClass $attributes
     * @return OrganizationContract
     */
    public function setAttributes(stdClass $attributes): OrganizationContract
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Getting id.
     * 
     * @return ?int
     */
    public function getId(): ?int
    {
        return $this->getAttribute('id');
    }

    /**
     * Getting name.
     * 
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->getAttribute('name');
    }

    /**
     * Getting associated label id.
     * 
     * @return int|null
     */
    public function getLabel(): ?int
    {
        return $this->getAttribute('label');
    }

    /**
     * Telling if organization is concerning an active client
     * 
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->getLabel() === $this->activeLabel;
    }

    /**
     * Setting name.
     * 
     * @param string $name
     * @return static
     */
    public function setName(string $name): OrganizationContract
    {
        $this->getAttributes()->name = $name;

        return $this;
    }

    /**
     * Setting related label id.
     * 
     * @param ?int $label
     * @return static
     */
    public function setLabel(?int $label): OrganizationContract
    {
        $this->getAttributes()->label = $label;

        return $this;
    }

    /**
     * Activating organization.
     * 
     * @return static
     */
    public function setAsActive(): OrganizationContract
    {
        return $this->setLabel($this->activeLabel);
    }

    /**
     * Deactivating organization.
     * 
     * @return static
     */
    public function setAsInactive(): OrganizationContract
    {
        return $this->setLabel(null);
    }

    /**
     * Getting all attributes.
     * 
     * @return stdClass
     */
    protected function getAttributes(): stdClass
    {
        return $this->attributes ?? $this->attributes = new stdClass;
    }

    /**
     * Getting given attribute value.
     * 
     * @param string $attribute 
     * @return mixed
     */
    protected function getAttribute(string $attribute)
    {
        return $this->getAttributes()->{$attribute} ?? null;
    }
}