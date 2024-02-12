<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Result</title>
    
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
        text-align: center;
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #333;
    }

    .result-section {
        margin-top: 20px;
        text-align: left;
    }

    button.copy-button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    button.copy-button:hover {
        background-color: #45a049;
    }

    .custom-dialog {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        padding: 20px;
        text-align: center;
        opacity: 0;
        transition: opacity 0.3s ease, transform 0.3s ease; /* Add fade-in and transform transition */
    }

    .dialog-content {
        max-width: 300px;
        margin: 0 auto;
    }

    .dialog-content button {
        padding: 10px 15px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .dialog-content button:hover {
        background-color: #45a049;
    }

    /* Add a class to show the dialog with a fade-in and scale-up effect */
    .show-dialog {
        display: block;
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
    }
</style>

</head>
<body>

<div class="container">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $students = $_POST['student'];
    $excuses = $_POST['excuse'];
    
    $selectedTime = isset($_POST['time']) ? $_POST['time'] : '';

    // Loop through subjects and teachers
    
        echo '<p><strong>Teacher: In Peov </strong> ';
    

    echo '<p><strong>Class:</strong> 12 D</p>';
    echo '<p><strong>Time:</strong> ' . implode(", ", (array)$selectedTime) . '</p>';

    // Get current local date
    $currentDateTime = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
    $currentDate = $currentDateTime->format('d-m-Y');
    echo '<p><strong>Date:</strong> ' . $currentDate . '</p>';

    echo '<p><strong>Absent list:</strong></p>';

    foreach ($students as $student) {
        if (isset($excuses[$student])) {
            echo '<p>- ' . $student . ' (' . $excuses[$student] . ')</p>';
        }
    }

    // Add the COPY button
    echo '<button class="copy-button" onclick="copyToClipboard()">COPY</button>';

    // JavaScript function to copy to clipboard
    echo '<script>
    function copyToClipboard() {
        const container = document.querySelector(\'.container\');
        const resultText = container.innerText.replace("COPY", "");

        if (navigator.clipboard) {
            navigator.clipboard.writeText(resultText)
                .then(() => {
                    showCustomDialog("Copy Success", "Result copied to clipboard!");
                })
                .catch((err) => {
                    console.error("Error copying to clipboard: ", err);
                });
        } else {
            // Fallback for browsers that do not support Clipboard API
            const textArea = document.createElement("textarea");
            textArea.value = resultText;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand("copy");
            document.body.removeChild(textArea);
            showCustomDialog("Copy Success", "Result copied to clipboard!");
        }
    }

    function showCustomDialog(title, message) {
        const dialog = document.createElement("div");
        dialog.className = "custom-dialog";
        dialog.innerHTML = `
            <div class="dialog-content">
                <h2>${title}</h2>
                <p>${message}</p>
                <button onclick="closeCustomDialog()">OK</button>
            </div>
        `;
        document.body.appendChild(dialog);

        // Add the class to show the dialog with a fade-in effect
        setTimeout(() => {
            dialog.classList.add("show-dialog");
        }, 50);
    }

    function closeCustomDialog() {
        const dialog = document.querySelector(".custom-dialog");
        if (dialog) {
            dialog.remove();
        }
    }
</script>';
}
?>

</div>

</body>
</html>
