<?php include ROOT.'/views/layouts/header.php' ?>
<main class="mdl-layout__content">
<div>
	<div class="section--center mdl-grid">

		<?php if (isset($errors) && is_array($errors)): ?>
		<div class="demo-card-wide mdl-card  mdl-cell mdl-cell--4-offset mdl-cell--4-col mdl-shadow--2dp">
		<div class="mdl-card__supporting-text">
			<ul>
				<?php foreach ($errors as $error): ?>
				<li><?php echo $error; ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
		</div>
		<?php endif; ?>

		<div class="demo-card-wide mdl-card  mdl-cell mdl-cell--4-offset mdl-cell--4-col mdl-shadow--2dp">
			<div class="mdl-card__supporting-text">
				<form class="form" action="/user/login/" method="post">
					<h5>Вхід на сайт</h5>

					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input type="email" class="mdl-textfield__input" id="email" name="email" value="<?php echo $email; ?>"/>
						<label for="email" class="mdl-textfield__label">Email</label>
					</div>

					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input type="password" class="mdl-textfield__input" id="password" name="password"/>
						<label for="password" class="mdl-textfield__label">Пароль</label>
					</div>
					<input type="submit" name="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-shadow--4dp mdl-color--accent" value="Ввійти"/>
					<a href="/user/register/" class="mdl-button mdl-js-button mdl-js-ripple-effect">Реєстрація</a>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include ROOT.'/views/layouts/footer.php' ?>
