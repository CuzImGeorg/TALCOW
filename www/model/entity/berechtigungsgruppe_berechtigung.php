<?php
class berechtigungsgruppe_berechtigung
{

    use ActiveRecordable, Deletable, Findable, Persistable;
    private int $id = 0;
    private int $bid = 0;
    private int $bgid = 0;
    private int $useredit = 0;

    protected static $tabel = 'berechtigungsgruppe_berechtigung';

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

    /**
     * @return int
     */


    public function findeUser() {
        Qser::finde($this->uid);
    }


    public function getModulIOI(){
        return Modul::finde($this->modul);

    }

    public static function findberechtigungsgruppe_berechtigungBybid(int $id)
    {
        $sql = "SELECT * FROM berechtigungsgruppe_berechtigung WHERE bid =:id";
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array('id' => $id));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'm_config');
        return $abfrage->fetchAll();
    }

}