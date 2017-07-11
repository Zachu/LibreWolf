<?php require_once 'init.php';?>
<!DOCTYPE html>
<html lang="<?=$lang;?>">
<head>
    <meta charset="UTF-8">
    <title>LibreWolf</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/screen.css" media="screen">
    <link rel="stylesheet" href="assets/css/print.css" media="print">
</head>
<body>

<section class="rules">
<?php print_rules($lang); ?>
</section>
<section class="roles">
    <?php print_roles($roles, $role_count);?>
</section>

</body>
</html>
