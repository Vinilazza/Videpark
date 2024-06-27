<?php
// src/Controller/SlotsController.php
namespace App\Controller;

use App\Controller\AppController;

class SlotsController extends AppController {

    public function index() {
        $slots = $this->paginate($this->Slots);
        $this->set(compact('slots'));
    }

    public function view($id = null) {
        $slot = $this->Slots->get($id);
        $this->set(compact('slot'));
    }

    public function add() {
        $slot = $this->Slots->newEntity();
        if ($this->request->is('post')) {
            $slot = $this->Slots->patchEntity($slot, $this->request->getData());
            if ($this->Slots->save($slot)) {
                $this->Flash->success(__('The slot has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add the slot.'));
        }
        $this->set('slot', $slot);
    }

    public function edit($id = null) {
        $slot = $this->Slots->get($id);
        if ($this->request->is(['post', 'put'])) {
            $slot = $this->Slots->patchEntity($slot, $this->request->getData());
            if ($this->Slots->save($slot)) {
                $this->Flash->success(__('The slot has been updated.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update the slot.'));
        }
        $this->set(compact('slot'));
    }

    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);

        $slot = $this->Slots->get($id);
        if ($this->Slots->delete($slot)) {
            $this->Flash->success(__('The slot with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }
}
