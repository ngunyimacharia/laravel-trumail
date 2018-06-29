<?php
namespace Mashytski\Trumail;

class Validator{

  protected $api_url;
  protected $api_version;
  protected $api_token;

  public function __construct(){
    $this->api_url = "https://api.trumail.io/";
    $this->api_version = "v2";
    $this->api_token = config('trumail.token');
    if(is_null($this->api_token) || (!strlen($this->api_token)) || empty($this->api_token)){
      abort(401,"Trumail token not set");
    }
  }


  /**
  * Function to check whether an email is valid or not
  */
  public function validate($email){
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
    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $err = curl_error($curl);
    curl_close($curl);

    return (new TrumailResponse($httpcode,$response,$err));
  }

  /**
  * Function to check if email is valid based on response
  */
  private function checkValid($response){
    return ($response->validFormat && $response->deliverable && (!$response->fullInbox) && $response->hostExists) ? true : false;
  }
}
