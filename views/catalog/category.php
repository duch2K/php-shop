<!--header-->
<?php include ROOT . '/views/layouts/header.php'; ?>
<!--/header-->

<section>
  <div class="container">
    <div class="row">
      <!--categories-->
      <?php include ROOT . '/views/layouts/categories_side.php'; ?>
      <!--/categories-->

      <div class="col-sm-9 padding-right">
        <div class="features_items">
          <!--features_items-->
          <h2 class="title text-center">Latest products</h2>

          <?php foreach ($categoryProducts as $product): ?>
          <div class="col-sm-4">
            <div class="product-image-wrapper">
              <div class="single-products">
                <div class="productinfo text-center">
                  <img src="/php-test/template/images/home/product1.jpg" class="product-img
                    alt="product" 
                  />
                  <h2>$<?= $product['price'] ?></h2>
                  <a href="/php-test/product/<?= $product['id'] ?>">
                    <p><?= $product['name'] ?></p>
                  </a>
                  <div class="btn btn-default add-to-cart">
                    <i class="fa fa-shopping-cart"></i>Add to cart
                  </div>
                  <?php if ($product['is_new']): ?>
                  <img src="/php-test/template/images/home/new.png" class="new" alt="new">
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>

        </div>
        <!--features_items-->
        <?= $pagination->get(); ?>

      </div>
    </div>
  </div>
</section>

<!--footer-->
<?php include ROOT . '/views/layouts/footer.php'; ?>
<!--/footer-->