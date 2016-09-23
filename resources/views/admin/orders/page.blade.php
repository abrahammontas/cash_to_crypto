@extends('layouts.admin')

@section('title', $type.' Orders')

@section('content')
	    <div class="container-fluid container-padding">
	        <div class="row">
	        	<div class="col-md-12">
	        		<h2 class="text-left fw-300 pull-left">{{ucwords($type).' Orders'}}</h2>
	        		@if ($type == 'completed')
	        		<div class="btn-group pull-right">
					  <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    <span id='company-switch-selected'>{{$company}}</span> <span class="caret"></span>
					  </button><br />
					  <br />
					  <a href="#" class="export">Export</a>
					  <ul class="dropdown-menu">
					  	@foreach ($companies as $c)
					     <li><a href="" class="company-switch" data-company="{{$c}}">{{$c}}</a></li>
					    @endforeach
					  </ul>
					</div>
					@endif
	        	</div>
	        </div>
	        @if ($message = session('success'))
	            <div class="alert alert-success">
	                <p>{!! $message !!}</p>
	            </div>
	        @endif

	        @if ($message = session('warning'))
	            <div class="alert alert-warning">
	                <p>{!! $message !!}</p>
	            </div>
	        @endif
	        <div class="row">
	        	<div class="col-md-12">
        			<div id="dvData" class="table-responsive">
						<table id="orders-table" class='table table-stripped table-hover'>
						<thead>
					        <tr>
					            <th>Order ID</th>
					            <th>Name</th>
					            <th>Time Created At</th>
					            <th>Images Updated At</th>
								@if ($type == 'completed')
									<th>Completed At</th>
								@endif
					            <th>Bank</th>
					            <th>Wallet Address</th>
					            <th>BTC Amount</th>
					            <th>USD</th>
					            <th data-remove="true">Photos</th>
					            <th data-remove="true">Status</th>
					        </tr>
					    </thead>
					    <tbody>
							<tr id='loader' style="display: none">
								<td colspan='11'>
									<div class="cssload-loader">
										<div class="cssload-inner cssload-one"></div>
										<div class="cssload-inner cssload-two"></div>
										<div class="cssload-inner cssload-three"></div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
	    </div>
@endsection

@section('scripts')

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="/assets/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox -->
	<script type="text/javascript" src="/assets/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

	<!-- Optionally add helpers - button, thumbnail and/or media -->
	<script type="text/javascript" src="/assets/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
	<script type="text/javascript" src="/assets/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>


	<script type="text/javascript" src="/assets/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

