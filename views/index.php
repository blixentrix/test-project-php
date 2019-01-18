<h1>PHP Test Application</h1>

<form id="search-form" method="get" class="form-horizontal" action="search.php">
	<div class="form-group row">
	<label class="control-label" for="city">Search by city:</label>
	<input class="form-control" name="city" input="text" id="city" />
	<button class="btn btn-primary">Search</button>
	</div>
</form>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>E-mail</th>
			<th>City</th>
			<th>Phone</th>
		</tr>
	</thead>
	<tbody id="table-body">
		<?php
		foreach($users as $user){?>
		<tr>
			<td><?=$user->getName()?></td>
			<td><?=$user->getEmail()?></td>
			<td><?=$user->getCity()?></td>
			<td><?=$user->getPhone()?></td>
		</tr>
		<?php }?>
	</tbody>
</table>				

<form id="new-post-form" method="post" class="form-horizontal" action="create.php">
	<div class="form-group row">
	<label class="control-label" for="name">Name:</label>
	<input class="form-control" name="name" input="text" id="name" required />
	
	<label class="control-label" for="email">E-mail:</label>
	<input class="form-control" name="email" type="email" input="text" id="email" required/>
	
	<label class="control-label" for="city">City:</label>
	<input class="form-control" name="city" input="text" id="city" required/>

	<label class="control-label" for="phone">Phone:</label>
	<input class="form-control" name="phone" input="text" id="phone" required/>
	</div>
	
	<div class="form-group row">
		<button class="btn btn-primary">Create new row</button>
	</div>
</form>

<script type="text/javascript">
	$(document).ready(function() {
		$('#new-post-form').submit(function(e) {


		    var form = $(this);
		    var url = form.attr('action');

		    $.ajax({
		           type: "POST",
		           url: url,
		           data: form.serialize(),
		           success: function(data)
		           {
	           	       $('#new-post-form').trigger('reset');
	           	       let new_element = "<tr><td>" + data.name + "</td><td>" + data.email + "</td><td>" + data.city + "</td><td>" + data.phone + "</td></tr>"; 
		               $("tbody").append(new_element);
		           }
		         });

		    e.preventDefault();
		});

		$('#search-form').submit(function(e) {


		    var form = $(this);
		    var url = form.attr('action');

		    $.ajax({
		           type: "GET",
		           url: url,
		           data: form.serialize(),
		           success: function(data)
		           {
		           		$("tbody").empty();
		           		for (var i =  0; i < data.length; i++) {
		           	       let new_element = "<tr><td>" + data[i].name + "</td><td>" + data[i].email + "</td><td>" + data[i].city + "</td><td>" + data[i].phone + "</td></tr>"; 
			               $("tbody").append(new_element);
		           		}
		           }
		         });

		    e.preventDefault();
		});
	});
</script>