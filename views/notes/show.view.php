<?php require(basePath('views/partials/header.php')) ?>
<?php require(basePath('views/partials/nav.php')) ?>

<?php require(basePath('views/partials/banner.php')) ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

            <div><?= htmlspecialchars($note['title']) ?></div>
            <p><?= htmlspecialchars($note['body']) ?></p>

            <button class='mt-3 rounded-md px-3 py-2 text-sm font-medium text-gray-300 bg-gray-700 text-white'><a href="/notes">Go back</a></button>
<!--            form to delete-->

            <div style="display: flex; gap: 10px; align-items: center" class="mt-5">
                <button class='rounded-md px-3 py-2 text-sm font-medium text-gray-300 bg-gray-700 text-white'><a href="/note/edit?id=<?= $note['id'] ?>">Update</a></button>

                <form method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="<?= $note['id'] ?>">
                    <input type="submit" value="Delete" class='rounded-md px-3 py-2 text-sm font-medium text-gray-300 bg-red-700 text-white cursor-pointer'>
                </form>
            </div>
        </div>
    </main>


<?php require(basePath('views/partials/footer.php')) ?>