<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Mailer\MailerAwareTrait;

class VendasController extends AppController
{

    use MailerAwareTrait;
    public function index()
    {
        $this->paginate = [
            'contain' => ['Funcionarios'],
        ];
        $vendas = $this->paginate($this->Vendas);

        $this->set(compact('vendas'));
    }


    public function visualizar($id = null)
    {
        $venda = $this->Vendas->get($id, [
            'contain' => ['Funcionarios'],
        ]);

        $this->set(compact('venda'));
    }

    public function adicionar()
    {
        $venda = $this->Vendas->newEmptyEntity();
        if ($this->request->is('post')) {
            $venda = $this->Vendas->patchEntity($venda, $this->request->getData());
            if ($this->Vendas->save($venda)) {
                $this->Flash->success(__('Venda cadastrada com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao cadastrar os dados, tente novamente!'));
        }
        $funcionarios = $this->Vendas->Funcionarios->find('all', ['limit' => 200]);
        $this->set(compact('venda', 'funcionarios'));
    }

    public function editar($id = null)
    {
        
        $venda = $this->Vendas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $venda = $this->Vendas->patchEntity($venda, $this->request->getData());
            if ($this->Vendas->save($venda)) {
                $this->Flash->success(__('Dados alterados com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar os dados, tente novamente!'));
        }
        $funcionarios = $this->Vendas->Funcionarios->find('list', ['limit' => 200]);
        $this->set(compact('venda', 'funcionarios'));


    }

    public function excluir($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $venda = $this->Vendas->get($id);
        if ($this->Vendas->delete($venda)) {
            $this->Flash->success(__('Venda excluida com sucesso!'));
        } else {
            $this->Flash->error(__('Erro ao excluir a venda, tente novamente!'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function enviarrelatorio($id = null)
    {
        $vendas = $this->Vendas->find('all')->where(['data_venda =' => date("Y-m-d")]);
        $this->set(compact('vendas'));
        
        if ($this->getMailer('Venda')->send('relatoriovendas',[$vendas])) {
            $this->Flash->success(__('Relatório enviado com sucesso!'));
        } else {
            $this->Flash->error(__('Erro ao enviar relatório, tente novamente!'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
