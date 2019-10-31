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

    public function addOne(): array
    {
        return $this->pdo->query('UPDATE score set score = score + 1 WHERE id = 1')->fetchAll();
    }
    public function reset(): array
    {
        return $this->pdo->query('UPDATE score set score = 0 WHERE id = 1')->fetchAll();
    }
}
