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
					  </button>
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
        			<div class="table-responsive">
						<table id="orders-table" class='table table-stripped table-hover'>
						<thead>
					        <tr>
					            <th>Order ID</th>
					            <th>Name</th>
					            <th>Time Created</th>
					            <th>Images Updated At</th>
					            <th>Bank</th>
					            <th>Wallet Address</th>
					            <th>BTC Amount</th>
					            <th>USD</th>
					            <th>Photos</th>
					            <th>Status</th>
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
				closeEffect : 'none'
			});
	});

</script>
@endsection
