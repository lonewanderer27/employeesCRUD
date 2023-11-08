<?php
global $cn;
?>
<?php if (isset($_GET['duplicate'])): ?>
    <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
        A record already exists!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php elseif (isset($_GET['missingToken'])): ?>
    <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
        Token is missing! Are you on the wrong page?
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php elseif (isset($_GET['success'])): ?>
    <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
        <?php if (isset($_GET['add'])): ?>
            New record has been added!
        <?php elseif (isset($_GET['update'])): ?>
            Record has been successfully updated!
        <?php elseif (isset($_GET['delete'])): ?>
            Record has been successfully deleted!
        <?php endif; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php elseif (isset($_GET['addError']) || isset($_GET['updateError'])): ?>
    <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
        <h5 class="alert-heading">There has been an error</h5>
        <?= $cn->error ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
