<?php
namespace AppBundle\Entity\LocalAuthority;

class LocalAuthority implements LocalAuthorityInterface
{
    /** @var int $localAuthorityId */
    private $localAuthorityId;

    /** @var string $name */
    private $name;

    /**
     * {@inheritdoc}
     */
    public function getLocalAuthorityId(): ?int
    {
        return $this->localAuthorityId;
    }

    /**
     * {@inheritdoc}
     */
    public function setLocalAuthorityId(int $localAuthorityId): LocalAuthorityInterface
    {
        $this->localAuthorityId = $localAuthorityId;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName(string $name): LocalAuthorityInterface
    {
        $this->name = $name;

        return $this;
    }
}
