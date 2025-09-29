<?php


return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
	 | Antes de usar, sete 'locale' para 'pt' em config/app.php
 	 |
    */

    'accepted'             => ':attribute deve ser aceito.',
    'active_url'           => ':attribute não é uma URL válida.',
    'after'                => ':attribute deve ser uma data depois de :date.',
    'alpha'                => ':attribute somente pode conter letras.',
    'alpha_dash'           => ':attribute somente pode conter letras, números, e hífens.',
    'alpha_num'            => ':attribute somente pode conter letras e números.',
    'array'                => ':attribute deve ser um array.',
    'before'               => ':attribute presa ser uma data antes de :date.',
    'between'              => [
        'numeric' => ':attribute deve ser entre :min e :max.',
        'file'    => ':attribute deve ser entre :min e :max kilobytes.',
        'string'  => ':attribute deve ser entre :min e :max caracteres.',
        'array'   => ':attribute must have between :min e :max itens.',
    ],
    'boolean'              => ':attribute deve ser falso ou verdadeiro',
    'confirmed'            => 'Confirmação de :attribute não confere',
    'date'                 => ':attribute não é uma data válida.',
    'date_format'          => ':attribute não é um formato (:format) válido.',
    'different'            => ':attribute e :other precisam ser diferentes.',
    'digits'               => ':attribute precisa ter :digits digitos.',
    'digits_between'       => ':attribute precisa estar entre :min e :max dígitos.',
    'dimensions'           => ':attribute tem dimensões erradas.',
    'distinct'             => ':attribute contém um valor duplicado.',
    'email'                => ':attribute deve ser um e-mail válido.',
    'exists'               => ':attribute selecionado é inválido.',
    'file'                 => ':attribute deve ser um arquivo.',
    'filled'               => ':attribute field is required.',
    'image'                => ':attribute deve ser uma imagem.',
    'in'                   => ':attribute selecionado é inválido.',
    'in_array'             => 'campo :attribute não existe em :other.',
    'integer'              => ':attribute deve ser um número inteiro.',
    'ip'                   => ':attribute deve ser um endereço IP válido.',
    'json'                 => ':attribute deve ser uma string JSON válida.',
    'max'                  => [
        'numeric' => 'O campo :attribute não pode ser maior que :max.',
        'file'    => 'O campo :attribute não pode ser maior que :max kilobytes.',
        'string'  => 'O campo :attribute não pode ter mais de :max caracteres.',
        'array'   => 'O campo :attribute não pode ser have more than :max itens.',
    ],
    'mimes'                => 'O campo :attribute deve ser um arquivo do tipo :values.',
    'mimetypes'            => 'O campo :attribute deve ser um arquivo do tipo :values.',
    'min'                  => [
        'numeric' => 'O campo :attribute precisa conter pelo menos :min.',
        'file'    => 'O campo :attribute precisa ter pelo menos :min kilobytes.',
        'string'  => 'O campo :attribute precisa conter pelo menos :min caracteres.',
        'array'   => 'O campo :attribute precisa ter pelo menos :min itens.',
    ],
    'not_in'               => 'O :attribute selecionado é inválido.',
    'numeric'              => 'O campo :attribute deve ser um número.',
    'present'              => 'O campo :attribute deve estar presente.',
    'regex'                => 'O campo :attribute contém um formato inválido.',
    'required'             => 'O campo :attribute é obrigatório.',
    'required_if'          => 'O campo :attribute é obrigatório quando :other é :value.',
    'required_unless'      => 'O campo :attribute é obrigatório a não ser que :other esteja em :values.',
    'required_with'        => 'O campo :attribute é obrigatório quando :values existir.',
    'required_with_all'    => 'O campo :attribute é obrigatório quando :values existir.',
    'required_without'     => 'O campo :attribute é obrigatório quando :values não existir.',
    'required_without_all' => 'O campo :attribute é obrigatório quando nenhum dos :values existirem.',
    'same'                 => 'O campo :attribute e :other precisam ser iguais.',
    'size'                 => [
        'numeric' => 'O campo :attribute deve ser :size.',
        'file'    => 'O campo :attribute deve ser :size kilobytes.',
        'string'  => 'O campo :attribute deve conter :size caracteres.',
        'array'   => 'O campo :attribute deve conter :size itens.',
    ],
    'string'               => 'O campo :attribute deve ser uma string.',
    'timezone'             => 'O campo :attribute deve conter um fuso horário válido.',
    'unique'               => 'O campo :attribute já existe.',
    'uploaded'             => 'O campo :attribute falhou no upload.',
    'url'                  => 'O formato do campo :attribute não é válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | Nomes em português dos atributos, caso eles sejam em inglês ou deseje
    | trocar ele na mensagem.
    |
    */

	 'attributes' => [
		 'email' => 'e-mail',
		 'name' => 'nome',
		 'password' => 'senha',
		 'password_confirm' => 'confirmação de senha',
		 'message' => 'mensagem'
	 ],

];
/*return [


    'accepted' => 'O atributo deve ser aceito.',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => 'O atributo : não é um URL válido.',
    'after' => 'O atributo deve ser uma data após a data.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute must only contain letters.',
    'alpha_dash' => 'The :attribute must only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute must only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'ascii' => 'The :attribute must only contain single-byte alphanumeric characters and symbols.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'array' => 'The :attribute must have between :min and :max items.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'numeric' => 'O atributo : deve estar entre : min e : max.',
        'string' => 'O atributo : deve estar entre : min e : max caracteres.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'current_password' => 'The password is incorrect.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'decimal' => 'The :attribute must have :decimal decimal places.',
    'declined' => 'The :attribute must be declined.',
    'declined_if' => 'The :attribute must be declined when :other is :value.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'doesnt_end_with' => 'The :attribute may not end with one of the following: :values.',
    'doesnt_start_with' => 'The :attribute may not start with one of the following: :values.',
    'email' => 'The :attribute must be a valid email address.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'enum' => 'The selected :attribute is invalid.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'array' => 'The :attribute must have more than :value items.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'numeric' => 'The :attribute must be greater than :value.',
        'string' => 'The :attribute must be greater than :value characters.',
    ],
    'gte' => [
        'array' => 'The :attribute must have :value items or more.',
        'file' => 'The :attribute must be greater than or equal to :value kilobytes.',
        'numeric' => 'The :attribute must be greater than or equal to :value.',
        'string' => 'The :attribute must be greater than or equal to :value characters.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lowercase' => 'The :attribute must be lowercase.',
    'lt' => [
        'array' => 'The :attribute must have less than :value items.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'numeric' => 'The :attribute must be less than :value.',
        'string' => 'The :attribute must be less than :value characters.',
    ],
    'lte' => [
        'array' => 'The :attribute must not have more than :value items.',
        'file' => 'The :attribute must be less than or equal to :value kilobytes.',
        'numeric' => 'The :attribute must be less than or equal to :value.',
        'string' => 'The :attribute must be less than or equal to :value characters.',
    ],
    'mac_address' => 'The :attribute must be a valid MAC address.',
    'max' => [
        'array' => 'The :attribute must not have more than :max items.',
        'file' => 'The :attribute must not be greater than :max kilobytes.',
        'numeric' => 'The :attribute must not be greater than :max.',
        'string' => 'The :attribute must not be greater than :max characters.',
    ],
    'max_digits' => 'The :attribute must not have more than :max digits.',
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'array' => 'The :attribute must have at least :min items.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'numeric' => 'The :attribute must be at least :min.',
        'string' => 'The :attribute must be at least :min characters.',
    ],
    'min_digits' => 'The :attribute must have at least :min digits.',
    'missing' => 'The :attribute field must be missing.',
    'missing_if' => 'The :attribute field must be missing when :other is :value.',
    'missing_unless' => 'The :attribute field must be missing unless :other is :value.',
    'missing_with' => 'The :attribute field must be missing when :values is present.',
    'missing_with_all' => 'The :attribute field must be missing when :values are present.',
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'password' => [
        'letters' => 'The :attribute must contain at least one letter.',
        'mixed' => 'The :attribute must contain at least one uppercase and one lowercase letter.',
        'numbers' => 'The :attribute must contain at least one number.',
        'symbols' => 'The :attribute must contain at least one symbol.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => 'The :attribute field must be present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_array_keys' => 'The :attribute field must contain entries for: :values.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_if_accepted' => 'The :attribute field is required when :other is accepted.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'array' => 'The :attribute must contain :size items.',
        'file' => 'The :attribute must be :size kilobytes.',
        'numeric' => 'The :attribute must be :size.',
        'string' => 'The :attribute must be :size characters.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid timezone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'uppercase' => 'The :attribute must be uppercase.',
    'url' => 'The :attribute must be a valid URL.',
    'ulid' => 'The :attribute must be a valid ULID.',
    'uuid' => 'The :attribute must be a valid UUID.',


    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],


    'attributes' => [],

]; */
