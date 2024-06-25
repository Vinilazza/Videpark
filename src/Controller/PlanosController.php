<?php 

// src/Controller/PlanosController.php
namespace App\Controller;

use App\Controller\AppController;

class PlanosController extends AppController
{
    public function index()
    {
        $planos = $this->paginate($this->Planos);
        $this->set(compact('planos'));
    }

    public function view($id = null)
    {
        $plano = $this->Planos->get($id);
        $this->set(compact('plano'));
    }

    public function add()
    {
        $plano = $this->Planos->newEmptyEntity();
        if ($this->request->is('post')) {
            $plano = $this->Planos->patchEntity($plano, $this->request->getData());
            if ($this->Planos->save($plano)) {
                $this->Flash->success(__('O plano foi salvo.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível salvar o plano.'));
        }
        $this->set(compact('plano'));
    }

    public function edit($id = null)
    {
        $plano = $this->Planos->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $plano = $this->Planos->patchEntity($plano, $this->request->getData());
            if ($this->Planos->save($plano)) {
                $this->Flash->success(__('O plano foi atualizado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível atualizar o plano.'));
        }
        $this->set(compact('plano'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $plano = $this->Planos->get($id);
        if ($this->Planos->delete($plano)) {
            $this->Flash->success(__('O plano foi deletado.'));
        } else {
            $this->Flash->error(__('Não foi possível deletar o plano.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}


?>