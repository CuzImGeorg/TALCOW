<?php

trait Deletable
{
    public function loesche()
    {
        $sql = vsprintf(
            'DELETE FROM %s WHERE id = ?',
            [self::ermittleTable()]
        );
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute([$this->getId()]);

        $this->id = 0;
    }
}
