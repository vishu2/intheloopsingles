<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LeadTypes Controller
 *
 * @property \App\Model\Table\LeadTypesTable $LeadTypes
 *
 * @method \App\Model\Entity\LeadType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LeadTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $leadTypes = $this->paginate($this->LeadTypes);

        $this->set(compact('leadTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Lead Type id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $leadType = $this->LeadTypes->get($id, [
            'contain' => ['Leads'],
        ]);

        $this->set('leadType', $leadType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $leadType = $this->LeadTypes->newEntity();
        if ($this->request->is('post')) {
            $leadType = $this->LeadTypes->patchEntity($leadType, $this->request->getData());
            if ($this->LeadTypes->save($leadType)) {
                $this->Flash->success(__('The lead type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lead type could not be saved. Please, try again.'));
        }
        $this->set(compact('leadType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lead Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $leadType = $this->LeadTypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $leadType = $this->LeadTypes->patchEntity($leadType, $this->request->getData());
            if ($this->LeadTypes->save($leadType)) {
                $this->Flash->success(__('The lead type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lead type could not be saved. Please, try again.'));
        }
        $this->set(compact('leadType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lead Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $leadType = $this->LeadTypes->get($id);
        if ($this->LeadTypes->delete($leadType)) {
            $this->Flash->success(__('The lead type has been deleted.'));
        } else {
            $this->Flash->error(__('The lead type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
