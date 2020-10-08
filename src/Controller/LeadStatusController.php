<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LeadStatus Controller
 *
 * @property \App\Model\Table\LeadStatusTable $LeadStatus
 *
 * @method \App\Model\Entity\LeadStatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LeadStatusController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $leadStatus = $this->paginate($this->LeadStatus);

        $this->set(compact('leadStatus'));
    }

    /**
     * View method
     *
     * @param string|null $id Lead Status id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $leadStatus = $this->LeadStatus->get($id, [
            'contain' => ['Leads'],
        ]);

        $this->set('leadStatus', $leadStatus);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $leadStatus = $this->LeadStatus->newEntity();
        if ($this->request->is('post')) {
            $leadStatus = $this->LeadStatus->patchEntity($leadStatus, $this->request->getData());
            if ($this->LeadStatus->save($leadStatus)) {
                $this->Flash->success(__('The lead status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lead status could not be saved. Please, try again.'));
        }
        $this->set(compact('leadStatus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lead Status id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $leadStatus = $this->LeadStatus->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $leadStatus = $this->LeadStatus->patchEntity($leadStatus, $this->request->getData());
            if ($this->LeadStatus->save($leadStatus)) {
                $this->Flash->success(__('The lead status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lead status could not be saved. Please, try again.'));
        }
        $this->set(compact('leadStatus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lead Status id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $leadStatus = $this->LeadStatus->get($id);
        if ($this->LeadStatus->delete($leadStatus)) {
            $this->Flash->success(__('The lead status has been deleted.'));
        } else {
            $this->Flash->error(__('The lead status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
