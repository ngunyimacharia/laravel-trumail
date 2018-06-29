<?php

namespace Mashytski\Trumail;

class TrumailResponse{

  public $status;

  public function __construct($code,$response,$err=null){
    $this->status = $code;
    $this->t_response = json_decode($response);
    $this->setResponse();
  }

  /**
  * Function to set response
  */
  private function setResponse(){
    if($this->status === 200){
      $validity = $this->checkValid();
      if($validity === true){
        $this->isValid = true;
      }else{
        $this->isValid = false;
        $this->invalid_reason = $validity;
      }
    }else{
      $this->error = $this->t_response ? $this->t_response->message : $this->t_response;
    }
    unset($this->t_response);
  }

  /**
  * Function to check if email is valid based on response
  */
  private function checkValid(){

    $error_responses = config('trumail.error_responses')[config('trumail.lang')];

    if(!$this->t_response->validFormat){
      $return = $error_responses['format'];
    }
    if(!$this->t_response->deliverable){
      $return = $error_responses['delivery'];
    }
    if($this->t_response->fullInbox){
      $return = $error_responses['inbox'];
    }
    if(!$this->t_response->hostExists){
      $return = $error_responses['host'];
    }

    return ($return ?: true);
  }

}
