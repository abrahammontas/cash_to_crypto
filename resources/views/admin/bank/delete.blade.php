@if ($bank->ordersCount)
	<button type="button" title='Delete' class="btn btn-primary btn-xs disabled">
		<span class='fa fa-trash'></span>
	</button>
@else
	<button type="button" title='Delete' class="btn btn-primary btn-xs" data-toggle="modal" data-target="#bank-delete-{{$bank->id}}">
		<span class='fa fa-trash'></span>
	</button>
	<div id="bank-delete-{{$bank->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog">
	  	{{Form::open(['method' => 'delete', 'route' =>['admin.bank.delete', $bank->id]])}}
        <div class="panel panel-red">
            <div class="panel-heading">
                Delete bank <button class="close" data-dismiss="modal">×</button>
            </div>
            <div class="panel-body">
                Are you sure to delete <b>{{$bank->name}}</b>?
            </div>
            <div class="panel-footer">
                <button type="submit" class="btn btn-primary">Delete</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        {{Form::close()}}
	  </div>
	</div>
@endif
