<?php
session_start();
if (empty($_SESSION['username'])) {
    echo "
            <script>
                alert('Login first!');
                document.location='login/cobalogin.html';
            </script>
        ";
}
