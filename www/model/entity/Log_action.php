<?php

class Log_action
{
    use ActiveRecordable, Deletable, Findable, Persistable;
    private int $id = 0;
    private string $name = '';
    private string $description = '';
    private int $modul = 0;
    protected static $table = 'Log_action';

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

    public static function findLog_ActionByModul(int $modul)
    {
        $sql = "SELECT * FROM `log_action` WHERE modul =(Select id from modul where id =:modul)";
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array('modul' => $modul));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'log_action');
        return $abfrage->fetchAll();
    }

}