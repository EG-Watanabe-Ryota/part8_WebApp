<?php
    echo $this->Html->css('template');
    echo $this->Html->css('products');
?>


<div class='main-content'>
        <div class='category_bar'>
            <h3>全てから探す</h3>
            <p><?=$this->html->link('ALL',['controller' => 'Products', 'action' => 'index'])?><p>
            <h3>キーワードから探す</h3>
            <?= $this->Form->create(null, [
                'url' => [
                    'controller' => 'Products',
                    'action' => 'find'
                ]
            ]); ?>
            <fieldset>
                <?= $this->Form->input('find'); ?>
                <?= $this->Form->button('検索') ?>
                <?= $this->Form->end() ?>
            </fieldset>
            <?= $this->Form->end()?>
            <h3>素材から探す</h3>
            <p><?= $this->Form->postLink('ステンレス', ['controller' => 'Products', 'action' => 'index'],
            [
                'data' => [
                    'post' => 'stainless',
                ]
            ]
            ) ?></p>

        </div>
