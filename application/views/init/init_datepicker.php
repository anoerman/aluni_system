
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/plugins/datepicker/css/bootstrap-datepicker.min.css"); ?>">
<script type="text/javascript" src="<?php echo base_url("assets/plugins/datepicker/js/bootstrap-datepicker.min.js"); ?>"></script>
<script type="text/javascript">
	$('.datepicker').datepicker({
	    format: "yyyy/mm/dd",
	    weekStart: 1,
	    todayBtn: "linked",
	    daysOfWeekHighlighted: "0,6",
	    orientation: "bottom right",
	    autoclose: true,
	    todayHighlight: true,
	    toggleActive: true
	});
</script>
