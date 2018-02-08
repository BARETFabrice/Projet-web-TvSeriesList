<?php
include "page/page-header.php";
?>

<div class="row column align-center medium-6 large-4 container-padded div_login">
    <form class="log-in-form">
		<h4 class="text-center">Les meilleurs moments de Lost</h4>
		<p>Par <a href="#">Fred</a></p>
		<hr>

		<label>Titre
			<input type="text" value="Les meilleurs moments de Lost">
		</label>
		<label>Contenu
			<textarea rows="10" cols="50">After 121 episodes, over 5,000 minutes and thousands more moments, here we are at the end of Lost. It’s been a grand journey and I’ll miss it greatly.

But instead of mourning, why not celebrate all the great moments Lost has given us over its six incredible seasons? We here at Screen Rant have come up with a list of 25 of those best moments and present them to you below.

Now there was debate behind-the-scenes about whether or not we should put the list in order of a countdown, but we quickly realized that would turn the list into something other than what it ought to be. Instead of a countdown, we thought we’d just list these moments in chronological order – that way it’s less of a competition between the moments and more of a celebration of them.
			</textarea>
		</label>
		<p><input type="submit" class="button expanded" value="Modifier"></input></p>
		<p><input type="submit" class="button expanded alert" value="Supprimer"></input></p>
    </form>
</div>

<?php
include "page/page-footer.php";
?>