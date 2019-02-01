<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class InterfaceController extends AbstractController
{
    /**
     * @Route("/cine", name="cinema", methods={"GET"})
     */
    public function index()
    {
        return $this->render('interface/cinema.html.twig');
    }

    /**
     * @Route("/details/{id}", name="details", methods={"GET"})
     */
    public function details()
    {
        return $this->render('interface/details.html.twig');
    }


}
