<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Vendors Controller
 *
 * @property \App\Model\Table\VendorsTable $Vendors
 *
 * @method \App\Model\Entity\Vendor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendorsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
		$pageTitle = 'Vendors';
		$paginateArray = ['contain' => ['States'],];
		$conditions = [];
		if ($this->request->is('get')) {

			if (isset($this->request->getQuery()['action'])) {

				if (!empty($this->request->getQuery()['name']) && $this->request->getQuery()['name'] != '') {
					$data=$this->request->getQuery()['name'];
					$datan = trim($data);
					$conditions[] = array('Vendors.vendor_name LIKE' => '%' . $datan . '%');
				}
				$paginateArray['conditions'] = ['AND' => $conditions];

			} else {
			}
		}
		$paginateArray['conditions'] = $conditions;		
		$this->paginate = $paginateArray;		
		$vendors = $this->paginate($this->Vendors);	
		$this->set(compact('pageTitle', 'vendors'));
    }

    /**
     * View method
     *
     * @param string|null $id Vendor id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vendor = $this->Vendors->get($id, [
            'contain' => ['States', 'Events'],
        ]);

        $this->set('vendor', $vendor);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$pageTitle = 'Vendors';
        $vendor = $this->Vendors->newEntity();
        if ($this->request->is('post')) {
            $vendor = $this->Vendors->patchEntity($vendor, $this->request->getData());
            if ($this->Vendors->save($vendor)) {
                $this->Flash->success(__('The vendor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor could not be saved. Please, try again.'));
        }
        $states = $this->Vendors->States->find('list', [ 'keyField'   => 'id', 'valueField' => 'state_name']);
        $this->set(compact('pageTitle','vendor', 'states'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Vendor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$pageTitle = 'Vendors';
		$vendorid = base64_decode($id);
        $vendor = $this->Vendors->get($vendorid, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vendor = $this->Vendors->patchEntity($vendor, $this->request->getData());
            if ($this->Vendors->save($vendor)) {
                $this->Flash->success(__('The vendor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor could not be saved. Please, try again.'));
        }
		$states = $this->Vendors->States->find('list', [ 'keyField'   => 'id', 'valueField' => 'state_name']);
        $this->set(compact('pageTitle','vendor', 'states'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vendor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vendor = $this->Vendors->get($id);
        if ($this->Vendors->delete($vendor)) {
            $this->Flash->success(__('The vendor has been deleted.'));
        } else {
            $this->Flash->error(__('The vendor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
