<?php

use yii\db\Schema;
use yii\db\Migration;

class m150825_093257_create_DB_Entity extends Migration
{
    public function up()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%level}}', [
            'level_id' => Schema::TYPE_PK,
            'level_name' => Schema::TYPE_STRING . '(50) NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%student}}', [
            'student_id' => Schema::TYPE_PK,
            'student_matrix' => Schema::TYPE_STRING . '(11) NOT NULL',
            'student_name' => Schema::TYPE_STRING . '(155) NOT NULL',
            'program_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'campus_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'student_phone' => Schema::TYPE_STRING . '(12) NOT NULL',
            'student_email' => Schema::TYPE_STRING . '(80) NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%staff}}', [
            'staff_id' => Schema::TYPE_PK,
            'staff_workid' => Schema::TYPE_STRING . '(60) NOT NULL',
            'staff_name' => Schema::TYPE_STRING . '(155) NOT NULL',
            'staff_email' => Schema::TYPE_STRING . '(80) NOT NULL',
            'dept_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'staff_gred' => Schema::TYPE_STRING . '(50) NOT NULL',
            'faculty_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'campus_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%program}}', [
            'program_id' => Schema::TYPE_PK,
            'program_name' => Schema::TYPE_STRING. '(180) NOT NULL',
            'faculty_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%faculty}}', [
            'faculty_id' => Schema::TYPE_PK,
            'faculty_name' => Schema::TYPE_STRING. '(155) NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%campus}}', [
            'campus_id' => Schema::TYPE_PK,
            'campus_name' => Schema::TYPE_STRING. '(155) NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%department}}', [
            'dept_id' => Schema::TYPE_PK,
            'dept_name' => Schema::TYPE_STRING. '(155) NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%clinic}}', [
            'clinic_id' => Schema::TYPE_PK,
            'clinic_name' => Schema::TYPE_STRING. '(155) NOT NULL',
            'staff_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%course}}', [
            'course_id' => Schema::TYPE_PK,
            'course_code' => Schema::TYPE_STRING. '(20) NOT NULL',
            'course_name' => Schema::TYPE_STRING. '(180) NOT NULL',
            'dept_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'course_credithours' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%group}}', [
            'group_id' => Schema::TYPE_PK,
            'group_code' => Schema::TYPE_STRING. '(50) NOT NULL',
            'program_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%medical_certificate}}', [
            'mc_id' => Schema::TYPE_PK,
            'mc_serial' => Schema::TYPE_STRING. '(50) NOT NULL',
            'student_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'mc_problem' => Schema::TYPE_STRING. '(180) NOT NULL',
            'mc_startdate' => Schema::TYPE_DATE,
            'mc_enddate' => Schema::TYPE_DATE,
            'mc_appdate' => Schema::TYPE_DATE,
            'clinic_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'au_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%notifyEmail}}', [
            'ne_id' => Schema::TYPE_PK,
            'mc_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'staff_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'staff_email' => Schema::TYPE_STRING. '(80) NOT NULL',
            'attachment' => Schema::TYPE_STRING. ' NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%place}}', [
            'place_id' => Schema::TYPE_PK,
            'place_name' => Schema::TYPE_STRING. '(50) NOT NULL',
            'pt_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%place_type}}', [
            'pt_id' => Schema::TYPE_PK,
            'pt_name' => Schema::TYPE_STRING. '(150) NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%place_session}}', [
            'ps_id' => Schema::TYPE_PK,
            'course_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'ps_start' => Schema::TYPE_DATE,
            'ps_end' => Schema::TYPE_DATE,
            'place_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'group_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%student_group}}', [
            'sg_id' => Schema::TYPE_PK,
            'student_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'group_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%teach}}', [
            'teach_id' => Schema::TYPE_PK,
            'staff_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'group_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%attendance}}', [
            'att_id' => Schema::TYPE_PK,
            'ps_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'student_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'as_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%attendance_status}}', [
            'as_id' => Schema::TYPE_PK,
            'as_name' => Schema::TYPE_STRING. '(50) NOT NULL',
        ], $tableOptions);

         $this->createTable('{{%authorizer}}', [
            'au_id' => Schema::TYPE_PK,
            'staff_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'au_status' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

    }

    public function down()
    {
        echo "m150825_093257_create_DB_Entity cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
