<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "formato".
 *
 * @property int $FOR_ID Id
 * @property string $FOR_NOMBRE Nombre
 *
 * @property Pelicula[] $peliculas
 */
class Formato extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'formato';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['FOR_NOMBRE'], 'required'],
            [['FOR_NOMBRE'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'FOR_ID' => 'For ID',
            'FOR_NOMBRE' => 'For Nombre',
        ];
    }

    /**
     * Gets query for [[Peliculas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeliculas()
    {
        return $this->hasMany(Pelicula::class, ['FOR_ID' => 'FOR_ID']);
    }
}
