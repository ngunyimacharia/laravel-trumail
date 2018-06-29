<?php

return [

  /*
  |--------------------------------------------------------------------------
  | Trumail Token
  |--------------------------------------------------------------------------
  |
  | This is the token used to access the trumail.io api.
  | To generate a token, create an account and login to https://trumail.io
  | Copy the api token in the 'API Tokens' section
  |
  |
  */

  'token' => env('TRUMAIL_TOKEN',null),

  /*
  |--------------------------------------------------------------------------
  | Trumail Language
  |--------------------------------------------------------------------------
  |
  | This is the language to be used in rendering the trumail responses
  | Currently we only support American English.
  | You may propose a new language by contacting me directly or be contributing to this project
  | You may also add your desired lang to the response configuration below
  |
  */

  'lang' => env('TRUMAIL_LANG','en_US'),

  /*
  |--------------------------------------------------------------------------
  | Trumail Responses
  |--------------------------------------------------------------------------
  |
  | These are the response messages that will be returned an error has been detected
  | Currently we only support American English.
  | You may propose a new language by contacting me directly or be contributing to this project
  | You may also add your desired lang to the response configuration below
  |
  */

  'error_responses' => [

    'en_US' => [
      'format' => 'Invalid email format',
      'delivery' => 'Email address not deliverable',
      'inbox' => 'Email address inbox full',
      'host' => 'Email address host/domain doesn\'t exist'
    ]

  ],

];
