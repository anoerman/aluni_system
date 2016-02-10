
<script type="text/javascript" src="<?php echo base_url("assets/plugins/tinymce/tinymce.min.js"); ?>"></script>
<script type="text/javascript">
	tinymce.init({
	  selector: 'textarea',
	  height: 100,
	  plugins: [
	    'advlist autolink lists link charmap preview',
	    'searchreplace visualblocks code fullscreen',
	    'insertdatetime contextmenu paste code'
	  ],
	  toolbar: 'insertfile undo redo | bold italic | bullist numlist outdent indent'
	});
</script>
