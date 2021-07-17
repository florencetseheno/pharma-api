<?php

namespace App\Controller;


use App\Entity\Medicament;
use App\Repository\MedicamentRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

class MedicamentController extends AbstractController
{
    /**
     * @Route("/api/medicament", name="medicament", methods={"GET"})
     */
    public function index(MedicamentRepository $MedicamentRepository,SerializerInterface $serializer  )
    {
       return $this->json($MedicamentRepository->findAll(),200, [ "Content-Type"=>"Application/json"]);
    }

 /**
     * @Route("/api/medicament/create", name="store_medicament", methods={"POST"})
     */
    public function storeMedicament(Request $request, SerializerInterface $serializer, EntityManagerInterface $em)
    {
     try{
        $jsonrecue=$request->getContent();
        $newmedicament= $serializer->deserialize($jsonrecue, Medicament::class,'json');
        $em->persist($newmedicament);
        $em->flush();
        return $this->json($newmedicament,201,[],);
     }
     catch(NotEncodableValueException $e){
         return $this->json(['status' => 400,'message' => $e->getMessage()],400);
     }
    }



 /**
     * @Route("/api/medicament/{id}", name="medicament_details" )
     */
    public function show(int $id, MedicamentRepository $MedicamentRepository): Response
    {
        return $this->json($MedicamentRepository->find($id),200, [ "Content-Type"=>"Application/json"]);

    }
}