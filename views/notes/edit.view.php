<?php require(basePath('views/partials/header.php')) ?>
<?php require(basePath('views/partials/nav.php')) ?>
<?php require(basePath('views/partials/banner.php')) ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

            <form method="post">
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-base/7 font-semibold text-gray-900">Update Note</h2>
                        <p class="mt-1 text-sm/6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>


                        <div class=" <?= empty($inputErrors) ? 'hidden' : '' ?> p-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <?php
                            foreach ($inputErrors as $input => $message) {
                                echo "<li>" . $message . "</li>";
                            }
                            ?>
                        </div>


                        <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                                <div class="mt-2">
                                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                        <input value="<?= $note["title"] ?? '' ?>" type="text" name="title" id="title" autocomplete="username" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm/6" >
                                    </div>
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="body" class="block text-sm/6 font-medium text-gray-900">Body</label>
                                <div class="mt-2">
                                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                        <textarea name="body" id="body" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm/6"><?= $note["body"] ?? '' ?></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" value="<?= $note['id'] ?>">
                    <button type="button" class="text-sm font-semibold text-gray-900 hover:bg-red-600 hover:text-white px-3 py-2 rounded-md"><a href="/note?id=<?= $note['id'] ?>">Cancel</a></button>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                </div>
            </form>

        </div>
    </main>


<?php require(basePath('views/partials/footer.php')) ?>