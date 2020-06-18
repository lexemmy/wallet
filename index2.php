<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;1,300&display=swap"
    rel="stylesheet">
  <title>Wallet API| Airtime top-up</title>
</head>

<body>
  <div class="form-container">
    <h1 style="text-align:center">Wallet API </h1>
    <form action="index.php" method="POST" class='slide'>
      <fieldset>
      <legend>Airtime Top-up</legend>
        <div class="input-wrapper">
          <label for="phone" class='required-input'>Phone Number</label>
          <input type="number" name="number" id="phone" placeholder="Phone number" required>
        </div>
        <div class="input-wrapper">
          <label for="Amount" class='required-input'>Amount</label>
          <input type="number" name="amount" id="amount" placeholder="Phone Number" required>
        </div>
        <div class="input-wrapper">
          <label for="phone" class='required-input'>Network</label>
          <select name="network" id="network">
            <option name="mtn" value="mtn">MTN</option>
            <option name="glo" value="glo">GLO</option>
            <option  name="etisalat"value="etisalat">9mobile</option>
            <option  name="airtel"value="airtel">Airtel</option>
          </select>
        </div>
        <button type='button' value="submit" name="submit">Top-up</button>
      </legend>
      </fieldset>
    </form>
  </div>
</body>

</html>




<?php

 if (isset($_POST['submit'])) {

        $amount = $_POST['amount'];
        $network = $_POST['network'];
        $number = $_POST['number'];
        $key = "hfucj5jatq8h";
       



    
      


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
}

?>