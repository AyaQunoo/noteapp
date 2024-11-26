<?php require basepath('views/partials/head.php') ?>
<?php require basepath('views/partials/nav.php') ?>
<?php require basepath('views/partials/header.php') ?>
<div class="min-h-full">



    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <ul>
                <?php foreach ($notes as $note) : ?>
                    <li><a href="/note?id=<?= $note['id'] ?>"><?= htmlspecialchars($note['body']) ?></a></li>
                <?php endforeach ?>
            </ul>

            <a href="/note/create">CREATE NOTE</a>
        </div>
    </main>
    <?php basepath('views/partials/footer.php') ?>