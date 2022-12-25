<?php
defined('BASEPATH') or exit('');
?>
<?php if ($allTransInfo) : ?>
    <?php $sn = 1; ?>
    <div id="transReceiptToPrint">
        <div class="row">
            <div class="col-xs-12 text-center text-uppercase">
                <center style='margin-bottom:5px'><img src="<?= base_url() ?>public/images/receipt_logo.png" alt="logo" class="img-responsive" width="60px"></center>
                <b>1410 Store</b>
                <div>(0123) 456 789</div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-sm-12">
                <b><?= isset($transDate) ? date('jS M, Y h:i:sa', strtotime($transDate)) : "" ?></b>
            </div>
        </div>

        <div class="row" style="margin-top:2px">
            <div class="col-sm-12">
                <label>Biên lai số:</label>
                <span><?= isset($ref) ? $ref : "" ?></span>
            </div>
        </div>

        <div class="row" style='font-weight:bold'>
            <div class="col-xs-4">Sản phẩm</div>
            <div class="col-xs-4">Số lượng x Giá</div>
            <div class="col-xs-4">Tổng(vnđ)</div>
        </div>
        <hr style='margin-top:2px; margin-bottom:0px'>
        <?php $init_total = 0; ?>
        <?php foreach ($allTransInfo as $get) : ?>
            <div class="row">
                <div class="col-xs-4"><?= ellipsize($get['itemName'], 10); ?></div>
                <div class="col-xs-4"><?= $get['quantity'] . "x" . number_format($get['unitPrice'], 0) ?></div>
                <div class="col-xs-4"><?= number_format($get['totalPrice'], 0) ?></div>
            </div>
            <?php $init_total += $get['totalPrice']; ?>
        <?php endforeach; ?>
        <hr style='margin-top:2px; margin-bottom:0px'>
        <div class="row">
            <div class="col-xs-12 text-right">
                <b>Tổng: <?= isset($init_total) ? number_format($init_total, 0) : 0 ?> vnđ</b>
            </div>
        </div>
        <hr style='margin-top:2px; margin-bottom:0px'>
        <div class="row">
            <div class="col-xs-12 text-right">
                <b>Chiết khấu(<?= $discountPercentage ?>%): <?= isset($discountAmount) ? number_format($discountAmount, 0) : 0 ?> vnđ</b>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-right">
                <?php if ($vatPercentage > 0) : ?>
                    <b>VAT(<?= $vatPercentage ?>%): <?= isset($vatAmount) ? number_format($vatAmount, 0) : "" ?> vnđ</b>
                <?php else : ?>
                    bao gồm VAT
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-right">
                <b>TỔNG CUỐI CÙNG: <?= isset($cumAmount) ? number_format($cumAmount, 0) : "" ?> vnđ</b>
            </div>
        </div>
        <hr style='margin-top:5px; margin-bottom:0px'>
        <div class="row margin-top-5">
            <div class="col-xs-12">
                <b>Phương thức thanh toán: <?= isset($_mop) ? str_replace("_", " ", $_mop) : "" ?></b>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <b>Số tiền đấu thầu: <?= isset($amountTendered) ? number_format($amountTendered, 0) : "" ?> vnđ</b>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <b>Thay đổi: <?= isset($changeDue) ? number_format($changeDue, 0) : "" ?> vnđ</b>
            </div>
        </div>
        <hr style='margin-top:5px; margin-bottom:0px'>
        <div class="row margin-top-5">
            <div class="col-xs-12">
                <b>Tên khách hàng: <?= $cust_name ?></b>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <b>Số điện thoại khách hàng: <?= $cust_phone ?></b>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <b>Email khách hàng: <?= $cust_email ?></b>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 text-center">Cảm ơn sự hỗ trợ của bạn</div>
        </div>
    </div>
    <br class="hidden-print">
    <div class="row hidden-print">
        <div class="col-sm-12">
            <div class="text-center">
                <button type="button" class="btn btn-primary ptr">
                    <i class="fa fa-print"></i> In hóa đơn
                </button>

                <button type="button" data-dismiss='modal' class="btn btn-danger">
                    <i class="fa fa-close"></i> Đóng
                </button>
            </div>
        </div>
    </div>
    <br class="hidden-print">
<?php endif; ?>