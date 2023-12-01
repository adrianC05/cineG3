<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "director".
 *
 * @property int $DIR_ID Id
 * @property string $DIR_NOMBRE Nombre
 *
 * @property Pelicula[] $peliculas
 */
class Director extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['DIR_NOMBRE'], 'required'],
            [['DIR_NOMBRE'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'DIR_ID' => 'Dir ID',
            'DIR_NOMBRE' => 'Dir Nombre',
        ];
    }

    /**
     * Gets query for [[Peliculas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeliculas()
    {
        return $this->hasMany(Pelicula::class, ['DIR_ID' => 'DIR_ID']);
    }
}
