<?php
$students = file("student.txt", FILE_IGNORE_NEW_LINES);

foreach ($students as $student) {
    echo '<input type="checkbox" name="student[]" value="' . $student . '"> ' . $student;
    echo ' - <input type="checkbox" name="excuse[' . $student . ']" value="E"> E ';
    echo '<input type="checkbox" name="excuse[' . $student . ']" value="U"> U <br>';
}
?>
