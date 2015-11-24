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

// Get ticket
$ticket = new Ticket( $client );
$ticket->get(4);

try {
	$ticket->transfer(2); 
} catch ( Exception $e ) {
	echo $e->getMessage();
}


?>