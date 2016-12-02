<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property integer $idFeedback
 * @property integer $idUser
 * @property string $name
 * @property string $email
 * @property string $title
 * @property string $text
 *
 * @property User $idUser0
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idUser'], 'integer'],
            [['name', 'email', 'title', 'text'], 'required'],
            [['text'], 'string'],
            [['name', 'email', 'title'], 'string', 'max' => 40],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUser' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idFeedback' => 'Id Feedback',
            'idUser' => 'Id User',
            'name' => 'Name',
            'email' => 'Email',
            'title' => 'Title',
            'text' => 'Text',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'idUser']);
    }
}
