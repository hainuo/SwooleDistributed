<?php
/**
 * Created by PhpStorm.
 * User: hainuo
 * Date: 16/9/7
 * Time: 下午10:32
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $this->e($title) ?></title>

</head>
<body>

<?= $this->section('content') ?>

<div class="text">
    <?php
    if (!empty($dumps)) {
        $value = var_export($dumps, true);
        $value = '<pre>' . $value . '</pre>';
        echo $value;
    }
    ?>
</div>
</body>
</html>