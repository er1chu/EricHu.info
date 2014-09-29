    <footer>
  	<div class="col_3"><a href="http://twitter.com/_erichu" target="_blank">Twitter</a> / <a href="http://facebook.com/seiyohu" target="_blank">Facebook</a> / <a href="http://e-r-h.tumblr.com" target="_blank">Blog</a> /
          <a href="https://github.com/er1chu" target="_blank">Github</a></div>
  	<div class="col_3">Design and Development: Eric Hu<br />Typeface: Bau and Big Caslon<br />Content Management: <a href="http://getkirby.com/" target="_blank">Kirby</a><br /><br />
  		<!-- Begin MailChimp Signup Form -->
  		
  			<div id="mc_embed_signup">
        For Updates: <br />
  			<form action="http://erichu.us6.list-manage.com/subscribe/post?u=37e160c2a6118e7447e9e766e&amp;id=8f3de8e83f" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
  				<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Email Address" required>
  				<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
  			</form>
  			</div>

  		<!--End mc_embed_signup-->
      <!-- <div class="col_1"><?php echo kirbytext($site->copyright()) ?></div> -->
    </footer>

  </div>
  <script type="text/javascript">

    $(document).ready(function() {

      $("img.lazy").lazyload({
        threshold : 200,
        effect: "fadeIn"

      });

      $("#test").click(function(){

        $("#rapper").toggleClass("shove");

      });

      $(".extended").hide();
      //toggle the componenet with class msg_body
      $(".more").click(function()
      {
        $(this).next(".extended").fadeIn(200);
        $('.stats').css('display','block');
        $(this).hide();
      });
     $(".extended").click(function()
      {
        $(this).fadeOut(200);
        $('.stats').css('display','none');
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