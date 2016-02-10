
<script type="text/javascript">
	jQuery(document).ready(function($) {
		//Place this plugin snippet into another file in your application
		(function ($) {
		    $.toggleShowPassword = function (options) {
		        var settings = $.extend({
		            field: "#password",
		            control: "#show_password",
		        }, options);

		        var control = $(settings.control);
		        var field = $(settings.field)

		        control.bind('click', function () {
		            if (control.is(':checked')) {
		                field.attr('type', 'text');
		            } else {
		                field.attr('type', 'password');
		            }
		        })
		    };
		}(jQuery));

		//Here how to call above plugin from everywhere in your application document body
		$.toggleShowPassword({
		    field: '#password',
		    control: '#show_password'
		});
	});
</script>
