<?php
ini_set('display_errors', 1);
// This sample demonstrates how to run a sale request, which combines an
// authorization with a capture in one request.

// Using Composer-generated autoload file.
//require __DIR__ . '/../vendor/autoload.php';
// Or, uncomment the line below if you're not using Composer autoloader.
require_once(__DIR__ . '/../lib/CybsSoapClient.php');


// Before using this example, you can use your own reference code for the transaction.
$referenceCode = '14344';

$client = new CybsSoapClient();
$request = $client->createRequest($referenceCode);

// Build a sale request (combining an auth and capture). In this example only
// the amount is provided for the purchase total.
$ccAuthService = new stdClass();
$ccAuthService->run = 'true';
$request->ccAuthService = $ccAuthService;

$ccCaptureService = new stdClass();
$ccCaptureService->run = 'true';
$request->ccCaptureService = $ccCaptureService;

$billTo = new stdClass();
$billTo->firstName = '翰民';
$billTo->lastName = '韓';
$billTo->street1 = '1295 Charleston Road';
$billTo->city = 'Mountain View';
$billTo->state = 'CA';
$billTo->postalCode = '94043';
$billTo->country = 'US';
$billTo->email = 'null@cybersource.com';
$billTo->ipAddress = '10.7.111.111';
$request->billTo = $billTo;

$card = new stdClass();
$card->accountNumber = '4111111111111111';
$card->expirationMonth = '12';
$card->expirationYear = '2020';
$card->verificationNumber = '005';
$request->card = $card;

$purchaseTotals = new stdClass();
$purchaseTotals->currency = 'MOP';
$purchaseTotals->grandTotalAmount = '90.00';
$request->purchaseTotals = $purchaseTotals;

print_r($request);
$reply = $client->runTransaction($request);
//$reply = $client->runTransactionFromFile("xml/test.xml", $referenceCode);

// This section will show all the reply fields.
echo '<pre>';
print("\nRESPONSE: " . print_r($reply, true));
echo '</pre>';
