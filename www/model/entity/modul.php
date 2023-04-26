<?php

class modul
{
    use ActiveRecordable, Deletable, Findable, Persistable;
    private int $id = 0;
    private int $installedbyuid;
    private string $name = '';
    private int $valueid = 0;

    protected static $table = 'modul';

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

}