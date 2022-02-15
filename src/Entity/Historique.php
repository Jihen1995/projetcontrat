<?php

namespace App\Entity;
use App\Repository\HistoriqueRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Entity\Contrat;
/**
 *  @ApiResource(
 *normalizationContext={"groups"={"validation:read"}},
 *denormalizationContext={"groups"={"validation:write"}},
 *  	    attributes={
 *              "pagination_items_per_page"=10,
 *				"pagination_client_enabled"=true
 *          }
 *)
 * @ORM\Entity(repositoryClass=HistoriqueRepository::class)
 * @ApiFilter(SearchFilter::class, properties={"idcontrat": "exact","iduser": "exact"})
 */
class Historique
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"validation:read", "validation:write"})
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"validation:read", "validation:write"})
     */
    private $commentaire;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"validation:read", "validation:write"})
     */
    private $dateReponse;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"validation:read", "validation:write"})
     */
    private $idcontrat;
    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"validation:read", "validation:write"})
     */
    private $iduser;
    /**
     * @ORM\Column(type="string", length=255,nullable=true)
    * @Groups({"validation:read", "validation:write"})
     */
    public $statut;
    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     * @Groups({"validation:read", "validation:write"})
    */
    public $rappel;

    /**
     * @ORM\Column(type="string", length=255)
    * @Groups({"validation:read", "validation:write"})
     */
    public $delaiReponse;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"validation:read", "validation:write"})
    */
    public $dateFin;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"validation:read", "validation:write"})
     */
    public $dateDebut;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"validation:read", "validation:write"})
     */
    private $filename;

    /**
     * @ORM\Column(type="text",nullable=true ,length=429496729)
     * @Groups({"validation:read", "validation:write"})
    */
    private $filevalue;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"validation:read", "validation:write"})
     */
    private $filetype;
     /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"validation:read", "validation:write"})
     */
    private $contrat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getDateReponse(): ?\DateTimeInterface
    {
        return $this->dateReponse;
    }

    public function setDateReponse(?\DateTimeInterface $dateReponse): self
    {
        $this->dateReponse = $dateReponse;

        return $this;
    }

    public function getIdcontrat(): ?int
    {
        return $this->idcontrat;
    }

    public function setIdcontrat(?int $idcontrat): self
    {
        $this->idcontrat = $idcontrat;

        return $this;
    }
    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }
   
 
    
    public function getRappel(): ?string
    {
        return $this->rappel;
    }

    public function setRappel(string $rappel): self
    {
        $this->rappel = $rappel;

        return $this;
    }

    public function getDelaiReponse(): ?string
    {
        return $this->delaiReponse;
    }

    public function setDelaiReponse(string $delaiReponse): self
    {
        $this->delaiReponse = $delaiReponse;

        return $this;
    }

    public function getDateFin(): ?string
    {
        return $this->dateFin;
    }

    public function setDateFin(string $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getDateDebut(): ?string
    {
        return $this->dateDebut;
    }

    public function setDateDebut(string $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

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
    public function getContrat(): ?string
    {
        return $this->contrat;
    }

    public function setContrat(?string $contrat): self
    {
        $this->contrat = $contrat;

        return $this;
    }
    public function getIduser(): ?int
    {
        return $this->iduser;
    }

    public function setIduser(?int $iduser): self
    {
        $this->iduser = $iduser;

        return $this;
    }
}
