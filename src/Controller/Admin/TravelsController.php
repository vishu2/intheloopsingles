<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Travels Controller
 *
 * @property \App\Model\Table\TravelsTable $Travels
 *
 * @method \App\Model\Entity\Travel[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TravelsController extends AppController {
	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|null
	 */
	public function index() {
		$pageTitle = "Travel Events";
		$paginateArray = [];
		$conditions = [];
		if ($this->request->is('get')) {

			if (isset($this->request->getQuery()['action'])) {

				if (!empty($this->request->getQuery()['name']) && $this->request->getQuery()['name'] != '') {
					$data = $this->request->getQuery()['name'];
					$datan = trim($data);
					$conditions[] = array('Travels.travel_name LIKE' => '%' . $datan . '%');
					
				}
			
			} 
			
		}
		$paginateArray['conditions'] = $conditions;
		
		$query = $this->Travels->find('all', ['contain' => ['Transactions',
								'TravelRegistrations' => function($q) {
								    $q->select([
								         'TravelRegistrations.travel_id',
								         'total' => $q->func()->count('TravelRegistrations.user_id')
								    ])->group('TravelRegistrations.travel_id', 'TravelRegistrations.user_id');
								    return $q;
								}], 'conditions' => ['And' => $conditions]]);				
		$travels = $this->paginate($query);
		
		$this->set(compact('pageTitle', 'travels'));
	
	}

	/**
	 * Registered members for travel method
	 *
	 * @param string|null $id travel id.
	 * @return \Cake\Http\Response|null.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */

	public function registered($id = null)
    {
		$pageTitle = 'Attendee List';
		
        $travels = $this->Travels->get($id, [
            'contain' => [ 'TravelRegistrations'=>['Users'=>['UserProfiles']]],
        ]);		
		
		$this->set(compact('pageTitle', 'travels'));
	}

	/**
	 * View method
	 *
	 * @param string|null $id Travel id.
	 * @return \Cake\Http\Response|null
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null) {
		$travel = $this->Travels->get($id, [
			'contain' => ['Locations', 'Transactions', 'TravelRegistrations'],
		]);

		$this->set('travel', $travel);
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add() {
		$pageTitle = "Add Travel Event";
		$travel = $this->Travels->newEntity();
		if ($this->request->is('post')) {

			// insert image
			$data = $this->request->getData();
			$data['depart_date'] = date('Y-m-d H:i:s', strtotime($data['depart_date']));

			if (!empty($data['return_date'])) {
				$data['return_date'] = date('Y-m-d H:i:s', strtotime($data['return_date']));
			}

			if (!empty($data['pay_due'])) {
				$data['pay_due'] = date('Y-m-d', strtotime($data['pay_due']));
			}

			if (!empty($data['featured_image']['name'])) {
				$file = $data['featured_image']; //put the  data into a var for easy use
				$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
				$arr_ext = array('jpg', 'jpeg', 'gif', 'png', 'PNG', 'JPG', 'JPEG', 'GIF'); //set allowed extensions
				if (in_array($ext, $arr_ext)) {
					if ($file['size'] > 2000000) {
						$this->Flash->error('Maximum 2 MB file size allowed.');
					}
					//do the actual uploading of the file. First arg is the tmp name, second arg is
					//where we are putting it
					if (move_uploaded_file($file['tmp_name'], WWW_ROOT . 'files' . DS . 'travel-photo' . DS . 'travel-photo_' . $file['name'])) {
						//prepare the filename for database entry
						$data['featured_image'] = 'travel-photo_' . $file['name'];
					}
				}
			}

			$travel = $this->Travels->patchEntity($travel, $data);
			if ($this->Travels->save($travel)) {
				$this->Flash->success(__('The travel has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The travel could not be saved. Please, try again.'));
		}
		$locations = $this->Travels->Locations->find('list', ['keyField' => 'id', 'valueField' => 'location_name']);
		$this->set(compact('pageTitle', 'travel', 'locations'));
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id Travel id.
	 * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function edit($id = null) {
		$pageTitle = "Edit Travel Event";
		$travel = $this->Travels->get($id, [
			'contain' => [],
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->getData();
			$data['depart_date'] = date('Y-m-d  H:i:s', strtotime($data['depart_date']));

			if (!empty($data['return_date'])) {
				$data['return_date'] = date('Y-m-d H:i:s', strtotime($data['return_date']));
			}

			if (!empty($data['pay_due'])) {
				$data['pay_due'] = date('Y-m-d', strtotime($data['pay_due']));
			}
			$travel = $this->Travels->patchEntity($travel, $data);
			if ($this->Travels->save($travel)) {
				$this->Flash->success(__('The travel has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The travel could not be saved. Please, try again.'));
		}
		$locations = $this->Travels->Locations->find('list', ['limit' => 200]);
		$this->set(compact('pageTitle', 'travel', 'locations'));
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Travel id.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null) {
		$this->request->allowMethod(['post', 'delete']);
		$travel = $this->Travels->get($id);
		if ($this->Travels->delete($travel)) {
			$this->Flash->success(__('The travel has been deleted.'));
		} else {
			$this->Flash->error(__('The travel could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
