<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Leads Controller
 *
 * @property \App\Model\Table\LeadsTable $Leads
 *
 * @method \App\Model\Entity\Lead[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LeadsController extends AppController {
	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|null
	 */
	
	public function index() {
		$pageTitle = 'Leads';
		$paginateArray = ['contain' => ['Clients', 'LeadTypes', 'LeadSources', 'LeadStatus', 'Locations', 'States', 'Countries'],
			'conditions' => ['Leads.lead_status_id' => 1],
		];
		$conditions = [];
		if ($this->request->is('get')) {

			if (isset($this->request->getQuery()['action'])) {

				if (!empty($this->request->getQuery()['name']) && $this->request->getQuery()['name'] != '') {
					$data=$this->request->getQuery()['name'];
					$datan = trim($data);
					$conditions[] = array('Leads.lead_name LIKE' => '%' . $datan. '%');
				}
				$paginateArray['conditions'] = ['AND' => $conditions];

			} else {
			}
		}
		$paginateArray['conditions'] = $conditions;		
		$this->paginate = $paginateArray;		
		$leads = $this->paginate($this->Leads);	
		$this->set(compact('pageTitle', 'leads'));
		
	}

	/**
	 * View method
	 *
	 * @param string|null $id Lead id.
	 * @return \Cake\Http\Response|null
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null) {
		$lead = $this->Leads->get($id, [
			'contain' => ['Clients', 'LeadTypes', 'LeadSources', 'LeadStatus', 'Locations', 'States', 'Countries'],
		]);

		$this->set('lead', $lead);
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add() {
		
		$pageTitle = 'Leads';
		$lead = $this->Leads->newEntity();
		if ($this->request->is('post')) {
			$lead = $this->Leads->patchEntity($lead, $this->request->getData());
			if ($this->Leads->save($lead)) {
				$this->Flash->success(__('The lead has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The lead could not be saved. Please, try again.'));
		}
		$clients = $this->Leads->Clients->find('list', ['limit' => 200]);
		$leadTypes = $this->Leads->LeadTypes->find('list', [ 'keyField'   => 'id', 'valueField' => 'lead_type_name']);
		$leadSources = $this->Leads->LeadSources->find('list', [ 'keyField'   => 'id', 'valueField' => 'source_name']);
		$locations = $this->Leads->Locations->find('list', [ 'keyField'   => 'id', 'valueField' => 'location_name']);
		
		$LeadStatus = $this->Leads->LeadStatus->find('list', [ 'keyField'   => 'id', 'valueField' => 'status_name']);
		
		$states = $this->Leads->States->find('list', ['keyField'   => 'id', 'valueField' => 'state_name']);
		$countries = $this->Leads->Countries->find('list', ['keyField'   => 'id', 'valueField' => 'country_name']);
		$this->set(compact('pageTitle','lead', 'clients', 'leadTypes', 'leadSources', 'LeadStatus', 'locations', 'states', 'countries'));
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id Lead id.
	 * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function edit($id = null) {
		$lead = $this->Leads->get($id, [
			'contain' => [],
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$lead = $this->Leads->patchEntity($lead, $this->request->getData());
			if ($this->Leads->save($lead)) {
				$this->Flash->success(__('The lead has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The lead could not be saved. Please, try again.'));
		}
		$clients = $this->Leads->Clients->find('list', ['limit' => 200]);
		$leadTypes = $this->Leads->LeadTypes->find('list', ['limit' => 200]);
		$leadSources = $this->Leads->LeadSources->find('list', ['limit' => 200]);
		$LeadStatus = $this->Leads->LeadStatus->find('list', ['limit' => 200]);
		$locations = $this->Leads->Locations->find('list', ['limit' => 200]);
		$states = $this->Leads->States->find('list', ['limit' => 200]);
		$countries = $this->Leads->Countries->find('list', ['limit' => 200]);
		$this->set(compact('lead', 'clients', 'leadTypes', 'leadSources', 'LeadStatus', 'locations', 'states', 'countries'));
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Lead id.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null) {
		$this->request->allowMethod(['post', 'delete']);
		$lead = $this->Leads->get($id);
		if ($this->Leads->delete($lead)) {
			$this->Flash->success(__('The lead has been deleted.'));
		} else {
			$this->Flash->error(__('The lead could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
