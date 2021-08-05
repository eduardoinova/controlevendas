<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Venda Entity
 *
 * @property int $id
 * @property int $funcionario_id
 * @property float $valor
 * @property \Cake\I18n\FrozenTime $data_venda
 *
 * @property \App\Model\Entity\Funcionario $funcionario
 */
class Venda extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'funcionario_id' => true,
        'valor' => true,
        'data_venda' => true,
        'funcionario' => true,
    ];
}
