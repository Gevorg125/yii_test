<?php
/**
 * Created by PhpStorm.
 * User: gev
 * Date: 1/27/19
 * Time: 6:46 PM
 */

class DataController extends CController
{
    public function actions()
    {
        return array(
            'quote' => array(
                'class' => 'CWebServiceAction',
            ),
        );
    }

    public function actionData()
    {

        /*
           тип ожидаемого запроса
            Method : POST
            KEY : Users
            Value : {"name":"\u0441\u0434\u0444","sur_name":"\u0441\u0434\u0444","middle_name":"\u0441\u0434\u0444","birth_day":"05-07-2001","passport_number":"AD456456456","email":"asd@mail.ru","phone_number":"+74654654"}
         */

        $model = new Users;

        $rand_id = rand(1, 4);
        $user_agent = Yii::app()->db->createCommand()
            ->select('name')
            ->from('user_agent')
            ->where('id=:id', array(':id'=>$rand_id))
            ->queryRow();


        if (isset($_POST['Users'])) {

            $data = json_decode($_POST['Users'], true);
            $model->attributes = $data;
            $model->passport_number = substr_replace($data['passport_number'], null, 0, 2);

            if ($model->save()) {
                $result['id'] = $model->id;
                $result['sum'] = 10;
                $result['user_agent'] = $user_agent['name'];
                $result['percent'] = Yii::app()->params['percent'];
                $result['ip'] = Yii::app()->request->getUserHostAddress();
                echo json_encode($result);

            }
        }
    }

}