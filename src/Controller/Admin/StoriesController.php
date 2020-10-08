<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Stories Controller
 *
 * @property \App\Model\Table\StoriesTable $Stories
 *
 * @method \App\Model\Entity\Story[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoriesController extends AppController {
	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|null
	 */
	public function index() {
		
		$pageTitle = 'Stories';
		$paginateArray = ['contain' => [],];
		$conditions = [];
		if ($this->request->is('get')) {

			if (isset($this->request->getQuery()['action'])) {

				if (!empty($this->request->getQuery()['name']) && $this->request->getQuery()['name'] != '') {
					$data=$this->request->getQuery()['name'];
					$datan = trim($data);
					$conditions[] = array('Stories.member_name LIKE' => '%' . $datan . '%');
				}
				$paginateArray['conditions'] = ['AND' => $conditions];

			} else {
			}
		}
		$paginateArray['conditions'] = $conditions;		
		$this->paginate = $paginateArray;		
		$stories = $this->paginate($this->Stories);	
		$this->set(compact('pageTitle', 'stories'));	
	}

	/**
	 * View method
	 *
	 * @param string|null $id Story id.
	 * @return \Cake\Http\Response|null
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null) {
		$story = $this->Stories->get($id, [
			'contain' => [],
		]);

		$this->set('story', $story);
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add() {
		$pageTitle = 'Add Story';
		$story = $this->Stories->newEntity();
		if ($this->request->is('post')) {
			// for inserting image
			$data = $this->request->getData();

			if (!empty($data['story_image']['name'])) {
				$file = $data['story_image'];

				$ext = substr(strtolower(strrchr($file['name'], '.')), 1);
				$arr_ext = array('jpg', 'jpeg', 'gif', 'png', 'PNG', 'JPG', 'JPEG', 'GIF');
				if (in_array($ext, $arr_ext)) {
					if ($file['size'] > 2000000) {
						$this->Flash->error('Maximum 2 MB file size allowed.');
					}

					if (move_uploaded_file($file['tmp_name'], WWW_ROOT . 'files' . DS . 'member-story-image' . DS . 'story_image_' . $file['name'])) {

						$data['story_image'] = 'story_image_' . $file['name'];
					}
				}
			} else {
				$data['story_image'] = $story->story_image;
			}
			// end here

			$story = $this->Stories->patchEntity($story, $data);
			if ($this->Stories->save($story)) {
				$this->Flash->success(__('The story has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The story could not be saved. Please, try again.'));
		}
		$this->set(compact('pageTitle', 'story'));
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id Story id.
	 * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function edit($id = null) {
		$pageTitle = 'Edit Story';
		$storiesid = base64_decode($id);
		$story = $this->Stories->get($storiesid, [
			'contain' => [],
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			// for inserting image
			$data = $this->request->getData();

			if (!empty($data['story_image']['name'])) {
				$file = $data['story_image'];

				$ext = substr(strtolower(strrchr($file['name'], '.')), 1);
				$arr_ext = array('jpg', 'jpeg', 'gif', 'png', 'PNG', 'JPG', 'JPEG', 'GIF');
				if (in_array($ext, $arr_ext)) {
					if ($file['size'] > 2000000) {
						$this->Flash->error('Maximum 2 MB file size allowed.');
					}

					if (move_uploaded_file($file['tmp_name'], WWW_ROOT . 'files' . DS . 'member-story-image' . DS . 'story_image_' . $file['name'])) {

						$data['story_image'] = 'story_image_' . $file['name'];
					}
				}
			} else {
				$data['story_image'] = $story->story_image;
			}
			// end here

			$story = $this->Stories->patchEntity($story, $data);
			if ($this->Stories->save($story)) {
				$this->Flash->success(__('The story has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The story could not be saved. Please, try again.'));
		}
		$this->set(compact('pageTitle', 'story'));
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Story id.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null) {
		$this->request->allowMethod(['post', 'delete']);
		$story = $this->Stories->get($id);
		if ($this->Stories->delete($story)) {
			$this->Flash->success(__('The story has been deleted.'));
		} else {
			$this->Flash->error(__('The story could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
