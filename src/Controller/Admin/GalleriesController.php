<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Filesystem\File;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

/**
 * Galleries Controller
 *
 * @property \App\Model\Table\GalleriesTable $Galleries
 *
 * @method \App\Model\Entity\Gallery[] paginate($object = null, array $settings = [])
 */
class GalleriesController extends AppController {

	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|void
	 */
	public function index() {
		$pageTitle = 'Galleries';
		$paginateArray = [
			'order' => ['Galleries.created' => 'DESC'],
		];

		if ($this->request->is('get')) {

			$conditions = [];

			if (!empty($this->request->getQuery()['search'])) {
				$data=$this->request->getQuery()['search'];
				$datan = trim($data);
				$conditions[] = array('Galleries.name LIKE' => '%' . $datan . '%');
				$paginateArray['conditions'] = ['OR' => $conditions];
			}
		}

		$this->paginate = $paginateArray;
		$galleries = $this->paginate($this->Galleries);

		$this->set(compact('pageTitle', 'galleries'));
		$this->set('_serialize', ['galleries']);
	}

	/**
	 * View method
	 *
	 * @param string|null $id Gallery id.
	 * @return \Cake\Http\Response|void
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null) {
		$gallery = $this->Galleries->get($id, [
			'contain' => ['Images', 'Tours'],
		]);

		$this->set('gallery', $gallery);
		$this->set('_serialize', ['gallery']);
	}

	/**
	 * Get Images method
	 *
	 * @param string|null $id Gallery id.
	 * @return \Cake\Http\Response|void
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function getImages($id = null) {

		$galleries_result = $this->Galleries->get($id, [
			'contain' => ['Images'],
		]);

		echo json_encode(array('result' => $galleries_result));
		die;

	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add() {
		$pageTitle = 'Add Gallery';
		$gallery = $this->Galleries->newEntity();
		if ($this->request->is('post')) {
			$gallery = $this->Galleries->patchEntity($gallery, $this->request->getData());
			if ($this->Galleries->save($gallery)) {
				$this->Flash->success(__('The gallery has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The gallery could not be saved. Please, try again.'));
		}
		$this->set(compact('pageTitle', 'gallery'));
		$this->set('_serialize', ['gallery']);
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id Gallery id.
	 * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null) {
		$pageTitle = 'Edit Gallery';
		$galleryid = base64_decode($id);
		$gallery = $this->Galleries->get($galleryid, [
			'contain' => [],
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$gallery = $this->Galleries->patchEntity($gallery, $this->request->getData());
			if ($this->Galleries->save($gallery)) {
				$this->Flash->success(__('The gallery has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The gallery could not be saved. Please, try again.'));
		}
		$this->set(compact('pageTitle', 'gallery'));
		$this->set('_serialize', ['gallery']);
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Gallery id.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null) {

		$this->request->allowMethod(['post', 'delete']);
		$gallery = $this->Galleries->get($id);
		if ($this->Galleries->delete($gallery)) {
			$this->Flash->success(__('The gallery has been deleted.'));
		} else {
			$this->Flash->error(__('The gallery could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}

	/**
	 * Image Upload method
	 *
	 * @param string|null $id image id.
	 * @return \Cake\Http\Response|null Redirects on successful upload image, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function imgUpload($id = null) {

		$this->autoRender = false;
		// example options
		$options = array(
			'max_file_size' => 2048000,
			//'max_number_of_files' => 10,
			'access_control_allow_methods' => array(
				'POST',
			),
			'access_control_allow_origin' => Router::fullBaseUrl(),
			'accept_file_types' => '/\.(jpe?g|png)$/i',
			'upload_dir' => WWW_ROOT . 'files' . DS . 'uploads' . DS,
			'upload_url' => '/files/uploads/',
			'print_response' => false,
		);

		$result = $this->JqueryFileUpload->upload($options);

		$this->loadModel("Images");

		if ($result) {
			$ImageTable = TableRegistry::get('Images');
			$Image = $ImageTable->newEntity();

			$Image->name = $result['files'][0]->name;
			$Image->url = $result['files'][0]->url;
			$Image->thumbnail_url = $result['files'][0]->thumbnailUrl;
			$Image->gallery_id = $this->request->getData()['id'];
			$Image->user_id = $this->Auth->user('id');

			if ($ImageTable->save($Image)) {
				$id = $Image->id;
				$ImageResult = $ImageTable->get($id);
				echo json_encode($ImageResult);
				exit;
			}
		}
	}

	/**
	 * Delete Image method
	 *
	 * @param string|null $id image id.
	 * @return \Cake\Http\Response|null Redirects on successful delete image, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function deleteImage($id = null) {
		$this->autoRender = false;
		$ImageTable = TableRegistry::get('Images');
		$Image = $ImageTable->get($id);
		$deleteOk = $ImageTable->delete($Image);

		$file = new File(WWW_ROOT . $Image->url, false, 0777);
		$file->delete();

		$fileThumb = new File(WWW_ROOT . $Image->thumbnail_url, false, 0777);
		$fileThumb->delete();

		echo json_encode(array("message" => "deleted", "code" => 1));

		exit;
	}

	/**
	 * Set As Default method
	 *
	 * @param string|null $gid gallery id, $imgid image id.
	 * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function setAsDefault($gid = null, $imgid = null) {
		$this->autoRender = false;
		if ($this->request->is('ajax')) {

			$galleryTable = Tableregistry::get('Galleries');
			$gallery = $galleryTable->get($gid);

			$gallery->default_image_id = $imgid;

			if ($galleryTable->save($gallery)) {
				echo json_encode(array("message" => 'success', 'code' => 1));
				exit;
			}

		}
	}
}
