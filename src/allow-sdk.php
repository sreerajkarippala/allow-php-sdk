<?php

class encube
{
    private $apikey;
    private $apiId;
    private $apiUrl;

    public function __construct($api_id, $api_key, $api_url = 'http://allow.karippal.in/api')
    {
        $this->apiId = $api_id;
        $this->apiKey = $api_key;
        $this->apiUrl = $api_url;
    }

    public function request_create($sent_to, $message)
    {
        $data = array(
          'api_id' => $this->apiId,
          'sent_to' => $sent_to,
          'message' => $message,
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $this->apiUrl.'/request/create',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
          ),
          CURLOPT_POSTFIELDS => json_encode($data),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return $err;
        } else {
            return $response;
        }
    }

    public function request_cancel($request_id)
    {
        $data = array(
          'api_id' => $this->appId,
          'request_id' => $request_id,
        );

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => $this->apiUrl.'/request/delete',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
          ),
          CURLOPT_POSTFIELDS => json_encode($data),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return $err;
        } else {
            return $response;
        }
    }

    public function request_status_url($request_id)
    {
        return $apiUrl.'?api_id='.$this->apiId.'&request_id='.$request_id;
    }
}
