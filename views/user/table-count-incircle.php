<div class="portlet light ">
    <div class="portlet-title">
        <div class="caption">
            <i class=" icon-list font-green"></i>
            <span class="caption-subject font-red bold ">Kết quả tra cứu</span>
        </div>

    </div>
    <div class="portlet-body">
        <div id='ketqua-thongke' class='collapse in'>
            <table class="table table-hover table-consended">
                <thead>
                    <tr>
                        <th>Lớp dữ liệu</th>
                        <th>Số lượng</th>
                        <th>Điều kiện</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $name => $item): ?>
                        <tr>
                            <td><a href='#' class="custom-count-incircle" data-href='<?= Yii::$app->homeUrl ?>user/poidetail-incircle?lat=<?= $params['lat'] ?>&lng=<?= $params['lng'] ?>&radius=<?= $params['radius'] ?>&poi=<?= $name ?>&nganhnghe=<?= $params['nganhnghe']?>' data-toggle='collapse' data-target="#<?= $name ?>"><?= $item['title'] ?></a></td>
                            <td><a href='#' class="custom-count-incircle" data-href='<?= Yii::$app->homeUrl ?>user/poidetail-incircle?lat=<?= $params['lat'] ?>&lng=<?= $params['lng'] ?>&radius=<?= $params['radius'] ?>&poi=<?= $name ?>&nganhnghe=<?= $params['nganhnghe']?>' data-toggle='collapse' data-target="#<?= $name ?>"><?= $item['count'] ?></a></td>
                            <td><?php
                                if ($item['count'] > 0) {
                                    echo '<i class="icon-close" style="font-size:20px;color:red;" title="Vị trí không đủ điều kiện!"></i>';
                                } else {
                                    echo '<i class="icon-check" style="font-size:20px;color:green;"title="Vị trí đủ điều kiện!"></i>';
                                }
                                ?></td>
                        </tr>
                        <tr style="padding: 0px">
                            <td colspan='3' style="padding: 0px">
                                <div style="max-height: 200px; overflow: auto" id="<?= $name ?>" class="collapse">
                                    Đang lấy dữ liệu...
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>


    </div>


</div>

<script>
    $(document).ready(function () {
        $('.custom-count-incircle').on('click', function () {
            var _this = $(this);
            var _url = _this.attr('data-href');
            var _target = $(_this.attr('data-target'));

            if (typeof (_target.attr('data-set')) == 'undefined')
                $.ajax({
                    url: _url,
                    success: function (html) {
                        _target.attr('data-set', true);
                        _target.empty().append(html);
                    }
                })
        })
    });
</script>