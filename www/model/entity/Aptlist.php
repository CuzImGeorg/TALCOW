<?php

class Aptlist
{
    use ActiveRecordable, Deletable, Findable, Persistable;
    private int $id = 0;
    private string $name = '';
    private string $date;
    private int $uid;
    private string $update_date = '';
    protected static $table = 'Aptlist';

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
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date)
    {
        $this->date = $date;
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
     * @return string
     */
    public function getUpdateDate(): string
    {
        return $this->update_date;
    }

    /**
     * @param string $update_date
     */
    public function setUpdateDate(string $update_date): void
    {
        $this->update_date = $update_date;
    }

    public static function findAptlistByUserID(int $id)
    {
        $sql = "SELECT * FROM `aptlist` WHERE uid =(Select id from user where id =:uid)";
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array('uid' => $id));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'aptlist');
        return $abfrage->fetchAll();
    }

}