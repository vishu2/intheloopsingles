<?php
namespace App\Controller;

use App\Controller\AppController;

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
		$this->paginate = [
			'contain' => ['Clients', 'LeadTypes', 'LeadSources', 'LeadStatus', 'Locations', 'States', 'Countries'],
			'conditions' => ['lead_status_id' => 1],
		];
		$leads = $this->paginate($this->Leads);

		$this->set(compact('leads'));
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
		$leadTypes = $this->Leads->LeadTypes->find('list', ['limit' => 200]);
		$leadSources = $this->Leads->LeadSources->find('list', ['limit' => 200]);
		$LeadStatus = $this->Leads->LeadStatus->find('list', ['limit' => 200]);
		$locations = $this->Leads->Locations->find('list', ['limit' => 200]);
		$states = $this->Leads->States->find('list', ['limit' => 200]);
		$countries = $this->Leads->Countries->find('list', ['limit' => 200]);
		$this->set(compact('lead', 'clients', 'leadTypes', 'leadSources', 'LeadStatus', 'locations', 'states', 'countries'));
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
