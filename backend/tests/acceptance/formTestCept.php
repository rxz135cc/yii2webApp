<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('Test Form');
$I->login('imaprog', 'Takjugak6799');
$I->amOnPage('index.php?r=medical-certificate/create');
$I->selectOption('MedicalCertificate[student_id]','2010260208');
$value = $I->grabValueFrom(['name' => 'MedicalCertificate[student_id]']);
$I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');
$I->sendAjaxGetRequest('index.php?r=student/get-program-email&matrixId='.$value.'');
$I->seeResponseIsJson();
$I->seeResponseContainsJson([
     'student_id' => 'integer',
     'student_matrix' => 'string:regex(/[\d]/)',
     'student_name' => 'string:regex(/[a-zA-Z]/)',
     'program_id' => 'integer',
     'campus_id' => 'integer',
     'student_phone' => 'string:regex(/[\d]/)',
     'student_email' => 'string:regex(/[a-zA-Z\d]+[@a-zA-Z\d]+[.com]/)'
]);
?>