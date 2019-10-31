<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 18:20
 * PHP version 7
 */

namespace App\Model;

/**
 *
 */
class ScoreManager extends AbstractManager
{
    /**
     *
     */
    const TABLE = 'Score';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function addOne(): object
    {
        return $this->pdo->query("UPDATE Score set score = score + 1 WHERE id = 1");
    }
    public function reset(): object
    {
        return $this->pdo->query("UPDATE Score set score = 0");
    }
}
