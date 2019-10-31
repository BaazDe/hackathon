<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

class HomeController extends AbstractController
{

    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        //randomizing page
        $randPage = random_int(1, 3);
        return $this->twig->render('Home/index.html.twig', [
            'path'=> ['random'=>"quizz$randPage"]
        ]);
    }
}
