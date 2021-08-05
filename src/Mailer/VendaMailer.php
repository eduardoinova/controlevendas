<?php
declare(strict_types=1);

namespace App\Mailer;

use Cake\Mailer\Mailer;

/**
 * User mailer.
 */
class VendaMailer extends Mailer
{
    /**
     * Mailer's name.
     *
     * @var string
     */
    public static $name = 'Venda';

    public function relatoriovendas($vendas)
    {
        $cont = 0;
        $totalValor = 0;
        foreach($vendas as $value){
            $cont += 1;
            $totalValor += $value->valor;
        }
        
        $this->setTo("costa.eduardor@gmail.com")
        ->setSubject("Relatório Diário")
        ->deliver('Total de vendas: '.$cont." com o valor total de: ".number_format(($totalValor), 2, ',', '.'));
    }
}
