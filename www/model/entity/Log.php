<?php

class Log
{

    use ActiveRecordable, Deletable, Findable, Persistable;
    private int $id = 0;
    private int $uid = 0;
    private int $action = 0;
    private string $description = "";
    private string $timestamp = '';
    private int $level = 0;

    protected static $table = 'Log';

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
    public function getAction(): int
    {
        return $this->action;
    }

    /**
     * @param int $action
     */
    public function setAction(int $action)
    {
        $this->action = $action;
    }

    /**
     * @return string
     */
    public function getTimestamp(): string
    {
        return $this->timestamp;
    }

    /**
     * @param string $timestamp
     */
    public function setTimestamp(string $timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel(int $level)
    {
        $this->level = $level;
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
    public static function findLogByUserID(int $id)
    {
        $sql = "SELECT * FROM log WHERE uid = $id";
        $abfrage = DB::getDB()->query($sql);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'log');
        return $abfrage->fetchAll();
    }

    public function findeUser() {
       return Qser::finde($this->uid);
    }
    public function getLog_action(){
        return Log_action::finde($this->action);
    }

    public function getLog_level(){
        return Log_level::finde($this->level);
    }

    public static function findLogByLog_Action(int $id)
    {
        $sql = "SELECT * FROM log WHERE action =:id)";
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array('id' => $id));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'log');
        return $abfrage->fetchAll();
    }

    public static function findLogByLog_Level(int $id)
    {
        $sql = "SELECT * FROM log WHERE level =:id)";
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array('id' => $id));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'log');
        return $abfrage->fetchAll();
    }
    public static function fineLogsByLogAnyLevel(string $names) {
        $sql = " SELECT * FROM log WHERE level = ANY(SELECT id FROM Log_level WHERE name like $names );";
        $abfrage = DB::getDB()->query($sql);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'log');
        return $abfrage->fetchAll();
    }

    public static function findLogByLog_ActionName(string $name)
    {
        $sql = "SELECT * FROM log WHERE action = (SELECT id FROM log_action WHERE name = $name )";
        $abfrage = DB::getDB()->query($sql);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'log');
        return $abfrage->fetchAll();
    }




}