


 <h1 style="text-align:center">Wallet API </h1>
    <form method="POST" action='index.php'>
      <fieldset>
      <legend>Airtime Top-up</legend>
        <div class="input-wrapper">
          <label for="phone" class='required-input'>Phone Number</label>
          <input class="form-control" type="number" name="number" id="number" min=11 max=11 placeholder="Phone Number" required>
        </div>
        <div class="input-wrapper">
          <label for="Amount" class='required-input'>Amount</label>
          <input class="form-control" type="number" name="amount" id="amount" placeholder="Amount" required>
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

        $mtn = array('0703', '0706', '0701', '0803', '0806', '0903', '0906');
        $airtel = array('0702', '0704', '0708', '0802', '0804', '0901', '0907');
        $mobile9 = array('0702', '0706', '0701', '0803', '0806', '0903', '0906');
        $glo = array('0702', '0706', '0701', '0803', '0806', '0903', '0906');

        //get user input
        $amount = $_POST['amount'] ?? "";
        $network = $_POST['network'] ?? "";
        $number =  "";//$_POST['number'] ?? "";
        $key = "hfucj5jatq8h";

        if($amount < 50){
            echo "Please enter value above =N=50.00";
        }
        
        for($i=0; $i < count($mtn); $i++){
          if($i == substr($number,0,3)){
            $network = "MTN";
          }else{ echo "Invalid number";}
        }
        for($i=0; $i < count($mobile9); $i++){
          if($i == substr($number,0,3)){
            $network = "9mobile";
          }else{ echo "Invalid number";}
        }
        for($i=0; $i < count($airtel); $i++){
          if($i == substr($number,0,3)){
            $network = "Airtel";
          }else{ echo "Invalid number";}
        }

        for($i=0; $i < count($glo); $i++){
          if($i == substr($number,0,3)){
            $network = "GLO";
          }else{ echo "Invalid number";}
        }
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