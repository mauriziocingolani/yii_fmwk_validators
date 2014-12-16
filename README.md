yii_fmwk_validators
===================
Classi che estendono `CValidator` (o sue sottoclassi) e permettono di assegnare regole di validazione ai campi delle form.
L'utilizzo di queste regole nei modelli delle tabelle o delle form consente alla parte Javascript di eseguire la validazione dei campi al momento del submit.

###EmailValidator
Estende `CEmailValidator` e fa override del metodo `validateValue` aggiungendo il controllo dell'esistenza del dominio. Inoltre definisci il metodo `validateValueWithResponse`che implementa le stesse funzionalità dell'altro, ma in più restituisce il motivo per cui la validazione è fallita (errore di sintassi o dominio inesistente).

###LowerCaseValidator
Semplice placeholder per fare in modo che il contenuto del campo venga trasformato in caratteri minuscoli.

###NumberValidator
Estende `CNumberValidator`e implementa in metodo `getNumberPattern`, che restituisce la regex che rappresenta il formato richiesto per i numeri float (in termini di numero di decimali e di separatore).

###ProperCaseValidator
Semplice placeholder per fare in modo che il contenuto del campo venga trasformato in caratteri maiuscoli per le iniziali.


