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
                    {{Form::text('account_type', $bank->account_type, ['class' => 'form-control', 'placeholder' => 'Account'])}}
                </div>
                <div class='form-group'>
                    {{Form::text('account_number', $bank->account_number, ['class' => 'form-control', 'placeholder' => 'Account Number'])}}
                </div>
                <div class='form-group'>
                    {{Form::textarea('account_address', $bank->account_address, ['class' => 'form-control', 'size'=>'30x2' , 'placeholder' => 'Address'])}}
                </div>
                <div class='form-group'>
                    {{Form::textarea('directions_before', $bank->directions_before, ['class' => 'form-control', 'size'=>'30x5','placeholder' => 'Directions Before Bank Info'])}}
                </div>
                <div class='form-group'>
                    {{Form::textarea('directions_after', $bank->directions_after, ['class' => 'form-control', 'size'=>'30x5', 'placeholder' => 'Directions After Bank Info'])}}
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