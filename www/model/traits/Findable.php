<?php
trait Findable
{
    public static function findeALL()
    {
        $sql = vsprintf(
            'SELECT * FROM %s',
            [self::ermittleTable()]
        );
        $abfrage = DB::getDB()->query($sql);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, get_class());

        return $abfrage->fetchAll();
    }
    
    public static function finde($id)
    {
        $sql = vsprintf(
            'SELECT * FROM %s WHERE id = ?',
            [self::ermittleTable()]
        );
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute([$id]);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, get_class());

        return $abfrage->fetch();
    }
}
