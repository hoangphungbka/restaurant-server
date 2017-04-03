<?php

namespace App\Controller\Api;
use App\Controller\AppController;

class PagesController extends AppController
{
	const SUCECESS = 1, FAILURE = 0;

	public function  initialize()
	{
		parent::initialize();
		$this->loadModel('Employees');
	}

    public function login()
    {
    	$username = $this->request->getData()['username'];
    	$password = $this->request->getData()['password'];
    	$status = $this->request->getData()['status'];

    	$employee = $this->Employees->identify($username, $password, $status);
    	if ($employee) {
    		$this->Auth->setUser($employee);
    		$result = static::SUCECESS;
    		$message = $employee;
    	} else {
    		$result = static::FAILURE;
    		$message = 'Employee not found.';
    	}
		$this->set([
			'result' => $result,
			'message' => $message,
			'_serialize' => ['message', 'result']
		]);
    }
}
