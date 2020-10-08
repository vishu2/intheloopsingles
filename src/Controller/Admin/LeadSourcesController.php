<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

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
       
		$pageTitle = 'Lead Sources';
		$paginateArray = ['contain' => ['Locations'],];
		$conditions = [];
		if ($this->request->is('get')) {

			if (isset($this->request->getQuery()['action'])) {

				if (!empty($this->request->getQuery()['name']) && $this->request->getQuery()['name'] != '') {
					$data=$this->request->getQuery()['name'];
					$datan = trim($data);
					$conditions[] = array('LeadSources.source_name LIKE' => '%' . $datan. '%');
				}
				$paginateArray['conditions'] = ['AND' => $conditions];

			} else {
			}
		}
		$paginateArray['conditions'] = $conditions;		
		$this->paginate = $paginateArray;		
		$leadSources = $this->paginate($this->LeadSources);	
		$this->set(compact('pageTitle', 'leadSources'));
		
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
		$pageTitle = 'Lead Sources';
        $leadSource = $this->LeadSources->newEntity();
        if ($this->request->is('post')) {
            $leadSource = $this->LeadSources->patchEntity($leadSource, $this->request->getData());
            if ($this->LeadSources->save($leadSource)) {
                $this->Flash->success(__('The lead source has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lead source could not be saved. Please, try again.'));
        }
        $locations = $this->LeadSources->Locations->find('list', ['keyField' => 'id', 'valueField' => 'location_name']);
        $this->set(compact('pageTitle','leadSource', 'locations'));
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
		$pageTitle = 'Lead Sources';
		$leadsourceid = base64_decode($id);
        $leadSource = $this->LeadSources->get($leadsourceid, [
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
        $locations = $this->LeadSources->Locations->find('list', ['keyField' => 'id', 'valueField' => 'location_name']);
        $this->set(compact('pageTitle','leadSource', 'locations'));
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
