# TicketBox Client

Create tickets for TicketBox and view activities from your application

## Installation

```
composer require linkorb/ticketbox-client
```

## Example

Create Client 

```php
require_once __DIR__ . '/../vendor/autoload.php'; 

use Linkorb\TicketBoxClient\Client as Client;
use Linkorb\TicketBoxClient\Ticket as Ticket;

// get the client
$client = new Client(
    'http://tickets.dev/api/v1/',
    <username>,
    <password>
);
```
Create Ticket by logged in User

```php
// Create Ticket with Logged in user
$ticket = new Ticket( $client ); // padidng client
$ticket->setSubject(<ticket subject>);
$ticket->setDescription(<ticket descripton>);

try {
	$ticket->create(); 
} catch( Exception $e ) {
	echo $e->getMessage();
} 
```

Create ticket by Anonymous user

```php
// Create Anon Ticket
$ticket = new Ticket( $client );
$ticket->setSubject(<ticket subject>);
$ticket->setDescription(<ticket descripton>);
$ticket->setUser(<ticket user full name>);
$ticket->setEmail(<ticket email>);
$ticket->setPhone(<ticket phone>);
$ticket->setOrg(<ticket org>);

try {
	$ticket->create(); 
} catch( Exception $e ) {
	echo $e->getMessage();
} 
```

Get Ticket & its activities

```php
// Create Anon Ticket
$ticket = new Ticket( $client );

$ticket->get(<ticket id>);
echo $ticket->getSubject(); // all the field null if not found. 

$activities = $ticket->getActivity(); // get activities
var_dump($activities);
```

Change status of ticket 

```php
// Get ticket
$ticket = new Ticket( $client );
$ticket->get(5);

try {
	$ticket->setPending(); 
	// $ticket->setClose(); 
	// $ticket->setSchedule(); 

} catch ( Exception $e ) {
	echo $e->getMessage();
}
```

Message ticket

```php
// Get ticket
$ticket = new Ticket( $client );
$ticket->get(<ticket id>);

try {
	
	$ticket->message( <ticket message> ); 

} catch ( Exception $e ) {
	echo $e->getMessage();
}
```

Transfer Ticket

```php
// Get ticket
$ticket = new Ticket( $client );
$ticket->get(<ticket id>);

try {
	$ticket->transfer(<queue id>); 
} catch ( Exception $e ) {
	echo $e->getMessage();
}
```

## Brought to you by the LinkORB Engineering team

<img src="http://www.linkorb.com/d/meta/tier1/images/linkorbengineering-logo.png" width="200px" /><br />
Check out our other projects at [engineering.linkorb.com](http://engineering.linkorb.com).

Btw, we're hiring!
