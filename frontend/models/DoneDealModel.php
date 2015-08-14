<?php
/**
 * Created by PhpStorm.
 * User: Samson Kapeyi
 * Date: 8/15/2015
 * Time: 12:51 AM
 */

namespace frontend\models;
use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;


class DoneDealModel extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
        ];
    }
}
