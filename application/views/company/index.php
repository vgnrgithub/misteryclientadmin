<h2><?php echo $title; ?></h2>

<?php foreach ($companies as $company): ?>

    <h3><?php echo $company['name']; ?></h3>
    <div class="main">
        <?php echo $company['name_request']; ?>
    </div>
    <p><a href="<?php echo 'company/'.$company['id'] ?>">View company</a></p>

<?php endforeach; ?>