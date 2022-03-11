<section class="sec-boxes">
    <div class="container_news">
    <?php foreach ($data["news"] as $value) :?>
        <div class="box">
            <span class="img" style="background-image: url('<?= $value["image"]?>')"></span>
            <div class="text-box">
                <h2><?= $value["title"]?></h2>
                <p><?= $value["short_text"]?></p>
                <button class="btn">View</button>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>