<?php


namespace App\Controller;

use App\Model\PlanetManager;

/**
 * Class BeastController
 * @package Controller
 */
class PlanetController extends AbstractController
{


    /**
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function list() : string
    {
        $planetManager = new PlanetManager();
        $planet = $planetManager->selectAll();
        return $this->twig->render('Planet/list.html.twig', ['planet' => $planet]);
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
        $planetManager = new PlanetManager();
        $planet = $planetManager->selectOneById($id);
        return $this->twig->render('Planet/details.html.twig', ['planet' => $planet]);
       
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

        return $this->twig->render('Planet/add.html.twig');
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
        return $this->twig->render('Planet/edit.html.twig');
    }
}
