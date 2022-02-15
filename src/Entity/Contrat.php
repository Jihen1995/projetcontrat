<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ContratRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Controller\RappelController;
use App\Controller\GetContratRecusController;
/**
 * @ApiResource(
 *normalizationContext={"groups"={"contrat:read"}},
 *denormalizationContext={"groups"={"contrat:write"}},
 * collectionOperations={
 *  "list"={"method"="GET", "path"="/contrats/list", "controller"=GetContratRecusController::class}, 
 *  "getContrats"={"method"="get", "path"="/contrats"},
 *  "postContrat"={"method"="post","path"="/contrats"},
 * }
 *    , itemOperations={
 *          "get",
 *          "delete",
 *          "put",
 *         "putId"={"method"="PUT", "path"="/contrats/{id}", "requirements"={"id"="\d+"}},
 *         "rappel"={"method"="get", "path"="/contrats/{id}/rappel", "requirements"={"id"="\d+"}, "controller"=RappelController::class, "read"=false},
 *          
 *      } ,
 *  	    attributes={
 *              "pagination_items_per_page"=10,
 *				"pagination_client_enabled"=true
 *          }
 * )
* @ORM\Entity(repositoryClass=ContratRepository::class)
* @ApiFilter(SearchFilter::class, properties={"id": "exact","user.id": "exact","user.name":"partial","statut":"partial","user.email":"partial","user.address":"partial","idAdmin":"exact"})
 */
class Contrat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"contrat:read", "contrat:write"})
    * @Groups({"notification:read", "notification:write"})
     */
    public $id;
   /**
     * @ORM\Column(type="integer" , nullable=true)
     * @Groups({"contrat:read", "contrat:write"})
     * @Groups({"notification:read", "notification:write"})
     */
    public $idAdmin;
    
    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     * @Groups({"contrat:read", "contrat:write"})
     * @Groups({"notification:read", "notification:write"})
     */
    public $statut;
    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     * @Groups({"contrat:read", "contrat:write"})
     * @Groups({"notification:read", "notification:write"})
    */
    public $rappel;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"contrat:read", "contrat:write"})
    * @Groups({"notification:read", "notification:write"})
     */
    public $delaiReponse;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"contrat:read", "contrat:write"})
     * @Groups({"notification:read", "notification:write"})
    */
    public $dateFin;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"contrat:read", "contrat:write"})
     * @Groups({"notification:read", "notification:write"})
     */
    public $dateDebut;
/**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"contrat:read", "contrat:write"})
     * @Groups({"validation:read"})
     * @Groups({"notification:read", "notification:write"})
     */
    private $filename;

    /**
     * @ORM\Column(type="text",nullable=true,length=429496729)
     * @Groups({"contrat:read", "contrat:write"})
     * @Groups({"validation:read"})
     * @Groups({"notification:read", "notification:write"})
     */
    private $filevalue;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"contrat:read", "contrat:write"})
     * @Groups({"validation:read"})
    * @Groups({"notification:read", "notification:write"})
     */
    private $filetype;
     /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"contrat:read", "contrat:write"})
   * @Groups({"notification:read", "notification:write"})
     */
    private $contrat;
     /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"contrat:read", "contrat:write"})
   * @Groups({"notification:read", "notification:write"})
     */
    private $dateSignature;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"contrat:read", "contrat:write"})
    * @Groups({"notification:read", "notification:write"})
     */
    private $commentaire;
   
    /**
     * @ORM\ManyToOne(targetEntity=User::class,cascade={"persist"})
     * @Groups({"contrat:read", "contrat:write"})
     * @Groups({"notification:read", "notification:write"})
     */
    private $user;
    

    public function getId(): ?int
    {
        return $this->id;
    }

   
    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }
   
 public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

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
    public function getDateSignature(): ?\DateTimeInterface
    {
        return $this->dateSignature;
    }

    public function setDateSignature(?\DateTimeInterface $dateSignature): self
    {
        $this->dateSignature = $dateSignature;

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
    public function getIdAdmin(): ?int
    {
        return $this->idAdmin;
    }

    public function setIdAdmin(?int $idAdmin): self
    {
        $this->idAdmin = $idAdmin;

        return $this;
    }
}