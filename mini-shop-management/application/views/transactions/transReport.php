<?php
defined('BASEPATH') or exit('');

$total_earned = 0;

?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Báo cáo giao dịch</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>public/images/icon.ico">
    <!-- favicon ends --->

    <!--- LOAD FILES -->
    <?php if ((stristr($_SERVER['HTTP_HOST'], "localhost") !== FALSE) || (stristr($_SERVER['HTTP_HOST'], "192.168.") !== FALSE) || (stristr($_SERVER['HTTP_HOST'], "127.0.0.") !== FALSE)) : ?>
        <link rel="stylesheet" href="<?= base_url() ?>public/bootstrap/css/bootstrap.min.css">

    <?php else : ?>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <?php endif; ?>

    <!-- custom CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>public/css/main.css">
</head>

<body>
    <div class="container margin-top-5">
        <div class="row">
            <div class="col-xs-12 text-right hidden-print">
                <button class="btn btn-primary btn-sm" onclick="window.print()">In báo cáo</button>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 text-center">
                <h4>Giao dịch giữa <?= date('jS M, Y', strtotime($from)) ?> và <?= date('jS M, Y', strtotime($to)) ?></h4>
            </div>
        </div>

        <div class="row margin-top-5">
            <div class="col-xs-12 table-responsive">
                <div class="panel panel-primary">
                    <!-- Default panel contents -->
                    <div class="panel-heading text-center">
                        Giao dịch giữa <?= date('jS M, Y', strtotime($from)) ?> và <?= date('jS M, Y', strtotime($to)) ?>
                    </div>
                    <?php if ($allTransactions) : ?>
                        <div class="table table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Biên lai số</th>
                                        <th>Tổng số mặt hàng</th>
                                        <th>Tổng cộng</th>
                                        <th>Số tiền đấu thầu</th>
                                        <th>Thay đổi do</th>
                                        <th>Phương thức thanh toán</th>
                                        <th>Nhân viên</th>
                                        <th>Khách hàng</th>
                                        <th>Ngày</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sn = 1; ?>
                                    <?php foreach ($allTransactions as $get) : ?>
                                        <tr>
                                            <th><?= $sn ?>.</th>
                                            <td><?= $get->ref ?></td>
                                            <td><?= $get->quantity ?></td>
                                            <td><?= number_format($get->totalMoneySpent, 0) ?> vnđ</td>
                                            <td><?= number_format($get->amountTendered, 0) ?> vnđ</td>
                                            <td><?= number_format($get->changeDue, 0) ?> vnđ</td>
                                            <td><?= str_replace("_", " ", $get->modeOfPayment) ?></td>
                                            <td><?= $get->staffName ?></td>
                                            <td><?= $get->cust_name ?> - <?= $get->cust_phone ?> - <?= $get->cust_email ?></td>
                                            <td><?= date('jS M, Y h:ia', strtotime($get->transDate)) ?></td>
                                        </tr>
                                        <?php $sn++; ?>
                                        <?php $total_earned += $get->totalMoneySpent; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- table div end--->
                    <?php else : ?>
                        <ul>
                            <li>Không tìm thấy giao dịch nào trong các ngày được chỉ định</li>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="row" style="margin-bottom: 10px">
            <div class="col-xs-6">
                <button class="btn btn-primary btn-sm hidden-print" onclick="window.print()">In báo cáo</button>
            </div>

            <div class="col-xs-6 text-right">
                <h4>Tổng đã kiếm được: <?= number_format($total_earned, 0) ?> vnđ</h4>
            </div>
        </div>
    </div>
    <!--- panel end-->
</body>

</html>