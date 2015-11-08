<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('log in as regular user');
$I->amOnPage('/web/index.php?r=site%2Flogin');
$I->fillField('Username','shafiq');
$I->fillField('Password','Takjugak6799');
$I->click('Login');
$I->see('Hello World');
?>
