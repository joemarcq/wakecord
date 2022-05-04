<?php
if(isset($_POST['totalpayment'])){
    $amount = $_POST['totalpayment']."00";
    $id = $_POST['id'];
    $returnID = "";
    $curl = curl_init();

    curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.paymongo.com/v1/sources",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\"data\":{\"attributes\":{\"amount\":".$amount.",\"redirect\":{\"success\":\"http://localhost/WakeCords/succesgcash.php?id=".$id."\",\"failed\":\"http://localhost/WakeCords/failedpayment.php\"},\"type\":\"gcash\",\"currency\":\"PHP\"}}}",
    CURLOPT_HTTPHEADER => [
        "Accept: application/json",
        "Authorization: Basic c2tfdGVzdF9mSk5hS2VxalFRRkptelFNelRYdDNCd2o6",
        "Content-Type: application/json"
    ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
    echo "cURL Error #:" . $err;
    } else {
        $json = json_decode($response);
        $returnID = $json->data->id;
        $directurl = $json->data->attributes->redirect->checkout_url;
        header("Location: ".$directurl."");
    }
}else{
    header("Location: http://localhost/WakeCords/purchase.php");
}