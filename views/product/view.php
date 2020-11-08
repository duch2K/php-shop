<!--header-->
<?php include ROOT . '/views/layouts/header.php'; ?>
<!--/header-->

<section>
  <div class="container">
    <div class="row">
      
      <?php include ROOT . '/views/layouts/categories_side.php'; ?>
      <!--/categories-->

      <div class="col-sm-9 padding-right">
        <div class="product-details">
          <!--product-details-->
          <div class="row">
            <div class="col-sm-5">
              <div class="view-product">
                <img src="/php-test/template/images/product-details/1.jpg" alt="" />
              </div>
            </div>
            <div class="col-sm-7">
              <div class="product-information">
                <!--/product-information-->
                <?php if ($product['is_new']): ?>
                <img src="/php-test/template/images/product-details/new.jpg" class="newarrival" alt="" />
                <?php endif; ?>
                <h2><?= $product['name'] ?></h2>
                <p>Код товара: <?= $product['code'] ?></p>
                <span>
                  <span>US $<?= $product['price'] ?></span>
                  <label>Количество:</label>
                  <input type="text" value="3" />
                  <button type="button" class="btn btn-fefault cart">
                    <i class="fa fa-shopping-cart"></i>
                    Add to cart
                  </button>
                </span>
                <p><b>Наличие:</b>
                  <?php echo $product['status'] ? 'На складе' : 'Нет'; ?>
                </p>
                <p><b>Состояние:</b>
                  <?php echo $product['is_new'] ? 'Новое' : 'Не новое'; ?>
                </p>
                <p><b>Производитель: </b><?= $product['brand'] ?></p>
              </div>
              <!--/product-information-->
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <h5>Описание товара</h5>
              <pre>
              <?= $product['description'] ?>
              </pre>
            </div>
          </div>
        </div>
        <!--/product-details-->

      </div>
    </div>
  </div>
</section>


<br />
<br />

<!--footer-->
<?php include ROOT . '/views/layouts/footer.php'; ?>
<!--/footer-->