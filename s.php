


 <h1 style="text-align:center">Wallet API </h1>
    <form method="POST" action='s.php'>
      <fieldset>
      <legend>Airtime Top-up</legend>
        <div class="input-wrapper">
          <label for="phone" class='required-input'>Phone Number</label>
          <input type="number" name="number" id="number" placeholder="Phone number" required>
        </div>
        <div class="input-wrapper">
          <label for="Amount" class='required-input'>Amount</label>
          <input type="number" name="amount" id="amount" placeholder="Phone Number" required>
        </div>
        <div class="input-wrapper">
          <label for="phone" class='required-input'>Network</label>
          <select name="network" id="network">
            <option name="network" value="MTN-ng">MTN</option>
            <option name="network" value="GLO">GLO</option>
            <option  name="network"value="9mobile">9mobile</option>
            <option  name="network"value="Airtel">Airtel</option>
          </select>
        </div>
        <button type="submit" name="submit">submit</button>
      </legend>
      </fieldset>
    </form>




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