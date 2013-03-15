  <footer class="row">
    <div class="col_2">Eric Hu<br />1156 Chapel St.<br />New Haven, CT 06510<br />United States</div>
	<div class="col_3"><a href="http://twitter.com/_erichu" target="_blank">Twitter</a><br /><a href="http://facebook.com/seiyohu" target="_blank">Facebook</a><br /><a href="http://e-r-h.tumblr.com" target="_blank">Blog</a><br />
        <a href="https://github.com/er1chu" target="_blank">Github</a></div>
	<div class="col_3">Colophon:<br />Design and Development: Eric Hu<br />Typeface: Helvetica and Times<br />Content Management: <a href="http://getkirby.com/" target="_blank">Kirby</a><br /><br />
		<!-- Begin MailChimp Signup Form -->
		
			<div id="mc_embed_signup">
			<form action="http://erichu.us6.list-manage.com/subscribe/post?u=37e160c2a6118e7447e9e766e&amp;id=8f3de8e83f" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Email Address" required>
				<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
			</form>
			</div>

		<!--End mc_embed_signup-->
	</div>
    <!-- <div class="col_1"><?php echo kirbytext($site->copyright()) ?></div> -->
  </footer>
  <script type="text/javascript">

    $(document).ready(function() {
      $(".extended").hide();
      //toggle the componenet with class msg_body
      $(".more").click(function()
      {
        $(this).next(".extended").slideToggle(300);
        $(this).hide();
      });
     $(".extended").click(function()
      {
        $(this).slideToggle(300);
        $(".more").show();
      });
    });
    </script>
    <script>
        var _gaq=[['_setAccount','UA-15656336-1'],['_trackPageview']];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
</body>

</html>