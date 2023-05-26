<?php

class Modul
{
    use ActiveRecordable, Deletable, Findable, Persistable;
    private int $id = 0;
    private int $installedbyuid = 0;
    private string $name = '';
    private int $valueid = 0;

    protected static $table = 'Modul';

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
     * @return int
     */
    public function getInstalledbyuid(): int
    {
        return $this->installedbyuid;
    }

    /**
     * @param int $installedbyuid
     */
    public function setInstalledbyuid(int $installedbyuid)
    {
        $this->installedbyuid = $installedbyuid;
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
     * @return int
     */
    public function getValueid(): int
    {
        return $this->valueid;
    }

    /**
     * @param int $valueid
     */
    public function setValueid(int $valueid)
    {
        $this->valueid = $valueid;
    }

    public static function selectAllFromModulWhereNameIsInstalled()
    {
        $sql = "SELECT * FROM modul WHERE valueid =(Select id from modul_value where name = 'installed')";
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array());
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'modul');
        return $abfrage->fetchAll();
    }
    public static function selectAllFromModulWhereNameIsActive()
    {
        $sql = "SELECT * FROM modul WHERE valueid =(Select id from modul_value where name = 'active')";
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array());
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'modul');
        return $abfrage->fetchAll();
    }


    public function getValue(){
        return Modul_value::finde($this->valueid);
    }

    public static function getByName(string $name){
        $sql = "SELECT * FROM modul WHERE name = '$name'";
        $abfrage = DB::getDB()->query($sql);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'modul');
        return $abfrage->fetch();
    }

}