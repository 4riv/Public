public function curlSendWA() {
        $noHP = '085318866666';
        $message = 'Candra Dedi Saputra';
        
        $url = 'https://agrabudi.com/api/zenziva/wa'; //untuk sms url [/wa] nya ganti jadi [/sms]
        $headers = array(
            'Content-type: text/plain',
            'X-Token: 4gr4BUD1',
        );
        $contents = array(
            'noHP' => $noHP,
            'message' => $message
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
                echo $arrResult['text'];      
            } else { echo $results; }
            
        }    
           
    }
