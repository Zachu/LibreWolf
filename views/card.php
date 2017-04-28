<article class="card">
    <header>
        <span class="number"><?=$no;?></span>
        <span class="team"><?=$role['team'] ?? '';?></span>
    </header>
    <h2 class="name"><?=$role['name'] ?? '';?></h2>
    <p><?=$role['description'] ?? '';?></p>
    <p class="special"><?=$role['special'] ?? '';?></p>
</article>