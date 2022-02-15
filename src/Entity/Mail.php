<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MailRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *normalizationContext={"groups"={"mail:read"}},
 *denormalizationContext={"groups"={"mail:write"}},
 * )
 * @ORM\Entity(repositoryClass=MailRepository::class)
 * @ApiFilter(SearchFilter::class, properties={"setTo": "exact"})
 */
class Mail
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"mail:read"})
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"mail:read", "mail:write"})
     */
    private $setFrom;

    /**
     * @ORM\Column(type="string", length=255 ,nullable=true)
     * @Groups({"mail:read", "mail:write"})
     */
    private $setTo;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"mail:read", "mail:write"})
     */
    private $setBody;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"mail:read", "mail:write"})
     */
    private $objet;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"mail:read", "mail:write"})
     */
    private $filename;

    /**
     * @ORM\Column(type="text",nullable=true,length=429496729)
     * @Groups({"mail:read", "mail:write"})
     */
    private $filevalue;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"mail:read", "mail:write"})
     */
    private $filetype;
     /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"mail:read", "mail:write"})
     */
    private $file;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSetFrom(): ?string
    {
        return $this->setFrom;
    }

    public function setSetFrom(string $setFrom): self
    {
        $this->setFrom = $setFrom;

        return $this;
    }

    public function getSetTo(): ?string
    {
        return $this->setTo;
    }

    public function setSetTo(string $setTo): self
    {
        $this->setTo = $setTo;

        return $this;
    }

    public function getSetBody(): ?string
    {
        return $this->setBody;
    }

    public function setSetBody(string $setBody): self
    {
        $this->setBody = $setBody;

        return $this;
    }
    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(?string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    public function getFilevalue(): ?string
    {
        return $this->filevalue;
    }

    public function setFilevalue(?string $filevalue): self
    {
        $this->filevalue = $filevalue;

        return $this;
    }

    public function getFiletype(): ?string
    {
        return $this->filetype;
    }

    public function setFiletype(?string $filetype): self
    {
        $this->filetype = $filetype;

        return $this;
    }
    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(?string $file): self
    {
        $this->file = $file;

        return $this;
    }
    public function getObjet(): ?string
    {
        return $this->objet;
    }

    public function setObjet(string $objet): self
    {
        $this->objet = $objet;

        return $this;
    }

}
