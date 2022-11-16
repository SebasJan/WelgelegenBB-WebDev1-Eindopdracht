<?php require_once __DIR__ . '/../components/head.inc.php'; ?>
<?php require_once __DIR__ . '/../components/header.inc.php'; ?>

<?php
require_once __DIR__ . '/../../repositories/repository.php';

# load booking search via controller
$this->bookingSearch();
?>

<?php require_once __DIR__ . '/../components/footer.inc.php'; ?>