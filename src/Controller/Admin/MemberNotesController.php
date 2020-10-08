<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * MemberNotes Controller
 *
 * @property \App\Model\Table\MemberNotesTable $MemberNotes
 *
 * @method \App\Model\Entity\MemberNote[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MemberNotesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $memberNotes = $this->paginate($this->MemberNotes);

        $this->set(compact('memberNotes'));
    }

    /**
     * View method
     *
     * @param string|null $id Member Note id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $memberNote = $this->MemberNotes->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set('memberNote', $memberNote);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $memberNote = $this->MemberNotes->newEntity();
        if ($this->request->is('post')) {
            $memberNote = $this->MemberNotes->patchEntity($memberNote, $this->request->getData());
            if ($this->MemberNotes->save($memberNote)) {
                $this->Flash->success(__('The member note has been saved.'));

                return $this->redirect(['controller' => 'Users','action' => 'memberdetail', $this->request->getData('user_id')]);
            }
            $this->Flash->error(__('The member note could not be saved. Please, try again.'));
        }
        $users = $this->MemberNotes->Users->find('list', ['limit' => 200]);
        $this->set(compact('memberNote', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Member Note id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $memberNote = $this->MemberNotes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $memberNote = $this->MemberNotes->patchEntity($memberNote, $this->request->getData());
            if ($this->MemberNotes->save($memberNote)) {
                $this->Flash->success(__('The member note has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The member note could not be saved. Please, try again.'));
        }
        $users = $this->MemberNotes->Users->find('list', ['limit' => 200]);
        $this->set(compact('memberNote', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Member Note id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $memberNote = $this->MemberNotes->get($id);
        if ($this->MemberNotes->delete($memberNote)) {
            $this->Flash->success(__('The member note has been deleted.'));
        } else {
            $this->Flash->error(__('The member note could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
