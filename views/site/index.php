<?php include ROOT.'/views/layouts/header.php' ?>
<main class="mdl-layout__content">
<div style="min-height: 100%;">
	<div class="section--center mdl-grid">
		<?php foreach($products as $product):?>
		<div class="demo-card-wide mdl-card  mdl-cell mdl-cell--4-col mdl-shadow--2dp">
			<div class="mdl-card__title" style="background:url('<?php echo $product['image']; ?>')center/cover;"></div>
			<div class="mdl-card__supporting-text">
				<h2 class="mdl-card__title-text"><?php echo $product['name']; ?></h2>
			</div>
			<div class="mdl-card__actions mdl-card--border">
				<a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="product/<?php echo $product['id']; ?>">Details</a>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>
	
	<?php include ROOT.'/views/layouts/footer.php' ?>