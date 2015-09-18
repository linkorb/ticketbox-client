TicketBox Client
==============

Create tickets for TicketBox and view activities from your application

## Installation
```
composer require linkorb/ticketbox-client
```

## Example
```php
use Linkorb\TicketBoxClient\Client as TicketBoxClient;
use Linkorb\TicketBoxClient\Ticket as TicketBoxTicket;

// get the client
$client = new TicketBoxClient(
    < TicketBox API URL >,
    < TicketBox Username >,
    < TicketBox Passwor >'
);

// Create Ticket with Logged in user
$ticket = new Ticket();
$ticket->setSubject( < TicketBox Ticket Subject > );
$ticket->setDescription( < TicketBox Ticket Description > );
$ticket->create( $client->get() ); // pass client 

// Create Anon Ticket 
$ticket = new Ticket();
$ticket->setSubject( < TicketBox Ticket Subject > );
$ticket->setDescription( < TicketBox Ticket Description > );
$ticket->setUser( < TicketBox Ticket User > );
$ticket->setEmail( < TicketBox Ticket Email > );
$ticket->setPhone( < TicketBox Ticket Phone > );
$ticket->setOrg( < TicketBox Ticket Org > );
$ticket->create( $client->get() ); // pass client 

// Get ticket
$ticket = new Ticket();
$ticket->setId( < TicketBox Id > );
$ticket->get( $client->get() ); // pass client 

// Get ticket Activity 
$ticket->getActivity( $client->get() ); // Activiy in form off array 
```