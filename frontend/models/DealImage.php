<?php
/**
 * Created by PhpStorm.
 * User: Samson
 * Date: 11/30/2015
 * Time: 1:07 AM
 */

namespace frontend\models;
use yii\base\Model;
use yii\web\UploadedFile;



class DealImage extends Model{

    public $dealImage;

    public function rules(){
        return [
            [['dealImage'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->dealImage->saveAs('uploads/' . $this->dealImage->baseName . '.' . $this->dealImage->extension);
            return true;
        } else {
            return false;
        }
    }
}