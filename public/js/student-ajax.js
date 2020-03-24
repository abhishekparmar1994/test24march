var page = 1;
var current_page = 1;
var total_page = 0;
var is_ajax_fire = 0;

manageData();

/* manage data list */
function manageData() {
    $.ajax({
        dataType: 'json',
        url: url,
        data: {page:page}
    }).done(function(data){
    	total_page = data.last_page;
    	current_page = data.current_page;
        manageRow(data.data);
        is_ajax_fire = 1;
    });
}

$.ajaxSetup({
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});

/* Get Page Data*/
function getPageData() {
	$.ajax({
    	dataType: 'json',
    	url: '/student-ajax',
    	data: {page:page}
	}).done(function(data){
		manageRow(data.data);
	});
}

/* Add new student table row */
function manageRow(data) {
	var	rows = '';
	$.each( data, function( key, value ) {
	  	rows = rows + '<tr>';
        rows = rows + '<td>'+value.firstname+'</td>';
        rows = rows + '<td>'+value.lastname+'</td>';
        rows = rows + '<td>'+value.dob+'</td>';
        rows = rows + '<td>'+value.username+'</td>';
	  	rows = rows + '<td>'+value.email+'</td>';
	  	rows = rows + '<td data-id="'+value.id+'">';
        rows = rows + '<button data-toggle="modal" data-target="#edit-student" class="btn btn-primary edit-student">Edit</button> ';
        rows = rows + '<button class="btn btn-danger remove-student">Delete</button>';
        rows = rows + '</td>';
	  	rows = rows + '</tr>';
	});

	$("tbody").html(rows);
}

/* Create new Student */
$(".crud-submit").click(function(e){
    e.preventDefault();
    var form_action = $("#create-student").find("form").attr("action");
    var firstname = $("#create-student").find("input[name='firstname']").val();
    var lastname = $("#create-student").find("input[name='lastname']").val();
    var dob = $("#create-student").find("input[name='dob']").val();
    var username = $("#create-student").find("input[name='username']").val();
    var password = $("#create-student").find("input[name='password']").val();
    var email = $("#create-student").find("input[name='email']").val();
    $.ajax({
        dataType: 'json',
        type:'POST',
        url: '/student-ajax',
        data: {firstname:firstname,lastname:lastname,dob:dob,username:username,password:password,email:email}
    }).done(function(data){
        console.log(data);
        getPageData();
        $(".modal").modal('hide');
        toastr.success('Student Created Successfully.', 'Success Alert', {timeOut: 5000});
    });

});

/* Remove Student */
$("body").on("click",".remove-student",function(){
    var id = $(this).parent("td").data('id');
    var c_obj = $(this).parents("tr");
    $.ajax({
        dataType: 'json',
        type:'delete',
        url: 'student-ajax' + '/' + id,
    }).done(function(data){
        c_obj.remove();
        toastr.success('Student Deleted Successfully.', 'Success Alert', {timeOut: 5000});
        getPageData();
    });
});

/* Edit Student */
$("body").on("click",".edit-student",function(){
    var id = $(this).parent("td").data('id');
    var firstname = $(this).parent("td").prev("td").prev("td").text();
    var lastname = $(this).parent("td").prev("td").prev("td").text();
    var dob = $(this).parent("td").prev("td").prev("td").text();
    var username = $(this).parent("td").prev("td").prev("td").text();
    var password = $(this).parent("td").prev("td").prev("td").text();
    var email = $(this).parent("td").prev("td").prev("td").text();
    $("#edit-item").find("input[name='firstname']").val(firstname);
    $("#edit-item").find("input[name='lastname']").val(lastname);
    $("#edit-item").find("input[name='dob']").val(dob);
    $("#edit-item").find("input[name='username']").val(username);
    $("#edit-item").find("input[name='password']").val(password);
    $("#edit-item").find("input[name='email']").val(email);
    //edit form action
    $("#edit-item").find("form").attr("action",url + '/' + id);
});

/* Updated new student */
$(".crud-submit-edit").click(function(e){
    e.preventDefault();
    var form_action = $("#edit-student").find("form").attr("action");
    var firstname = $("#edit-student").find("input[name='firstname']").val();
    var lastname = $("#edit-student").find("input[name='lastname']").val();
    var dob = $("#edit-student").find("input[name='dob']").val();
    var username = $("#edit-student").find("input[name='username']").val();
    var password = $("#edit-student").find("input[name='password']").val();
    var email = $("#edit-student").find("input[name='email']").val();

    $.ajax({
        dataType: 'json',
        type:'PUT',
        url: form_action,
        data:{firstname:firstname,lastname:lastname,dob:dob,username:username,password:password,email:email}
    }).done(function(data){
        getPageData();
        $(".modal").modal('hide');
        toastr.success('Student Updated Successfully.', 'Success Alert', {timeOut: 5000});
    });
});