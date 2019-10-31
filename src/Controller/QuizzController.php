<?php


namespace App\Controller;

use App\Model\MoviesManager;
use App\Model\ScoreManager;

class QuizzController extends AbstractController
{

    public function quizz()
    {
        //calling MoviesManager
        $moviesManager = new MoviesManager();
        $movies = $moviesManager->selectAll();
        $moviesByYear = $moviesManager->selectByYear(2013);
        $score = new ScoreManager();
        $score = $score->selectAll();
        return $this->twig->render('Quizz/quizz.html.twig', [

            'movies' => $movies,
            'moviesByYear' => $moviesByYear,
            'score'=>$score
        ]);
    }

    public function quizzTitle()
    {
        //calling MoviesManager
        $moviesManager = new MoviesManager();
        $movies = $moviesManager->selectAll();
        $moviesPosters = $moviesManager->randomPosters();
        $moviesNotPosters = $moviesManager->randomWrongPosters();
        if (isset($_GET['id'])) {
            $incrementation = new ScoreManager();
            $incrementation = $incrementation->addOne();
        }
        $score = new ScoreManager();
        $score = $score->selectAll();
        return $this->twig->render('Quizz/quizzTitle.html.twig', [
            'movies' => $movies,
            'moviesPosters' => $moviesPosters,
            'moviesNotPosters' => $moviesNotPosters,
            'score'=>$score

        ]);
    }

    public function quizz2()
    {
        //calling MoviesManager
        $moviesManager = new MoviesManager();
        $movies = $moviesManager->selectAll();
        $randomMovie = $moviesManager->randomId();
        $randomWrongMovie = $moviesManager->randomWrongId();
        if (isset($_GET['id'])) {
            $incrementation = new ScoreManager();
            $incrementation = $incrementation->addOne();
        }
        $score = new ScoreManager();
        $score = $score->selectAll();
        return $this->twig->render('Quizz/quizz2.html.twig', [
            'randomWrongMovies'=>$randomWrongMovie,
            'randomMovies'=>$randomMovie,
            'movies'=>$movies,
            'score'=>$score
        ]);
    }
    public function quizz3()
    {
        //calling MoviesManager
        $moviesManager = new MoviesManager();
        $movies = $moviesManager->selectAll();
        $randomMovie = $moviesManager->randomId();
        $randomWrongMovie = $moviesManager->randomWrongId();
        if (isset($_GET['id'])) {
            $incrementation = new ScoreManager();
            $incrementation = $incrementation->addOne();
        }
        $score = new ScoreManager();
        $score = $score->selectAll();

        return $this->twig->render('Quizz/quizz3.html.twig', [
            'randomWrongMovies'=>$randomWrongMovie,
            'randomMovies'=>$randomMovie,
            'movies'=>$movies,
            'score'=>$score
        ]);
    }
}
