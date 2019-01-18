<h1>PHP Test Application</h1>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>E-mail</th>
			<th>City</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach($users as $user){?>
		<tr>
			<td><?=$user->getName()?></td>
			<td><?=$user->getEmail()?></td>
			<td><?=$user->getCity()?></td>
		</tr>
		<?php }?>
	</tbody>
</table>				

<form method="post" class="form-horizontal" action="create.php">
	<div class="form-group row">
	<label class="control-label" for="name">Name:</label>
	<input class="form-control" name="name" input="text" id="name" required />
	
	<label class="control-label" for="email">E-mail:</label>
	<input class="form-control" name="email" type="email" input="text" id="email" required/>
	
	<label class="control-label" for="city">City:</label>
	<input class="form-control" name="city" input="text" id="city" required/>
	</div>
	
	<div class="form-group row">
		<button class="btn btn-primary">Create new row</button>
	</div>
</form>