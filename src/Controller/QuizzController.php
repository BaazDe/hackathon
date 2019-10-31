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
        $randPage = random_int(1, 4);
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
        $randPage = random_int(1, 4);
        $score = new ScoreManager();
        $score = $score->selectAll();
        if (isset($_GET['id'])) {
            $incrementation = new ScoreManager();
            $incrementation = $incrementation->addOne();
        }
        return $this->twig->render('Quizz/quizz2.html.twig', [
            'randomWrongMovies'=>$randomWrongMovie,
            'randomMovies'=>$randomMovie,
            'movies'=>$movies,
            'score'=>$score,
            'path'=> ['random'=>"quizz$randPage"]
        ]);
    }
    public function quizz3()
    {
        //calling MoviesManager
        $moviesManager = new MoviesManager();
        $movies = $moviesManager->selectAll();
        $randomMovie = $moviesManager->randomId();
        $randomWrongMovie = $moviesManager->randomWrongYear();
        //randomizing page
        $randPage = random_int(1, 4);
        $score = new ScoreManager();
        $score = $score->selectAll();
        return $this->twig->render('Quizz/quizz3.html.twig', [
            'randomWrongMovies'=>$randomWrongMovie,
            'randomMovies'=>$randomMovie,
            'movies'=>$movies,
            'score'=>$score,
            'path'=> ['random'=>"quizz$randPage"]
        ]);
    }

    public function quizz4()
    {
        //calling MoviesManager
        $moviesManager = new MoviesManager();
        $movies = $moviesManager->selectAll();
        $moviesPosters = $moviesManager->randomPosters();
        $moviesNotPosters = $moviesManager->randomWrongPosters();
        //randomizing page
        $randPage = random_int(1, 4);
        $score = new ScoreManager();
        $score = $score->selectAll();
        return $this->twig->render('Quizz/quizz4.html.twig', [
            'movies' => $movies,
            'moviesPosters' => $moviesPosters,
            'moviesNotPosters' => $moviesNotPosters,
            'score'=>$score,
            'path'=> ['random'=>"quizz$randPage"]
        ]);
    }
}
