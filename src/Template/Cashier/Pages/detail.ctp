<style type="text/css">
    #container {margin-top: 50px;}
</style>

<?= $this->Html->scriptBlock('var totalAmount = '.$totalAmount, ['block' => true]); ?>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', event => {
        var invoiceForm = document.forms['invoiceForm'];
        var guestMoney = invoiceForm['guest_money'];
        guestMoney.addEventListener('change', event => {
            if (guestMoney.value >= totalAmount) {
                invoiceForm['refund'].value = guestMoney.value - totalAmount;
            }
        });
        invoiceForm.addEventListener('submit', event => {
            event.preventDefault();
            if (guestMoney.value >= totalAmount) {
                invoiceForm.submit();
            }
        });
    });
</script>

<div class="medium-8 medium-centered columns" id="container">

<table>
    <thead>
        <?= $this->Html->tableHeaders(['STT', 'Ten Mon', 'Gia', 'So Luong', 'Thanh Tien']); ?>
    </thead>
    <tbody>
        <?php foreach ($orderDetails as $key => $orderDetail) {
            echo $this->Html->tableCells([$key + 1, $orderDetail['item_name'], $orderDetail['item_price'],
                    $orderDetail['quantity'], $orderDetail['amount']]);
        } ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b>Tong: </b><?= $totalAmount ?></td>
        </tr>
    </tbody>
</table>

<div class="row">
    <?= $this->Form->create(null, ['url' => ['action' => 'invoice'], 'name' => 'invoiceForm']); ?>
    <div class="medium-5 columns">
        <b>Tien Khach Dua:</b><?= $this->Form->text('guest_money', ['required' => true]); ?>
    </div>
    <div class="medium-5 columns">
        <b>Tien Tra Lai:</b><?= $this->Form->text('refund', ['required' => true]); ?>
    </div>
    <div class="medium-2 columns"><b><?= $this->Form->submit('Thanh Toan', ['class' => 'button']); ?></div>
    <?= $this->Form->hidden('order_id', ['value' => $orderDetails[1]['order_id']]); ?>
    <?= $this->Form->hidden('total_amount', ['value' => $totalAmount]); ?>
    <?= $this->Form->end(); ?>
</div>

</div>