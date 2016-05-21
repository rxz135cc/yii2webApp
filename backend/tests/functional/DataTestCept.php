<?php 
$I = new FunctionalTester($scenario);
$I->seeInDatabase('student', array('student_name' => 'Ali Baba', 'student_email' => 'siap_kau@yahoo.com'));
$I->haveInDatabase('student', array('student_matrix' => '2013708301', 'student_name' => 'Mohamad Shafiq Bin Aziz', 'program_id' => '1', 'campus_id' => '1', 'student_phone' => '01133396872', 'student_email' => 'shafiqaziz06@gmail.com'));
$I->seeInDatabase('student', array('student_matrix' => '2013708301', 'student_email' => 'shafiqaziz06@gmail.com'));
$I->seeNumRecords(1, 'student', ['student_matrix' => '2013708301'])
?>
