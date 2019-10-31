<?php


namespace App\Controller;

use App\Model\MoviesManager;
use App\Model\ScoreManager;

class QuizzController extends AbstractController
{

    public function requestPath()
    {
        $requestUri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $scriptName = explode('/', trim($_SERVER['SCRIPT_NAME'], '/'));
        $parts = array_diff_assoc($requestUri, $scriptName);
        if (empty($parts)) {
            return '/';
        }
        var_dump($parts);
        return $parts;
    }


    public function quizz1()
    {
        //calling MoviesManager
        $moviesManager = new MoviesManager();
        $movies = $moviesManager->selectAll();
        $randomMovie = $moviesManager->randomId();
        $randomWrongMovie = $moviesManager->randomWrongId();
        $score = new ScoreManager();
        $score = $score->selectAll();
        //randomizing page
        $randPage = random_int(1, 3);
        return $this->twig->render('Quizz/quizz1.html.twig', [
            'randomWrongMovies'=>$randomWrongMovie,
            'randomMovies'=>$randomMovie,
            'movies'=>$movies,
            'score'=>$score,
            'path'=> ['random'=>"quizz$randPage"]
        ]);
    }

    public function quizz2()
    {
        //calling MoviesManager
        $moviesManager = new MoviesManager();
        $movies = $moviesManager->selectAll();
        $randomMovie = $moviesManager->randomId();
        $randomWrongMovie = $moviesManager->randomWrongId();
        //randomizing page
        $randPage = random_int(1, 3);
        return $this->twig->render('Quizz/quizz2.html.twig', [
            'randomWrongMovies'=>$randomWrongMovie,
            'randomMovies'=>$randomMovie,
            'movies'=>$movies,
            'path'=> ['random'=>"quizz$randPage"]
        ]);
    }
    public function quizz3()
    {
        //calling MoviesManager
        $moviesManager = new MoviesManager();
        $movies = $moviesManager->selectAll();
        $randomMovie = $moviesManager->randomId();
        $randomWrongMovie = $moviesManager->randomWrongId();
        //randomizing page
        $randPage = random_int(1, 3);
        return $this->twig->render('Quizz/quizz3.html.twig', [
            'randomWrongMovies'=>$randomWrongMovie,
            'randomMovies'=>$randomMovie,
            'movies'=>$movies,
            'path'=> ['random'=>"quizz$randPage"]
        ]);
    }
}
