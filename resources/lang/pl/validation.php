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

    'accepted' => ':attribute musi zostać zaakceptowany.',
    'active_url' => ':attribute nie jest prawidłowym adresem URL.',
    'after' => ':attribute musi być datą późniejszą niż :date.',
    'after_or_equal' => ':attribute musi być datą późniejszą lub równą :date.',
    'alpha' => ':attribute może zawierać tylko litery.',
    'alpha_dash' => ':attribute może zawierać tylko litery, cyfry, myślniki i podkreślenia.',
    'alpha_num' => ':attribute może zawierać tylko litery i cyfry.',
    'array' => ':attribute musi być tablicą.',
    'before' => ':attribute musi być datą wcześniejszą nię :date.',
    'before_or_equal' => ':attribute musi być datą wcześniejszą lub równą :date.',
    'between' => [
        'numeric' => ':attribute musi być liczbą pomiędzy :min a :max.',
        'file' => ':attribute musi zajmować od :min do :max kilobajtów.',
        'string' => ':attribute musi posiadać od :min do :max znaków.',
        'array' => ':attribute musi posiadać od :min do :max elementów.',
    ],
    'boolean' => ':attribute musi mieć wartość prawda lub fałsz.',
    'confirmed' => 'potwierdzenie pola :attribute nie pasuje.',
    'date' => ':attribute nie jest prawidłową datą.',
    'date_equals' => ':attribute musi być datą równą :date.',
    'date_format' => ':attribute nie pasuje do formatu :format.',
    'different' => ':attribute i :other muszą być różne.',
    'digits' => ':attribute musi posiadać :digits cyfr.',
    'digits_between' => ':attribute musi posiadać od :min do :max cyfr.',
    'dimensions' => ':attribute ma nieprawidłowe wymiary obrazu.',
    'distinct' => ':attribute ma zduplikowaną wartość.',
    'email' => ':attribute musi być prawidłowym adresem e-mail.',
    'ends_with' => ':attribute musi kończyć się jednym z podanych: :values.',
    'exists' => 'Wybrany pole :attribute jest nieprawidłowe.',
    'file' => ':attribute musi być plikiem.',
    'filled' => ':attribute musi mieć wartość.',
    'gt' => [
        'numeric' => ':attribute musi być większe niż :value.',
        'file' => ':attribute musi być większe niż :value kilobajtów.',
        'string' => ':attribute musi mieć więcej niż :value znaków.',
        'array' => ':attribute musi mieć więcej niż :value elementów.',
    ],
    'gte' => [
        'numeric' => ':attribute musi być większe lub równe :value.',
        'file' => ':attribute musi być większy lub równy :value kilobajtów.',
        'string' => ':attribute musi mieć więcej lub :value znaków.',
        'array' => ':attribute musi mieć więcej lub :value elementów.',
    ],
    'image' => ':attribute musi być obrazem.',
    'in' => 'Wybrane pole :attribute jest nieprawidłowe.',
    'in_array' => ':attribute nie istnieje w :other.',
    'integer' => ':attribute musi być liczbą całkowitą.',
    'ip' => ':attribute musi być prawidłowym adresem IP.',
    'ipv4' => ':attribute musi być prawidłowym adresem IPv4.',
    'ipv6' => ':attribute musi być prawidłowym adresem IPv6.',
    'json' => ':attribute musi być prawidłowym ciągiem JSON.',
    'lt' => [
        'numeric' => ':attribute musi być mniejszy niż :value.',
        'file' => ':attribute musi być mniejszy niż :value kilobajtów.',
        'string' => ':attribute musi mieć mniej niż :value znaków.',
        'array' => ':attribute musi mieć mniej niż :value elementów.',
    ],
    'lte' => [
        'numeric' => ':attribute musi być mniejszy lub równy :value.',
        'file' => ':attribute musi być mniejszy lub równy :value kilobajtów.',
        'string' => ':attribute musi mieć mniej lub :value znaków.',
        'array' => ':attribute musi mieć mniej lub :value elementów.',
    ],
    'max' => [
        'numeric' => ':attribute nie może być większy niż :max.',
        'file' => ':attribute nie może być większy niż :max kilobajtów.',
        'string' => ':attribute nie może mieć więcej niż :max znaków.',
        'array' => ':attribute nie może mieć więcej niż :max elementów.',
    ],
    'mimes' => ':attribute musi być plikiem typu: :values.',
    'mimetypes' => ':attribute musi być plikiem typu: :values.',
    'min' => [
        'numeric' => ':attribute musi być minimum :min.',
        'file' => ':attribute musi mieć mimimum :min kilobajtów.',
        'string' => ':attribute musi mieć mimimum :min znaków.',
        'array' => ':attribute musi mieć mimimum :min elementów.',
    ],
    'multiple_of' => ':attribute musi być wielokrotnością :value',
    'not_in' => 'Wybrane pole :attribute jest nieprawidłowe.',
    'not_regex' => 'Format :attribute jest nieprawidłowy.',
    'numeric' => ':attribute musi być liczbą.',
    'password' => 'Hasło jest błędne.',
    'present' => ':attribute musi być obecne.',
    'regex' => 'Format :attribute jest nieprawidłowy.',
    'required' => ':attribute jest wymagane.',
    'required_if' => ':attribute jest wymagane gdy :other to :value.',
    'required_unless' => ':attribute jest wymagane dopóki :other jest w :values.',
    'required_with' => ':attribute jest wymagane gdy :values jest obecne.',
    'required_with_all' => ':attribute jest wymagane gdy :values są obecne.',
    'required_without' => ':attribute jest wymagane :values nie jest obecne.',
    'required_without_all' => ':attribute jest wymagane gdy żadne z :values nie jest obecne.',
    'same' => ':attribute i :other muszą być takie same.',
    'size' => [
        'numeric' => ':attribute musi mieć :size.',
        'file' => ':attribute musi mieć :size kilobajtów.',
        'string' => ':attribute musi mieć :size znaków.',
        'array' => ':attribute musi mieć :size elementów.',
    ],
    'starts_with' => ':attribute musi zaczynać się od jednego z poniższych: :values.',
    'string' => ':attribute musi być ciągiem.',
    'timezone' => ':attribute musi być prawidłową strefą.',
    'unique' => ':attribute został już zajęty.',
    'uploaded' => 'nie udało się przesłać :attribute.',
    'url' => 'format :attribute jest nieprawidłowy.',
    'uuid' => ':attribute musi być prawidłowym identyfikatorem UUID.',

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
