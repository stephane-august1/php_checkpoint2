<?php


namespace App\Controller;

use App\Model\BeastManager;
use App\Model\PlanetManager;
use App\Model\MovieManager;

/**
 * Class BeastController
 * @package Controller
 */
class BeastController extends AbstractController
{


    /**
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function list() : string
    {
        $beastsManager = new BeastManager();
        $beast = $beastsManager->selectall();


        return $this->twig->render(
            'Beast/list.html.twig',
            [
          'beasts' => $beast,

          ]
        );
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
        $beastsManager = new BeastManager();
        $beast= $beastsManager->selectDetail($id);

      //  echo '<pre style="color:white;">'.print_r($beast, true).'<pre>';
        return $this->twig->render(
            'Beast/details.html.twig',
            [
          'beasts' => $beast,

          ]
        );
    }
   
    
    public function add()
    {
        // TODO : An edition page where your can add a new beast.
        $beastsManager = new BeastManager();
        $planetManager = new PlanetManager();
        $movieManager = new MovieManager();
        if (!empty($_POST)) {
            $valeur = [
                'name' => $_POST['name'],
                'picture' => $_POST['picture'],
                'size' => $_POST['size'],
                'area' => $_POST['area'],
                'movie' => $_POST['movie'],
                'planet' => $_POST['planet']
            ];
            $beastsManager->insert($valeur);
            Header('Location:/beast/list');

        }

        $edits = $beastsManager->selectAll();
        $planet = $planetManager->selectAll();
        $movie = $movieManager->selectAll();

      //  echo '<pre style="color:white;">'.print_r($edit, true).'<pre>';
        return $this->twig->render('Beast/add.html.twig', [
            'edits' => $edits,
            'planets'=> $planet,
            'movies' => $movie
        ]);
    }
    /**
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */


    public function edit(int $id)
    {
        // TODO : An edition page where your can add a new beast.
        $beastsManager = new BeastManager();
        $planetManager = new PlanetManager();
        $movieManager = new MovieManager();
        if (!empty($_POST)) {
            $beastsManager->update($_POST, $id);
            Header('Location:/beast/list');
        }

        $edit = $beastsManager->selectDetail($id);
        $planet = $planetManager->selectAll();
        $movie = $movieManager->selectAll();

       // echo '<pre style="color:white;">'.print_r($edit, true).'<pre>';
        return $this->twig->render('Beast/edit.html.twig', [
            'edits' => $edit,
            'planets'=> $planet,
            'movies' => $movie
        ]);
    }
    public function delete(int $id)
    {
        $beastsManager = new BeastManager();
        $beastsManager->delete($id);
        header('Location:/beast/list');
    }
}
