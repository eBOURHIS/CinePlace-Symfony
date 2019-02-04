<?php
namespace App\Controller;
use App\Entity\Film;
use App\Form\FilmType;
use App\Repository\FilmRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
    public function details($id)
    {
        return $this->render('interface/details.html.twig', [
            'id' => (int)$id
        ]);
    }

    /**
     * @Route("/add", name="add_film", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $film = new Film();
        $form = $this->createForm(FilmType::class, $film);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($film);
            $entityManager->flush();

            $this->addFlash('success', 'Film ajouté à votre liste !');

            return $this->redirectToRoute('film_index');
        }

        return $this->redirectToRoute('cinema');
    }

}
