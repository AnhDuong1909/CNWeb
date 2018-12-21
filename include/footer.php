<?php
	$footer = new XTemplate("views/footer.html");
	
	$footer->parse("footer");
	$footer = $footer->text("footer");
?>