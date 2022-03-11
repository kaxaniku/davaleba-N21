<section class="categories_sec">
    <div class="flex">
        <?php foreach ($data['categories'] as $value) :?>
    <div class="item">
        <span><?= $value['title']?></span>
    </div>
    <?php endforeach;?>
    </div>
</section>