<?php


namespace App\Controller;

use App\Model\MovieManager;

/**
 * Class BeastController
 * @package Controller
 */
class MovieController extends AbstractController
{


    /**
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function list() : string
    {
        $movieManager = new MovieManager();
        $movie = $movieManager->selectAll();
        return $this->twig->render('Movie/list.html.twig', ['movie' => $movie]);
    }


    /**
     * @param int $id
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    
    public function details(int $id)  : string
    {
      // TODO : A page which displays all details of a specific beasts.
        $movieManager = new MovieManager();
        $movie = $movieManager->selectOneById($id);
        return $this->twig->render('movie/details.html.twig', ['movie' => $movie]);
       
    }

    /**
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function add()  : string
    {
      // TODO : A creation page where your can add a new beast.

        return $this->twig->render('Beast/add.html.twig');
    }


    /**
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function edit() : string
    {
      // TODO : An edition page where your can add a new beast.
        return $this->twig->render('Beast/edit.html.twig');
    }
}
