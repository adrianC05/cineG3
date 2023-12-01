<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alquiler".
 *
 * @property int $ALQ_ID Id
 * @property int|null $SOC_ID Socio
 * @property int|null $PEL_ID Película
 * @property string $ALQ_FECHA_DESDE Fecha Inicial
 * @property string $ALQ_FECHA_HASTA Fecha Final
 * @property float $ALQ_VALOR Valor
 * @property string|null $ALQ_FECHA_ENTREGA Fecha Entrega
 *
 * @property Pelicula $pEL
 * @property Socio $sOC
 */
class Alquiler extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alquiler';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['SOC_ID', 'PEL_ID'], 'integer'],
            [['ALQ_FECHA_DESDE', 'ALQ_FECHA_HASTA', 'ALQ_VALOR'], 'required'],
            [['ALQ_FECHA_DESDE', 'ALQ_FECHA_HASTA', 'ALQ_FECHA_ENTREGA'], 'safe'],
            [['ALQ_VALOR'], 'number'],
            [['PEL_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Pelicula::class, 'targetAttribute' => ['PEL_ID' => 'PEL_ID']],
            [['SOC_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Socio::class, 'targetAttribute' => ['SOC_ID' => 'SOC_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ALQ_ID' => 'Alq ID',
            'SOC_ID' => 'Soc ID',
            'PEL_ID' => 'Pel ID',
            'ALQ_FECHA_DESDE' => 'Alq Fecha Desde',
            'ALQ_FECHA_HASTA' => 'Alq Fecha Hasta',
            'ALQ_VALOR' => 'Alq Valor',
            'ALQ_FECHA_ENTREGA' => 'Alq Fecha Entrega',
        ];
    }

    /**
     * Gets query for [[PEL]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPEL()
    {
        return $this->hasOne(Pelicula::class, ['PEL_ID' => 'PEL_ID']);
    }

    /**
     * Gets query for [[SOC]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSOC()
    {
        return $this->hasOne(Socio::class, ['SOC_ID' => 'SOC_ID']);
    }
}
