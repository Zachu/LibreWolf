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

<div class="rules">
<?php print_rules($lang, $roles);?>
</div>

<div class="roles">
    <?php print_role_cards($roles, $role_count);?>
</div>

<div class="gamemaster">
    <section class="role_table">
        <?php print_gamemasters_role_table($roles);?>
    </section>
    <section class="night_table">
        <?php print_gamemaster_night_table($roles);?>
    </section>
</div>

</body>
</html>
