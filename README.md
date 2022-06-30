# SMS Služba
### This PHP library is created for sms-sluzba.cz. It will allow you to send SMS safely and easily.

#####  The username and password is login to sms-sluzba.cz
Installation
`composer require frantatacz/smssluzba v0.2`

Using
```php
require_once "vendor/autoload.php";

$sms = new \FrantataCZ\Sms("username", "password");

$sms->new();
$sms->setRecipient("123123123");
$sms->setMessage("Your SMS text");
$sms->send();
```

```php
require_once "vendor/autoload.php";

$template = new \FrantataCZ\Template();
$template->setTemplate("myTemplate", "Hello, my name is {name}.");

$sms = new \FrantataCZ\Sms("username", "password");
$sms->new();
$sms->setRecipient("123123123");
$sms->setMessage($template->getTemplate("myTemplate", ["name" => "John"]));
$sms->send();
```

This library is created to sms-sluzba.cz

