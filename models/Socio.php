<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "socio".
 *
 * @property int $SOC_ID Id
 * @property string $SOC_CEDULA Cédula
 * @property string $SOC_NOMBRE Nombre
 * @property string $SOC_DIRECCION Dirección
 * @property string $SOC_TELEFONO Teléfono
 * @property string $SOC_CORREO Correo
 *
 * @property Alquiler[] $alquilers
 */
class Socio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'socio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['SOC_CEDULA', 'SOC_NOMBRE', 'SOC_DIRECCION', 'SOC_TELEFONO', 'SOC_CORREO'], 'required'],
            [['SOC_CEDULA', 'SOC_TELEFONO'], 'string', 'max' => 10],
            [['SOC_NOMBRE', 'SOC_DIRECCION', 'SOC_CORREO'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'SOC_ID' => 'Soc ID',
            'SOC_CEDULA' => 'Soc Cedula',
            'SOC_NOMBRE' => 'Soc Nombre',
            'SOC_DIRECCION' => 'Soc Direccion',
            'SOC_TELEFONO' => 'Soc Telefono',
            'SOC_CORREO' => 'Soc Correo',
        ];
    }

    /**
     * Gets query for [[Alquilers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlquilers()
    {
        return $this->hasMany(Alquiler::class, ['SOC_ID' => 'SOC_ID']);
    }
}
