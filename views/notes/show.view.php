<?php require basepath('views/partials/head.php') ?>
<?php require basepath('views/partials/nav.php') ?>
<?php require basepath('views/partials/header.php') ?>

<div class="min-h-full">



    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <ul>
                <p><?= htmlspecialchars($note["body"]) ?></p>
            </ul>
            <form action="/note" method="POST">
                <input type="hidden" value="DELETE" name="__mehod_request">
                <input type="hidden" value="<?= $note["id"] ?>" name="id">
                <button type="submit">DELETE</button>
            </form>
            <form action="/note/edit">
                <input type="hidden" value="<?= $note["id"] ?>" name="id">
                <button type="submit">EDIT</button>
            </form>
        </div>
    </main>
    <?php basepath('views/partials/footer.php') ?>