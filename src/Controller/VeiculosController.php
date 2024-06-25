<?php 
// src/Controller/VeiculosController.php
namespace App\Controller;

use App\Controller\AppController;

class VeiculosController extends AppController
{
    public function index()
    {
        $veiculos = $this->paginate($this->Veiculos);
        $this->set(compact('veiculos'));
    }

    public function view($id = null)
    {
        $veiculo = $this->Veiculos->get($id, [
            'contain' => ['Movimentos'],
        ]);
        $this->set(compact('veiculo'));
    }

    public function add()
    {
        $veiculo = $this->Veiculos->newEmptyEntity();
        if ($this->request->is('post')) {
            $veiculo = $this->Veiculos->patchEntity($veiculo, $this->request->getData());
            if ($this->Veiculos->save($veiculo)) {
                $this->Flash->success(__('Veículo adicionado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível adicionar o veículo.'));
        }
        $this->set(compact('veiculo'));
    }

    public function edit($id = null)
    {
        $veiculo = $this->Veiculos->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $veiculo = $this->Veiculos->patchEntity($veiculo, $this->request->getData());
            if ($this->Veiculos->save($veiculo)) {
                $this->Flash->success(__('Veículo atualizado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível atualizar o veículo.'));
        }
        $this->set(compact('veiculo'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $veiculo = $this->Veiculos->get($id);
        if ($this->Veiculos->delete($veiculo)) {
            $this->Flash->success(__('Veículo deletado com sucesso.'));
        } else {
            $this->Flash->error(__('Não foi possível deletar o veículo.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}

?>