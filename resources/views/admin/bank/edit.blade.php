<button type="button" title='Edit' class="btn btn-primary btn-xs" data-toggle="modal" data-target="#bank-edit-{{$bank->id}}">
	<span class='fa fa-pencil'></span>
</button>
<div id="bank-edit-{{$bank->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
	{{Form::open(['method' => 'put', 'route' =>['admin.bank.update', $bank->id]])}}
        <div class="panel panel-yellow">
            <div class="panel-heading">
                Edit bank <button class="close" data-dismiss="modal">×</button>
            </div>
            <div class="panel-body">
            	<div class='form-group'>
                	{{Form::text('name', $bank->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
                </div>
                <div class='form-group'>
                	{{Form::text('company', $bank->company, ['class' => 'form-control', 'placeholder' => 'Company'])}}
                </div>
                <div class='form-group'>
                	{{Form::checkbox('active', 1, $bank->active)}} Enabled
                </div>
            </div>
            <div class="panel-footer">
                <button type="submit" class="btn btn-primary">Save</button>
				<button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        {{Form::close()}}
  </div>
</div>