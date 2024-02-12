<?php
$times = file("time.txt", FILE_IGNORE_NEW_LINES);

foreach ($times as $time) {
    echo '<input type="checkbox" name="time[]" value="' . $time . '"> ' . $time;
    echo '<br>';
}
?>
