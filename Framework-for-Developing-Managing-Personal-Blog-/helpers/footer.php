<!-- footer starts here -->
<section id="footer">
	<div class="footer-menu">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#">Privacy</a></li>
		</ul>
	</div>

	<div class="footer-copyright">
		      <?php
                     $query = "SELECT * FROM tbl_footer WHERE id='1'";
                     $blog_footer = $db->select($query);
                     if ( $blog_footer) {
                         while ($result = $blog_footer->fetch_assoc() ) {
                ?> 
		<p>&copy;<?php echo $result['note'];?></p>
	<?php } } ?>
	</div>
</section>

<!-- footer ends here -->

</section>

<!--  body wrapper ends here -->
<script type="text/javascript" src="inc/js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="inc/js/jquery.nivo.slider.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
 </script>
</body>
</html>