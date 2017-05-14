<?php

namespace App\Controller\Cashier;
use App\Controller\AppController;

class PagesController extends AppController
{
    const SERVING_ORDER = 0, PAYMENT_REQUEST_ORDER = 1, PAID_ORDER = 2;

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Billings');
        $this->loadModel('MenuItems');
        $this->loadModel('OrderDetails');
        $this->loadModel('Orders');
    }

    public function index()
    {
        $requestedOrders = $this->Orders->find('all', [
            'conditions' => ['status' => static::PAYMENT_REQUEST_ORDER]
        ])->toArray();
        $this->set('requestedOrders', $requestedOrders);
    }

    public function detail($orderId)
    {
        $orderDetails = $this->OrderDetails->find('all', [
            'conditions' => ['order_id' => $orderId]
        ])->toArray();
        $totalAmount = 0;
        foreach ($orderDetails as $key => $orderDetail) {
            $menuItem = $this->MenuItems->get($orderDetail['item_id']);
            $orderDetails[$key]['item_name'] = $menuItem['name'];
            $orderDetails[$key]['item_price'] = $menuItem['price'];
            $totalAmount += $orderDetail['amount'];
        }
        $this->set(['orderDetails' => $orderDetails, 'totalAmount' => $totalAmount]);
    }

    public function invoice()
    {
        if ($this->request->is('post')) {
            $this->Billings->connection()->begin();
            
            $billing = $this->Billings->newEntity($this->request->getData());
            $billing['created_at'] = date('Y-m-d H:i:s');
            
            $order = $this->Orders->get($this->request->getData()['order_id']);
            $order['status'] = static::PAID_ORDER;

            if ($this->Billings->save($billing) && $this->Orders->save($order)) {
                $this->Billings->connection()->commit();
            } else $this->Billings->connection()->rollback();
        }
        $orderDetails = $this->OrderDetails->find('all', [
            'conditions' => ['order_id' => $this->request->getData()['order_id']]
        ])->toArray();
        $totalAmount = 0;
        foreach ($orderDetails as $key => $orderDetail) {
            $menuItem = $this->MenuItems->get($orderDetail['item_id']);
            $orderDetails[$key]['item_name'] = $menuItem['name'];
            $orderDetails[$key]['item_price'] = $menuItem['price'];
            $totalAmount += $orderDetail['amount'];
        }
        $this->viewBuilder()->setLayout('pdf');
        $this->set(['orderDetails' => $orderDetails, 'totalAmount' => $totalAmount]);
    }
}
