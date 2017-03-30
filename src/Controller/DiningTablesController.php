<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DiningTables Controller
 *
 * @property \App\Model\Table\DiningTablesTable $DiningTables
 */
class DiningTablesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $diningTables = $this->paginate($this->DiningTables);

        $this->set(compact('diningTables'));
        $this->set('_serialize', ['diningTables']);
    }

    /**
     * View method
     *
     * @param string|null $id Dining Table id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $diningTable = $this->DiningTables->get($id, [
            'contain' => []
        ]);

        $this->set('diningTable', $diningTable);
        $this->set('_serialize', ['diningTable']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $diningTable = $this->DiningTables->newEntity();
        if ($this->request->is('post')) {
            $diningTable = $this->DiningTables->patchEntity($diningTable, $this->request->getData());
            if ($this->DiningTables->save($diningTable)) {
                $this->Flash->success(__('The dining table has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dining table could not be saved. Please, try again.'));
        }
        $this->set(compact('diningTable'));
        $this->set('_serialize', ['diningTable']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Dining Table id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $diningTable = $this->DiningTables->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $diningTable = $this->DiningTables->patchEntity($diningTable, $this->request->getData());
            if ($this->DiningTables->save($diningTable)) {
                $this->Flash->success(__('The dining table has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dining table could not be saved. Please, try again.'));
        }
        $this->set(compact('diningTable'));
        $this->set('_serialize', ['diningTable']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Dining Table id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $diningTable = $this->DiningTables->get($id);
        if ($this->DiningTables->delete($diningTable)) {
            $this->Flash->success(__('The dining table has been deleted.'));
        } else {
            $this->Flash->error(__('The dining table could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
