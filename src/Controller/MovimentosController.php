<?php 

// src/Controller/MovimentosController.php
// src/Controller/MovimentosController.php
namespace App\Controller;

use App\Controller\AppController;

class MovimentosController extends AppController
{
    public function index()
    {
        $movimentos = $this->paginate($this->Movimentos, [
            'contain' => ['Veiculos', 'Vagas']
        ]);
        $this->set(compact('movimentos'));
    }

    public function add()
    {
        $movimento = $this->Movimentos->newEmptyEntity();
        if ($this->request->is('post')) {
            $movimento = $this->Movimentos->patchEntity($movimento, $this->request->getData());
            if ($this->Movimentos->save($movimento)) {
                $this->atualizarDisponibilidadeVaga($movimento->vaga_id, false);
                $this->Flash->success(__('O movimento foi salvo.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível salvar o movimento.'));
        }
        $veiculos = $this->Movimentos->Veiculos->find('list', ['limit' => 200]);
        $vagas = $this->Movimentos->Vagas->find('list', ['limit' => 200, 'conditions' => ['disponivel' => true]]);
        $this->set(compact('movimento', 'veiculos', 'vagas'));
    }

    // src/Controller/MovimentosController.php
public function relatorioFinanceiro()
{
    $movimentos = $this->Movimentos->find('all', [
        'contain' => ['Veiculos', 'Vagas'],
        'conditions' => ['Movimentos.saida IS NOT' => null]
    ]);

    $totalReceita = $movimentos->sumOf(function ($movimento) {
        $diferenca = $movimento->saida->diffInHours($movimento->entrada);
        return $diferenca * $movimento->veiculo->plano->preco;
    });

    $this->set(compact('movimentos', 'totalReceita'));
}


    public function edit($id = null)
    {
        $movimento = $this->Movimentos->get($id, ['contain' => []]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $movimento = $this->Movimentos->patchEntity($movimento, $this->request->getData());
            if ($this->Movimentos->save($movimento)) {
                $this->atualizarDisponibilidadeVaga($movimento->vaga_id, $movimento->saida !== null);
                $this->Flash->success(__('O movimento foi atualizado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível atualizar o movimento.'));
        }
        $veiculos = $this->Movimentos->Veiculos->find('list', ['limit' => 200]);
        $vagas = $this->Movimentos->Vagas->find('list', ['limit' => 200]);
        $this->set(compact('movimento', 'veiculos', 'vagas'));
    }

    private function atualizarDisponibilidadeVaga($vagaId, $disponivel)
    {
        $vaga = $this->Movimentos->Vagas->get($vagaId);
        $vaga->disponivel = $disponivel;
        $this->Movimentos->Vagas->save($vaga);
    }
}





?>