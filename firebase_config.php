<?php
require __DIR__.'/vendor/autoload.php'; // Include Firebase PHP SDK

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

// Firebase configuration details
$firebaseConfig = array(
    'apiKey' => 'AIzaSyDZ4IjtvPGypB84evukROyNHwBvkhGyBkM',
    'authDomain' => 'alif-ac574.firebaseapp.com',
    'databaseURL' => 'https://alif-ac574-default-rtdb.firebaseio.com',
    'projectId' => 'alif-ac574',
    'storageBucket' => 'alif-ac574.appspot.com',
    'messagingSenderId' => '261987716644',
    'appId' => '1:261987716644:web:02d0beeee8a04f998a12b1'
);

$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/firebase_credentials.json');

$firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->withDatabaseUri($firebaseConfig['databaseURL']) // Set the database URL from the configuration
    ->create();

$database = $firebase->getDatabase();
?>
