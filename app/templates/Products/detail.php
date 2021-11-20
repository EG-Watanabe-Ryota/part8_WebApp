<?php
    echo $this->Html->css('template');
    echo $this->Html->css('product_detail');
?>

<header>
    <h1>Nabe</h1>
    <div class='new_member'>

    </div>

    <div class='login'>

    </div>

    <div class='cart'>

    </div>

    <div class='header_bar'>
        <ul>
            <li>HOME</li>
            <li>カテゴリ</li>
            <li>カテゴリ</li> 
            <li>カテゴリ</li>                                                    
        </ul>
    </div>
</header>

<div class='main-content'>
        <div class='category_bar'>
            <p>全てから探す</p>
        </div>

        <div class='product_detail'>
            <div class='product_img'>
                <?php echo $this->Html->image(h($product->img),['width' => '257px','height' => '241px']); ?>
            </div>

            <div class='product_exp'>
                <p><?= h($product->name) ?></p>
                <p><?= h($product->price) ?>円(税込)</p>
                
                <form method="post" action="">
                    <label style="display:block; margin:0 0;">
                        数量:<input type="number" name="quantity" min="0" style="width:62px; height:27px; background-color:white;" />
                    </label>
                    <label style="display:block;">
                        <button type='submit' name='action' value='send'>カートに追加</button>
                    </label>
                </form>
            </div>
        </div>
</div>