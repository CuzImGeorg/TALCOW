<?php
class Berechtigungsgruppe
{
    use ActiveRecordable, Deletable, Findable, Persistable;

    private int $id = 0;
    private string $name = '';
    private string $description = '';
    private int $createuser = 0;

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
    public function setId(int $id): void
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
    public function setName(string $name): void
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
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getCreateuser(): int
    {
        return $this->createuser;
    }

    /**
     * @param int $createuser
     */
    public function setCreateuser(int $createuser): void
    {
        $this->createuser = $createuser;
    }

    /**
     * @return int
     */


    public static function findBerechtigungsgrupperByCreateuser(int $id)
    {
        $sql = "SELECT * FROM Berechtigungsgruppe WHERE createuser =(Select id from qser where id =:uid)";
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array('uid' => $id));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'berechtigungsgruppe');
        return $abfrage->fetchAll();
    }

    public static function findeBerechtigungByNameWithWildcard(string $name)
    {
        $sql = "SELECT * FROM berechtigungsgruppen WHERE name like '%$name%'";
        $a = Db::getDB()->query($sql);
        $a->setFetchMode(PDO::FETCH_CLASS, 'berechtigungsgruppe');
        return $a->fetchAll();
    }

    public static function findeBerechtigungByNamed(string $name)
    {
        $sql = "SELECT * FROM berechtigungsgruppe WHERE name = '$name'";
        $a = Db::getDB()->query($sql);
        $a->setFetchMode(PDO::FETCH_CLASS, 'berechtigungsgruppe');
        return $a->fetch();
    }

    public static function getByName(string $name){
        $sql = "SELECT * FROM berechtigungsgruppe WHERE name = '$name'";
        $abfrage = DB::getDB()->query($sql);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'berechtigungsgruppe');
        return $abfrage->fetch();
    }

}