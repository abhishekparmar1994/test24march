<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
</head>
<body>

	<div class="container">
		<div class="row">
		    <div class="col-lg-12 margin-tb">					
		        <div class="pull-left">
		            <h2>Laravel CRUD</h2>
		        </div>
		        <div class="pull-right">
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-student">
					  Create Student
				</button>
		        </div>
		    </div>
		</div>

		<table class="table table-bordered" id="tbl1">
			<thead>
			    <tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Date of Birth</th>
				<th>User Name</th>
				<th>Email</th>
				<th width="200px">Action</th>
			    </tr>
			</thead>
			<tbody>
			</tbody>
		</table>

		<ul id="pagination" class="pagination-sm"></ul>

	    <!-- Create Item Modal -->
		<div class="modal fade" id="create-student" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Create Student</h4>
		      </div>
		      <div class="modal-body">
		      		<form data-toggle="validator" action="" method="POST">
		      			<div class="form-group">
							<label class="control-label" for="firstname">First Name</label>
							<input type="text" name="firstname" class="form-control" data-error="Please enter First Name." required />
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<label class="control-label" for="lastname">Last Name</label>
							<input type="text" name="lastname" class="form-control" data-error="Please enter Last Name." required />
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<label class="control-label" for="username">User Name</label>
							<input type="text" name="username" class="form-control" data-error="Please enter User Name." required />
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<label class="control-label" for="dob">Date of Birth</label>
							<input type="text" name="dob" class="form-control" data-error="Please Select Date of Birth." required />
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<label class="control-label" for="password">Password</label>
							<input type="text" name="password" class="form-control" data-error="Please enter password." required />
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<label class="control-label" for="email">Email</label>
							<input type="text" name="email" class="form-control" data-error="Please enter Email." required />
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn crud-submit btn-success">Submit</button>
						</div>
		      		</form>
		      </div>
		    </div>
		  </div>
		</div>

		<!-- Edit Item Modal -->
		<div class="modal fade" id="edit-student" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Edit Student</h4>
		      </div>
		      <div class="modal-body">
		      		<form data-toggle="validator" action="/student-ajax" method="put">
		      			<div class="form-group">
							<label class="control-label" for="firstname">First Name</label>
							<input type="text" name="firstname" class="form-control" data-error="Please enter First Name." required />
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<label class="control-label" for="lastname">Last Name</label>
							<input type="text" name="lastname" class="form-control" data-error="Please enter Last Name." required />
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<label class="control-label" for="username">User Name</label>
							<input type="text" name="title" class="form-control" data-error="Please enter User Name." required />
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<label class="control-label" for="dob">Date of Birth</label>
							<input type="text" name="dob" class="form-control" data-error="Please Select Date of Birth." required />
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<label class="control-label" for="password">Password</label>
							<input type="text" name="password" class="form-control" data-error="Please enter password." required />
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<label class="control-label" for="email">Email</label>
							<input type="text" name="email" class="form-control" data-error="Please enter Email." required />
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success crud-submit-edit">Submit</button>
						</div>
		      		</form>

		      </div>
		    </div>
		  </div>
		</div>

	</div>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>

	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

        <script type="text/javascript">
    	   var url = "<?php echo route('student-ajax.index')?>";
        </script>
        <script src="/js/student-ajax.js"></script> 
        <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> 

<script>
	$(document).ready( function () {
	    $('#tbl1').DataTable();
	} );
</script>
       

</body>
</html>