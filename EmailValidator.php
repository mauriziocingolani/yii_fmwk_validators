<?php

/**
 * Estende CEmailValidator e aggiunge il controllo dell'esistenza del dominio.
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0.2
 */
class EmailValidator extends CEmailValidator {

    /**
     * Se la validazione della superclass ha avuto successo (indirizzo formalmente valido)
     * verifica l'esistenza del dominio (ovvero del MX) utilizzando la funzione php checkdnsrr().
     * @param type $value Valore da validare
     * @return boolean True se il dominio dell'indirizzo è valido, false altrimenti
     */
    public function validateValue($value) {
        if ($value == null || strlen(trim($value)) == 0)
            return true;
        if (parent::validateValue($value)) :
            list($address, $host) = explode('@', $value);
            return checkdnsrr($host);
        endif;
        return false;
    }

}
