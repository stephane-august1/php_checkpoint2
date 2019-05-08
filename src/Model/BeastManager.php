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
 * Class BeastManager
 * @package Model
 */
class BeastManager extends AbstractManager
{

    /**
     *
     */
    const TABLE = 'beast';


    /**
     * BeastManager constructor.
     * @param \PDO $pdo
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
    public function selectDetail(int $id)
    {
        // prepared request
        $statement = $this->pdo->prepare("SELECT B.*,
                P.name as nameplanet,
                M.title  as namemovie
                from beast as B
                left join planet AS P
                on P.id = B.id_planet
                left join movie AS M
                on M.id = B.id_movie
                 where B.id = :id");

        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }
    public function update(array $edit, $id):bool
    {
        $url =  $edit['picture'];
        //  if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)){

        echo '<pre style="color:red;">'.print_r($edit, true).'<pre>';
        // prepared request
        $statement = $this->pdo->prepare("UPDATE $this->table SET name = :name, picture =
         :picture, size = :size, area = :area,
          id_movie = :id_movie,id_planet = :id_planet WHERE id = :id");

        $statement->bindValue('name', $edit['name'], \PDO::PARAM_STR);
        $statement->bindValue('picture', $url, \PDO::PARAM_STR);
        $statement->bindValue('size', $edit['size'], \PDO::PARAM_INT);
        $statement->bindValue('area', $edit['area'], \PDO::PARAM_STR);
        $statement->bindValue('id_movie', $edit['movie'], \PDO::PARAM_INT);
        $statement->bindValue('id_planet', $edit['planet'], \PDO::PARAM_INT);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);

        return $statement->execute();
        // }
    }
    public function insert(array $valeur): int
    {
        // prepared request
        echo '<pre style="color:red;">'.print_r($valeur, true).'<pre>';
        $statement = $this->pdo->prepare("INSERT INTO $this->table
       (`name`,`picture`,`size`,
       `area`,`id_planet`,`id_movie`) VALUES (:name,:picture,:size,:area,:planet,:movie)");
        $statement->bindValue('name', $valeur['name'], \PDO::PARAM_STR);
        $statement->bindValue('picture', $valeur['picture'], \PDO::PARAM_STR);
        $statement->bindValue('size', $valeur['size'], \PDO::PARAM_INT);
        $statement->bindValue('area', $valeur['area'], \PDO::PARAM_STR);
        $statement->bindValue('planet', $valeur['planet'], \PDO::PARAM_INT);
        $statement->bindValue('movie', $valeur['movie'], \PDO::PARAM_INT);
        echo '<pre style="color:white;">'.print_r($valeur, true).'<pre>';
        if ($statement->execute()) {
            return (int)$this->pdo->lastInsertId();
        }
    }
    public function delete(int $id) 
    {
        // prepared request
        $statement = $this->pdo->prepare("DELETE FROM $this->table WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
    }
}
