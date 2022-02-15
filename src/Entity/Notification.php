<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\NotificationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Entity\Contrat;

/**
 * @ApiResource(
 *normalizationContext={"groups"={"notification:read"}},
 *denormalizationContext={"groups"={"notification:write"}},)
 * @ORM\Entity(repositoryClass=NotificationRepository::class)
 * @ApiFilter(SearchFilter::class, properties={"user.id": "exact","contrat.id": "exact"})
 */
class Notification
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"notification:read", "notification:write"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"notification:read", "notification:write"})
     */
    private $titre;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @Groups({"notification:read", "notification:write"})
     */
    private $user;
    /**
     * @ORM\ManyToOne(targetEntity=Contrat::class)
     * @Groups({"notification:read", "notification:write"})
     */
    private $contrat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }
    public function getContrat(): ?contrat
    {
        return $this->contrat;
    }

    public function setContrat(?contrat $contrat): self
    {
        $this->contrat = $contrat;

        return $this;
    }
}
//jiji//