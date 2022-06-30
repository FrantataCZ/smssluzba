<?php
require_once("smssluzba.php");

class test {

    public function __construct(\FrantataCZ\smssluzba\smssluzba $smssluzba)
    {
        $smssluzba->newSms();
        $smssluzba->setRecipient("607822399");
        $smssluzba->setMessage("čau");
        $smssluzba->send();
    }
}

$test = new test(new \FrantataCZ\Smssluzba\smssluzba("Frantataf", "sms654"));

