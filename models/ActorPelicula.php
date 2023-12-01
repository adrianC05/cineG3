<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "actor_pelicula".
 *
 * @property int $APL_ID Id
 * @property int|null $ACT_ID Actor
 * @property int|null $PEL_ID Película
 * @property string $APL_PAPEL Papel
 *
 * @property Actor $aCT
 * @property Pelicula $pEL
 */
class ActorPelicula extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'actor_pelicula';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ACT_ID', 'PEL_ID'], 'integer'],
            [['APL_PAPEL'], 'required'],
            [['APL_PAPEL'], 'string', 'max' => 60],
            [['ACT_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Actor::class, 'targetAttribute' => ['ACT_ID' => 'ACT_ID']],
            [['PEL_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Pelicula::class, 'targetAttribute' => ['PEL_ID' => 'PEL_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'APL_ID' => 'Apl ID',
            'ACT_ID' => 'Act ID',
            'PEL_ID' => 'Pel ID',
            'APL_PAPEL' => 'Apl Papel',
        ];
    }

    /**
     * Gets query for [[ACT]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getACT()
    {
        return $this->hasOne(Actor::class, ['ACT_ID' => 'ACT_ID']);
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
}
