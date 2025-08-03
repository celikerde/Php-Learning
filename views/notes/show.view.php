<?php view("partials/head.php"); ?>
<?php view("partials/nav.php"); ?>
<?php view("partials/banner.php", ["heading" => "Note"]); ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p class="mb-6">
            <a href="/notes" class="text-blue-500 hover:text-blue-700 underline">Go Back</a>
        </p>
        <p><?= htmlspecialchars($note['body']) ?></p>
        <form class="mt-6" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <button class="text-red-500">Delete</button>
        </form>
    </div>
</main>

<?php require view("partials/footer.php"); ?>
