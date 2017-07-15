<!DOCTYPE html>
<html lang="{{ $language }}">
<head>
    <meta charset="UTF-8">
    <title>LibreWolf</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/screen.css" media="screen">
    <link rel="stylesheet" href="assets/css/print.css" media="print">
</head>
<body>

<div class="rulebook">
    @include('rulebook')
</div>

<div class="rolecards">
    @include('rolecards', [
        'roles' => $roles->filter(function($role) use ($skip_role_cards) {
            return !in_array($role->id, $skip_role_cards);
        })
    ])
</div>

<div class="gamemaster">
    @include('gamemaster.roles')

    @include('gamemaster.nights')
</div>

</body>
</html>
