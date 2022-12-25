<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <p>Xin chào <?= $this->input->post('title') . " " . $this->input->post('firstName') ?>,<br>
    </p>
    <table style="text-align: left">
        <tbody>
            <tr>
                <th>Tiêu đề:</th>
                <td></td>
                <td><?= $this->input->post('title') ? $this->input->post('title') : "---" ?></td>
            </tr>
            <tr>
                <th>Tên:</th>
                <td></td>
                <td>
                    <?= $this->input->post('firstName') . " " . $this->input->post('lastName') . " " . $this->input->post('otherName') ?>
                </td>
            </tr>
            <tr>
                <th>Số điện thoại:</th>
                <td></td>
                <td>
                    <?= $this->input->post('mobile1') . ($this->input->post('mobile2') ? ", " . $this->input->post('mobile2') : "") ?>
                </td>
            </tr>
            <tr>
                <th>ID thành viên:</th>
                <td></td>
                <td><?= $this->input->post('membershipId') ?></td>
            </tr>
            <tr>
                <th>Giới tính:</th>
                <td></td>
                <td><?= $this->input->post('gender') ?></td>
            </tr>
            <tr>
                <th>Đường:</th>
                <td></td>
                <td><?= $this->input->post('address') ?></td>
            </tr>
            <tr>
                <th>Phố:</th>
                <td></td>
                <td><?= $this->input->post('city') ?></td>
            </tr>
            <tr>
                <th>Tỉnh thành:</th>
                <td></td>
                <td><?= $this->input->post('state') ?></td>
            </tr>
            <tr>
                <th>Quốc gia:</th>
                <td></td>
                <td><?= $this->input->post('country') ?></td>
            </tr>
        </tbody>
    </table>
    <p><small>Quản lý, <br>Đội ngũ Admin</small></p>
</body>

</html>