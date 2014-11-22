<?php

/**
 * Estende CEmailValidator e aggiunge il controllo dell'esistenza del dominio.
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0.3
 */
class EmailValidator extends CEmailValidator {

    /** Valore restituito dal metodo {@link validateValueWithResponse} se l'indirizzo è valido */
    const ERROR_NONE = 'ok';

    /** Valore restituito dal metodo {@link validateValueWithResponse} se l'indirizzo è sintatticamente errato */
    const ERROR_SYNTAX = 'syntax';

    /** Valore restituito dal metodo {@link validateValueWithResponse} se il dominio dell'indirizzo non esiste */
    const ERROR_DOMAIN = 'domain';

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

    /**
     * Implementa le stesse funzionalità del metodo {@link validateValue}, ma restituisce
     * il motivo per cui la validazione è fallita:
     * <ul>
     * <li>{@link EmailValidator::ERROR_SYNTAX}: sintassi errata</li>
     * <li>{@link EmailValidator::ERROR_DOMAIN}: dominio inesistente</li>
     * <li>{@link EmailValidator::ERROR_NONE}: indirizzo valido</li>
     * </ul>
     * @param type $value Valore da validare
     * @return string Errore di validazione (vedi costanti della classe)
     */
    public function validateValueWithResponse($value) {
        if ($value == null || strlen(trim($value)) == 0)
            return self::ERROR_NONE;
        if (parent::validateValue($value)) :
            list($address, $host) = explode('@', $value);
            return checkdnsrr($host) ? self::ERROR_NONE : self::ERROR_DOMAIN;
        endif;
        return self::ERROR_SYNTAX;
    }

}
