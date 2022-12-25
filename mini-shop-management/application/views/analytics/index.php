<?php
defined('BASEPATH') or exit(':D');
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-body topAnalyticsBody" style="background-color: #337ab7">
                        <div class="pull-left"><i class="fa fa-calendar-minus-o"></i></div>
                        <div class="pull-right">
                            <div><?= isset($totalVisitsToday) && $totalVisitsToday ? $totalVisitsToday : '0' ?></div>
                            <div class="topAnalyticsText"><?= date('D jS') ?></div>
                        </div>
                    </div>
                    <div class="panel-footer text-center" style="color:#337ab7">Số lượt truy cập hôm nay</div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="panel panel-warning">
                    <div class="panel-body topAnalyticsBody" style="background-color: #f0ad4e">
                        <div class="pull-left"><i class="fa fa-calendar"></i></div>
                        <div class="pull-right">
                            <div><?= isset($totalVisitsThisMonth) && $totalVisitsThisMonth ? $totalVisitsThisMonth : '0' ?></div>
                            <div class="topAnalyticsText"><?= date('F') ?></div>
                        </div>
                    </div>
                    <div class="panel-footer text-center" style="color:#f0ad4e">Số lượt truy cập tháng này</div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="panel panel-success">
                    <div class="panel-body topAnalyticsBody" style="background-color: #5cb85c">
                        <div class="pull-left"><i class="fa fa-calendar-check-o"></i></div>
                        <div class="pull-right">
                            <div><?= isset($totalVisitsThisYear) && $totalVisitsThisYear ? $totalVisitsThisYear : '0' ?></div>
                            <div class="topAnalyticsText"><?= date('Y') ?></div>
                        </div>
                    </div>
                    <div class="panel-footer text-center" style="color:#5cb85c">Số lượt truy cập năm nay</div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-4" id="dailyVisitors">
                <div class="panel panel-primary">
                    <div class="panel-heading">Lượt truy cập hàng ngày</div>
                    <div class="panel-body scroll panel-height">
                        <?php if (isset($daily_visitors_table) && $daily_visitors_table) : ?>
                            <?= $daily_visitors_table ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">Vị trí</div>
                    <div class="panel-body scroll panel-height">
                        <?php if (isset($locations) && $locations) : ?>
                            <table class="table table-responsive table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Vị trí</th>
                                        <th>Tổng</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($locations as $get) : ?>
                                        <tr>
                                            <td><?= $get->location ?></td>
                                            <td><?= $get->counter ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <li>Không có bản ghi</li>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">Thiết bị</div>
                    <div class="panel-body scroll panel-height">
                        <?php if (isset($devices) && $devices) : ?>
                            <table class="table table-responsive table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Tổng</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($devices as $get) : ?>
                                        <tr>
                                            <td><?= $get->device ?></td>
                                            <td><?= $get->counter ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <li>Không có bản ghi</li>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">Trình duyệt</div>
                    <div class="panel-body scroll panel-height">
                        <?php if (isset($browsers) && $browsers) : ?>
                            <table class="table table-responsive table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Tổng</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($browsers as $get) : ?>
                                        <tr>
                                            <td><?= $get->browser ?></td>
                                            <td><?= $get->counter ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <li>Không có bản ghi</li>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">OS</div>
                    <div class="panel-body scroll panel-height">
                        <?php if (isset($os) && $os) : ?>
                            <table class="table table-responsive table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Tổng</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($os as $get) : ?>
                                        <tr>
                                            <td><?= $get->os ?></td>
                                            <td><?= $get->counter ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <li>Không có bản ghi</li>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">Thời gian trong ngày</div>
                    <div class="panel-body scroll panel-height">
                        <?php if (isset($time_of_day) && $time_of_day) : ?>
                            <table class="table table-responsive table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Giai đoạn</th>
                                        <th>Tổng</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($time_of_day as $get) : ?>
                                        <tr>
                                            <td>
                                                <?= $get->visit_period == "M" ? "Sáng" : ($get->visit_period == "A" ? "Chiều" : "Tối") ?>
                                            </td>
                                            <td><?= $get->counter ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <li>Không có bản ghi</li>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">Lượt truy cập theo ngày</div>
                    <div class="panel-body scroll panel-height">
                        <?php if (isset($days) && $days) : ?>
                            <table class="table table-responsive table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Ngày</th>
                                        <th>Tổng</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($days as $get) : ?>
                                        <tr>
                                            <td><?= $get->day . 's' ?></td>
                                            <td><?= $get->counter ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <li>Không có bản ghi</li>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">Lượt truy cập theo tháng</div>
                    <div class="panel-body scroll panel-height">
                        <?php if (isset($months) && $months) : ?>
                            <table class="table table-responsive table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Tháng</th>
                                        <th>Tổng</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($months as $get) : ?>
                                        <tr>
                                            <td><?= $get->month ?></td>
                                            <td><?= $get->counter ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <li>Không có bản ghi</li>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">Lượt truy cập theo năm</div>
                    <div class="panel-body scroll panel-height">
                        <?php if (isset($years) && $years) : ?>
                            <table class="table table-responsive table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Năm</th>
                                        <th>Tổng</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($years as $get) : ?>
                                        <tr>
                                            <td><?= $get->year ?></td>
                                            <td><?= $get->counter ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <li>Không có bản ghi</li>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>