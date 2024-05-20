<?php include __DIR__ . '/../header.php'; ?>

<?php foreach ($errors as $e) : ?>
    <p class="text-center text-red-500 mb-2"><?= $e ?></p>
<?php endforeach; ?>

<form action="" method="post" class="mx-auto w-3/4 rounded shadow border grid grid-cols-2 gap-4 p-4">
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom" value="<?= $_POST['nom'] ?? '' ?>" required autofocus class="border p-2 rounded">

    <label for="formule">Formule</label>
    <input type="text" name="formule" id="formule" value="<?= $_POST['formule'] ?? '' ?>" required class="border p-2 rounded">

    <input type="submit" value="Envoyer" class="bg-blue-500 rounded p-2 text-white">

</form>

<?php include __DIR__ . '/../footer.php'; ?>