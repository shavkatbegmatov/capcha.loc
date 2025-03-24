<?php
session_start();

if ($_POST['captcha_input'] == $_SESSION['captcha']) {
    echo "CAPTCHA to'g'ri!";
    // Bu yerda loginni davom ettiring
} else {
    echo "Noto'g'ri CAPTCHA!";
}
?>
