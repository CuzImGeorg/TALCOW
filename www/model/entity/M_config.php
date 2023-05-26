<?php

class M_config
{

    use ActiveRecordable, Deletable, Findable, Persistable;
    private int $id = 0;
    private string $name = '';
    private string $value = '';
    private int $uid = 0;
    private int $modul = 0;

    protected static $tabel = 'M_config';

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
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getUid(): int
    {
        return $this->uid;
    }

    /**
     * @param int $uid
     */
    public function setUid(int $uid)
    {
        $this->uid = $uid;
    }

    /**
     * @return int
     */
    public function getModul(): int
    {
        return $this->modul;
    }

    /**
     * @param int $modul
     */
    public function setModul(int $modul)
    {
        $this->modul = $modul;
    }

    public function findeUser() {
        Qser::finde($this->uid);
    }


        public function getModulIOI(){
        return Modul::finde($this->modul);

    }

    public static function findM_ConfigByuid(int $id)
    {
        $sql = "SELECT * FROM m_config WHERE uid =:id";
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array('id' => $id));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'm_config');
        return $abfrage->fetchAll();
    }

    public static function findM_ConfigByModul(int $id)
    {
        $sql = "SELECT * FROM m_config WHERE modul =:id";
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array('id' => $id));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'm_config');
        return $abfrage->fetchAll();
    }

    public static function getByName(string $name){
        $sql = "SELECT * FROM m_config WHERE name = '$name'";
        $abfrage = DB::getDB()->query($sql);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'm_config');
        return $abfrage->fetch();
    }


}