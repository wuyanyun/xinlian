<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "xl_hospital_region".
 *
 * @property integer $id
 * @property integer $region_id
 * @property string $region_name
 */
class HospitalRegion extends \yii\db\ActiveRecord
{
    public $district;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xl_hospital_region';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [["province", 'city'], 'required',],
            [["province", 'city'], 'integer'],

        ];
    }

    public static function getFilterRegion(){
       $re= self::find()->select("city")->with(
            ["hospital"=>function($q){
                $q->select("id,name,region_id");
            },
                "city"
        ]
        )->asArray()->all();
        foreach($re as $k=>$v){
            $re[$k]["id"]=$v["city"]["id"];
            $re[$k]["name"]=$v["city"]["name"];
            unset($re[$k]["city"]);
            $re[$k]["hospital"]=$v["hospital"];
        }
        return $re;
    }
    /**
     * @inheritdoc
     */
    /*获取筛选城市的地区 id name*/
    public static function getCityRegion()
    {
        $region = HospitalRegion::find()
            ->select("id,city")
            ->with("city")
            ->asArray()
            ->all();
        $data=[];
        if (!empty($region)) {
            foreach ($region as $k => $v) {
            $data[$k]["id"]=$v["city"]["id"];
            $data[$k]["name"]=$v["city"]["name"];
            }
        }
        return $data;
    }

    /*关联城市*/
    public function getCity()
    {
        return $this->hasOne(Region::className(), ["id" => "city"]);
    }
    public function getHospital()
    {
        return $this->hasMany(Hospital::className(), ["region_id" => "city"]);
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'province' => '省份',
            'city' => '城市',
        ];
    }
}
