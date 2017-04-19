<?php include ROOT.'/views/layouts/header.php' ?>
<main class="mdl-layout__content">
<div>
	<div class="section--center mdl-grid">
		<div class="demo-card-wide mdl-card  mdl-cell mdl-cell--4-offset mdl-cell--4-col mdl-shadow--2dp">
			<div class="mdl-card__supporting-text">
				<h3>Привіт, <?php echo $user['name'] ?></h3>
				<!--<ul>
					<li><a href="/cabinet/edit">Змінити дані</a></li>
					<li><a href="/cabinet/history">Список покупок</a></li>
				</ul>-->
				<a href="/">Переглянути статті</a>
			</div>
		</div>
	</div>
</div>
<?php include ROOT.'/views/layouts/footer.php' ?>