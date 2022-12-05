<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'password' => [
        'letters'       => 'La :attribute doit contenir au moins une lettre.',
        'mixed'         => 'La :attribute doit contenir au moins une majuscule et une minuscule.',
        'numbers'       => 'La :attribute doit contenir au moins un chiffre.',
        'symbols'       => 'La :attribute doit contenir au moins un symbole.',
        'uncompromised' => 'Le donné :attribute est apparu dans une fuite de données. Veuillez choisir un autre :attribut.',
    ],

    'required' => 'La :attribute Champ requis.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
