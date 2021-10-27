<?php

class Waapi extends CI_Model
{

  public function kirimWablas($phone,$msg)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://whatsapp-istana-yatim.herokuapp.com/send-message',
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
      CURLOPT_URL => 'https://whatsapp-istana-yatim.herokuapp.com/send-media',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('number' => $phone,'caption' => $msg,'file' => './assets/images/wa/'.$file),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;

  }

  private function custom_curl_file_create($filename, $mimetype = '', $postname = '')
{
    if($mimetype=='') {
        $mimetype = mime_content_type($filename);
    }
    return "@$filename;filename="
        . ($postname ?: basename($filename))
        . ($mimetype ? ";type=$mimetype" : '');
}

}