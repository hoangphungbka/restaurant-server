<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Billings Controller
 *
 * @property \App\Model\Table\BillingsTable $Billings
 */
class BillingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Orders']
        ];
        $billings = $this->paginate($this->Billings);

        $this->set(compact('billings'));
        $this->set('_serialize', ['billings']);
    }

    /**
     * View method
     *
     * @param string|null $id Billing id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $billing = $this->Billings->get($id, [
            'contain' => ['Orders']
        ]);

        $this->set('billing', $billing);
        $this->set('_serialize', ['billing']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $billing = $this->Billings->newEntity();
        if ($this->request->is('post')) {
            $billing = $this->Billings->patchEntity($billing, $this->request->getData());
            if ($this->Billings->save($billing)) {
                $this->Flash->success(__('The billing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The billing could not be saved. Please, try again.'));
        }
        $orders = $this->Billings->Orders->find('list', ['limit' => 200]);
        $this->set(compact('billing', 'orders'));
        $this->set('_serialize', ['billing']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Billing id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $billing = $this->Billings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $billing = $this->Billings->patchEntity($billing, $this->request->getData());
            if ($this->Billings->save($billing)) {
                $this->Flash->success(__('The billing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The billing could not be saved. Please, try again.'));
        }
        $orders = $this->Billings->Orders->find('list', ['limit' => 200]);
        $this->set(compact('billing', 'orders'));
        $this->set('_serialize', ['billing']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Billing id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $billing = $this->Billings->get($id);
        if ($this->Billings->delete($billing)) {
            $this->Flash->success(__('The billing has been deleted.'));
        } else {
            $this->Flash->error(__('The billing could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
