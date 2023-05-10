<?php

class Modul_value
{
    use ActiveRecordable, Deletable, Findable, Persistable;
    private int $id = 0;
    private string $name = '';
    private string $description = '';

    protected static $table = 'Modul_value';

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



}