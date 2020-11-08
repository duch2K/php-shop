<div class="col-sm-3">
  <div class="left-sidebar">
    <h2>Catalog</h2>
    <div class="panel-group category-products">
      <?php foreach ($categories as $categoryItem): ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a href="/php-test/category/<?= $categoryItem['id'] ?>"
                class="<?php if ($categoryId == $categoryItem['id']) echo 'active' ?>"
              >
                <?= $categoryItem['name'] ?>
              </a>
            </h4>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>