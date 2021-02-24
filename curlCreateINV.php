public function curlCreateINV() {
        $external_id = 'INV-'.(new DateTime())->getTimestamp();
        $amount = '25000';
        $payer_email = 'developers.agrabudi@gmail.com';
        $description = 'Vaksinasi COVID-19';
        $callback_virtual_account_id = '6035e6d21f958d402ad70fd4';

        $url = 'https://agrabudi.com/api/xendit/inv/create';
        $headers = array(
            'Content-type: text/plain',
            'X-Token: 4gr4BUD1',
        );
        $contents = array(
            'external_id' => $external_id,
            'amount' => $amount,
            'payer_email' => $payer_email,
            'description' => $description,
            'callback_virtual_account_id' => $callback_virtual_account_id
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
                echo $arrResult['id'].' : '.$arrResult['invoice_url'].' : '.$arrResult['expiry_date'];      
            } else { echo $results; }
            
        }    
           
    }
