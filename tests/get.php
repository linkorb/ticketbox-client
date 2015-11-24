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

// Create Anon Ticket
$ticket = new Ticket( $client );


$ticket->get(1);
echo $ticket->getSubject(); // all the field null if not found. 

$activities = $ticket->getActivity();
var_dump($activities);

?>