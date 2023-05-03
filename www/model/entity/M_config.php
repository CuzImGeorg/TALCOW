<?php

class M_config
{

    use ActiveRecordable, Deletable, Findable, Persistable;
    private int $id = 0;
    private string $name = '';
    private string $value = '';
    private int $uid = 0;
    private int $modul = 0;

    protected static $tabel = 'M_config';

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
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value)
    {
        $this->value = $value;
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

    public function findeUser() {
        Qser::finde($this->uid);
    }


        public function getModulIOI(){
        Modul::finde($this->modul);
    }



}