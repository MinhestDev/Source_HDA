<?php defined('BASEPATH') or exit('') ?>

<!--An item's transactions history--->
<div class="col-sm-4">
    <div class="row">
        <div class="col-sm-12 form-group-sm form-inline">
            <div class="col-sm-4">
                Hiển thị
                <select id="itemPerPage" class="form-control">
                    <option value="5">5</option>
                    <option value="10" selected>10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>
            </div>
            <div class="col-sm-4">
                <select id="sortItems" class="form-control">
                    <option value="">Lọc</option>
                    <option value="code-asc">Mã sản phẩm</option>
                </select>
            </div>
            <div class="col-sm-4">
                <input type="search" id="itemSearch" class="form-control" placeholder="Tìm kiếm sản phẩm">
            </div>
        </div>
    </div>
    <br>

    <!--Row of item's transactions -->
    <div class="row">
        <div class="col-sm-12" id='itemTransHistoryTable'>

        </div>
    </div>
</div>
<!--End of an item's transactions history--->