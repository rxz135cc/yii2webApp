<?php

namespace backend\controllers;

use Yii;
use backend\models\MedicalCertificate;
use backend\models\MedicalCertificateSearch;
use backend\models\Student;
use backend\models\Program;
use backend\models\Authorizer;
use backend\models\Clinic;
use backend\models\Staff;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use mPDF;

/**
 * MedicalCertificateController implements the CRUD actions for MedicalCertificate model.
 */
class MedicalCertificateController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all MedicalCertificate models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MedicalCertificateSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MedicalCertificate model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MedicalCertificate model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MedicalCertificate();

        if ($model->load(Yii::$app->request->post())) {

            
            //send email before saving in DB
            //get student info
            $student_id = $model->student_id;
            $student = Student::findOne($student_id);

            //get student's program
            $program = Program::findOne($student->program_id);

            //get Clinic that produce the Medical Certificate
            $clinic = Clinic::findOne($model->clinic_id);

            //get authorizer info
            $auth = Authorizer::findOne($model->au_id);
            $staff = Staff::findOne($auth->staff_id);

            $value = Yii::$app->mail->compose()
                ->setFrom(array('imaprog@g580.com' => 'imaprog'))
                ->setTo('bobby@g580.com')
                ->setSubject('Medical Certificate')
                ->setHtmlBody('
                    Serial Number: '.$model->mc_serial.'
                    Student Name: '.$student->student_name.'
                    Student Matrix: '.$student->student_matrix.'
                    Student Faculty: '.$program->program_name.'
                    Problem/Diesease: '.$model->mc_problem.'
                    Valid From: '.$model->mc_startdate.'
                    Till: '.$model->mc_enddate.'
                    Appointmet On: '.$model->mc_appdate.'
                    Produced By: '.$clinic->clinic_name.'
                    Authorize By: '.$staff->staff_name
                    )
                ->send();

            //save into DB
            $model->save();
            //return to view, then proceed with sending email to the lecturers, NotifyEmailController.php
            return $this->redirect(['view', 'id' => $model->mc_id]);

        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /*public function actionPdf() {

        Yii::$app->response->format = 'pdf';

        // Rotate the page
        Yii::$container->set(Yii::$app->response->formatters['pdf']['class'], [
            'format' => [216, 356], // Legal page size in mm
            'orientation' => 'Landscape', // This value will be used when 'format' is an array only. Skipped when 'format' is empty or is a string
            'beforeRender' => function($mpdf, $data) {},
            ]);

        $this->layout = '//print';
        return $this->render('myview', []);  
    }*/

    /**
     * Updates an existing MedicalCertificate model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->mc_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MedicalCertificate model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MedicalCertificate model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MedicalCertificate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MedicalCertificate::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
