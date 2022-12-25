<?php
defined('BASEPATH') or exit(':D');
?>


<?php if (isset($daily_visitors) && $daily_visitors) : ?>
    <table class="table table-responsive table-striped table-hover">
        <thead>
            <tr>
                <th>Ngày</th>
                <th>Tổng</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($daily_visitors as $get) : ?>
                <tr>
                    <td><?= date('l jS M, Y', strtotime($get->visit_time)); ?></td>
                    <td><?= $get->counter ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <li>Không có bản ghi</li>
<?php endif; ?>