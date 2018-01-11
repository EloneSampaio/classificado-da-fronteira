<!--enqueue stikyfill js plugin-->
<script src="<?php echo osc_current_web_theme_js_url('vendor/stickyfill.min.js') ; ?>"></script>
<script type="text/javascript">
  (function($){
      $(document).ready(function(){
        var documentWidht = $(document).width();

         if(documentWidht > 750){
            $('#profile_sidebar').Stickyfill();//initialize stickscroll
         };
      });
  })(jQuery);
</script>