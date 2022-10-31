<?php
// require 'vendor/autoload.php';
// use Mailgun\Mailgun;
// // First, instantiate the SDK with your API credentials
// $mg = Mailgun::create('77a6d88139cf09522152f0d94e5a01ac-8845d1b1-7aeeeb95'); // For US servers
// $mg = Mailgun::create('77a6d88139cf09522152f0d94e5a01ac-8845d1b1-7aeeeb95', 'https://api.mailgun.net/v3/sandbox6dbe3056fe484699be76e43272b4a7e5.mailgun.org'); // For EU servers

// // Now, compose and send your message.
// // $mg->messages()->send($domain, $params);
// $mg->messages()->send('example.com', [
//   'from'    => 'mailgun@sandbox6dbe3056fe484699be76e43272b4a7e5.mailgun.org',
//   'to'      => 'muhammed.fahis.bca@gmail.com',
//   'subject' => 'The PHP SDK is awesome!',
//   'text'    => 'It is so simple to send a message.'
// ]);

# Include the Autoloader (see "Libraries" for install instructions)
require 'vendor/autoload.php';
use Mailgun\Mailgun;
$client= new \GuzzleHttp\Client([
    'verify'=> false,
]);


$mgClient = new Mailgun('77a6d88139cf09522152f0d94e5a01ac-8845d1b1-7aeeeb95');
$domain = "sandbox6dbe3056fe484699be76e43272b4a7e5.mailgun.org";
# Make the call to the client.
$result = $mgClient->sendMessage($domain, array(
	'from'	=> 'Excited User <mailgun@sandbox6dbe3056fe484699be76e43272b4a7e5.mailgun.org>',
	'to'	=> 'Baz <muhammed.fahis.bca@gmail.com>',
	'subject' => 'Hello',
	'text'	=> 'Testing some Mailgun awesomness!'
));
?>