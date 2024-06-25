<?php 

// src/Controller/VagasController.php
namespace App\Controller;

use App\Controller\AppController;

class VagasController extends AppController
{
    public function index()
    {
        $vagas = $this->paginate($this->Vagas);
        $this->set(compact('vagas'));
    }

    public function view($id = null)
    {
        $vaga = $this->Vagas->get($id);
        $this->set(compact('vaga'));
    }

    public function add()
    {
        $vaga = $this->Vagas->newEmptyEntity();
        if ($this->request->is('post')) {
            $vaga = $this->Vagas->patchEntity($vaga, $this->request->getData());
            if ($this->Vagas->save($vaga)) {
                $this->Flash->success(__('A vaga foi salva.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível salvar a vaga.'));
        }
        $this->set(compact('vaga'));
    }

    public function edit($id = null)
    {
        $vaga = $this->Vagas->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vaga = $this->Vagas->patchEntity($vaga, $this->request->getData());
            if ($this->Vagas->save($vaga)) {
                $this->Flash->success(__('A vaga foi atualizada.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível atualizar a vaga.'));
        }
        $this->set(compact('vaga'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vaga = $this->Vagas->get($id);
        if ($this->Vagas->delete($vaga)) {
            $this->Flash->success(__('A vaga foi deletada.'));
        } else {
            $this->Flash->error(__('Não foi possível deletar a vaga.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    public function disponiveis()
{
    $vagasDisponiveis = $this->Vagas->find('all', [
        'conditions' => ['disponivel' => true]
    ]);
    $this->set(compact('vagasDisponiveis'));
}
}


?>