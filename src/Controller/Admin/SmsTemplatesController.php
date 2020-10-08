<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * SmsTemplates Controller
 *
 * @property \App\Model\Table\SmsTemplatesTable $SmsTemplates
 *
 * @method \App\Model\Entity\SmsTemplate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SmsTemplatesController extends AppController
{
    

	  public function initialize()
    {
		parent::initialize();
        $this->loadComponent('Sms');
    }
	
	/**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
		$pageTitle = 'Sms Templates';
        $smsTemplates = $this->paginate($this->SmsTemplates);

        $this->set(compact('pageTitle','smsTemplates'));
    }

    /**
     * View method
     *
     * @param string|null $id Sms Template id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $smsTemplate = $this->SmsTemplates->get($id, [
            'contain' => [],
        ]);

        $this->set('smsTemplate', $smsTemplate);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $smsTemplate = $this->SmsTemplates->newEntity();
        if ($this->request->is('post')) {
            $smsTemplate = $this->SmsTemplates->patchEntity($smsTemplate, $this->request->getData());
            if ($this->SmsTemplates->save($smsTemplate)) {
                $this->Flash->success(__('The sms template has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sms template could not be saved. Please, try again.'));
        }
        $this->set(compact('smsTemplate'));
    }

	/**
	 * Mass SMS method
	 *
	 * @param $id
	 * @return \Cake\Http\Response|null Redirects on successful list, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function massSms()
    {
		$pageTitle = 'Mass Sms';
        $smsTemplate = $this->SmsTemplates->newEntity();
        if ($this->request->is('post')) {
            $smsTemplate = $this->SmsTemplates->patchEntity($smsTemplate, $this->request->getData());
            if ($this->SmsTemplates->save($smsTemplate)) {
                $this->Flash->success(__('The sms template has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sms template could not be saved. Please, try again.'));
        }
        $this->set(compact('pageTitle','smsTemplate'));
    }
	
	/**
	 * Send Mass SMS method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful Mass SMS Sent, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function sendmassSms()
    {
		$this->autoRender = false;
		$this->viewBuilder()->setLayout(false);
		$pageTitle = 'Mass Sms';
		$this->loadModel('Leads');
		$this->loadModel('Users');
		$this->loadModel('SmsTemplates');
		
		if ($this->request->is(['patch', 'post', 'put'])) {
				
				$data = $this->request->getData();
				$smstemplate = $data['template_body'];
				
				if($data['filter_type']==1) // Seattle All leads
				{
				$leads =  $this->Leads->find()->where(['Leads.location_id' => 1])->toArray();	
				}
				else if($data['filter_type']==2) // Seattle All leads with No Show
				{
				$leads =  $this->Leads->find()->where(['Leads.location_id' => 1, 'Leads.lead_status_id' => 9])->toArray();
				}
				else if($data['filter_type']==3) // Seattle All leads with No Sale
				{
				$leads =  $this->Leads->find()->where(['Leads.location_id' => 1, 'Leads.lead_status_id' => 11])->toArray();
				}
				else if($data['filter_type']==4) // Seattle All leads with cancelled appointments
				{
				$leads =  $this->Leads->find()->where(['Leads.location_id' => 1, 'Leads.lead_status_id' => 10])->toArray();	
				}
				else if($data['filter_type']==5) // Seattle female members of specific age group
				{
				$age = explode(",", $data['femaleage']);	
					
				$memberrecords = $this->Users->find()->contain(['UserProfiles'])->where(['Users.role_id' => 3, 'Users.location_id' => 1, 'UserProfiles.sex' => 2])->toArray();
				$members = array(); 
					foreach($memberrecords as $memberrecord){
						$dob = $memberrecord->user_profile->dob;
						$today = date("Y-m-d");					
						$diff = date_diff(date_create($dob), date_create($today));
						$memberage = $diff->format('%y');					
						if(($memberage >= $age[0]) && ($memberage <= $age[1])){
							$members[] = $memberrecord; 
						}
					}
				}
				else if($data['filter_type']==6) // Seattle male members of specific age group
				{
				$age = explode(",", $data['maleage']);	
					
				$memberrecords = $this->Users->find()->contain(['UserProfiles'])->where(['Users.role_id' => 3, 'Users.location_id' => 1, 'UserProfiles.sex' => 1])->toArray();
				$members = array(); 
					foreach($memberrecords as $memberrecord){
						$dob = $memberrecord->user_profile->dob;
						$today = date("Y-m-d");					
						$diff = date_diff(date_create($dob), date_create($today));
						$memberage = $diff->format('%y');					
						if(($memberage >= $age[0]) && ($memberage <= $age[1])){
							$members[] = $memberrecord; 
						}
					}
				
				} 
				else if($data['filter_type']==7) // Seattle All Active members
				{
				$members = $this->Users->find()->contain(['UserProfiles'])->where(['Users.role_id' => 3, 'Users.location_id' => 1, 'Users.status' => 1])->toArray();
				}
				else if($data['filter_type']==8) // Seattle Non Active members
				{
				$members = $this->Users->find()->contain(['UserProfiles'])->where(['Users.role_id' => 3, 'Users.location_id' => 1, 'Users.status' => 0])->toArray();
				}
				else if($data['filter_type']==9) // seattle specific age group
				{
					$age = explode(",", $data['age']);
								
				$memberrecords = $this->Users->find()->contain(['UserProfiles'])->where(['Users.role_id' => 3, 'Users.location_id' => 1])->toArray();
				$members = array(); 
					foreach($memberrecords as $memberrecord){
						$dob = $memberrecord->user_profile->dob;
						$today = date("Y-m-d");					
						$diff = date_diff(date_create($dob), date_create($today));
						$memberage = $diff->format('%y');					
						if(($memberage >= $age[0]) && ($memberage <= $age[1])){
							$members[] = $memberrecord; 
						}
					}				 				 
				}
				else if($data['filter_type']==10)  // Denver All leads 
				{
				$leads =  $this->Leads->find()->where(['Leads.location_id' => 2])->toArray();	
				}
				else if($data['filter_type']==11) // Denver All leads with No Show
				{
				$leads =  $this->Leads->find()->where(['Leads.location_id' => 2, 'Leads.lead_status_id' => 9])->toArray();
				}
				else if($data['filter_type']==12) // Denver All leads with No Sale
				{
				$leads =  $this->Leads->find()->where(['Leads.location_id' => 2, 'Leads.lead_status_id' => 11])->toArray();
				}
				else if($data['filter_type']==13) // Denver All leads with cancelled appointments
				{
				$leads =  $this->Leads->find()->where(['Leads.location_id' => 2, 'Leads.lead_status_id' => 10])->toArray();	
				}
				else if($data['filter_type']==14) // Denver female members of specific age group
				{
				$age = explode(",", $data['femaleage']);	
					
				$memberrecords = $this->Users->find()->contain(['UserProfiles'])->where(['Users.role_id' => 3, 'Users.location_id' => 2, 'UserProfiles.sex' => 2])->toArray();
				$members = array(); 
					foreach($memberrecords as $memberrecord){
						$dob = $memberrecord->user_profile->dob;
						$today = date("Y-m-d");					
						$diff = date_diff(date_create($dob), date_create($today));
						$memberage = $diff->format('%y');					
						if(($memberage >= $age[0]) && ($memberage <= $age[1])){
							$members[] = $memberrecord; 
						}
					}
				}
				else if($data['filter_type']==15) // Denver male members of specific age group
				{
				$age = explode(",", $data['maleage']);						
				$memberrecords = $this->Users->find()->contain(['UserProfiles'])->where(['Users.role_id' => 3, 'Users.location_id' => 2, 'UserProfiles.sex' => 1])->toArray();
				$members = array();
					foreach($memberrecords as $memberrecord){
						$dob = $memberrecord->user_profile->dob;
						$today = date("Y-m-d");					
						$diff = date_diff(date_create($dob), date_create($today));
						$memberage = $diff->format('%y');					
						if(($memberage >= $age[0]) && ($memberage <= $age[1])){
							$members[] = $memberrecord; 
						}
					}				 
				}
				else if($data['filter_type']==16) // Denver All Active members
				{
				$members = $this->Users->find()->contain(['UserProfiles'])->where(['Users.role_id' => 3, 'Users.location_id' => 2, 'Users.status' => 1])->toArray();
				}
				else if($data['filter_type']==17) // Denver All Non Active members
				{
				$members = $this->Users->find()->contain(['UserProfiles'])->where(['Users.role_id' => 3, 'Users.location_id' => 2, 'Users.status' => 0])->toArray();
				}
				else if($data['filter_type']==18) // denver specific age group
				{
					$age = explode(",", $data['age']);
								
				$memberrecords = $this->Users->find()->contain(['UserProfiles'])->where(['Users.role_id' => 3, 'Users.location_id' => 2])->toArray();
				$members = array();
					foreach($memberrecords as $memberrecord){
						$dob = $memberrecord->user_profile->dob;
						$today = date("Y-m-d");					
						$diff = date_diff(date_create($dob), date_create($today));
						$memberage = $diff->format('%y');					
						if(($memberage >= $age[0]) && ($memberage <= $age[1])){
							$members[] = $memberrecord; 
						}
					}
				}
				else if($data['filter_type']==19)  // Austin All leads 
				{
				$leads =  $this->Leads->find()->where(['Leads.location_id' => 3])->toArray();
				
				}
				else if($data['filter_type']==20) // Austin All leads with No Show
				{
				$leads =  $this->Leads->find()->where(['Leads.location_id' => 3, 'Leads.lead_status_id' => 9])->toArray();
				}
				else if($data['filter_type']==21) // Austin All leads with No Sale
				{
				$leads =  $this->Leads->find()->where(['Leads.location_id' => 3, 'Leads.lead_status_id' => 11])->toArray();
				}
				else if($data['filter_type']==22) // Austin All leads with cancelled appointments
				{
				$leads =  $this->Leads->find()->where(['Leads.location_id' => 3, 'Leads.lead_status_id' => 10])->toArray();	
				}
				else if($data['filter_type']==23) // Austin female members of specific age group
				{
				$age = explode(",", $data['femaleage']);	
					
				$memberrecords = $this->Users->find()->contain(['UserProfiles'])->where(['Users.role_id' => 3, 'Users.location_id' => 3, 'UserProfiles.sex' => 2])->toArray();
				$members = array();
					foreach($memberrecords as $memberrecord){
						$dob = $memberrecord->user_profile->dob;
						$today = date("Y-m-d");					
						$diff = date_diff(date_create($dob), date_create($today));
						$memberage = $diff->format('%y');					
						if(($memberage >= $age[0]) && ($memberage <= $age[1])){
							$members[] = $memberrecord; 
						}
					}
				}
				else if($data['filter_type']==24) // Austin male members of specific age group
				{
				$age = explode(",", $data['maleage']);	
					
				$memberrecords = $this->Users->find()->contain(['UserProfiles'])->where(['Users.role_id' => 3, 'Users.location_id' => 3, 'UserProfiles.sex' => 1])->toArray();
				$members = array();
					foreach($memberrecords as $memberrecord){
						$dob = $memberrecord->user_profile->dob;
						$today = date("Y-m-d");					
						$diff = date_diff(date_create($dob), date_create($today));
						$memberage = $diff->format('%y');					
						if(($memberage >= $age[0]) && ($memberage <= $age[1])){
							$members[] = $memberrecord; 
						}
					}
				
				}
				else if($data['filter_type']==25) // Austin All Active members
				{
				$members = $this->Users->find()->contain(['UserProfiles'])->where(['Users.role_id' => 3, 'Users.location_id' => 3, 'Users.status' => 1])->toArray();
				}
				else if($data['filter_type']==26) // Austin All Non Active members
				{
				$members = $this->Users->find()->contain(['UserProfiles'])->where(['Users.role_id' => 3, 'Users.location_id' => 3, 'Users.status' => 0])->toArray();
				}
				else if($data['filter_type']==27) // austin specific age group
				{
					$age = explode(",", $data['age']);
								
				 $memberrecords = $this->Users->find()->contain(['UserProfiles'])->where(['Users.role_id' => 3, 'Users.location_id' => 3])->toArray();
				 $members = array();
					foreach($memberrecords as $memberrecord){
						$dob = $memberrecord->user_profile->dob;
						$today = date("Y-m-d");					
						$diff = date_diff(date_create($dob), date_create($today));
						$memberage = $diff->format('%y');					
						if(($memberage >= $age[0]) && ($memberage <= $age[1])){
							$members[] = $memberrecord; 
						}
					}
				}
				
			if(isset($members)){
				
				foreach ($members as $member) {						
					$number = $member->user_profile->mobile;					
					$send_sms = $this->Sms->sendSms($number,$smstemplate);				
				}				
				
			} else {
				
				foreach ($leads as $lead) {	
					$number = $lead->lead_mobile;					
					$send_sms = $this->Sms->sendSms($number,$smstemplate);					
				}	
								
			}
			
				
        }
		$this->set(compact('pageTitle'));
    }
    /**
     * Edit method
     *
     * @param string|null $id Sms Template id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$pageTitle = 'Edit Sms Template';
		$smsid = base64_decode($id);
        $smsTemplate = $this->SmsTemplates->get($smsid, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $smsTemplate = $this->SmsTemplates->patchEntity($smsTemplate, $this->request->getData());
            if ($this->SmsTemplates->save($smsTemplate)) {
                $this->Flash->success(__('The sms template has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sms template could not be saved. Please, try again.'));
        }
        $this->set(compact('pageTitle','smsTemplate'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sms Template id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $smsTemplate = $this->SmsTemplates->get($id);
        if ($this->SmsTemplates->delete($smsTemplate)) {
            $this->Flash->success(__('The sms template has been deleted.'));
        } else {
            $this->Flash->error(__('The sms template could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
