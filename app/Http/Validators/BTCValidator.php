<?php

namespace App\Http\Validators;

class BTCValidator {

    public function validateAddress($attribute, $value, $parameters, $validator)
    {
    	$handle = curl_init("https://blockchain.info/address/$value");
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_HEADER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($handle, CURLOPT_NOBODY, 1);

        $response = curl_exec($handle);
        $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        curl_close($handle);
        return $httpCode == 200;
    }

}
