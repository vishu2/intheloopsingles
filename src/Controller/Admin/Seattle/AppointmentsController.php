<?php
namespace App\Controller\Admin\Seattle;

use App\Controller\Admin\AppController;
use Cake\Core\Configure;

/**
 * Appointments Controller
 *
 * @property \App\Model\Table\AppointmentsTable $Appointments
 *
 * @method \App\Model\Entity\Appointment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AppointmentsController extends AppController
{
    
       public function initialize()
    {
		parent::initialize();
        $this->loadComponent('Email');
		$this->loadComponent('Sms');
    } 
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
		
        $this->paginate = [
            'contain' => ['Leads', 'Users'],
        ];
        $appointments = $this->paginate($this->Appointments);
		
        $this->set(compact('appointments'));
    }

    /**
     * View method
     *
     * @param string|null $id Appointment id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $appointment = $this->Appointments->get($id, [
            'contain' => ['Leads', 'Users'],
        ]);

        $this->set('appointment', $appointment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($lead_id, $aId = null)
    {
		$pageTitle = 'Appointments';
		$leadid = base64_decode($lead_id);
		$this->loadModel('Leads');
		$this->loadModel('Users');
		$this->loadModel('UserProfiles');
		$this->loadModel('LeadSources');
		$this->loadModel('LeadStatus');
		$this->loadModel('AppointmentStatus');
		$this->loadModel('EmailTemplates');
		$this->loadModel('SmsTemplates');
		
		if(empty($aId)){
			$appointment = $this->Appointments->newEntity();
		}else{
			$appointment = $this->Appointments->get($aId, [
            'contain' => [],
			]);
		}
		
		$this->paginate = [
            'contain' => ['Leads', 'Users'],
        ];
		
        if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->getData();
			
			$data['lead_id']= $leadid;
			if (!empty($data['start_date'])) {
				$data['start_date'] = date('Y-m-d H:i:s', strtotime($data['start_date']));
			}
			if (!empty($data['end_date'])) {
				$data['end_date'] = date('Y-m-d H:i:s', strtotime($data['end_date']));
			}
			$data['appointment_status_id'] = 4;
            $appointment = $this->Appointments->patchEntity($appointment, $data);		
			$lead = $this->Leads->get($leadid);
			$newdata['lead_status_id']= 4;
			
			if ($this->Appointments->save($appointment)) {
				
				$leaddata = $this->Leads->patchEntity($lead, $newdata);
				$this->Leads->save($leaddata);
			//   appointment confirmation email
				
				$logo = "<img src=".Configure::read('site_url')."/img/logo.png>";
				$emailTemplate = $this->EmailTemplates->get(5);
				
				$leaddetails = $this->Leads->find()->where(['Leads.id' => $leadid])->first();
				
				$to= $leaddetails->lead_email;
				
				$appointment_setter = $this->UserProfiles->find()->where(['UserProfiles.user_id' => $data['user_id']])->first();
				
				$emailtemplate = str_replace(array('{LOGO}', '{FIRST_NAME}', '{DATE}', '{TIME}', '{APPOINTMENT_SETTER}'), array($logo, $leaddetails->lead_name, date('M d, Y', strtotime($data['start_date'])), date('h:i A', strtotime($data['start_date'])), $appointment_setter->first_name), $emailTemplate->template_body);
				
				$send_email = $this->Email->sendEmail($to,$emailTemplate->subject,$emailtemplate);
				
				// end appointment confirmation email
				
				//   appointment confirmation Message
				
				$smsTemplate = $this->SmsTemplates->get(3);
				$number= $leaddetails->lead_mobile;
				
				$smstemplate = str_replace(array('{FIRST_NAME}', '{DATE}', '{TIME}'), array($leaddetails->lead_name, date('M d, Y', strtotime($data['start_date'])), date('h:i A', strtotime($data['start_date']))), $smsTemplate->template_body);
				
				//$send_sms = $this->Sms->sendSms($number,$smstemplate);
				// end appointment confirmation message
			
                $this->Flash->success(__('The appointment has been saved.'));

                return $this->redirect(['action' => 'add', $lead_id, $aId]);
            }
            $this->Flash->error(__('The appointment could not be saved. Please, try again.'));
        }
		
        $leads = $this->Leads->find()->contain(['LeadSources','LeadStatus','States','Countries'])->where(['Leads.id ' => $leadid])->first();
		
		
		$users = $this->Appointments->Users->find('list', ['keyField' => 'id', 'valueField' => 'id'])->where(['Users.role_id' => 1])->toArray();
		
		$userprofiles = $this->UserProfiles->find('list', ['keyField' => 'user_id', 'valueField' => 'first_name'])->where(['user_id IN ' => $users])->toArray();
		
		$appointments = $this->paginate($this->Appointments->find()->contain(['Users'=>['UserProfiles'],'AppointmentStatus'])->where(['Appointments.lead_id ' => $leadid]));
		
		
		$leadsources = $this->LeadSources->find()->where(['LeadSources.location_id ' => 1]);
		$leadstatus = $this->LeadStatus->find();
		$appointmentstatus = $this->AppointmentStatus->find();
		$this->set(compact('pageTitle','appointment', 'leads', 'users','appointments','userprofiles','leadsources','leadstatus','appointmentstatus'));
    }
    
    /**
    * Change Status Method
    *
    * @return \Cake\Http\Response|null Redirects on successful  status change, renders view otherwise.
    * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */
	public function changeStatus()
    {
		$this->autoRender = false;
		$this->loadModel('Leads');
		$this->viewBuilder()->setLayout(false);
		if ($this->request->is('ajax')) {
			$id = $this->request->getData()['id'];
			$leadstatus = $this->request->getData()['leadstatus'];
			
			$data = $this->Leads->get($id);

			$lead = $this->Leads->patchEntity($data, ['lead_status_id' => $leadstatus]);

			if ($this->Leads->save($lead)) {
				
			}
		
		}
	
    }
    
    /**
    * Change Appointment Status Method
    *
    * @return \Cake\Http\Response|null Redirects on successful appointment status change, renders view otherwise.
    * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */
	public function changeAppointmentStatus()
    {
		$this->autoRender = false;
		$this->loadModel('Leads');
		$this->viewBuilder()->setLayout(false);
		if ($this->request->is('ajax')) {
			$statusid = $this->request->getData()['statusid'];
			$statusname = $this->request->getData()['statusname'];
			$appointmentid = $this->request->getData()['appointmentid'];
			
			$data = $this->Appointments->get($appointmentid);
			$leadId = $data->lead_id;
			$appointment = $this->Appointments->patchEntity($data, ['appointment_status_id' => $statusid]);
			if ($this->Appointments->save($appointment)) {
			
			
			$lead = $this->Leads->get($leadId);
			$leaddata = $this->Leads->patchEntity($lead, ['lead_status_id' => $statusid]);
			$this->Leads->save($leaddata);
				
			}		
		}	
    }
    /**
     * Edit method
     *
     * @param string|null $id Appointment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $appointment = $this->Appointments->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appointment = $this->Appointments->patchEntity($appointment, $this->request->getData());
            if ($this->Appointments->save($appointment)) {
                $this->Flash->success(__('The appointment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The appointment could not be saved. Please, try again.'));
        }
        $leads = $this->Appointments->Leads->find('list', ['limit' => 200]);
        $users = $this->Appointments->Users->find('list', ['limit' => 200]);
        $this->set(compact('appointment', 'leads', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Appointment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $lead_id = null)
    {
		$this->loadModel('Leads');
        $this->request->allowMethod(['post', 'delete']);
        $appointment = $this->Appointments->get($id);
		$lead = $this->Leads->get($lead_id);
		$newdata['lead_status_id']= 10;			
		if ($this->Appointments->delete($appointment)) {
			$leaddata = $this->Leads->patchEntity($lead, $newdata);
			$this->Leads->save($leaddata);
            $this->Flash->success(__('The appointment has been deleted.'));
        } else {
            $this->Flash->error(__('The appointment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'add', $lead_id]);
    }
}
