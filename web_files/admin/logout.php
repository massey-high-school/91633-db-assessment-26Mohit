<?php

    unset($_SESSION['admin']);
	unset($_SESSION);
	header("Location: admin.php?page=login");

?>	