<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Hours Controller
 *
 * @property \App\Model\Table\HoursTable $Hours
 *
 * @method \App\Model\Entity\Hour[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HoursController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
		$pageTitle = 'Business Hours';
        $this->paginate = [
            'contain' => ['Locations'],
        ];
        $hours = $this->paginate($this->Hours);

        $this->set(compact('pageTitle','hours'));
    }

    /**
     * View method
     *
     * @param string|null $id Hour id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hour = $this->Hours->get($id, [
            'contain' => ['Locations'],
        ]);

        $this->set('hour', $hour);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hour = $this->Hours->newEntity();
        if ($this->request->is('post')) {
            $hour = $this->Hours->patchEntity($hour, $this->request->getData());
            if ($this->Hours->save($hour)) {
                $this->Flash->success(__('The hour has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hour could not be saved. Please, try again.'));
        }
        $locations = $this->Hours->Locations->find('list', ['limit' => 200]);
        $this->set(compact('hour', 'locations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Hour id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$pageTitle = 'Business Hours';
		$hourid = base64_decode($id);
        $hour = $this->Hours->get($hourid, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hour = $this->Hours->patchEntity($hour, $this->request->getData());
            if ($this->Hours->save($hour)) {
                $this->Flash->success(__('The hour has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hour could not be saved. Please, try again.'));
        }
       
		$locations = $this->Hours->Locations->find('list', [ 'keyField'   => 'id', 'valueField' => 'location_name']);
        $this->set(compact('pageTitle' ,'hour', 'locations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Hour id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hour = $this->Hours->get($id);
        if ($this->Hours->delete($hour)) {
            $this->Flash->success(__('The hour has been deleted.'));
        } else {
            $this->Flash->error(__('The hour could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
