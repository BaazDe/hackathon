<?php


namespace App\Controller;

use App\Model\MoviesManager;

class QuizzController extends AbstractController
{
    public function quizz()
    {
        //calling MoviesManager
        $moviesManager = new MoviesManager();
        $movies = $moviesManager->selectAll();
        $moviesByDate = $moviesManager->selectByReleaseDate(2013);
        var_dump($moviesByDate);
        return $this->twig->render('Quizz/quizz.html.twig', [
            'movies'=>$movies,
            'moviesByDate'=>$moviesByDate
        ]);
    }
}