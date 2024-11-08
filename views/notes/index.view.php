<?php require(basePath('views/partials/header.php')) ?>
<?php require(basePath('views/partials/nav.php')) ?>

<?php require(basePath('views/partials/banner.php')) ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <ul>
                <?php foreach ($notes as $note): ?>
                    <li>
                        <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
                            <?= htmlspecialchars($note['title']) ?>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>

            <button class='mt-6 rounded-md px-3 py-2 text-sm font-medium text-gray-300 bg-gray-700 text-white'><a href="/notes/create">Create new note</a></button>
        </div>
    </main>

<?php require(basePath('views/partials/footer.php')) ?>