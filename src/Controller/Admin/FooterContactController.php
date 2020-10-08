<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * FooterContact Controller
 *
 * @property \App\Model\Table\FooterContactTable $FooterContact
 *
 * @method \App\Model\Entity\FooterContact[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FooterContactController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
		$pageTitle = 'Footer Contact Details';
        $footerContact = $this->paginate($this->FooterContact);

        $this->set(compact('pageTitle','footerContact'));
    }

    /**
     * View method
     *
     * @param string|null $id Footer Contact id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $footerContact = $this->FooterContact->get($id, [
            'contain' => [],
        ]);

        $this->set('footerContact', $footerContact);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $footerContact = $this->FooterContact->newEntity();
        if ($this->request->is('post')) {
            $footerContact = $this->FooterContact->patchEntity($footerContact, $this->request->getData());
            if ($this->FooterContact->save($footerContact)) {
                $this->Flash->success(__('The footer contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The footer contact could not be saved. Please, try again.'));
        }
        $this->set(compact('footerContact'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Footer Contact id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$pageTitle = 'Edit Footer Contact Details';
		$footercontactid = base64_decode($id);
        $footerContact = $this->FooterContact->get($footercontactid, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $footerContact = $this->FooterContact->patchEntity($footerContact, $this->request->getData());
            if ($this->FooterContact->save($footerContact)) {
                $this->Flash->success(__('The footer contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The footer contact could not be saved. Please, try again.'));
        }
        $this->set(compact('pageTitle','footerContact'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Footer Contact id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $footerContact = $this->FooterContact->get($id);
        if ($this->FooterContact->delete($footerContact)) {
            $this->Flash->success(__('The footer contact has been deleted.'));
        } else {
            $this->Flash->error(__('The footer contact could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
