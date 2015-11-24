<?php

require_once __DIR__ . '/../vendor/autoload.php'; 

use Linkorb\TicketBoxClient\Client as Client;
use Linkorb\TicketBoxClient\Ticket as Ticket;

// get the client
$client = new Client(
    'http://tickets.dev/api/v1/',
    'kishanio',
    '11121992'
);

// Create Ticket with Logged in user
$ticket = new Ticket( $client ); // padidng client
$ticket->setSubject('TicketBox Ticket Subject');
$ticket->setDescription('TicketBox Ticket Description');

try {
	$ticket->create(); 
} catch( Exception $e ) {
	echo $e->getMessage();
} 


?>