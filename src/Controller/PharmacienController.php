<?php

namespace App\Controller;
    use App\Repository\PharmacienRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class PharmacienController extends AbstractController
{
  
     /**
     * @Route("/api/pharmacien", name="pharmacien", methods={"GET"})
     */
    public function Index(PharmacienRepository $PharmacienRepository,NormalizerInterface $normalizer  )
    {
        return $this->json($PharmacienRepository->findAll(),200, [ "Content-Type"=>"Application/json"]);
    }

      /**
     * @Route("/api/pharmacien/{id}", name="profile", methods={"GET"})
     */
    public function findOnePharmacien(PharmacienRepository $PharmacienRepository,NormalizerInterface $normalizer, int $id  )
    {
        return $this->json($PharmacienRepository->find($id),200, [ "Content-Type"=>"Application/json"]);
    }


         /**
     * @Route("/api/pharmacien/{nom_pharmacien}/{Password}", name="login", methods={"GET"})
     */
    public function login(PharmacienRepository $PharmacienRepository,NormalizerInterface $normalizer, string $Password, string $nom_pharmacien)
    {
        $dummy = $PharmacienRepository->findOneBy(array(
            'nom_pharmacien'=>$nom_pharmacien,
            'Password'=>$Password,
        ));
        if (!$dummy){
            $data = array(  'status' => 400, 
                            'message' => 'User not found',
                            'reponse' => $dummy);
            return $this->json($data);
        }else{
            $data = array('status' => 200, 
                            'message' => 'User verified',
                            'reponse' => $dummy
                        );
            return $this->json($data);
        }
        

        
        // return $this->json($PharmacienRepository->find($id),200, [ "Content-Type"=>"Application/json"]);
    }
}
