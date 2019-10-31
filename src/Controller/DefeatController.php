<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

use App\Model\ScoreManager;

class DefeatController extends AbstractController
{

    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function defeat()
    {
        $defeat = new ScoreManager();
        $defeat = $defeat->reset();
        return $this->twig->render('Defeat/defeat.html.twig');
    }
}
