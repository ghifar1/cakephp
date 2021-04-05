<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Validation\Validator;

class MembersController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Flash');
        $this->loadModel('Members');

    }

    public function index()
    {
        $members = $this->Members->find()->toArray();
        $this->set('members', $members);

    }

    public function loginMember()
    {
        $session = $this->request->getSession();
        if(!$session->check('Auth.user'))
        {
            //return $this->redirect('facebook.com');
        }
    }

    public function listMember()
    {
        $members = $this->Members->find()->toArray();
        $this->set('members', $members);
    }

    public function addMember()
    {
        $member = $this->Members->newEmptyEntity();
        $this->set('error', false);
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $count = $this->Members->find('all')->where(['Members.role IS' => $data['role']])->count();
            $success = true;
            $member->name = $data['name'];
            $member->role = $data['role'];
            if($data['role'] == 'ketua' || $data['role'] == 'wakil')
            {
                $member->position = $data['role'];
                if($count > 0)
                {
                    $success = false;
                    $this->set('error', 'Gagal disimpan, jabatan <b>'.$data['role'].'</b> sudah digunakan');
                }
            } else {
                $member->position = $data['position'];
                if($data['position'] == 'koordinator')
                {
                    $coor = $this->Members->find('all')->where(['Members.role IS' => $data['role']])
                        ->where(['Members.position IS' => 'koordinator'])->count();
                    if ($coor > 0)
                    {
                        $success = false;
                        $this->set('error', 'Gagal disimpan, koordinator <b>'.$data['role'].'</b> sudah digunakan');
                    }
                }

            }

            if ($success) {
                $this->Members->save($member);
                $this->Flash->success(__('berhasil dibuat'));
                return $this->redirect(['action' => 'listMember']);
            }

        }
        $this->set('member', $member);
    }

    public function deleteMember($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $member = $this->Members->get($id);
        $this->Members->delete($member);
        return $this->redirect(['action' => 'listMember']);

    }
}
