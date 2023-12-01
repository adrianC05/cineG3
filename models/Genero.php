<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "genero".
 *
 * @property int $GEN_ID Id
 * @property string $GEN_NOMBRE Nombre
 *
 * @property Pelicula[] $peliculas
 */
class Genero extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genero';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['GEN_NOMBRE'], 'required'],
            [['GEN_NOMBRE'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'GEN_ID' => 'Gen ID',
            'GEN_NOMBRE' => 'Gen Nombre',
        ];
    }

    /**
     * Gets query for [[Peliculas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeliculas()
    {
        return $this->hasMany(Pelicula::class, ['GEN_ID' => 'GEN_ID']);
    }
}
