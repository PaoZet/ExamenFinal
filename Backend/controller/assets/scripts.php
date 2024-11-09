
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="<?php echo SERVERURL; ?>app/js/sweetalert.min.js"></script>
      <script type="text/javascript" src="<?php echo SERVERURL; ?>app/js/push.min.js"></script>
      <script type="text/javascript" src="<?php echo SERVERURL; ?>app/js/masonry.min.js"></script>
      <script type="text/javascript" src="<?php echo SERVERURL; ?>app/js/materialize.min.js"></script>
	  <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript">

            $('.modal').modal({
                  startingTop: '10%',
            });
            
            $('.collapsible').collapsible();

      	function actResponsive(){
       	var $masonry = $('#mansoryDiv');
			$masonry.masonry({
			  // set itemSelector so .grid-sizer is not used in layout
			  ///itemSelector: '.row',
			  // use element for option
			  columnWidth: '.col',
			  // no transitions
			  transitionDuration: 0,
			  horizontalOrder: true,
			});
      	}

      </script>
