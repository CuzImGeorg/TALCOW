<?php

class Unhistory
{
    use ActiveRecordable, Deletable, Findable, Persistable;
    private int $id = 0;
    private int $uid = 0;
    private string $oldname = '';
    private string $newname = '';
    private string $changetime = '';

    protected static $table = 'Unhistory';

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
    public function getUid(): int
    {
        return $this->uid;
    }

    /**
     * @param int $uid
     */
    public function setUid(int $uid): void
    {
        $this->uid = $uid;
    }

    /**
     * @return string
     */
    public function getOldname(): string
    {
        return $this->oldname;
    }

    /**
     * @param string $oldname
     */
    public function setOldname(string $oldname): void
    {
        $this->oldname = $oldname;
    }

    /**
     * @return string
     */
    public function getNewname(): string
    {
        return $this->newname;
    }

    /**
     * @param string $newname
     */
    public function setNewname(string $newname): void
    {
        $this->newname = $newname;
    }

    /**
     * @return string
     */
    public function getChangetime(): string
    {
        return $this->changetime;
    }

    /**
     * @param string $changetime
     */
    public function setChangetime(string $changetime): void
    {
        $this->changetime = $changetime;
    }


    public function findeUser() {
        return Qser::finde($this->uid);
    }


}