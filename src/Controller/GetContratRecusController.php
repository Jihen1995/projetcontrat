<?php

namespace App\Controller;
use App\Entity\User;
use App\Entity\Contrat;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use ApiPlatform\Core\EventListener\EventPriorities;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use App\Repository\ContratRepository ;
use Symfony\Component\HttpFoundation\JsonResponse;
final class GetContratRecusController extends AbstractController
{
    
    public function  __invoke( ):JsonResponse
    {
      $contrats = $this->getDoctrine()->getRepository(Contrat::class)->findAll();
       $data = [];
      
        foreach ($contrats as $contrat) {
        
          if($contrat->getIdAdmin()===$contrat->getUser()->getId()){
          
            
            $data[] = [
                'id' => $contrat->getId(),
                'idAdmin' => $contrat->getIdAdmin(),
                'statut' => $contrat->getStatut(),
                'rappel' => $contrat->getRappel(),
                'dateFin' => $contrat->getDateFin(),
                'dateDebut' => $contrat->getDateDebut(),
                'user' => $contrat->getUser()->getId(),
                'delaiReponse' => $contrat->getDelaiReponse(),
                'dateSignature'=> $contrat->getDateSignature(),
                'commentaire'=> $contrat->getCommentaire(),
                'contrat'=> $contrat->getContrat(),
                'filetype'=> $contrat->getFileType(),
                'filevalue'=> $contrat->getFileValue(),
                'filename'=> $contrat->getFileName(),
                


              
            ];
            
            
            
        }
     
        return new JsonResponse($data, Response::HTTP_OK);
      }
      

     
  
    } 
    
  } 
 