<?php 

// src/Controller/MovimentosController.php
namespace App\Controller;

use App\Controller\AppController;

class MovimentosController extends AppController
{
    public function index()
    {
        $movimentos = $this->paginate($this->Movimentos, [
            'contain' => ['Veiculos'],
        ]);
        $this->set(compact('movimentos'));
    }

    public function view($id = null)
    {
        $movimento = $this->Movimentos->get($id, [
            'contain' => ['Veiculos'],
        ]);
        $this->set(compact('movimento'));
    }

    public function add()
    {
        $movimento = $this->Movimentos->newEmptyEntity();
        if ($this->request->is('post')) {
            $movimento = $this->Movimentos->patchEntity($movimento, $this->request->getData());
            if ($this->Movimentos->save($movimento)) {
                $this->Flash->success(__('Movimento registrado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível registrar o movimento.'));
        }
        $veiculos = $this->Movimentos->Veiculos->find('list', ['limit' => 200]);
        $this->set(compact('movimento', 'veiculos'));
    }

    public function edit($id = null)
    {
        $movimento = $this->Movimentos->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $movimento = $this->Movimentos->patchEntity($movimento, $this->request->getData());
            if ($this->Movimentos->save($movimento)) {
                $this->Flash->success(__('Movimento atualizado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível atualizar o movimento.'));
        }
        $veiculos = $this->Movimentos->Veiculos->find('list', ['limit' => 200]);
        $this->set(compact('movimento', 'veiculos'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $movimento = $this->Movimentos->get($id);
        if ($this->Movimentos->delete($movimento)) {
            $this->Flash->success(__('Movimento deletado com sucesso.'));
        } else {
            $this->Flash->error(__('Não foi possível deletar o movimento.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
