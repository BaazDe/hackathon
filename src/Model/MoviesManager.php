<?php


namespace App\Model;

class MoviesManager extends AbstractManager
{
    /**
     *
     */
    const TABLE = 'Movies';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function selectByReleaseDate(int $date)
    {
        // prepared request
        $statement = $this->pdo->prepare("SELECT * FROM $this->table WHERE release_date=:date");
        $statement->bindValue('date', $date, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll();
    }
}