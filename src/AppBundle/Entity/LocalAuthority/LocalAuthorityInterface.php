<?php
namespace AppBundle\Entity\LocalAuthority;

interface LocalAuthorityInterface
{
    /**
     * Get the Local Authority Id
     * @return int|null
     */
    public function getLocalAuthorityId(): ?int;

    /**
     * Set the Local Authority Id
     * @param int $localAuthorityId
     * @return self
     */
    public function setLocalAuthorityId(int $localAuthorityId) : LocalAuthorityInterface;

    /**
     * Get the Name
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * Set the Name
     * @param string $name
     * @return self
     */
    public function setName(string $name) : LocalAuthorityInterface;
}
