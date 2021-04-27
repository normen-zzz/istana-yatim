<?php

class Kirim extends CI_Model
{

public function kirimWablas($phone,$msg)
{
        $link  =  "https://us.wablas.com/api/send-message";
        $data = [
        'phone' => $phone,
        'message' => $msg,
        ];
         
         
        $curl = curl_init();
        $token =  "dc19hFpvwqrdLB149RGCwSiUbaqNeddXsvDW32wOMGzXhYNlrqKfwdq92KDWV3oO";
 
        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array(
                "Authorization: $token",
            )
        );
        curl_setopt($curl, CURLOPT_URL, $link);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data)); 
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        curl_close($curl); 
        return $result;
}

}