<?php
include("./jsonRPCClient.php");
$bitcoin = new jsonRPCClient('http://Username:Password@127.0.0.1:8888');

/*      Account in wallet to send from, label of address      */
/*  Important: You must have coins on the account specified.  */

$account = 'Payout';
$amount = floatval('0.00000001');

$addressfile = "./addresslist.txt";
$recipients = array();
$filelines = file($addressfile);
foreach($filelines as $fileline => $address) {
   $recipients[$address] = $amount;
}
$Transaction_ID = $bitcoin->sendmany($account,$recipients);

echo 'The Transaction ID is: '.$Transaction_ID;
?>