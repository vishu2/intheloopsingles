<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Events Controller
 *
 * @property \App\Model\Table\EventsTable $Events
 *
 * @method \App\Model\Entity\Event[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EventsController extends AppController {

	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|null
	 */
	public function index() {

		$pageTitle = 'Events';
		$paginateArray = [];
		$conditions = [];
		if ($this->request->is('get')) {

			if (isset($this->request->getQuery()['action'])) {

				if (!empty($this->request->getQuery()['name']) && $this->request->getQuery()['name'] != '') {
					$data = $this->request->getQuery()['name'];
					$datan = trim($data);
					$conditions[] = array('Events.event_name LIKE' => '%' . $datan . '%');
				}
				

			} 
		}
		
		$query = $this->Events->find('all', ['contain' => ['Attires', 'Vendors', 'Locations',
								'EventRegistrations' => function($q) {
								    $q->select([
								         'EventRegistrations.event_id',
								         'total' => $q->func()->count('EventRegistrations.user_id')
								    ])->group('EventRegistrations.event_id', 'EventRegistrations.user_id');
								    return $q;
								}], 'conditions' => ['And' => $conditions]]);
		
		
		$events = $this->paginate($query);
		
		$this->set(compact('pageTitle', 'events'));
	}

	/**
	 * View method
	 *
	 * @param string|null $id Event id.
	 * @return \Cake\Http\Response|null
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null) {
		$event = $this->Events->get($id, [
			'contain' => ['Attires', 'Vendors', 'Locations', 'EventRegistrations', 'Transactions'],
		]);

		$this->set('event', $event);
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add() {
		$pageTitle = 'Add Event';
		$event = $this->Events->newEntity();

		if ($this->request->is('post')) {

			// insert image
			$data = $this->request->getData();
			$data['start_date'] = date('Y-m-d H:i:s', strtotime($data['start_date']));
			if (!empty($data['end_date'])) {
				$data['end_date'] = date('Y-m-d H:i:s', strtotime($data['end_date']));

			}

			if (!empty($data['registration_close_date'])) {
				$data['registration_close_date'] = date('Y-m-d H:i:s', strtotime($data['registration_close_date']));
			}
			if (!empty($data['cancellation_date'])) {
				$data['cancellation_date'] = date('Y-m-d', strtotime($data['cancellation_date']));
			}
			
			if (!empty($data['event_photo']['name'])) {
				$file = $data['event_photo']; //put the  data into a var for easy use
				$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
				$arr_ext = array('jpg', 'jpeg', 'gif', 'png', 'PNG', 'JPG', 'JPEG', 'GIF'); //set allowed extensions
				if (in_array($ext, $arr_ext)) {
					if ($file['size'] > 2000000) {
						$this->Flash->error('Maximum 2 MB file size allowed.');
					}
					//do the actual uploading of the file. First arg is the tmp name, second arg is
					//where we are putting it
					if (move_uploaded_file($file['tmp_name'], WWW_ROOT . 'files' . DS . 'event-photo' . DS . 'event_photo_' . $file['name'])) {
						//prepare the filename for database entry
						$data['event_photo'] = 'event_photo_' . $file['name'];
					}
				}
			}
			//  image insert

			$event = $this->Events->patchEntity($event, $data);

			if ($this->Events->save($event)) {
				$this->Flash->success(__('The event has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The event could not be saved. Please, try again.'));
		}
		$attires = $this->Events->Attires->find('list', ['keyField' => 'id', 'valueField' => 'attire_name']);
		$vendors = $this->Events->Vendors->find('list', ['keyField' => 'id', 'valueField' => 'vendor_name']);
		$locations = $this->Events->Locations->find('list', ['keyField' => 'id', 'valueField' => 'location_name']);
		$this->set(compact('pageTitle', 'event', 'attires', 'vendors', 'locations'));
	}

	/**
	 * Registered Members method
	 *
	 * @param $id
	 * @return \Cake\Http\Response|null Redirects on successful list, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function registered($id = null)
    {
		$pageTitle = 'Registered Users Detail';
		
        $events = $this->Events->get($id, [
            'contain' => [ 'EventRegistrations'=>['Users'=>['UserProfiles']]],
        ]);		
		
		$this->set(compact('pageTitle', 'events'));
      
    }
	 
	/**
	 * Edit method
	 *
	 * @param $id
	 * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function edit($id = null) {
		$pageTitle = 'Edit Event';
		$event = $this->Events->get($id, [
			'contain' => ['Attires'],
		]);

		if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->getData();
			$data['start_date'] = date('Y-m-d H:i:s', strtotime($data['start_date']));
			if (!empty($data['end_date'])) {
				$data['end_date'] = date('Y-m-d H:i:s', strtotime($data['end_date']));

			}

			if (!empty($data['registration_close_date'])) {
				$data['registration_close_date'] = date('Y-m-d H:i:s', strtotime($data['registration_close_date']));
			}
			
			if (!empty($data['cancellation_date'])) {
				$data['cancellation_date'] = date('Y-m-d', strtotime($data['cancellation_date']));
			}
			if (!empty($data['event_photo']['name'])) {
				$file = $data['event_photo']; //put the  data into a var for easy use
				$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
				$arr_ext = array('jpg', 'jpeg', 'gif', 'png', 'PNG', 'JPG', 'JPEG', 'GIF'); //set allowed extensions
				if (in_array($ext, $arr_ext)) {
					if ($file['size'] > 2000000) {
						$this->Flash->error('Maximum 2 MB file size allowed.');
					}
					//do the actual uploading of the file. First arg is the tmp name, second arg is
					//where we are putting it
					if (move_uploaded_file($file['tmp_name'], WWW_ROOT . 'files' . DS . 'event-photo' . DS . 'event_photo_' . $file['name'])) {
						//prepare the filename for database entry
						$data['event_photo'] = 'event_photo_' . $file['name'];
					}
				}
			} else {
				$data['event_photo'] = $event->event_photo;
			}

			$event = $this->Events->patchEntity($event, $data);
			if ($this->Events->save($event)) {
				$this->Flash->success(__('The event has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The event could not be saved. Please, try again.'));
		}
		$attires = $this->Events->Attires->find('list', ['keyField' => 'id', 'valueField' => 'attire_name']);
		$vendors = $this->Events->Vendors->find('list', ['keyField' => 'id', 'valueField' => 'vendor_name']);
		$locations = $this->Events->Locations->find('list', ['keyField' => 'id', 'valueField' => 'location_name']);
		$this->set(compact('pageTitle', 'event', 'attires', 'vendors', 'locations'));
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Event id.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null) {
		$this->request->allowMethod(['post', 'delete']);
		$event = $this->Events->get($id);
		if ($this->Events->delete($event)) {
			$this->Flash->success(__('The event has been deleted.'));
		} else {
			$this->Flash->error(__('The event could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
