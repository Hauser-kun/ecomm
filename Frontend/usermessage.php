<?php

if (isset($_SESSION['user_message'])) :

?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong>  <?= $_SESSION['user_message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>







<?php
    unset($_SESSION['message']);

endif;
?>