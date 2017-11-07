
<!--Jquery Library-->
<!--script src="{{ asset('js/jquery.js') }}"></script-->

<!--Swiper JavaScript-->

<!-- Mainly scripts -->
<script src="{{ asset('assets/theme-new/js/jquery-2.1.1.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/inspinia.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/plugins/pace/pace.min.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/plugins/staps/jquery.steps.min.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/plugins/footable/footable.all.min.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/plugins/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/plugins/flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/plugins/chartJs/Chart.min.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/plugins/peity/jquery.peity.min.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/demo/peity-demo.js') }}"></script>
<script src="{{ asset('assets/Parsley.js-2.8.0/dist/parsley.js') }}"></script>
<script src="{{ asset('assets/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/plugins/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/plugins/cropper/cropper.min.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/ajaxscript.js') }}" type="text/javascript"></script>
<script type="text/javascript">
	$('#myTable').DataTable( {
		"dom": '<"top"lf>rt<"bottom"ip><"clear">',
		language: {
			searchPlaceholder: "Admin Theme",
			"paginate": {
				"previous": '<i class="fa fa-chevron-left"></i>',
				"next": '<i class="fa fa-chevron-right"></i>'
			},
			sSearch: "Search"
		}
	} );
</script>
<script type="text/javascript">
	$('#myTable2').DataTable( {
		"dom": '<"top"lf>rt<"bottom"ip><"clear">',
		language: {
			searchPlaceholder: "Admin Theme",
			"paginate": {
				"previous": '<i class="fa fa-chevron-left"></i>',
				"next": '<i class="fa fa-chevron-right"></i>'
			},
			sSearch: "Search"
		}
	} );
</script>
<script>
$(document).ready(function(){
  $("#wizard").steps({
    enableCancelButton: false,
    enableFinishButton: false,                
  });
});
</script>
<!-- iCheck -->

<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>

<!-- Image cropper -->


<script>
    $(document).ready(function(){
        $('.file-box').each(function() {
            animationHover(this, 'pulse');
        });

        // Image upload
        var $image = $(".image-crop > img")
        $($image).cropper({
            aspectRatio: 1.618,
            preview: ".img-preview",
            done: function(data) {
                // Output the result data for cropping image.
            }
        });

        var $inputImage = $("#inputImage");
        if (window.FileReader) {
            $inputImage.change(function() {
                var fileReader = new FileReader(),
                        files = this.files,
                        file;

                if (!files.length) {
                    return;
                }

                file = files[0];

                if (/^image\/\w+$/.test(file.type)) {
                    fileReader.readAsDataURL(file);
                    fileReader.onload = function () {
                        $inputImage.val("");
                        $image.cropper("reset", true).cropper("replace", this.result);
                    };
                } else {
                    showMessage("Please choose an image file.");
                }
            });
        } else {
            $inputImage.addClass("hide");
        }        

        // Step 3 selection
        $('.btn-create_video-step-3-selection').click (function(event){
          event.preventDefault();
          $('.create_video-step3-1').hide();
          if($("input[name='rd-step3']:checked").val() == "step3-1")
            $('.create_video-step3-2').fadeIn();
          else
            $('.create_video-step3-2').fadeIn();
        });
    });
</script>