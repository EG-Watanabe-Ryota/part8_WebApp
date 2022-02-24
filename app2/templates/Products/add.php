<!-- main -->
<h1>商品登録</h1>
            
<?= $this->Form->create(null,["enctype"=> "multipart/form-data"]); ?>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">商品名</label>
    <div class="col-sm-10">
      <?= $this->Form->control('name',["type" => "text","class"=> "form-control","id"=>"inputEmail3"])?>
    </div>
  </div>

  <div class="form-group row">
  <label for="inputEmail3" class="col-sm-2 col-form-label">値段(原価)</label>
    <div class="col-sm-10">
      <?= $this->Form->control('price',["type" => "number","class"=> "form-control","id"=>"inputEmail3"])?>
    </div>
  </div>

  <div class="form-group row">
  <label for="inputEmail3" class="col-sm-2 col-form-label">在庫(個)</label>
    <div class="col-sm-10">
      <?= $this->Form->control('stock',["type" => "number","class"=> "form-control","id"=>"inputEmail3"])?>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">カテゴリ</label>
    <div class="col-sm-10">
      <?= $this->Form->control('category',["type" => "text","class"=> "form-control","id"=>"inputEmail3"])?>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">画像ファイル</label>
    <div class="col-sm-10">
    <input type="file" name="image" value="" size="35">
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">商品登録</button>
    </div>
  </div>

  <?= $this->Form->end(); ?>

  


