<?php
$base_path = base_path();
$path_to_theme = drupal_get_path('theme', 'vossen');

// Get Cocoon theme settings
$preloader = theme_get_setting('preloader');
?>

<?php if (theme_get_setting('preloader')): ?>
	<div id="preloader"><div class="loader">  
		<img src="<?php print (drupal_get_path('theme', 'vossen')); ?>/images/assets/preloader-logo.svg" alt="<?php print $site_name; ?>"> 
	</div></div><!-- /.loader, /.preloader -->
<?php endif; ?>

<div class="site-wrapper">
          
		<nav class="navbar navbar-default navbar-alt <?php if (theme_get_setting('sticky_header')): ?>navbar-sticky<?php endif; ?>" role="navigation">
	<div class="navbar-logo">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-logo home-link" rel="home" href="<?php print $front_page; ?>">
					<img src="<?php print $base_path . $path_to_theme; ?>/images/assets/logo-white.svg" alt="<?php print $site_name; ?>" class="logo-big">
				</a>
			</div>
</nav>
	


<header>
	<nav class="navbar navbar-default navbar-alt <?php if (theme_get_setting('sticky_header')): ?>navbar-sticky<?php endif; ?>" role="navigation">
	
			<!-- Brand and toggle get grouped for better mobile display -->
            

			<!-- Collect the nav links, forms, and other content for toggling -->
			<?php if ($page['main_menu']): ?>
				<div class="collapse navbar-collapse" id="main-nav" style="max-height: 481px;">
					<?php print render($page['main_menu']); ?>
				</div> <!-- /# -->
			<?php endif; ?>
		</nav><!-- /.container -->
</header><!-- /header -->

<?php if ($page['hero_fullwidth']): ?> 
	<section id="home-parallax-fullwidth"> 
		<div class="home-container text-center op-1">
			<?php print render($page['hero_fullwidth']); ?>
		</div>
        </section>
<?php endif; ?>

<?php if ($page['hero_landingpage']): ?> 
	<section id="home-landing"> 
		<div class="home-container text-center op-1">
			<?php print render($page['hero_landingpage']); ?>
			<?php if ($page['hero_bottom']): ?>
				<div class="home-bottom">
					<div class="container text-center">
						<div class="move bounce">
							<?php print render($page['hero_bottom']); ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
        </section>
<?php endif; ?>

<?php if ($page['hero_parallax']): ?> 
	<section id="home-revolution-slider">
		<div class="hero">
			<?php print render($page['hero_parallax']); ?>
		    	<?php if ($page['hero_bottom']): ?>
				<div class="home-bottom">
					<div class="container text-center">
						<div class="move bounce">
							<?php print render($page['hero_bottom']); ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>




<!-- Onepage Features -->
      <?php if ($page['onepage_features']): ?>
        <section id="features">
	<div class="container">
          <?php print render($page['onepage_features']); ?>
        </div></section> <!-- /.container, /#features -->
      <?php endif; ?>


    <!-- Start Content -->
<div class="site-wrapper">
	<a id="main-content"></a>
    
<?php print render($page['help']); ?>
	<?php if ($action_links): ?>
		<ul class="action-links">
			<?php print render($action_links); ?>
		</ul>
	<?php endif; ?>
	<section>
        	<?php if ($messages): ?>
			<div id="messages"><div class="container">
				<?php print $messages; ?>
          		</div></div> <!-- /.container, /#messages -->
		<?php endif; ?>
	</section>

<!-- End Content -->
    
    <?php if ($page['fullwidth_panel']): ?>
	<section class="fullwidth-panel">
  <div class="col-m-5">
    <img src="http://ckccharacters.dd:8083/sites/all/themes/vossen/images/assets/iron-man-full.png" class="wow fadeinup animated">  </div>  
		<?php print render($page['fullwidth_panel']); ?>
	</section><!-- /.fullwidth-panel -->
<?php endif; ?>
    
    
<!-- Onepage About -->
      <?php if ($page['onepage_about']): ?>
        <section id="about" class="parallax-section-1">
	<div class="container">
          <?php print render($page['onepage_about']); ?>
        </div></section> <!-- /.container, /#about -->
      <?php endif; ?>


<!-- Onepage Team -->
      <?php if ($page['onepage_team']): ?>
        <section id="team">
	<div class="container">
          <?php print render($page['onepage_team']); ?>
        </div></section> <!-- /.container, /#team -->
      <?php endif; ?>

<!-- Onepage Skills -->
      <?php if ($page['onepage_skills']): ?>
        <section id="skills" class="parallax-section-2">
	<div class="container">
          <?php print render($page['onepage_skills']); ?>
        </div></section> <!-- /.container, /#skills -->
      <?php endif; ?>

<!-- Onepage Facts -->
      <?php if ($page['onepage_facts']): ?>
        <section id="fun-facts">
	<div class="container">
          <?php print render($page['onepage_facts']); ?>
        </div></section> <!-- /.container, /#fun-facts -->
      <?php endif; ?>

<!-- Onepage Quotes -->
      <?php if ($page['onepage_quotes']): ?>
        <section id="quote" class="parallax-section-3">
	<div class="container">
          <div class="row wow fadeInUp animated"><div class="col-lg-12 wow fadeInUp animated">
            <?php print render($page['onepage_quotes']); ?>
          </div></div>
        </div></section> <!-- /.container, /#quotes -->
      <?php endif; ?>
    
    <!-- Onepage Call to Action 1 -->
      <?php if ($page['onepage_calltoaction1']): ?>
      <div class="parallax-section-2">
        <section id="call-to-action-1">
	<div class="servicecontainer parallax-section-5">  
          <?php print render($page['onepage_calltoaction1']); ?>
            </div> </section> </div><!-- /.container, /#call-to-action-1 -->
      <?php endif; ?>
    
