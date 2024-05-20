<?php include __DIR__ . '/../header.php'; ?>

<h1 class="text-center font-bold text-2xl mb-4"><?= $molecule->nom ?></h1>

<dl class="w-1/2 mx-auto grid grid-cols-2 mb-12">
    <dt class="text-bold">Formule</dt>
    <dd><?= $molecule->formule ?></dd>

    <dt class="text-bold">Masse moléculaire</dt>
    <dd><?= $molecule->masseMoleculaire ?> g/mol</dd>
</dl>

<h2 class="text-lg font-bold">Composition</h2>
<table class="w-1/2 mx-auto text-center">
    <thead>
        <tr>
            <th>Atome</th>
            <th>Symbole</th>
            <th>Quantité</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($molecule->atomes as $atome) : ?>
            <tr>
                <td><?= $atome->nom ?></td>
                <td><?= $atome->symbole ?></td>
                <td><?= $atome->qtte ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include __DIR__ . '/../footer.php'; ?>