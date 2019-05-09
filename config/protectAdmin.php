<?php
session_start();
if (empty($_SESSION['username'])) {
    echo "  <script>
                alert('Login first!');
                document.location='../login/cobalogin.html';
            </script>
        ";
}else if ($_SESSION['level'] != "admin") {
    session_destroy();
    echo "  <script>
                alert('You are not an Administrator!');
                document.location='../login/cobalogin.html';
            </script>
        ";
}