<!-- Onepage Portfolio -->
      <?php if ($page['onepage_portfolio']): ?>
        <div class="parallax-section-2"> <section id="portfolio">
	<div class="separator"></div>
	<div class="container">
        <div class="row">
           
          <?php print render($page['onepage_portfolio']); ?>
     </div> </div></section> </div> <!-- /.container, /#portfolio -->
      <?php endif; ?>  
    
<!-- Onepage Get Connected -->
      <?php if ($page['onepage_getconnected']): ?>
        <section id="get-connected" class="parallax-section-4">
	<div class="container">
          <?php print render($page['onepage_getconnected']); ?>
        </div></section> <!-- /.container, /#get-connected -->
      <?php endif; ?>
            
<!-- Onepage Services -->
      <?php if ($page['onepage_services']): ?>
        <section id="services"> <div class=""> 
	<div class="container">
        
          <?php print render($page['onepage_services']); ?>
            </div></div></section> <!-- /.container, /#services -->
      <?php endif; ?>
    
    
    <!-- Onepage Video Section -->
      <?php if ($page['onepage_videosection']): ?>
        <section id="hero" class="hero-fullscreen" data-overlay-dark="8">			
			     
            
            
               <iframe style="position: absolute;"
                          src="https://www.youtube.com/embed/4NxGxkK3HYQ?autoplay=1&controls=0&loop=1&playlist=4NxGxkK3HYQ;showinfo=0" data-youtube-video-id="4NxGxkK3HYQ" id="vossen-youtube" style="left: 50%;" width="100%" height="150%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            
            <?php print render($page['onepage_videosection']); ?>
      <!-- /.container, /#video-section -->
      <?php endif; ?>  
    

<!-- Onepage Price List -->
      <?php if ($page['onepage_pricelist']): ?>
        <section id="price-list" class="parallax-section-6">
	<div class="container">
          <?php print render($page['onepage_pricelist']); ?>
        </div></section> <!-- /.container, /#price-list -->
      <?php endif; ?>

<!-- Onepage Clients -->
      <?php if ($page['onepage_clients']): ?>
     <div class="parallax-section-2">        
	<div class="col-md-12">
          <?php print render($page['onepage_clients']); ?>
           </div> </div><!-- /.row, /.container, /#clients -->
      <?php endif; ?>

<!-- Onepage Testimonials -->
      <?php if ($page['onepage_testimonials']): ?>
        <section id="testimonials" class="">
            <div class="servicecontainer">
	<div class="container">
          <?php print render($page['onepage_testimonials']); ?>
      </div>  </div></section> <!-- /.container, /#testimonials -->
      <?php endif; ?>

<!-- Onepage Contact -->
      <?php if ($page['onepage_contact']): ?>
        <section id="contact">
	<div class="container">
          <?php print render($page['onepage_contact']); ?>
        </div></section> <!-- /.container, /#contact -->
      <?php endif; ?>

<!-- Onepage Map -->
      <?php if (theme_get_setting('show_map')): ?>
        <div id="map">
        </div> <!-- /#map -->
      <?php endif; ?>

            <!-- Start Footer 1 -->
            <footer id="footer">
                <div class="footer-widgets footer-section-1">
                    <div class="client-bg">
                        <div class="client-title"><i>Be Sure To Check Out Our Most Recent Testimonials..</i></div></div>
                    <div class="footer-container"> 
                            
                            <div class="col-md-3 col-sm-6 col-footer">
				<?php if ($page['col_footer_1']): ?>
                                             <div class="col-footer-1">
						 <?php print render($page['col_footer_1']); ?>
						</div> <!-- /.col-footer-1 -->
					<?php endif; ?>

                            </div>
                            
                            <div class="col-md-3 col-sm-6 col-footer">
                                <div class="subscription">
					<?php if ($page['col_footer_2']): ?>
                                             <div class="col-footer-2">
						 <?php print render($page['col_footer_2']); ?>
						</div> <!-- /.col-footer-2 -->
					<?php endif; ?>
                                    
                                </div>
                            </div> 
                            
                            <div class="col-md-3 col-sm-6 col-footer">
 				<?php if ($page['col_footer_3']): ?>
                                             <div class="col-footer-3">
						 <?php print render($page['col_footer_3']); ?>
						</div> <!-- /.col-footer-3 -->
					<?php endif; ?>
                            </div>
                            
                            <div class="col-md-3 col-sm-6 col-footer">

 				<?php if ($page['col_footer_4']): ?>
                                             <div class="col-footer-4">
						 <?php print render($page['col_footer_4']); ?>
						</div> <!-- /.col-footer-4 -->
					<?php endif; ?>



                            </div>
                             
                    </div>
                </div><!-- End Footer Widgets -->
               
				<div class="footer-copyright">
					<div class="container">
						<div class="row">
								
							<div class="col-md-12 col-sm-12">
                                                          <?php if ($page['footer_copyright']): ?>
                                                            <div class="footer-copyright-text">
							        <?php print render($page['footer_copyright']); ?>
							      </div> <!-- /.footer-copyright -->
							    <?php endif; ?>
							</div>
							<div class="col-md-12 col-sm-12">

                                                          <?php if ($page['footer_social_icons']): ?>
                                                            <div class="footer-social-icons">
							        <?php print render($page['footer_social_icons']); ?>
							      </div> <!-- /.footer-social-icons -->
							    <?php endif; ?>
							</div>
						</div>
					</div>
				</div><!-- End Footer Copyright -->
			</footer>
           <!-- End Footer 1 -->


            
</div><!-- /.site-wrapper -->

