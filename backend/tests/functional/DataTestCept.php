<?php 
$I = new FunctionalTester($scenario);
$I->seeInDatabase('student', array('student_name' => 'Ali Baba', 'student_email' => 'siap_kau@yahoo.com'));
?>
