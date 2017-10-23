
<!--Jquery Library-->
<script src="{{ asset('js/jquery.js') }}"></script>

<!--Swiper JavaScript-->

<!-- Mainly scripts -->
<script src="{{ asset('assets/theme-new/js/jquery-2.1.1.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/Parsley.js-2.8.0/dist/parsley.js') }}"></script>
<script src="{{ asset('assets/datatable/jquery.dataTables.min.js') }}"></script>
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