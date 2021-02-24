public function curlCreateFVA() {
        $external_id = 'FVA-'.(new DateTime())->getTimestamp();
        $bank_code = 'BRI';
        $name = 'Candra';

        $url = 'https://agrabudi.com/api/xendit/fva/create';
        $headers = array(
            'Content-type: text/plain',
            'X-Token: 4gr4BUD1',
        );
        $contents = array(
            'external_id' => $external_id,
            'bank_code' => $bank_code,
            'name' => $name
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($contents));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $results = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if($httpcode==200){
            $arrResult = json_decode($results,true);
            if(isset($arrResult)){         
                echo $arrResult['id'].' : '.$arrResult['account_number'];      
            } else { echo $results; }
            
        }    
           
    }
