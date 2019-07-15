<?php
/**
 * Created by PhpStorm.
 * User: Muzich
 * Date: 15.07.2019
 * Time: 8:33
 */

namespace muzich\first;


use yii\base\Component;
use Yii;

class Editor extends Component
{
    public function demo(){

        return Yii::$app->view->renderFile(Yii::getAlias('@app') . '/vendor/muzich/first-editor/meditor.php');
    }
}