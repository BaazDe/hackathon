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

    public function selectByYear(int $year)
    {
        // prepared request
        $statement = $this->pdo->prepare("SELECT * FROM $this->table WHERE year=:year");
        $statement->bindValue('year', $year, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll();
    }
}
