<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class GalleryController extends Controller
{
    /**
     * @Route("/gallery", name="gallery")
     */
    public function indexAction(Request $request)
    {
        $images = ['index.jpg','index.jpg','index.jpg','index.jpg','index.jpg','index.jpg','index.jpg','index.jpg','index.jpg','index.jpg','index.jpg','index.jpg'];

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $images, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            9/*limit per page*/
        );

        return $this->render('gallery/index.html.twig', [
            'images' => $pagination
        ]);
    }
}
