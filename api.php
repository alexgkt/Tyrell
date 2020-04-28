<?php

header('Content-Type: application/json');

// Capture $pax_num parameter & cast pax_num to integer so all non-integer will be 0
$pax_num = isset($_GET['pax_num']) ? (int)$_GET['pax_num'] : '';

// Input Validation

// Fail validation is $pax_num < 1
if ($pax_num < 1) {
    $output = ['error' => 'Input value does not exist or value is invalid'];
    http_response_code(400); // Set status code to 400
    print json_encode($output);
    exit;
}

// Local Deck class
require_once('library/Deck.php');

// Initialise Deck object
$deckObj = new Deck();

if ($pax_num < 53) {
    $pax = $pax_num;
}
else {
    $pax = 52;
    // When pax is more than 52, set the remaining as no cards
    $extra = $pax_num - 52;
}

// Assign cards to pax
$output = $deckObj->assign_cards($pax);

// Append No cards to pax 53 onwards
if (isset($extra)) {
    for ($i=0; $i < $extra; $i++) {
        $output[] = (array)'No Cards';
    }
}

print json_encode(['data' => $output]);
exit;
