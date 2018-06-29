<?php
namespace Mashytski\Trumail;

use stdClass;

class Validator{

  protected $api_url = "https://api.trumail.io/";
  protected $api_version = "v2";
  protected $api_token = "8ddb6adf-c9af-487b-aeaf-cc61b742c871";


  /**
  * Function to check whether an email is valid or not
  */
  public function validate($email = 'email@example.com'){
    $url  = $this->api_url.$this->api_version."/lookups/json?";
    $url .= "email=".$email;
    $url .= "&token=".$this->api_token;
    return $this->sendGet($url);
  }


  /**
  * Function to send HTTP GET request
  */
  private function sendGet($url){
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_TIMEOUT => 30000,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_CUSTOMREQUEST => "GET",
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
      return ['status'=>0,'response'=> $err];
    } else {
      return ['status'=>1,'response'=> json_decode($response)];
    }
  }

}
