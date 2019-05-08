<?php

namespace App\Model;

/**
 * Class MovieManager
 * @package Model
 */
class PlanetManager extends AbstractManager
{

    /**
     *
     */
    const TABLE = 'planet';


    /**
     * BeastManager constructor.
     * @param \PDO $pdo
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}
