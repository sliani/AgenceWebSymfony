<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends  AbstractController
{
    private $repository;
    private $em;

    /**
     * @param PropertyRepository $repository
     * @param ObjectManager $em
     */
    public function __construct(PropertyRepository $repository, ObjectManager $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }


    /**
     * @Route("/biens", name="property.index")
     * @param PropertyRepository $repository
     * @return Response
     */
    public function index(PropertyRepository $repository): Response
    {
       // $properties = $this->repository->findVisibleQuery();
       // return $this->render('Property/index.html.twig', compact('properties'));

        $properties = $repository->findAllVisible();
        return $this->render('Property/index.html.twig', [
            'properties' => $properties
        ]);
    }

    /**
     * @Route("/biens/{slug}-{id}", name="property.show", requirements={"slug": "[a-z0-9\-]*"})
     * @param Property $property
     * @param string $slug
     * @return Response
     */
    public function show(Property $property, string $slug): Response
    {
        if($property->getSlug() !== $slug)
        {
            return $this->redirectToRoute('property.show', [
               'id' => $property->getId(),
                'slug' => $property->getSlug()
            ], 301);
        }
        return $this->render('Property/show.html.twig', [
            'property' => $property,
            'current_menu' => 'properties'
        ]);
    }

}