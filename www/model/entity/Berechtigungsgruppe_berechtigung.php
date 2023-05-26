<?php
class Berechtigungsgruppe_berechtigung
{

    use ActiveRecordable, Deletable, Findable, Persistable;
    private int $id = 0;
    private int $bid = 0;
    private int $bgid = 0;
    private int $useredit = 0;

    protected static $table = 'berechtigungsgruppe_berechtigung';

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
     * @return int
     */
    public function getBid(): int
    {
        return $this->bid;
    }

    /**
     * @param int $bid
     */
    public function setBid(int $bid): void
    {
        $this->bid = $bid;
    }

    /**
     * @return int
     */
    public function getBgid(): int
    {
        return $this->bgid;
    }

    /**
     * @param int $bgid
     */
    public function setBgid(int $bgid): void
    {
        $this->bgid = $bgid;
    }

    /**
     * @return int
     */
    public function getUseredit(): int
    {
        return $this->useredit;
    }

    /**
     * @param int $useredit
     */
    public function setUseredit(int $useredit): void
    {
        $this->useredit = $useredit;
    }

    public function findeUser() {
       return Qser::finde($this->useredit);
    }


    public static function findberechtigungsgruppe_berechtigungBybid(int $id)
    {
        $sql = "SELECT * FROM berechtigungsgruppe_berechtigung WHERE bid =:id";
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array('id' => $id));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'berechtigungsgruppe_berechtigung');
        return $abfrage->fetchAll();
    }

    public static function findberechtigungsgruppe_berechtigungBybgid(int $id)
    {
        $sql = "SELECT * FROM berechtigungsgruppe_berechtigung WHERE bgid =:id";
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array('id' => $id));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'berechtigungsgruppe_berechtigung');
        return $abfrage->fetchAll();
    }

    public static function findberechtigungsgruppe_berechtigungByuseredit(int $id)
    {
        $sql = "SELECT * FROM berechtigungsgruppe_berechtigung WHERE useredit =:id";
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array('id' => $id));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'berechtigungsgruppe_berechtigung');
        return $abfrage->fetchAll();
    }



}