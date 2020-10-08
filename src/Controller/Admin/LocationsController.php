<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Locations Controller
 *
 * @property \App\Model\Table\LocationsTable $Locations
 *
 * @method \App\Model\Entity\Location[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LocationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
		$pageTitle = 'Locations';
		$paginateArray = ['contain' => ['States'],];
		$this->paginate = $paginateArray;	
        $locations = $this->paginate($this->Locations);
		
		$this->set(compact('locations','pageTitle'));
    }

    /**
     * View method
     *
     * @param string|null $id Location id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $location = $this->Locations->get($id, [
            'contain' => [''],
        ]);

        $this->set('location', $location);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$pageTitle = 'Add Location';
        $location = $this->Locations->newEntity();
        if ($this->request->is('post')) {
            $location = $this->Locations->patchEntity($location, $this->request->getData());
            if ($this->Locations->save($location)) {
                $this->Flash->success(__('The location has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The location could not be saved. Please, try again.'));
        }
		$states = $this->Locations->States->find('list', [ 'keyField'   => 'id', 'valueField' => 'state_name']);
        $this->set(compact('pageTitle','location','states'));
    }


     /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function ajaxAdd()
    {   
        $this->autoRender = false;
        $this->viewBuilder()->setLayout(false);

        $location = $this->Locations->newEntity();
        if ($this->request->is('post')) {
           
            $location = $this->Locations->patchEntity($location, $this->request->getData());
            if ($this->Locations->save($location)) {
                $data = $this->request->getData();
                $data['id'] = $location->id;
                echo json_encode($data);
            }else{
                echo json_encode(["message"=> "error"]);
            }
        }
        exit;
    }

    /**
     * Edit method
     *
     * @param string|null $id Location id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$pageTitle = 'Edit Location';
		$locationid = base64_decode($id);
        $location = $this->Locations->get($locationid);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $location = $this->Locations->patchEntity($location, $this->request->getData());
            if ($this->Locations->save($location)) {
                $this->Flash->success(__('The location has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The location could not be saved. Please, try again.'));
        }
		$states = $this->Locations->States->find('list', [ 'keyField'   => 'id', 'valueField' => 'state_name']);
        $this->set(compact('location','states','pageTitle'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Location id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $location = $this->Locations->get($id);
        if ($this->Locations->delete($location)) {
            $this->Flash->success(__('The location has been deleted.'));
        } else {
            $this->Flash->error(__('The location could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
