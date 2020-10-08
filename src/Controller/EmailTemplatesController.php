<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * EmailTemplates Controller
 *
 * @property \App\Model\Table\EmailTemplatesTable $EmailTemplates
 *
 * @method \App\Model\Entity\EmailTemplate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmailTemplatesController extends AppController
{   
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        
        $this->viewBuilder()->setLayout('frontend');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $emailTemplates = $this->paginate($this->EmailTemplates);

        $this->set(compact('emailTemplates'));
    }

    /**
     * View method
     *
     * @param string|null $id Email Template id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $emailTemplate = $this->EmailTemplates->get($id, [
            'contain' => [],
        ]);

        $this->set('emailTemplate', $emailTemplate);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $emailTemplate = $this->EmailTemplates->newEntity();
        if ($this->request->is('post')) {
            $emailTemplate = $this->EmailTemplates->patchEntity($emailTemplate, $this->request->getData());

            if ($this->EmailTemplates->save($emailTemplate)) {
                $this->Flash->success(__('The email template has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The email template could not be saved. Please, try again.'));
        }
        $this->set(compact('emailTemplate'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Email Template id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $emailTemplate = $this->EmailTemplates->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $emailTemplate = $this->EmailTemplates->patchEntity($emailTemplate, $this->request->getData());
            if ($this->EmailTemplates->save($emailTemplate)) {
                $this->Flash->success(__('The email template has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The email template could not be saved. Please, try again.'));
        }
        $this->set(compact('emailTemplate'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Email Template id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $emailTemplate = $this->EmailTemplates->get($id);
        if ($this->EmailTemplates->delete($emailTemplate)) {
            $this->Flash->success(__('The email template has been deleted.'));
        } else {
            $this->Flash->error(__('The email template could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function changeStatus()
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $emailId = $this->request->getData()['id'];
            $emailStatus = $this->request->getData()['status'];
            $emailTemplates = $this->EmailTemplates->get($emailId);
            $emailTemplates->status = $emailStatus;
            if ($this->EmailTemplates->save($emailTemplates)) {
                echo json_encode( array('success' => 1));
            }else{
                echo json_encode( array('success' => 0));
            }
        }
        exit;
    }
}
