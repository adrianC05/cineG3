<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sexo".
 *
 * @property int $SEX_ID Id
 * @property string $SEX_NOMBRE Nombre
 *
 * @property Actor[] $actors
 */
class Sexo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sexo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['SEX_NOMBRE'], 'required'],
            [['SEX_NOMBRE'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'SEX_ID' => 'Sex ID',
            'SEX_NOMBRE' => 'Sex Nombre',
        ];
    }

    /**
     * Gets query for [[Actors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActors()
    {
        return $this->hasMany(Actor::class, ['SEX_ID' => 'SEX_ID']);
    }
}
