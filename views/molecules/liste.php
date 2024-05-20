<?php include __DIR__ . '/../header.php'; ?>

<div class="flex gap-8 flex-wrap">
    <?php foreach ($molecules as $m) : ?>
        <div class="rounded border shadow p-4 flex flex-col gap-2">
            <h2><?= $m->nom ?></h2>
            <p class="text-sm text-gray-500 italic"><?= $m->formule ?></p>

            <p class="flex gap-4 justify-around">

                <a href="<?= url('/molecules/details') ?>?id=<?= $m->id ?>" class="text-white bg-blue-500 rounded p-4">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </a>

                <a href="<?= url('/molecules/supprimer') ?>?id=<?= $m->id ?>" class="text-white bg-red-500 rounded p-4" onclick="return confirm('Êtes-vous sûr ?')">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </a>
            </p>
        </div>
    <?php endforeach; ?>
</div>

<?php include __DIR__ . '/../footer.php'; ?>