    <footer class="site-footer">
      <div class="footer-boxes">


        <?php if (is_active_sidebar('footer1')):?>
          <div class="footer-box">
            <?php dynamic_sidebar('footer1');?>
          </div>
        <?php endif; ?>
        <?php if (is_active_sidebar('footer2')):?>
          <div class="footer-box">
            <?php dynamic_sidebar('footer2');?>
          </div>
        <?php endif; ?>
        <?php if (is_active_sidebar('footer3')):?>
          <div class="footer-box">
            <?php dynamic_sidebar('footer3');?>
          </div>
        <?php endif; ?>
        <?php if (is_active_sidebar('footer4')):?>
          <div class="footer-box">
            <?php dynamic_sidebar('footer4');?>
          </div>
        <?php endif; ?>
      </div>

      <div class="footer-info">
      <p class="for"><?php bloginfo('name')?> - &copy; <?php echo date('Y'); ?></p>
      <p class="from">Design by <a href="http\\tanita.webege.com">Anita Tapaji</a></p>
      </div>


    </footer>
    <?php wp_footer(); ?>
  </div><!--container-->
  </body>
</html>
