<?php include ROOT . '/php-test/views/layouts/header.php'; ?>

<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-4 col-sm-offset-4 padding-right">

        <?php if ($result): ?>
          <p>Sent! We will aswer you soon.</p>
        <?php else: ?>
          <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
              <?php foreach ($errors as $error): ?>
                <li> - <?php echo $error; ?></li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>

          <div class="signup-form">
            <h2>Feedback</h2>
            <h5>Have any question? Contact us</h5>
            <br/>
            <form action="#" method="post">
              <p>Your email</p>
              <input type="email" name="userEmail" placeholder="E-mail" value="<?= $userEmail; ?>"/>
              <p><essage</p>
              <input type="text" name="userText" placeholder="Message" value="<?= $userText; ?>"/>
              <br/>
              <input type="submit" name="submit" class="btn btn-default" value="Send" />
            </form>
          </div>
        <?php endif; ?>

        <br/>
        <br/>
      </div>
    </div>
  </div>
</section>

<?php include ROOT . '/php-test/views/layouts/footer.php'; ?>