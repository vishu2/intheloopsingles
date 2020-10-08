<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Attires Controller
 *
 * @property \App\Model\Table\AttiresTable $Attires
 *
 * @method \App\Model\Entity\Attire[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AttiresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
		
		
		$pageTitle = 'Attire Section';
		$paginateArray = [];
		$conditions = [];
		
		if ($this->request->is('get')) {

			if (isset($this->request->getQuery()['action'])) {

				if (!empty($this->request->getQuery()['name']) && $this->request->getQuery()['name'] != '') {
					$data=$this->request->getQuery()['name'];
					$datan = trim($data);
					$conditions[] = array('Attires.attire_name LIKE' => '%' . $datan. '%');
				}
				$paginateArray['conditions'] = ['AND' => $conditions];

			} else {
			}
		}
		
		$paginateArray['conditions'] = $conditions;		
		$this->paginate = $paginateArray;		
		$attires = $this->paginate($this->Attires);	
		$this->set(compact('pageTitle', 'attires'));
		
		
    }

    /**
     * View method
     *
     * @param string|null $id Attire id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $attire = $this->Attires->get($id, [
            'contain' => ['Events'],
        ]);

        $this->set('attire', $attire);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$pageTitle = 'Attire Section';
        $attire = $this->Attires->newEntity();
        if ($this->request->is('post')) {
            $attire = $this->Attires->patchEntity($attire, $this->request->getData());
            if ($this->Attires->save($attire)) {
                $this->Flash->success(__('The attire has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The attire could not be saved. Please, try again.'));
        }
        $this->set(compact('pageTitle', 'attire'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Attire id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$pageTitle = 'Attire Section';
        $attire = $this->Attires->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $attire = $this->Attires->patchEntity($attire, $this->request->getData());
            if ($this->Attires->save($attire)) {
                $this->Flash->success(__('The attire has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The attire could not be saved. Please, try again.'));
        }
        $this->set(compact('pageTitle','attire'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Attire id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attire = $this->Attires->get($id);
        if ($this->Attires->delete($attire)) {
            $this->Flash->success(__('The attire has been deleted.'));
        } else {
            $this->Flash->error(__('The attire could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
