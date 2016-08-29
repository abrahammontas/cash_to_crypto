<button type="button" class="btn btn-outline btn-primary btn-default" data-toggle="modal" data-target="#bank-create">
	<span class='fa fa-plus'> New</span>
</button>

<div id="bank-create" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
	{{Form::open(['method' => 'post', 'route' =>'admin.bank.create'])}}
        <div class="panel panel-green">
            <div class="panel-heading">
                Create bank <button class="close" data-dismiss="modal">×</button>
            </div>
            <div class="panel-body">
            	<div class='form-group'>
                	{{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
                </div>
                <div class='form-group'>
                	{{Form::text('company', '', ['class' => 'form-control', 'placeholder' => 'Company'])}}
                </div>
                <div class='form-group'>
                    {{Form::text('account_type', '', ['class' => 'form-control', 'placeholder' => 'Account'])}}
                </div>
                <div class='form-group'>
                    {{Form::text('account_number', '', ['class' => 'form-control', 'placeholder' => 'Account Number'])}}
                </div>
                <div class='form-group'>
                    {{Form::textarea('account_address', '', ['class' => 'form-control', 'size'=>'30x2' , 'placeholder' => 'Address'])}}
                </div>
                <div class='form-group'>
                    {{Form::textarea('directions_before', '', ['class' => 'form-control', 'size'=>'30x5','placeholder' => 'Directions Before Bank Info'])}}
                </div>
                <div class='form-group'>
                    {{Form::textarea('directions_after', '', ['class' => 'form-control', 'size'=>'30x5', 'placeholder' => 'Directions After Bank Info'])}}
                </div>
                <div class='form-group'>
                	{{Form::checkbox('active', 1, false)}} Enabled
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