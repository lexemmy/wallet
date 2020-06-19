<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;1,300&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Wallet API| Airtime top-up</title>
</head>

<body>
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="pricing-header mt-3 px-3 py-3 pt-md-5 pb-md-4 mx-auto" style="background-color: indigo; color: #fff;">
       <h1 style="text-align:center">Wallet API </h1>
    <form method="POST" action='index.php'>
      <fieldset>
      <legend>Airtime Top-up</legend>
        <div class="input-wrapper">
          <label for="phone" class='required-input'>Phone Number</label>
          <input class="form-control" type="number" name="number" id="number" placeholder="Phone number" required>
        </div>
        <div class="input-wrapper">
          <label for="Amount" class='required-input'>Amount</label>
          <input class="form-control" type="number" name="amount" id="amount" placeholder="Amount" required>
        </div>
        <div class="input-wrapper">
          <label for="phone" class='required-input'>Network</label>
          <select class="form-control" name="network" id="network">
            <option name="network" value="MTN-ng">MTN</option>
            <option name="network" value="GLO">GLO</option>
            <option  name="network"value="9mobile">9mobile</option>
            <option  name="network"value="Airtel">Airtel</option>
          </select>
        </div>
        <button class="btn btn-sm btn-primary form-control" type="submit" name="submit">Top Up</button>

       
        

      </legend>
      </fieldset>
    </form>
  </div>
    </div>
    <div class="col-md-3"></div>
  </div>
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
          echo '<div class="container">  <div class="row">';
          echo '<div class="col-md-3"></div>';
          echo '<div class="col-md-6">';
         echo  '<button class="btn btn-sm form-control btn-success mt-3">';
         echo $reply;
         echo '</button>';
         echo '</div>';
         echo '<div class="col-md-3"></div>';
         echo '</div> </div>';
       
         

}

?>