<?php

namespace backend\controllers;

use Yii;
use backend\models\NotifyEmail;
use backend\models\NotifyEmailSearch;
use backend\models\Staff;
use backend\models\Student;
use backend\models\MedicalCertificate;
use backend\models\Program;
use backend\models\Clinic;
use backend\models\Authorizer;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;

/**
 * NotifyEmailController implements the CRUD actions for NotifyEmail model.
 */
class NotifyEmailController extends Controller
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
     * Lists all NotifyEmail models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NotifyEmailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NotifyEmail model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionGetMedicalRecord($mc_id){

        //in medical-certificate, student_id is already exists.
        $mc = MedicalCertificate::findOne($mc_id);

        return $this->redirect(['create', 'medical_id' => $mc->mc_id]);

    }


    /**
     * Creates a new NotifyEmail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new NotifyEmail();

        if ($model->load(Yii::$app->request->post())) {

            //recepients info
            $rcpt= Staff::findOne($model->staff_id);


            $mc = MedicalCertificate::findOne($model->mc_id);
            $student = Student::findOne($mc->student_id);

             //get student's program
            $program = Program::findOne($student->program_id);

            //get Clinic that produce the Medical Certificate
            $clinic = Clinic::findOne($mc->clinic_id);

            //get authorizer info
            $auth = Authorizer::findOne($mc->au_id);
            $staff = Staff::findOne($auth->staff_id);

            //upload the attachment
            $model->attachment = UploadedFile::getInstance($model, 'attachment');
            if($model->attachment){

                    $time = time();
                    $model->attachment->saveAs('attachments/' .$time. '.' . $model->attachment->extension);
                    $model->attachment='attachments/' .$time. '.' .$model->attachment->extension;
            }
            if($model->attachment){

                //send email with attachment
                $value = Yii::$app->mail->compose()
                ->setFrom(array('imaprog@g580.com' => 'imaprog'))
                ->setTo('bobby@g580.com')
                ->setSubject('Medical Certificate')
                ->setHtmlBody('
                    Dear '.$rcpt->staff_name.'
                    Your Student Has a Medical Certificate,
                    Serial Number: '.$mc->mc_serial.'
                    Student Name: '.$student->student_name.'
                    Student Matrix: '.$student->student_matrix.'
                    Student Faculty: '.$program->program_name.'
                    Problem/Diesease: '.$mc->mc_problem.'
                    Valid From: '.$mc->mc_startdate.'
                    Till: '.$mc->mc_enddate.'
                    Appointmet On: '.$mc->mc_appdate.'
                    Produced By: '.$clinic->clinic_name.'
                    Authorize By: '.$staff->staff_name
                    )
                ->attach($model->attachment)
                ->send();
            }else
            {
                //send email without attachment
                $value = Yii::$app->mail->compose()
                ->setFrom(array('imaprog@g580.com' => 'imaprog'))
                ->setTo('bobby@g580.com')
                ->setSubject('Medical Certificate')
                ->setHtmlBody('
                    Dear '.$rcpt->staff_name.'
                    Your Student Has a Medical Certificate,
                    Serial Number: '.$mc->mc_serial.'
                    Student Name: '.$student->student_name.'
                    Student Matrix: '.$student->student_matrix.'
                    Student Faculty: '.$program->program_name.'
                    Problem/Diesease: '.$mc->mc_problem.'
                    Valid From: '.$mc->mc_startdate.'
                    Till: '.$mc->mc_enddate.'
                    Appointmet On: '.$mc->mc_appdate.'
                    Produced By: '.$clinic->clinic_name.'
                    Authorize By: '.$staff->staff_name
                    )
                ->send();
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->ne_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing NotifyEmail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ne_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing NotifyEmail model.
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
     * Finds the NotifyEmail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NotifyEmail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NotifyEmail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
