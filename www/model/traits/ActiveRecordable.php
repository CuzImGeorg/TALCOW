<?php

/**
 * Basisklasse für alle DB Klassen, die per Active Record definiert werden
 *
 * @author wilhelm
 */
trait ActiveRecordable{
   
    
   /** 
    *  Generischer Konstruktor
    * @param type $daten
    * 
    * 
    */ 
    public function __construct(array $daten = []) {
        $this->setDaten($daten);
    } 
    
    public function setDaten(array $daten)
    {
        // wenn $daten nicht leer ist, rufe die passenden Setter auf
        if ($daten) {
            foreach ($daten as $k => $v) {
                $setterName = 'set' . ucfirst($k);
                // pruefe ob ein passender Setter existiert
                if (method_exists($this, $setterName)) {
                    $this->$setterName($v); // Setteraufruf
                }
            }
        }
    }
    
    protected static function ermittleTable()
    {
        if (empty(DB::getDB())) {
            throw new Exception('Kein DB-Objekt!');
        }

        $table = strtolower(get_class());
        if (!empty(self::$table)) {
            $table = self::$table;
        }

        return $table;
    }
    
    
    /**
     * Wandelt alle Eigenschaften der Klasse in ein assoziatives Array um
     * 
     * @param type $mitId
     * @return type
     * 
     * 
     */
    public function toArray($mitId = true) {
        $attribute = get_object_vars($this);
        if ($mitId === false) {
            // wenn $mitId false ist, entferne den Schlüssel id aus dem Ergebnis
            unset($attribute['id']);
        }
        return $attribute;
    }
     
}
