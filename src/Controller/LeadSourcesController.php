<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LeadSources Controller
 *
 * @property \App\Model\Table\LeadSourcesTable $LeadSources
 *
 * @method \App\Model\Entity\LeadSource[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LeadSourcesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Locations'],
        ];
        $leadSources = $this->paginate($this->LeadSources);

        $this->set(compact('leadSources'));
    }

    /**
     * View method
     *
     * @param string|null $id Lead Source id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $leadSource = $this->LeadSources->get($id, [
            'contain' => ['Locations', 'Leads'],
        ]);

        $this->set('leadSource', $leadSource);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $leadSource = $this->LeadSources->newEntity();
        if ($this->request->is('post')) {
            $leadSource = $this->LeadSources->patchEntity($leadSource, $this->request->getData());
            if ($this->LeadSources->save($leadSource)) {
                $this->Flash->success(__('The lead source has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lead source could not be saved. Please, try again.'));
        }
        $locations = $this->LeadSources->Locations->find('list', ['limit' => 200]);
        $this->set(compact('leadSource', 'locations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lead Source id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $leadSource = $this->LeadSources->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $leadSource = $this->LeadSources->patchEntity($leadSource, $this->request->getData());
            if ($this->LeadSources->save($leadSource)) {
                $this->Flash->success(__('The lead source has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lead source could not be saved. Please, try again.'));
        }
        $locations = $this->LeadSources->Locations->find('list', ['limit' => 200]);
        $this->set(compact('leadSource', 'locations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lead Source id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $leadSource = $this->LeadSources->get($id);
        if ($this->LeadSources->delete($leadSource)) {
            $this->Flash->success(__('The lead source has been deleted.'));
        } else {
            $this->Flash->error(__('The lead source could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
