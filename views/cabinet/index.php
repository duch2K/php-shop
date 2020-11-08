<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
  <div class="container">
    <div class="row">
      <h1>User cabinet</h1>
      <h3>Hello, <?= $user['name']; ?></h3>
      <ul>
        <li><a href="/php-test/user/edit">Edit profile</a></li>
        <li><a href="/php-test/user/history">Purchase list</a></li>
      </ul>
    </div>
  </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>