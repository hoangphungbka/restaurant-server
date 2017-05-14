<style type="text/css">
    #container {margin-top: 50px;}
</style>
<div class="medium-8 medium-centered columns" id="container">
<table>
    <thead>
        <tr>
            <th>Table</th>
            <th>Total Amount</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($requestedOrders as $requestedOrder) { ?>
        <tr>
            <td><?= $requestedOrder['table_number'] ?></td>
            <td><?= $requestedOrder['total_amount'] ?></td>
            <td><?= $requestedOrder['created_at'] ?></td>
            <td><?= $requestedOrder['updated_at'] ?></td>
            <td><?= $this->Html->link('Xem Chi Tiet',
                    ['controller' => 'Pages', 'action' => 'detail', $requestedOrder['id']],
                    ['class' => 'button tiny']
            ) ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>