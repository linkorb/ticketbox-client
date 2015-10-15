<?php

require_once __DIR__ . '/../vendor/autoload.php'; 

use Linkorb\TicketBoxClient\Client as TicketBoxClient;
use Linkorb\TicketBoxClient\Ticket as TicketBoxTicket;

// get the client
$client = new TicketBoxClient(
    'http://tickets.dev/api/v1/',
    'kishanio',
    '11121992'
);

// // Create Ticket with Logged in user
$ticket = new TicketBoxTicket();
$ticket->setSubject('TicketBox Ticket Subject');
$ticket->setDescription('TicketBox Ticket Description');
$ticket->create( $client->get() ); // pass client

// // Create Anon Ticket
$ticket = new TicketBoxTicket();
$ticket->setSubject('TicketBox Ticket Subject');
$ticket->setDescription('TicketBox Ticket Description');
$ticket->setUser('TicketBox Ticket User');
$ticket->setEmail('TicketBox Ticket Email');
$ticket->setPhone('TicketBox Ticket Phone');
$ticket->setOrg('TicketBox Ticket Org');
$ticket->create( $client->get() ); // pass client

// Get error
$error = $ticket->getError();

$newAnonTicket = $ticket->getId();

// Get ticket
$ticket = new TicketBoxTicket();
$ticket->setId($newAnonTicket);
$ticket->get( $client->get() ); // pass client

echo $ticket->getSubject();

// Get ticket Activity
$activity = $ticket->getActivity( $client->get() ); // Activiy in form off array
var_dump($activity);

?>