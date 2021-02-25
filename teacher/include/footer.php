
<?php if(!empty($msg)){ ?>
<div id="snackbar"><?php echo $msg ?>..</div> 

<script type="text/javascript">
	
	function showtoast() {
	  // Get the snackbar DIV
	  var x = document.getElementById("snackbar");

	  // Add the "show" class to DIV
	  x.className = "show";

	  // After 3 seconds, remove the show class from DIV
	  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
	}
</script>
<?php }else{ ?>
	<script type="text/javascript">
	
	function showtoast() {
	  // Get the Show
	}
</script>
<?php } ?>



<script src="newadmin/jquery.min.js"></script>
<script src="javascripts/main.js" type="text/javascript"></script>
<script src="javascripts/bootstrap.min.js" type="text/javascript"></script>
<script src="javascripts/raphael.min.js" type="text/javascript"></script>
<script src="javascripts/selectivizr-min.js" type="text/javascript"></script>
<script src="javascripts/jquery.mousewheel.js" type="text/javascript"></script>
<script src="javascripts/jquery.vmap.min.js" type="text/javascript"></script>
<script src="javascripts/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="javascripts/jquery.vmap.world.js" type="text/javascript"></script>
<script src="javascripts/jquery.bootstrap.wizard.js" type="text/javascript"></script>
<script src="javascripts/fullcalendar.min.js" type="text/javascript"></script>
<script src="javascripts/gcal.js" type="text/javascript"></script>
<script src="javascripts/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="javascripts/datatable-editable.js" type="text/javascript"></script>
<script src="javascripts/jquery.easy-pie-chart.js" type="text/javascript"></script>
<script src="javascripts/excanvas.min.js" type="text/javascript"></script>
<script src="javascripts/jquery.isotope.min.js" type="text/javascript"></script>
<script src="javascripts/isotope_extras.js" type="text/javascript"></script>
<script src="javascripts/modernizr.custom.js" type="text/javascript"></script>
<script src="javascripts/jquery.fancybox.pack.js" type="text/javascript"></script>
<script src="javascripts/select2.js" type="text/javascript"></script>
<script src="javascripts/styleswitcher.js" type="text/javascript"></script>
<script src="javascripts/wysiwyg.js" type="text/javascript"></script>
<script src="javascripts/typeahead.js" type="text/javascript"></script>
<script src="javascripts/summernote.min.js" type="text/javascript"></script>
<script src="javascripts/jquery.inputmask.min.js" type="text/javascript"></script>
<script src="javascripts/jquery.validate.js" type="text/javascript"></script>
<script src="javascripts/bootstrap-fileupload.js" type="text/javascript"></script>
<script src="javascripts/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="javascripts/bootstrap-timepicker.js" type="text/javascript"></script>
<script src="javascripts/bootstrap-colorpicker.js" type="text/javascript"></script>
<script src="javascripts/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="javascripts/typeahead.js" type="text/javascript"></script>
<script src="javascripts/spin.min.js" type="text/javascript"></script>
<script src="javascripts/ladda.min.js" type="text/javascript"></script>
<script src="javascripts/moment.js" type="text/javascript"></script>
<script src="javascripts/mockjax.js" type="text/javascript"></script>
<script src="javascripts/bootstrap-editable.min.js" type="text/javascript"></script>
<script src="javascripts/xeditable-demo-mock.js" type="text/javascript"></script>
<script src="javascripts/xeditable-demo.js" type="text/javascript"></script>
<script src="javascripts/address.js" type="text/javascript"></script>
<script src="javascripts/daterange-picker.js" type="text/javascript"></script>
<script src="javascripts/date.js" type="text/javascript"></script>
<script src="javascripts/morris.min.js" type="text/javascript"></script>
<script src="javascripts/skycons.js" type="text/javascript"></script>
<script src="javascripts/fitvids.js" type="text/javascript"></script>
<script src="javascripts/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="javascripts/dropzone.js" type="text/javascript"></script>
<script src="javascripts/jquery.nestable.js" type="text/javascript"></script>
<script src="javascripts/respond.js" type="text/javascript"></script>
<script src="../js/stars.js" type="text/javascript"></script>



<!-- <script src="newadmin/fa.min.js" type="text/javascript"></script> -->



<script src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
	
	CKEDITOR.editorConfig = function( config ) {
		
	};

</script>



<script>
        CKEDITOR.replace( 'editor1' );
        CKEDITOR.replace( 'editor2' );
        CKEDITOR.replace( 'editor3' );
		 CKEDITOR.replace( 'editor4' );
</script>




<script>
function hideweb() {
   var element = document.getElementById("weblist");
   element.classList.toggle("hide");
}
</script>

<script>
function hidepro() {
   var element = document.getElementById("prolist");
   element.classList.toggle("hide");
}
</script>



<script type="text/javascript" src="newadmin/menu.js"></script>


<script type="text/javascript">
	
$(document).ready(function() {
// Using keyword "jQuery" as opposed to "$" for WP reasons
$.fn.addShadowToParent = function() {
    this.parents('ul').css("display","block");
};


$('.active').addShadowToParent();
});


</script>