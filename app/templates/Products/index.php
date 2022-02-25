<?php
    echo $this->Html->css('template');
    echo $this->Html->css('products');
?>


<div class='main-content'>
        <div class='category_bar'>
            <p>全てから探す</p>
        </div>

        <div class="product_wrapper">
            <p>TOP><?=h($category)?></p>
            <hr>
            <div class='products'>
                <?php foreach($products as $product):?>
                    <div class='product'>
                        <?php echo $this->Html->image(h($product->img),['width' => '237px','height' => '221px']); ?>
                        <p><?= h($product->name) ?></p>
                        <p><?= h($product->price) ?>円(税込)</p>

                        <!-- 商品詳細ボタン-->
                        <button style="background-color:white; border-color:black; margin-top:10px;">
                            <?= $this->Html->link('商品詳細', ['action' => 'detail', $product->id]) ?>
                        </button>
                        <!--フォーム送信-->
                        <?= $this->Form->create() ?>

                            <!--数量入力テキストボックス-->
                            <label style="display:block; margin:0 0;">
                                数量:<input type="number" name="quantity"  min="1" value='1' style="width:62px; height:27px; background-color:white;" />
                            </label>
                            <!--カートに入れる商品名を送るとこ-->
                            <input type="hidden" name="product_name" value=<?=$product->name?>>
                            <!--値段送るとこ-->
                            <input type="hidden" name="price" value=<?=$product->price?>>
                            <!--imgパス送るとこ-->
                            <input type="hidden" name="img" value=<?=$product->img?>>
                            <!-- id送るとこ -->
                            <input type="hidden" name="id" value=<?=$product->id?>>

                            <!--カート追加ボタン-->
                            <label style="display:block;">
                                <button type='submit' name='product_id' value=<?=$product->id?>>カートに追加</button>
                            </label>

                            <input type="hidden" name="_csrfToken" autocomplete="off" value="<?= $this->request->getAttribute('csrfToken') ?>">
                            <?= $this->Form->end()?>
                    </div>
                <?php endforeach; ?>
            </div>
            
        </div>
</div>