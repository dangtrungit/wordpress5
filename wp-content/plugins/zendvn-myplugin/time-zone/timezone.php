<?php
$timezone = DateTimeZone::listIdentifiers();
date_default_timezone_set('Asia/Ho_Chi_Minh');
echo "<br>Thoi gian hien tai:<br>";

echo date('d/m/Y - H:i:s');
echo "<br>Danh sach thoi gian cac vung tren the gioi<br>";

foreach ($timezone as $item) {
    echo $item . '<br/>';
}
