<?php

class Qserhatberechtigung
{
    use ActiveRecordable, Deletable, Findable, Persistable;
    private int $id = 0;
    private int $uid = 0;
    private int $bid = 0;
    private int $useredit = 0;
    private string $createtime = '';

    protected static $table = 'Qserhatberechtigung';

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
     * @return int
     */
    public function getBid(): int
    {
        return $this->bid;
    }

    /**
     * @param int $bid
     */
    public function setBid(int $bid): void
    {
        $this->bid = $bid;
    }

    /**
     * @return int
     */
    public function getUseredit(): int
    {
        return $this->useredit;
    }

    /**
     * @param int $useredit
     */
    public function setUseredit(int $useredit): void
    {
        $this->useredit = $useredit;
    }

    /**
     * @return string
     */
    public function getCreatetime(): string
    {
        return $this->createtime;
    }

    /**
     * @param string $createtime
     */
    public function setCreatetime(string $createtime): void
    {
        $this->createtime = $createtime;
    }

    public function findeUser() {
        Qser::finde($this->uid);
    }

    public function findeBerechtigung() {
        Berechtigung::finde($this->bid);
    }

    public function findeNachUseredit() {
        Qser::finde($this->useredit);
    }
//select * from
}