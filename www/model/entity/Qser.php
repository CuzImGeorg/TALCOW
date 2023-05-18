<?php

class Qser
{
    use ActiveRecordable, Deletable, Findable, Persistable;
    private int $id = 0;
    private string $name = '';
    private string $password = '';
    private string $description = '';
    private bool $active;
    private string $createdate = '';
    //private int $bid = 0;
    protected static $table = 'Qser';

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
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password) //TODO hash PW
    {
        $this->password = $password;
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
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active)
    {
        $this->active = $active;
    }

    /**
     * @return string
     */
    public function getCreatedate(): string
    {
        return $this->createdate;
    }

    /**
     * @param string $createdate
     */
    public function setCreatedate(string $createdate): void
    {
        $this->createdate = $createdate;
    }

    public static function getByNickNameAndPassword($name, $password) {
        $sql = "SELECT * FROM qser WHERE name = '$name' and password = '$password'";
        $a = Db::getDB()->query($sql);
        $a->setFetchMode(PDO::FETCH_CLASS, 'Qser');
        return $a->fetch();
    }

    public  static function  findeUserByNameWithWildcard(string $name) {
        $sql = "SELECT * FROM qser WHERE name like '%$name%'";
        $a = Db::getDB()->query($sql);
        $a->setFetchMode(PDO::FETCH_CLASS, 'Qser');
        return $a->fetchAll();
    }

    public static function findeUserByName(string $name) {
        $sql = "SELECT * FROM qser WHERE name = '$name'";
        $a = Db::getDB()->query($sql);
        $a->setFetchMode(PDO::FETCH_CLASS, 'Qser');
        return $a->fetch();
    }



}