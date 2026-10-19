<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ??'';

    $errors = [];

    //Validation
    if (trim($name) === '') {
        $errors[] = "Поле \"Ім'я\" не може бути порожнім." ;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Введіть корекний email.";
    }

    if ($errors) {
        echo "<p class='error'>Виникли помилки:</p>";
        foreach ($errors as $err) {
            echo "<li>". htmlspecialchars($err) . "</li>";
        }
        echo "</ul><a href='../public/form.html'>Назад до форми</a>";
    } else {
        echo "<p>Дякуємо, <b>" . htmlspecialchars($name) . "</b></p>";
        echo "<p>Ми зв'яжемося з вами на <b>" .  htmlspecialchars($email) . "</b></p>";
    }
} else {
    echo "Будь ласка, відкрийте <a href='form.html'></a>";
}
?>