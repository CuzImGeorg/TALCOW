<?php

class M_postgresql {
    use ActiveRecordable, Deletable, Findable, Persistable;

    protected static $table = 'm_postgresql';
    private int $id = 0;

    private string $pgdatabase = "";
    private string $pguser = "";
    private string $pgpw= "";
    private string $description= "";
    private string $pghost= "";

    private int $pgport = 0;
    private int $useredit = 0;

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
     * @return string
     */
    public function getPgdatabase(): string
    {
        return $this->pgdatabase;
    }

    /**
     * @param string $pgdatabase
     */
    public function setPgdatabase(string $pgdatabase): void
    {
        $this->pgdatabase = $pgdatabase;
    }

    /**
     * @return string
     */
    public function getPguser(): string
    {
        return $this->pguser;
    }

    /**
     * @param string $pguser
     */
    public function setPguser(string $pguser): void
    {
        $this->pguser = $pguser;
    }

    /**
     * @return string
     */
    public function getPgpw(): string
    {
        return $this->pgpw;
    }

    /**
     * @param string $pgpw
     */
    public function setPgpw(string $pgpw): void
    {
        $this->pgpw = $pgpw;
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

    /**
     * @return int
     */
    public function getPgport(): int
    {
        return $this->pgport;
    }

    /**
     * @param int $pgport
     */
    public function setPgport(int $pgport): void
    {
        $this->pgport = $pgport;
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
    public function getPghost(): string
    {
        return $this->pghost;
    }

    /**
     * @param string $pghost
     */
    public function setPghost(string $pghost): void
    {
        $this->pghost = $pghost;
    }

    public function findeUser() {
        return Qser::finde($this->getUseredit());
    }

    private  $db = null;

    public  function getDB() {

        if($this->db == null) {
            try {
                $this->db = new PDO('pgsql:host=localhost;port=5432;dbname=talcow;', 'postgres', "adm");
                $this->db = new PDO('pgsql:host=' . $this->pghost .  ';port='. $this->pgport .';dbname='. $this->pgdatabase .";", $this->pguser, $this->pgpw);
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch (PDOException $e) {
                echo $e->getMessage();
            }


        }
        return $this->db;
    }











}







?>