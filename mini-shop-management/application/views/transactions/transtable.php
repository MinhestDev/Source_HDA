<?php defined('BASEPATH') or exit('') ?>

<?= isset($range) && !empty($range) ? $range : ""; ?>
<div class="panel panel-primary">
    <!-- Default panel contents -->
    <div class="panel-heading">GIAO DỊCH</div>
    <?php if ($allTransactions) : ?>
        <div class="table table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Biên lai số</th>
                        <th>Tổng sản phẩm</th>
                        <th>Tổng tiền</th>
                        <th>Số tiền đấu thầu</th>
                        <th>Lãi</th>
                        <th>Phương thức thanh toán</th>
                        <th>Nhân viên</th>
                        <th>Khách hàng</th>
                        <th>Ngày</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($allTransactions as $get) : ?>
                        <tr>
                            <th><?= $sn ?>.</th>
                            <td><a class="pointer vtr" title="Click để xem biên lai"><?= $get->ref ?></a></td>
                            <td><?= $get->quantity ?></td>
                            <td><?= number_format($get->totalMoneySpent, 0) ?> vnđ</td>
                            <td><?= number_format($get->amountTendered, 0) ?> vnđ</td>
                            <td><?= number_format($get->changeDue, 0) ?> vnđ</td>
                            <td><?= str_replace("_", " ", $get->modeOfPayment) ?></td>
                            <td><?= $get->staffName ?></td>
                            <td><?= $get->cust_name ?> - <?= $get->cust_phone ?> - <?= $get->cust_email ?></td>
                            <td><?= date('jS M, Y h:ia', strtotime($get->transDate)) ?></td>
                            <td><?= $get->cancelled ? 'Đã hủy' : 'Đã hoàn thành' ?></td>
                        </tr>
                        <?php $sn++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- table div end-->
    <?php else : ?>
        <ul>
            <li>Không có giao dịch</li>
        </ul>
    <?php endif; ?>

    <!--Pagination div-->
    <div class="col-sm-12 text-center">
        <ul class="pagination">
            <?= isset($links) ? $links : "" ?>
        </ul>
    </div>
</div>
<!-- panel end-->