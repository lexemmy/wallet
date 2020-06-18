




<form method="POST" action="index.php">

<label>network</label><input type="text" name="network"> <br>
<label>number</label><input type="number" name="number"> <br>
<label>amount</label><input type="number" name="amount"> <br>
<button type="submit" name="submit">submit</button>

</form>




<?php

 if (isset($_POST['submit'])) {

        $amount = $_POST['amount'];
        $network = $_POST['network'];
        $number = $_POST['number'];
        $key = "hfucj5jatq8h";
       



    
      }


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://sandbox.wallets.africa/bills/airtime/purchase",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'Code'=>$network,
    'Amount'=>$amount,
    'PhoneNumber'=>$number,
    'SecretKey'=>$key,
    
  ]),

  
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "Authorization: Bearer uvjqzm5xl6bw"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$transaction = json_decode($response);


$reply = $transaction->Message;

echo $reply;


?>