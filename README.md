# SMS Služba
### This PHP library is created for sms-sluzba.cz. It will allow you to send SMS safely and easily.

#####  The username and password is login to sms-sluzba.cz
Installation
`composer require frantatacz/smssluzba v0.3`

Using
```php
require_once "vendor/autoload.php";

$sms = new \FrantataCZ\smssluzba\Sms("username", "password");

$sms->new();
$sms->setRecipient("123123123");
$sms->setMessage("Your SMS text");
$sms->send();
```

```php
require_once "vendor/autoload.php";

$template = new \FrantataCZ\smssluzba\Template();
$template->setTemplate("myTemplate", "Hello, my name is {name}.");

$sms = new \FrantataCZ\smssluzba\Sms("username", "password");
$sms->new();
$sms->setRecipient("123123123");
$sms->setMessage($template->getTemplate("myTemplate", ["name" => "John"]));
$sms->send();
```

```php
require_once "vendor/autoload.php";

$template = new \FrantataCZ\smssluzba\Template();
$template->setTemplate("myTemplate", "Hello, my name is {name}.");

$sms = new \FrantataCZ\smssluzba\Sms("username", "password");
$sms->new();

$sms->addRecipients(["111222333", "2223333444", "888999000"]);
$sms->addRecipient("999999999");

$sms->setMessage($template->getTemplate("myTemplate", ["name" => "John"]));
//var_dump($sms->getSMSArray()); => array(2) { ["message"]=> string(23) "Hello, my name is John." ["recipient"]=> array(4) { [0]=> string(9) "111222333" [1]=> string(10) "2223333444" [2]=> string(9) "888999000" [3]=> string(9) "999999999" } }

$sms->send();
```

This library is created to sms-sluzba.cz

