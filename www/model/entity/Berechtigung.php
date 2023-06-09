<?php

class Berechtigung
{
    use ActiveRecordable, Deletable, Findable, Persistable;
    private int $id = 0;
    private string $name = '';
    private string $description = '';
    protected static $table = 'Berechtigung';

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public static function findBerechtigungByUserID(int $id)
    {
        $sql = "SELECT * FROM qser_hat_berechtigung WHERE uid =(Select id from qser where id =:uid)";
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array('uid' => $id));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'qser_hat_berechtigung');
        return $abfrage->fetchAll();
    }

    public  static function  findeBerechtigungByNameWithWildcard(string $name) {
        $sql = "SELECT * FROM berechtigung WHERE name like '%$name%'";
        $a = Db::getDB()->query($sql);
        $a->setFetchMode(PDO::FETCH_CLASS, 'berechtigung');
        return $a->fetchAll();
    }

    public  static function  findeBerechtigungByNamed(string $name) {
        $sql = "SELECT * FROM berechtigung WHERE name = '$name'";
        $a = Db::getDB()->query($sql);
        $a->setFetchMode(PDO::FETCH_CLASS, 'berechtigung');
        return $a->fetch();
    }

}