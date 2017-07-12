<article class="role">
    <h3><?=$role['name'];?></h3>
    <table class="attributes">
        <tr><th>Joukkue</th><td><?=$role['team'] ?? '';?></td></tr>
        <tr><th>Tehtävä</th><td><?=$role['description'] ?? '';?></td></tr>
        <tr><th>Erikoiskyky</th><td><?=$role['special'] ?? 'Ei mitään';?></td></tr>
        <?php if (isset($role['info'])): ?>
            <tr><th>Lisätietoja</th><td><strong><?=$role['info'];?></strong></td></tr>
        <?php endif;?>
    </table>
</article>