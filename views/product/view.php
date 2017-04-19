<?php include ROOT.'/views/layouts/header.php' ?>
<main class="mdl-layout__content">
	<div>
		<section class="section--center mdl-grid">
			<div class="demo-card-wide mdl-card mdl-cell mdl-cell--12-col mdl-shadow--4dp">
				<div class="mdl-card__title" style="background: url('<?php echo '../../'.$product[1][0]['image']; ?>') center / cover; height: 400px;"></div>

				<div class="mdl-card__supporting-text">
					<h2 class="mdl-card__title-text" style="margin: 15px; align-self: flex-start;">
						<?php echo $product[0]['name'] .' ( duration - '. $product[0]['duration'] . 'h )'; ?>
					</h2>
					<p><?php echo $product[0]['description']; ?></p>
					<br>
					
					<section class="section--center mdl-grid">
						<?php foreach ($product[1] as $value): ?>
							<div class="demo-card-image mdl-card mdl-shadow--2dp mdl-cell mdl-cell--6-col" style="background: url('<?php echo '../../'.$value['image']; ?>') center / cover;">
								<div class="mdl-card__title  mdl-card--expand"></div>
								<div class="mdl-card__actions">
									<a href="<?php echo '../../'.$value['image']; ?>" style="text-decoration: none;">
										<span class="demo-card-image__filename"><?php echo $product[0]['name'] ?></span>
									</a>
								</div>
							</div>
						<?php endforeach; ?>
					</section>

					<br>

				</div>

				<!-- Comments -->
				<div class="comments">
					<?php if (User::isGuest()): ?>
						<div class="comment__author">
							<a href="/user/register/">Register</a> and Add you comment.
						</div><br>
					<?php else: ?>
						<form class="form" method="post" action="/product/<?php echo $product[0]['id']; ?>/">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
								<input type="text" class="mdl-textfield__input" id="comment" name="comment">
								<input type="text" class="visuallyhidden" id="to_user" name="to_user" value="1">
								<input type="text" class="visuallyhidden" id="comment_id" name="comment_id" value="0">
								<label for="comment" class="mdl-textfield__label">Connect to disqus</label>
							</div>
							<button type="submit" name="submit" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" value="create">
								<i class="material-icons" role="presentation">check</i><span class="visuallyhidden">
									add comment
								</span>
							</button>
						</form>
					<?php endif; ?>

					<div class="comment mdl-color-text--grey-700">

						<?php foreach ($comments as $comment): ?>
						
						<div class="del-container">
						
							<?php if ($comment['reply_to_comment'] < 1): ?>

								<header class="comment__header">
									<i class="mdl-color-text--blue-grey-400 material-icons" role="presentation" style="font-size: 45px;">face</i>
									<div class="comment__author" style="margin-left: 10px;">
										<strong><?php echo $comment['from_user']; ?></strong>
										<span><?php echo $comment['comment_date']; ?></span>
									</div>
								</header>
								<div class="comment__text">
									<?php echo $comment['comment_text']; ?>
								</div>

								<!-- Comment buttons -->
								<?php if (!User::isGuest()): ?>
									<?php if (User::checkLogged() != $comment['user_id']): ?>
										<nav class="comment__actions">
											<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="like<?php echo $comment['user_id']; ?>">
												<i class="material-icons" role="presentation">thumb_up</i><span class="visuallyhidden">like comment</span>
											</button>
											<div class="mdl-tooltip" data-mdl-for="like<?php echo $comment['user_id']; ?>">Like</div>
										</nav>
									<?php endif; ?>
									<?php if (User::checkLogged() == $comment['user_id']): ?>
										<nav class="comment__actions">
											<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="edit<?php echo $comment['user_id']; ?>">
												<i class="material-icons" role="presentation">create</i><span class="visuallyhidden">edit comment</span>
											</button>
											<div class="mdl-tooltip" data-mdl-for="edit<?php echo $comment['user_id']; ?>">Edit comment</div>
											<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon delete-comment" id="delete<?php echo $comment['user_id']; ?>" data_id="<?php echo $comment['id']?>">
												<i class="material-icons" role="presentation">clear</i><span class="visuallyhidden">delete comment</span>
											</button>
											<div class="mdl-tooltip" data-mdl-for="delete<?php echo $comment['user_id']; ?>">Delete comment</div>
										</nav>
									<?php endif; ?>
								<?php endif; ?>

								<?php if (!User::isGuest()): ?>
								<?php if (User::checkLogged() != $comment['user_id']): ?>
									<form class="form" method="post" action="/product/<?php echo $product[0]['id']; ?>/">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input type="text" class="mdl-textfield__input" id="comment" name="comment">
											<input type="text" class="visuallyhidden" id="to_user" name="to_user" value="<?php echo $comment['user_id']; ?>">
											<input type="text" class="visuallyhidden" id="comment_id" name="comment_id" value="<?php echo $comment['id']; ?>">
											<label for="comment" class="mdl-textfield__label">Answer</label>
										</div>
										<button type="submit" name="submit" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" value="create">
											<i class="material-icons" role="presentation">check</i><span class="visuallyhidden">
												add comment
											</span>
										</button>
									</form>
									<?php endif; ?>
									<?php if (User::checkLogged() == $comment['user_id']): ?>
										<form class="form" method="post" action="/product/<?php echo $product[0]['id']; ?>/">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input type="text" class="mdl-textfield__input" id="update" name="update" value="<?php echo $comment['comment_text']; ?>">
												<input type="text" class="visuallyhidden" id="comment_id" name="comment_id" value="<?php echo $comment['id']; ?>">
												<label for="update" class="mdl-textfield__label">Edit comment</label>
											</div>
											<button type="submit" name="submit" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" value="update">
												<i class="material-icons" role="presentation">check</i><span class="visuallyhidden">
													add comment
												</span>
											</button>
										</form>
									<?php endif; ?>
									<?php endif; ?>

								<br>
							<?php endif; ?>

							<?php foreach ($comments as $reply): ?>
							
							<div class="del-container">
							
								<?php if ($comment['id'] == $reply['reply_to_comment']): ?>

									<header class="comment__header mdl-cell mdl-cell--6-col" style="margin-left: 50px;">
										<i class="mdl-color-text--blue-grey-400 material-icons" role="presentation" style="font-size: 45px;">face</i>
										<div class="comment__author" style="margin-left: 10px;">
											<strong><?php echo $reply['from_user']; ?></strong>
											<span><?php echo $reply['comment_date']; ?></span>
										</div>
										<p>to</p>
										<i class="mdl-color-text--blue-grey-400 material-icons" role="presentation" style="font-size: 45px;">face</i>
										<div class="comment__author" style="margin-left: 10px;">
											<strong><?php echo $reply['to_user']; ?></strong>
										</div>
									</header>
									<div class="comment__text" style="margin-left: 50px;">
										<?php echo $reply['comment_text']; ?>
									</div>

									<!-- Comment buttons -->
									<?php if (!User::isGuest()): ?>
										<?php if (User::checkLogged() != $reply['user_id']): ?>
											<nav class="comment__actions" style="margin-left: 50px;">
												<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="like<?php echo $reply['user_id']; ?>">
													<i class="material-icons" role="presentation">thumb_up</i><span class="visuallyhidden">like comment</span>
												</button>
												<div class="mdl-tooltip" data-mdl-for="like<?php echo $reply['user_id']; ?>">Like</div>
											</nav>
										<?php endif; ?>
										<?php if (User::checkLogged() == $reply['user_id']): ?>
											<nav class="comment__actions" style="margin-left: 50px;">
												<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="edit<?php echo $reply['user_id']; ?>">
													<i class="material-icons" role="presentation">create</i><span class="visuallyhidden">edit comment</span>
												</button>
												<div class="mdl-tooltip" data-mdl-for="edit<?php echo $reply['user_id']; ?>">Edit comment</div>
												<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon delete-comment" id="delete<?php echo $reply['user_id']; ?>" data_id="<?php echo $reply['id']?>">
													<i class="material-icons" role="presentation">clear</i><span class="visuallyhidden">delete comment</span>
												</button>
												<div class="mdl-tooltip" data-mdl-for="delete<?php echo $reply['user_id']; ?>">Delete comment</div>
											</nav>
										<?php endif; ?>
									<?php endif; ?>

									<?php if (!User::isGuest()): ?>
									<?php if (User::checkLogged() != $reply['user_id']): ?>
										<form class="form" method="post" action="/product/<?php echo $product[0]['id']; ?>/" style="margin-left: 50px;">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input type="text" class="mdl-textfield__input" id="comment" name="comment">
												<input type="text" class="visuallyhidden" id="to_user" name="to_user" value="<?php echo $reply['user_id']; ?>">
												<input type="text" class="visuallyhidden" id="comment_id" name="comment_id" value="<?php echo $comment['id']; ?>">
												<label for="comment" class="mdl-textfield__label">Answer</label>
											</div>
											<button type="submit" name="submit" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" value="create">
												<i class="material-icons" role="presentation">check</i><span class="visuallyhidden">
													add comment
												</span>
											</button>
										</form>
										<?php endif; ?>
										<?php if (User::checkLogged() == $reply['user_id']): ?>
											<form class="form" method="post" action="/product/<?php echo $product[0]['id']; ?>/" style="margin-left: 50px;">
												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
													<input type="text" class="mdl-textfield__input" id="update" name="update" value="<?php echo $reply['comment_text']; ?>">
													<input type="text" class="visuallyhidden" id="comment_id" name="comment_id" value="<?php echo $reply['id']; ?>">
													<label for="update" class="mdl-textfield__label">Edit comment</label>
												</div>
												<button type="submit" name="submit" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" value="update">
													<i class="material-icons" role="presentation">check</i><span class="visuallyhidden">
														add comment
													</span>
												</button>
											</form>

									<?php endif; ?>
									<?php endif; ?>
									<br>

								<?php endif; ?>
								
								</div>
								
							<?php endforeach; ?>
							
							</div>

						<?php endforeach; ?>

					</div>
				</div><!-- Comments -->

			</div>
		</section>
	</div>
	<?php include ROOT.'/views/layouts/footer.php' ?>
