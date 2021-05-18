<?php

class Waapi extends CI_Model
{

  public function kirimWablas($phone,$msg)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://whatsapp-norman.herokuapp.com/send-message',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('number' => $phone,'message' => $msg),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;
  }

  public function kirimWablasfile($phone,$msg,$file){

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://whatsapp-norman.herokuapp.com/send-media',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('number' => $phone,'caption' => $msg,'file' => $file),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;
  }

}