<?php require 'partials/head.php' ?>

    <h1>All Users</h1>
    <?php foreach ($users as $user): ?>
        <li><?= $user->name; ?></li>
    <?php endforeach; ?>
    <h1>Submit Your Name</h1>

        <form method="POST" action="/users">
            <input name="name">
            <input type="submit" value="اضغط هنا">
        </form>

<?php require 'partials/footer.php' ?>