<?php

class M_servicemonitor
{
    use ActiveRecordable, Deletable, Findable, Persistable;
    private int $id = 0;
    private string $servicename = '';
    private string $description = '';
    private bool $servicetype;
    private int $uid = 0;
    protected static $table = 'M_servicemonitor';

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
    public function getServicename(): string
    {
        return $this->servicename;
    }

    /**
     * @param string $servicename
     */
    public function setServicename(string $servicename)
    {
        $this->servicename = $servicename;
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

    public function findeUser() {
        Qser::finde($this->uid);
    }

    /**
     * @return bool
     */
    public function isServicetype(): bool
    {
        return $this->servicetype;
    }

    /**
     * @param bool $servicetype
     */
    public function setServicetype(bool $servicetype): void
    {
        $this->servicetype = $servicetype;
    }


    public static function findUserByM_ServicemonitorID(int $id)
    {
        $sql = "SELECT * FROM m_servicemonitor WHERE uid =:id";
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array('id' => $id));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'm_servicemonitor');
        return $abfrage->fetchAll();
    }



}