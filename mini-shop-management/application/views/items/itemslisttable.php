<?php defined('BASEPATH') or exit('') ?>

<div class='col-sm-6'>
    <?= isset($range) && !empty($range) ? $range : ""; ?>
</div>

<div class='col-sm-6 text-right'><b>Tổng giá trị mặt hàng/ Giá:</b> <?= $cum_total ? number_format($cum_total, 0) : '0.00' ?> vnđ</div>

<div class='col-xs-12'>
    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">Sản phẩm</div>
        <?php if ($allItems) : ?>
            <div class="table table-responsive">
                <table class="table table-bordered table-striped" style="background-color: #f5f5f5">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Mã sản phẩm</th>
                            <th>Mô tả</th>
                            <th>Số lượng trong kho</th>
                            <th>Đơn giá</th>
                            <th>Tổng đã bán</th>
                            <th>Tổng đã thu vào</th>
                            <th>Cập nhật số lượng</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allItems as $get) : ?>
                            <tr>
                                <input type="hidden" value="<?= $get->id ?>" class="curItemId">
                                <th class="itemSN"><?= $sn ?>.</th>
                                <td><span id="itemName-<?= $get->id ?>"><?= $get->name ?></span></td>
                                <td><span id="itemCode-<?= $get->id ?>"><?= $get->code ?></td>
                                <td>
                                    <span id="itemDesc-<?= $get->id ?>" data-toggle="tooltip" title="<?= $get->description ?>" data-placement="auto">
                                        <?= word_limiter($get->description, 15) ?>
                                    </span>
                                </td>
                                <td class="<?= $get->quantity <= 10 ? 'bg-danger' : ($get->quantity <= 25 ? 'bg-warning' : '') ?>">
                                    <span id="itemQuantity-<?= $get->id ?>"><?= $get->quantity ?></span>
                                </td>
                                <td><span id="itemPrice-<?= $get->id ?>"><?= number_format($get->unitPrice, 0) ?> vnđ</span></td>
                                <td><?= $this->genmod->gettablecol('transactions', 'SUM(quantity)', 'itemCode', $get->code) ?></td>
                                <td>
                                    <?= number_format($this->genmod->gettablecol('transactions', 'SUM(totalPrice)', 'itemCode', $get->code), 0) ?> vnđ
                                </td>
                                <td><a class="pointer updateStock" id="stock-<?= $get->id ?>">Cập nhật số lượng</a></td>
                                <td class="text-center text-primary">
                                    <span class="editItem" id="edit-<?= $get->id ?>"><i class="fa fa-pencil pointer"></i> </span>
                                </td>
                                <td class="text-center"><i class="fa fa-trash text-danger delItem pointer"></i></td>
                            </tr>
                            <?php $sn++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- table div end-->
        <?php else : ?>
            <ul>
                <li>Không có sản phẩm</li>
            </ul>
        <?php endif; ?>
    </div>
    <!--- panel end-->
</div>

<!---Pagination div-->
<div class="col-sm-12 text-center">
    <ul class="pagination">
        <?= isset($links) ? $links : "" ?>
    </ul>
</div>