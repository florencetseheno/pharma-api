<?php

namespace App\Controller;
use App\Repository\MedicamentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;


class MedicamentController extends AbstractController
{
    /**
     * @Route("/api/medicament", name="medicament", methods={"GET"})
     */
    public function index(MedicamentRepository $MedicamentRepository,NormalizerInterface $normalizer  )
    {
        $medicament = $MedicamentRepository->findAll();
        $medicamentNormalises = $normalizer->normalize($medicament);
        // dd( $pharmacienNormalises );ok
        $json=json_encode($medicamentNormalises);
       $response = new Response($json, 200, [
            "Content-Type"=>"Application/json"
       ]);
       return $response;
    }
}
