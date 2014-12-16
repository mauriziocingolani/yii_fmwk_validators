yii_fmwk_validators
===================
Classi che estendono CValidator (o sue sottoclassi) e permettono di assegnare regole di validazione ai campi delle form.
L'utilizzo di queste regole nei modelli delle tabelle o delle form consente alla parte Javascript di eseguire la validazione dei campi al momento del submit.

###EmailValidator
Estende CEmailValidator e fa override del metodo `validateValue` aggiungendo il controllo dell'esistenza del dominio,
