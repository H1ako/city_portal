<?php

use app\models\Session;

 global $SITE_URL;
?>
<meta name="csrf" content="<?= Session::get_csrf_token() ?>">
<link rel="stylesheet" href="<?= $SITE_URL ?>/assets/styles/css/global.css">
<script>
    const SITE_URL = '<?= $SITE_URL ?>';
</script>
<script defer src="<?= $SITE_URL ?>/assets/scripts/libs/loadingScreen.js"></script>
<script defer src="<?= $SITE_URL ?>/assets/scripts/libs/phoneFieldFormatter.js"></script>
