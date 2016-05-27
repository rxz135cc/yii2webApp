<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('See Home Page');
$I->amOnPage('index.php');
$I->See('Login');
$I->See('makkohijo');
$I->dontSee('Medical Certificate');
?>