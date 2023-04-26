<?php

class m_servicemonitor
{
    use ActiveRecordable, Deletable, Findable, Persistable;
    private int $id = 0;
    private string $servicename = '';
    private string $description = '';
    private int $uid = 0;
    protected static $table = 'm_servicemonitor';

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



}