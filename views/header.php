<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon super site</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="container mx-auto">

        <header class="mb-12">
            <nav class="flex justify-around bg-gray-800 text-white p-4">
                <a href="<?= url('/accueil') ?>">Accueil</a>
                <a href="<?= url('/molecules') ?>">Les molécules</a>
                <a href="<?= url('/molecules/ajouter') ?>">Ajouter une molécule</a>
            </nav>
        </header>
