<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Types Controller
 *
 * @property \App\Model\Table\TypesTable $Invoices
 *
 * @method \App\Model\Entity\Invoice[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TypesController extends AppController
{
	
	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $types = $this->paginate($this->Types);

        $this->set(compact('types'));
    }

    
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $type = $this->Types->newEntity();
        if ($this->request->is('post')) {
            $type = $this->Types->patchEntity($type, $this->request->getData());
            if ($this->Types->save($type)) {
                $this->Flash->success(__('The Type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Type could not be saved. Please, try again.'));
        }
        $this->set(compact('type'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $type = $this->Types->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $type = $this->Types->patchEntity($type, $this->request->getData());
            if ($this->Types->save($type)) {
                $this->Flash->success(__('The Type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Types could not be saved. Please, try again.'));
        }
        $this->set(compact('type'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $type = $this->Types->get($id);
        if ($this->Types->delete($type)) {
            $this->Flash->success(__('The Type has been deleted.'));
        } else {
            $this->Flash->error(__('The Type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    
    public function ajaxAllTypes() {

        $this->autoRender = false;
        $this->viewBuilder()->setLayout(false);

        if ($this->request->is('ajax')) {
            $types = $this->Types->find()->where(['Types.status' => 1]);
            echo json_encode($types);
           
        }
        exit;
   }
}
