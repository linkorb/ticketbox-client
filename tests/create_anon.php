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

// // Create Anon Ticket
$ticket = new Ticket( $client );
$ticket->setSubject('TicketBox Ticket Subject');
$ticket->setDescription('TicketBox Ticket Description');
$ticket->setUser('TicketBox Ticket User');
$ticket->setEmail('TicketBox Ticket Email');
$ticket->setPhone('TicketBox Ticket Phone');
$ticket->setOrg('TicketBox Ticket Org');


try {
	$ticket->create(); 
} catch( Exception $e ) {
	echo $e->getMessage();
} 


?>