<script>
	$(document).ready(function () {

		$(".order-edit select[name='status']").each(function () {
			var instance = $(this);
			$(this).change(function(){
				$('textarea', instance.closest("form")).attr('required', instance.val() == 'issue');
			}).change();
		});

		var page = 1;
		var type = '{{$type}}';

		$("#loader").show();
		var loading = true;

		if (type == 'completed') {

			var company = '{{$company}}';

			$.get("{{route('admin.orders.ajax')}}", {"type": type, "company": company, "page": page}, function(html){
				$("#loader").hide();
				$("#orders-table #loader").before(html);
				loading = false;
			});

			$( ".dropdown-menu" ).on("click", ".company-switch", function(e) {
				page = 1;
				company = $(this).attr("data-company");
				e.preventDefault();
				$("#company-switch-selected").text(company);
				$("#orders-table tbody tr:not(#loader)").remove();
				$("#loader").show();
				$.get("{{route('admin.orders.ajax')}}", {"type": type, "company": company, "page": page}, function(html){
					$("#loader").hide();
					$("#orders-table #loader").before(html);
				});
			});

		 } else {
		 	page = 1;
			$.get("{{route('admin.orders.ajax')}}", {"type": type, "page": page}, function(html){
				$("#loader").hide();
				$("#orders-table #loader").before(html);
				loading = false;
			});
		}
        
        
        function exportTableToCSV($table, filename) {

			$table = $table.clone();
			$table.find("td:nth-child(10)").remove();
			$table.find("td:nth-child(11)").remove();

			var $rows = $table.find('tr:has(td,th)'),

					// Temporary delimiter characters unlikely to be typed by keyboard
					// This is to avoid accidentally splitting the actual contents
					tmpColDelim = String.fromCharCode(11), // vertical tab character
					tmpRowDelim = String.fromCharCode(0), // null character

					// actual delimiter characters for CSV format
					colDelim = '","',
					rowDelim = '"\r\n"',

					// Grab text from table into CSV formatted string
					csv = '"' + $rows.map(function (i, row) {
								var $row = $(row),
										$cols = $row.find('td,th');

								return $cols.map(function (j, col) {
									var $col = $(col),
											text = $col.text();

									return text.replace(/"/g, '""'); // escape double quotes

								}).get().join(tmpColDelim);

							}).get().join(tmpRowDelim)
									.split(tmpRowDelim).join(rowDelim)
									.split(tmpColDelim).join(colDelim) + '"',

					// Data URI
					csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);

			$(this)
					.attr({
						'download': filename,
						'href': csvData,
						'target': '_blank'
					});
		}

		// This must be a hyperlink
		$(".export").on('click', function (event) {
			// CSV
			exportTableToCSV.apply(this, [$('#dvData>table'), 'completed_orders.csv']);

			// IF CSV, don't do event.preventDefault() or return false
			// We actually need this to be a typical hyperlink
		});
        
        
		{{--var win = $(window);--}}
		{{--// Each time the user scrolls--}}
		{{--win.scroll(function() {--}}
			{{--// End of the document reached?--}}
			{{--if ($(document).height() - win.height() == win.scrollTop()) {--}}
				{{--if (loading) {--}}
					{{--return;--}}
				{{--}--}}
				{{--loading = true;--}}
				{{--$("#loader").show();--}}
				{{--$.get("{{route('admin.orders.ajax')}}", {"type": "{{$type}}", "company": company, "page": page+1}, function(html){--}}
					{{--$("#loader").hide();--}}
					{{--if (html != '') {--}}
						{{--page++;--}}
						{{--$("#orders-table #loader").before(html);--}}
					{{--}--}}
					{{--loading = false;--}}
				{{--});--}}
			{{--}--}}
		{{--});--}}

			$(".fancybox").fancybox({
				type        : 'image',
				openEffect  : 'none',
				closeEffect : 'none',
				afterShow: function(){
				    var click = 0;
				    var moveCloseButton = function(deg) {
				    	switch ( ((deg%360)+360)%360 ) {
		                    case 90:
		                        $('.fancybox-close').css('transform', 'translate(-' + $('.fancybox-wrap').width() + 'px, 0px)');
		                        $('.fancybox-title').find('span.child').css('transform', 'translate(' + ($('.fancybox-wrap').width() / 2 + $('.fancybox-title').height() / 2 + 8) + 'px, -' + ($('.fancybox-wrap').height() / 2) + 'px) rotate(-' + deg + 'deg)');
		                        break;
		                    case 180:
		                        $('.fancybox-close').css('transform', 'translate(-' + $('.fancybox-wrap').width() + 'px, ' + $('.fancybox-wrap').height() + 'px)');
		                        $('.fancybox-title').find('span.child').css('transform', 'translate(0px, -'+ ($('.fancybox-wrap').height() + $('.fancybox-title').height() + 16) +'px) rotate(-' + deg + 'deg)');
		                        break;
		                    case 270:
		                        $('.fancybox-close').css('transform', 'translate(0px, ' + $('.fancybox-wrap').height() + 'px)');
		                        $('.fancybox-title').find('span.child').css('transform', 'translate(-' + ($('.fancybox-wrap').width() / 2 + $('.fancybox-title').height() / 2 + 8) + 'px, -' + ($('.fancybox-wrap').height() / 2) + 'px) rotate(-' + deg + 'deg)');
		                        break;
		                    case 0:
		                    case 360:
		                    default:
		                        $('.fancybox-close').css('transform', 'translate(0px, 0px)');
		                        $('.fancybox-title').find('span.child').css('transform', 'translate(0px, 0px) rotate(0deg)');
		                }
				    }
				    $('.fancybox-overlay').prepend('<img id="rotate_button_right" src="/images/rotate_right.png" title="Rotate 90°">')
				        .on('click', '#rotate_button_right', function(){
				        	click = (++click % 4 === 0) ? 0 : click;
				            var n = 90 * click;
				            $('.fancybox-skin').css('webkitTransform', 'rotate(' + n + 'deg)');
				            $('.fancybox-skin').css('mozTransform', 'rotate(' + n + 'deg)');
				            moveCloseButton(n);
				        })
				    .prepend('<img id="rotate_button_left" src="/images/rotate_left.png" title="Rotate -90°">')
				        .on('click', '#rotate_button_left', function(){
				        	click = (--click % 4 === 0) ? 0 : click;
				            var n = 90 * click;
				            $('.fancybox-skin').css('webkitTransform', 'rotate(' + n + 'deg)');
				            $('.fancybox-skin').css('mozTransform', 'rotate(' + n + 'deg)');
				            moveCloseButton(n);
				        });
				}
			});
	});

</script>
@endsection
