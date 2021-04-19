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
    public function index(PharmacienRepository $PharmacienRepository,NormalizerInterface $normalizer  )
    {
        $pharmacien = $PharmacienRepository->findAll();
        $pharmacienNormalises = $normalizer->normalize($pharmacien);
        // dd( $pharmacienNormalises );
        $json=json_encode($pharmacienNormalises);
        dd($json);

        
        return $this->render('pharmacien/index.html.twig', [
            'controller_name' => 'PharmacienController',
        ]);
    }
     /**
     * @Route("/api/profil", name="pharmacien", methods={"GET"})
     */
    public function findOnePharmacien(PharmacienRepository $PharmacienRepository,NormalizerInterface $normalizer  )
    {
        $pharmacien = $PharmacienRepository->findAll();
        $pharmacienNormalises = $normalizer->normalize($pharmacien);
        $json=json_encode($pharmacienNormalises);
        dd($json);

        
        return $this->render('pharmacien/index.html.twig', [
            'controller_name' => 'PharmacienController',
        ]);
    }
}
