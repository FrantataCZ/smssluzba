# SMS Služba
### This PHP library is created for sms-sluzba.cz. It will allow you to send SMS safely and easily.

#####  The username and password is login to sms-sluzba.cz
Installation
`composer require frantatacz/smssluzba v0.4`

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


TryCatch:
```php
require_once "vendor/autoload.php";

$template = new \FrantataCZ\smssluzba\Template();
$template->setTemplate("myTemplate", "Hello, my name is {name}.");

$sms = new \FrantataCZ\smssluzba\Sms("username", "password");
$sms->new();

try {
    $sms->addRecipients(["111222333", "2223333444", "888999000"]);
} catch (\FrantataCZ\smssluzba\Exception $e) {
    // Example error message: Phone number 2223333444 isn't valid.
    // Code: 400
}

try {
    $sms->addRecipient("999999999");
} catch (\FrantataCZ\smssluzba\Exception $e) {
    // Error message: Phone number 999999999 isn't valid.
    // Code: 400
}

try {
    $sms->setMessage($template->getTemplate("myTemplate", ["name" => "John"]));
} catch (\FrantataCZ\smssluzba\Exception $e) {
    // Error message: Text message isn't valid. (Max. 459 char.)
    // Code: 400
}
//var_dump($sms->getSMSArray()); => array(2) { ["message"]=> string(23) "Hello, my name is John." ["recipient"]=> array(4) { [0]=> string(9) "111222333" [1]=> string(10) "2223333444" [2]=> string(9) "888999000" [3]=> string(9) "999999999" } }

try {
    $sms->send();
} catch (\FrantataCZ\smssluzba\Exception $e) {
    // Same error from sms-sluzba
    // 400;1 - Chybné telefonní číslo 111222333
    // 400;2 - Chybí text zprávy
    // 401 - Chybné přihlášení
    // 402 - Nedostatečný kredit
    // 503 - Chyba brány
}
```

This library is created to sms-sluzba.cz

