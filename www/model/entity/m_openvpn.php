<?php

class m_openvpn
{
    use ActiveRecordable, Deletable, Findable, Persistable;
    private int $id = 0;
    private int $createqser = 0;
    private string $name = '';
    private string $description = '';
    private string $createtime = '';

    protected static $table = 'm_openvpn';

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
    public function getCreateqser(): int
    {
        return $this->createqser;
    }

    /**
     * @param int $createqser
     */
    public function setCreateqser(int $createqser)
    {
        $this->createqser = $createqser;
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
     * @return string
     */
    public function getCreatetime(): string
    {
        return $this->createtime;
    }

    /**
     * @param string $createtime
     */
    public function setCreatetime(string $createtime)
    {
        $this->createtime = $createtime;
    }



}