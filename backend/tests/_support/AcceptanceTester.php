<?php


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = null)
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    public function login($name, $password)
    {   
        $I = $this;
        $I->amOnPage('index.php?r=site%2Flogin');
        $I->fillField('Username', $name);
        $I->fillField('Password', $password);
        $I->click('Login');
        $I->see('Student Attendance System');
        $I->seeInCurrentUrl('index.php');
    } 
}
