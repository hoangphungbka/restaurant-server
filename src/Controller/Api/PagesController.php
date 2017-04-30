<?php

namespace App\Controller\Api;
use App\Controller\AppController;

class PagesController extends AppController
{
	const FAILURE_MESSAGE = 0, SUCCESS_MESSAGE = 1;
    const SERVING_ORDER = 0, PAYMENT_REQUEST_ORDER = 1, PAID_ORDER = 2;
    const UNSERVED_ITEM = 0, PROCESSING_ITEM = 1, SERVED_ITEM = 2, OUT_OF_MATERIALS = 3;
    const UNOCCUPIED_TABLE = 0, OCCUPIED_TABLE = 1;

	public function initialize()
	{
		parent::initialize();
		$this->loadModel('Employees');
        $this->loadModel('MenuItems');
        $this->loadModel('Categories');
        $this->loadModel('DiningTables');
        $this->loadModel('OrderDetails');
        $this->loadModel('Orders');
	}

    public function login()
    {
        $result = static::FAILURE_MESSAGE; $message = 'Employee not found.';
        if ($this->request->is('post')) {
            $username = $this->request->getData()['username'];
            $password = $this->request->getData()['password'];
            $status = $this->request->getData()['status'];

            $employee = $this->Employees->identify($username, $password, $status);
            if ($employee) {$result = static::SUCCESS_MESSAGE; $message = $employee;}
        }
        $this->set([
            'result' => $result, 'message' => $message,
            '_serialize' => ['message', 'result']
        ]);
    }

    public function getMenuItemsByCategory()
    {
        $categories = $this->Categories->find('all')->contain(['MenuItems'])->toArray();

        $this->set(['categories' => $categories, '_serialize' => ['categories']]);
    }

    public function getDiningTablesStatus()
    {
        $diningTables = $this->DiningTables->find('all')->toArray();

        $this->set(['diningTables' => $diningTables, '_serialize' => ['diningTables']]);
    }

    public function createOrderForTable($tableNumber, $employeeId)
    {
        $this->Orders->connection()->begin();

        $result = static::FAILURE_MESSAGE;
        $newOrderEntity = $this->Orders->newEntity([
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'total_amount' => 0,
            'table_number' => $tableNumber,
            'employee_id' => $employeeId,
            'status' => static::SERVING_ORDER
        ]);
        $this->Orders->save($newOrderEntity);

        $oldTableEntity = $this->DiningTables->get($tableNumber);
        if ($oldTableEntity['status'] == static::UNOCCUPIED_TABLE) {
            $oldTableEntity['status'] = static::OCCUPIED_TABLE;
            $this->DiningTables->save($oldTableEntity);
            $this->Orders->connection()->commit();
            $result = static::SUCCESS_MESSAGE;
        } else {
            $this->Orders->connection()->rollback();
        }

        $this->set(['result' => $result, '_serialize' => ['result']]);
    }

    public function loadServingOrders()
    {
        $servingOrders = $this->Orders->find('all')->where(['status' => static::SERVING_ORDER])->toArray();

        $this->set(['servingOrders' => $servingOrders, '_serialize' => ['servingOrders']]);
    }

    public function createOrderDetail($itemId, $orderId, $quantity)
    {
        $selectedItem = $this->MenuItems->get($itemId);
        $amount = $selectedItem['price'] * $quantity;
        $orderDetail = $this->OrderDetails->newEntity([
            'item_id' => $itemId, 'order_id' => $orderId, 'quantity' => $quantity,
            'amount' => $amount, 'status' => static::UNSERVED_ITEM
        ]);
        $selectedOrder = $this->Orders->get($orderId);
        $selectedOrder['total_amount'] += $amount;

        $result = static::FAILURE_MESSAGE;
        $this->OrderDetails->connection()->begin();
        if ($this->OrderDetails->save($orderDetail) && $this->Orders->save($selectedOrder)) {
            $this->OrderDetails->connection()->commit();
            $result = static::SUCCESS_MESSAGE;
        } else {
            $this->OrderDetails->connection()->rollback();
        }
        $this->set(['result' => $result, '_serialize' => ['result']]);
    }
}
