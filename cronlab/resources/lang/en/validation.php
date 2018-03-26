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

    'accepted'             => 'Le :attribute doit être accepté.',
    'active_url'           => 'Le :attribute est pas une URL valide.',
    'after'                => 'Le :attribute doit être une date postérieur au :date.',
    'after_or_equal'       => 'Le :attribute doit être une date postérieur ou égale à :date.',
    'alpha'                => 'Le :attribute ne peut contenir que des lettres.',
    'alpha_dash'           => 'Le :attribute ne peut contenir que des lettres, des chiffres et des tirets.',
    'alpha_num'            => 'Le :attribute ne peut contenir que des lettres et des chiffres.',
    'array'                => 'Le :attribute doit être un tableau.',
    'before'               => 'Le :attribute doit être une date antérieur au :date.',
    'before_or_equal'      => 'Le :attribute doit être une date antérieur ou égale à :date.',
    'between'              => [
        'numeric' => 'Le :attribute doit être entre :min et :max.',
        'file'    => 'Le :attribute Doit être entre :min et :max kilobytes.',
        'string'  => 'Le :attribute Doit être entre :min et :max characters.',
        'array'   => 'Le :attribute doit avoir entre :min et :max items.',
    ],
    'boolean'              => 'Le :attribute du champ doit être vrai ou faux.',
    'confirmed'            => 'Le :attribute de confirmation ne correspond pas.',
    'date'                 => 'Le :attribute est pas une date valable.',
    'date_format'          => 'Le :attribute ne correspond pas au format :format.',
    'different'            => 'Le :attribute et :other doit être différent.',
    'digits'               => 'Le :attribute doit être :digits chiffres.',
    'digits_between'       => 'Le :attribute doit être entre :min et :max chiffres.',
    'dimensions'           => 'Le :attribute a des dimensions incorrectes.',
    'distinct'             => 'Le :attribute existe déjà dans notre base de donnée.',
    'email'                => 'Le :attribute doit être une adresse e-mail valable.',
    'exists'               => 'Le choix :attribute est invalide.',
    'file'                 => 'Le :attribute doit être un fichier.',
    'filled'               => 'Le :attribute doit être rempli.',
    'image'                => 'Le :attribute doit être une image.',
    'in'                   => 'Le choix :attribute est invalide.',
    'in_array'             => 'Le :attribute champ existe pas dans :other.',
    'integer'              => 'Le :attribute doit être un entier.',
    'ip'                   => 'Le :attribute doit être une adresse IP valide.',
    'ipv4'                 => 'Le :attribute doit être une adresse IPv4 valide.',
    'ipv6'                 => 'Le :attribute doit être une adresse IPv6 valide.',
    'json'                 => 'Le :attribute doit être une chaîne JSON valide.',
    'max'                  => [
        'numeric' => 'Le :attribute ne peut pas être supérieur à :max.',
        'file'    => 'Le :attribute ne peut pas être supérieur à :max kilo-octets.',
        'string'  => 'Le :attribute ne peut pas être supérieur à :max caractères.',
        'array'   => 'Le :attribute ne peut pas avoir plus de :max articles.',
    ],
    'mimes'                => 'Le :attribute doit être un fichier de type: :values.',
    'mimetypes'            => 'Le :attribute doit être un fichier de type: :values.',
    'min'                  => [
        'numeric' => 'Le :attribute doit avoir au moins :min.',
        'file'    => 'Le :attribute doit avoir au moins :min kilo-octets.',
        'string'  => 'Le :attribute doit avoir au moins :min caractères.',
        'array'   => 'Le :attribute doit avoir au moins :min articles.',
    ],
    'not_in'               => 'Le choix :attribute est invalide.',
    'numeric'              => 'Le :attribute doit être un nombre.',
    'present'              => 'Le :attribute doit être rempli.',
    'regex'                => 'Le :attribute format est invalide.',
    'required'             => 'Le :attribute est obligatoire.',
    'required_if'          => 'Le :attribute champ est requis lorsque :other est :value.',
    'required_unless'      => 'Le :attribute champ est requis à moins que :other est in :values.',
    'required_with'        => 'Le :attribute champ est requis lorsque :values est présent.',
    'required_with_all'    => 'Le :attribute champ est requis lorsque :values est présent',
    'required_without'     => 'Le :attribute champ est requis lorsque :values n\'est pas présent.',
    'required_without_all' => 'Le :attribute champ est requis lorsque aucun :values sont présent.',
    'same'                 => 'Le :attribute est :other doit correspondre.',
    'size'                 => [
        'numeric' => 'Le :attribute doit être :size.',
        'file'    => 'Le :attribute doit être :size kilo-octets.',
        'string'  => 'Le :attribute doit être :size caractères.',
        'array'   => 'Le :attribute doit contenir :size articles.',
    ],
    'string'               => 'Le :attribute doit être une chaîne.',
    'timezone'             => 'Le :attribute doit être une zone valable.',
    'unique'               => 'Le :attribute a déjà été pris.',
    'uploaded'             => 'Le :attribute échec du téléchargement.',
    'url'                  => 'Le :attribute format n\'est pas valable.',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
