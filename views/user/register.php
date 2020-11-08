<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-4 col-sm-offset-4 padding-right">
        <?php if ($result): ?>
          Yor're already signed up!
        <?php else: ?>
          <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
              <?php foreach ($errors as $err): ?>
              <li> - <?= $err; ?></li>
              <?php endforeach; ?> 
            </ul>
          <?php endif ?>
          <div class="signup-form">
            <h2>Sign up</h2>
            <form action="#" method="post">
              <input type="text" name="name" placeholder="Name" value="<?= $name; ?>">
              <input type="email" name="email" placeholder="E-mail" value="<?= $email; ?>">
              <input type="password" name="password" placeholder="Password" value="<?= $password; ?>">
              <button type="submit" name="submit" class="btn btn-default">Sign up</button>
            </form>
          </div>    
          <?php endif; ?> 
        <br> 
        <br> 
      </div>
    </div>
  </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>