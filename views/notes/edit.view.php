<?php require basepath('views/partials/head.php') ?>
<?php require basepath('views/partials/nav.php') ?>
<?php require basepath('views/partials/header.php') ?>

<div class="min-h-full">



    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

            <form action="/note" method="POST">
                <input type="hidden" name="__mehod_request" value="PATCH">
                <input type="hidden" name="id" value="<?= $note["id"] ?>">
                <label for="note" class="block text-sm/6 font-medium text-gray-900">my note:</label>
                <textarea id="note" name="note" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400  sm:text-sm/6"><?= $note["body"] ?? "" ?></textarea>
                <p class="text-color-red"><?= isset($errors["body"]) ? $errors["body"] : "" ?></p>
                <button type="submit" class="rounded-md mt-5 bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2  ">Update</button>
            </form>


    </main>
    <?php basepath('views/partials/footer.php') ?>