$(document).ready(function(){
	//alert('qwj1b')

	$('#SubmitTherapy').click(function(event){
		event.preventDefault();
		var form = $("#userSchedule");
    	form.validate();

    	if (form.valid()) {
        var checkboxValues = [];
        var isChecked = false;

	    $('input[type="checkbox"]').each(function() {
	      if ($(this).is(':checked')) {
	      	isChecked = true;
	        checkboxValues.push($(this).val());
	      } else {
	        checkboxValues.push(0);
	      }
	    });

	    checkboxValues.shift();

	    if (!isChecked) {
	    	$("#checkboxError").html("Please check at least one checkbox therapy day")
		  	return false;
		}else{
			$("#checkboxError").html(" ")
		}


	    var visiteDate = $('#myTime').val();
	    var patientId = $('#patientId').val();
	    var selectDoctor_type = $('#selectDoctor_type').val();
	    var starttime = $('#time-inputstart').val();
	    var endttime = $('#time-inputend').val();
	    var therapyDepartment = $('#therapyDepartment').val();
	    var therapyId = $('#Selectedtherapy').val();
	    var departMentVenu = $('#departMentVenu').val();
	    var therapistdoctor = $('#SelectedtherapyDoctor').val();
	    var intern = $('#SelectedtherapyIntern').val();
	    var notes = $('#addNotes').val();
	    var medicine = $('#addMedicine').val();

	    var siteUrl = window.location.origin;
	    var url = siteUrl+'/patientschedule-assign';

	    var starttime = starttime+':00';
	    var endttime = endttime+':00';


	    if (starttime > endttime) {
          $("#endTimeError").html("End time should be greater than start time");
        	return false;
        } else {
        	$("#endTimeError").html("");
        }

        if(therapyId ==""){
        	$("#selecttherapyId").html("Therapy field is required");
        	return false;
        }

        if(departMentVenu =="" || departMentVenu  === null ){
        	$("#departMentVenuError").html("Vanue field is required");
        	return false;
        }


	    $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			url:url,
			type:"post",
			data:{visiteDate:visiteDate, patientId:patientId, doctorId:selectDoctor_type, starttime:starttime, endttime:endttime, therapyDepartment:therapyDepartment, therapyId:therapyId, departMentVenu:departMentVenu, therapistdoctor:therapistdoctor, intern:intern, checkboxValues:checkboxValues, notes:notes, medicine:medicine,is_confirm:0},
			success:function(response){

				if(response.status ==200){
					$('#addDynamic').html("");
					$('#addDynamic').html(response.view);

					Swal.fire({
			            title: "Success",
			            text: response.message,
			            icon: "success",
			        });
				}

				if(response.status ==409){
					$('#addDynamic').html("");
					$('#addDynamic').html(response.view);

					/*Swal.fire({
			            title: "Error",
			            text: response.message,
			            icon: "error",
			        });*/

					Swal.fire({
				    title: "Confirmation",
				    text: response.message,
				    icon: "warning",
				    showCancelButton: true,
				    confirmButtonColor: "#3085d6",
				    cancelButtonColor: "#d33",
				    confirmButtonText: "Yes, continue it!"
				  	}).then((result) => {

					    if (result.isConfirmed) {
			    			$.ajax({
								url:url,
								type:"post",
								data:{visiteDate:visiteDate, patientId:patientId, doctorId:selectDoctor_type, starttime:starttime, endttime:endttime, therapyDepartment:therapyDepartment, therapyId:therapyId, departMentVenu:departMentVenu, therapistdoctor:therapistdoctor, intern:intern, checkboxValues:checkboxValues, notes:notes, medicine:medicine,is_confirm:1},
								success:function(response){
									if(response.status ==200){
										$('#addDynamic').html("");
										$('#addDynamic').html(response.view);

										Swal.fire({
								            title: "Success",
								            text: response.message,
								            icon: "success",
								        });
									}
								},

								error: function(xhr, status, error) {
							        Swal.fire({
							            title: "Error",
							            text: "An error occurred.",
							            icon: "error",
							        });
							    }
							});

					    }
					});
				}
			},

			error: function(xhr, status, error) {
		        Swal.fire({
		            title: "Error",
		            text: "An error occurred.",
		            icon: "error",
		        });
		    }
		});


	    }else{

	    	return false;
	    }

    });


	$('#checkAll').click(function() {
	    $('.otherCheckbox').prop('checked', this.checked);
	});

  $('.otherCheckbox').change(function() {

    if ($('.otherCheckbox:checked').length === $('.otherCheckbox').length) {
      $('#checkAll').prop('checked', true);

    }else{
      $('#checkAll').prop('checked', false);
    }

  });


  	// Delete the therapy
 	$(document).on("click", ".deleteTherapy", function() {

 		var therapyId = $(this).data("therapy");
 		var patientId = $('#patientId').val();
		var siteUrl = window.location.origin;
		var url = siteUrl + '/delete-patient-therapy';

	  	Swal.fire({
		    title: "Confirmation",
		    text: "Are you sure want to delete this therapy?",
		    icon: "warning",
		    showCancelButton: true,
		    confirmButtonColor: "#3085d6",
		    cancelButtonColor: "#d33",
		    confirmButtonText: "Yes, delete it!"
	  	}).then((result) => {
	    if (result.isConfirmed) {

	      	$.ajaxSetup({
		        headers: {
		          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
	      	});

	      	$.ajax({
		        url: url,
		        type: "post",
		        data: { therapyId: therapyId , patientId:patientId},
		        success: function(response) {
		          if (response.status == 200) {
		            $('#addDynamic').html("");
		            $('#addDynamic').html(response.view);

		            Swal.fire({
		              title: "Success",
		              text: response.message,
		              icon: "success",
		            });
		          }
		        },
			    error: function(xhr, status, error) {
			        Swal.fire({
			            title: "Error",
			            text: "An error occurred.",
			            icon: "error",
			          });
			        }
		     });
		    }
  		});
 		
 	});


 	// Multiple therapy delete 

  	$(document).on("click", "#checkAlldelete", function() {
	    $('.alldelete').prop('checked', this.checked);
	    $('#deleteTherapyAll').removeAttr('disabled');
	});

	$('.alldelete').change(function() {

	    if ($('.alldelete:checked').length === $('.alldelete').length) {
	      $('#checkAlldelete').prop('checked', true);
	      $('#deleteTherapyAll').removeAttr('disabled');

	    }else{
	      $('#checkAlldelete').prop('checked', false);
	       $('#deleteTherapyAll').removeAttr('disabled');
	    }
    });


	$(document).on("click", "#deleteTherapyAll", function() {

		var siteUrl = window.location.origin;
		var url = siteUrl + '/delete-multiple-therapy';
		var patientId = $('#patientId').val();

		var checkboxValues = [];
        var isChecked = false;
	    $('.alldelete').each(function() {
		    if ($(this).is(':checked')) {
		    	isChecked = true;
		        checkboxValues.push($(this).val());
		    }
		});
	    if (!isChecked) {
	    	$("#checkboxError").html("Please check at least one checkbox")
	    	 $('#deleteTherapyAll').prop('disabled', true);
		  	return false;
		}else{
			$("#checkboxError").html(" ")
		}


		Swal.fire({
		    title: "Confirmation",
		    text: "Are you sure want to delete therapy?",
		    icon: "warning",
		    showCancelButton: true,
		    confirmButtonColor: "#3085d6",
		    cancelButtonColor: "#d33",
		    confirmButtonText: "Yes, delete it!"
	  	}).then((result) => {
	    if (result.isConfirmed) {

	      	$.ajaxSetup({
		        headers: {
		          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
	      	});

	      	$.ajax({
		        url: url,
		        type: "post",
		        data: { therapy_id: checkboxValues, patientId:patientId},
		        success: function(response) {
		          if (response.status == 200) {
		            $('#addDynamic').html("");
		            $('#addDynamic').html(response.view);

		            Swal.fire({
		              title: "Success",
		              text: response.message,
		              icon: "success",
		            });
		          }
		        },
			    error: function(xhr, status, error) {
			        Swal.fire({
			            title: "Error",
			            text: "An error occurred.",
			            icon: "error",
			          });
			        }
		     });
		    }
  		});
	});



//Search doctor

setTimeout(function() {

	$(document).on('keyup', '#myTherapySection input[type="text"]', function(event) {

 	var siteUrl = window.location.origin;
	var url = siteUrl + '/search-therapy';
	var therapy = $(this).val();
	var patientId = $('#patientId').val();

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  	});

  	$.ajax({
	    url: url,
	    type: "post",
	    data: { therapy: therapy, patientId: patientId },
	    success: function(data) {

		   	$('#Selectedtherapy').empty();
		   	$('#Selectedtherapy').append('<option value="">Select therapy</option>');
	        $.each(data.therapy, function(key, therapy) {
	           	$('#Selectedtherapy').append('<option value="'+ therapy.id +'" department-id="' + therapy.department_id + '" therapy-id="'+therapy.id+'">' + therapy.therapy_name + '</option>');
	            $('#Selectedtherapy').selectpicker('refresh');
	        });
	    },
	    error: function(xhr, status, error) {
	        Swal.fire({
	            title: "Error",
	            text: "An error occurred.",
	            icon: "error",
	          });
	        }
		});

 	});



  	$('#Selectedtherapy').on('change', function() {
  	$('#Selectedtherapy').selectpicker();

	    var selectedOption = $(this).find(':selected');
	    var departmentId = selectedOption.attr('department-id');
	    var therapyId = selectedOption.attr('therapy-id');
	    var name = selectedOption.text();
		var patientId = $('#patientId').val();

	 	var siteUrl = window.location.origin;
		var url = siteUrl + '/user-deparment-vanue';

		$.ajaxSetup({
	        headers: {
	          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	  	});

		$.ajax({
	    url: url,
	    type: "post",
	    data: { departmentId: departmentId, patientId: patientId },
	    success: function(data) {
	    	$('#departMentVenu').empty();
	    	$('#therapyDepartment').val(departmentId);
	    	if (Array.isArray(data.venue)){
			    $.each(data.venue, function(index, v) {
			        $('#departMentVenu').append('<option value="' + v.id + '">' + v.name + '</option>');
			    });
			} else if (typeof data.venue === 'object') {
			    $('#departMentVenu').append('<option value="' + data.venue.id + '">' + data.venue.name + '</option>');
			}

	    },
	    error: function(xhr, status, error) {
	        Swal.fire({
	            title: "Error",
	            text: "An error occurred.",
	            icon: "error",
	          });
	        }
		});

	});

  	}, 1000);

});


function deleteConfirmation(url){

        Swal.fire({
            title: 'Are you sure ?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Send the delete request
                window.location.href = url;
            }
        });
    }


function statusConfirmation(url, message){
	
        Swal.fire({
            title: 'Are you sure ?',
            text: message,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }



$("#changeAdminPwd").on('click', function(e){

	var currentPassword = $("#currentPassword").val();
	var newPassword = $("#newPassword").val();
	var new_password_confirmation = $("#new_password_confirmation").val();
	var siteUrl = window.location.origin;
	var url = siteUrl+'/admin-password-change';

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$.ajax({
		url:url,
		type:"post",
		data:{current_password:currentPassword, new_password:newPassword,new_password_confirmation:new_password_confirmation},
		success:function(response){
			if(response.status_code ==0){
				$('.current_password').text("");
				$('.new_password').text("");
				$('.new_password_confirmation').text("");
				$.each(response.error, function(prefix, val){
					$('.'+prefix).text(val);
				});
			}else{
				$('.current_password').text("");
				$('.new_password').text("");
				$('.new_password_confirmation').text("");
				$("#adminProfile")[0].reset();
				$(".passwordUpdate").text(response.message);
			}
		}

	});
});

// change Admin profile
$("#changeAdminProfile").on('click', function(e){

	var name = $("#name").val();
	var email = $("#email").val();
	var mobile = $("#mobile").val();
	var adminId = $("#adminId").val();

	var siteUrl = window.location.origin;
	var url = siteUrl+'/admin-profile-update';

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$.ajax({
		url:url,
		type:"post",
		data:{name:name, email:email,mobile:mobile,adminId:adminId},
		success:function(response){
			if(response.status_code ==0){
				$('.name').text("");
				$('.email').text("");
				$('.mobile').text("");
				$.each(response.error, function(prefix, val){
					$('.'+prefix).text(val);
				});
			}else{
				$('.name').text("");
				$('.email').text("");
				$('.mobile').text("");
				$("#adminProfile")[0].reset();
				$(".adminProUpdate").text(response.message);
			}
		}

	});
});

// Doctor profile update
$("#changeDoctorProfile").on('click', function(e){
    e.preventDefault();

    var firstname = $("#firstname").val();
    var lastname = $("#lastname").val();
    var email = $("#email").val();
    var mobile = $("#mobile").val();
    var doctorId = $("#doctorId").val();
    var profile_photo = $("#profile_photo").prop('files')[0];

    var formData = new FormData();
    formData.append('firstname', firstname);
    formData.append('lastname', lastname);
    formData.append('email', email);
    formData.append('mobile', mobile);
    formData.append('doctorId', doctorId);
    formData.append('profile_photo', profile_photo);

    var siteUrl = window.location.origin;
    var url = siteUrl+'/doctor/profile';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url:url,
        type:"post",
        data: formData,
        processData: false,
        contentType: false,
        success:function(response){
            if(response.status_code ==0){
                $('.firstname').text("");
                $('.lastname').text("");
                $('.email').text("");
                $('.mobile').text("");
                $.each(response.error, function(prefix, val){
                    $('.'+prefix).text(val);
                });
            }else{
                $(".doctorProUpdate").text(response.message);
            }
        }
    });
});



$("#changeDoctorPwd").on('click', function(e){

	var currentPassword = $("#currentPassword").val();
	var newPassword = $("#newPassword").val();
	var new_password_confirmation = $("#new_password_confirmation").val();
	var siteUrl = window.location.origin;
	var url = siteUrl+'/doctor/doctor-password-change';

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$.ajax({
		url:url,
		type:"post",
		data:{current_password:currentPassword, new_password:newPassword,new_password_confirmation:new_password_confirmation},
		success:function(response){
			if(response.status_code ==0){
				$('.current_password').text("");
				$('.new_password').text("");
				$('.new_password_confirmation').text("");
				$.each(response.error, function(prefix, val){
					$('.'+prefix).text(val);
				});
			}else{
				$('.current_password').text("");
				$('.new_password').text("");
				$('.new_password_confirmation').text("");
				$(".passwordUpdate").text(response.message);
			}
		}

	});
});


// Intern profile update

$("#changeInternProfile").on('click', function(e){

	var firstname = $("#firstname").val();
	var lastname = $("#lastname").val();
	var email = $("#email").val();
	var mobile = $("#mobile").val();
	var internId = $("#internId").val();
	var profile_photo = $("#profile_photo").prop('files')[0];

    var formData = new FormData();
    formData.append('firstname', firstname);
    formData.append('lastname', lastname);
    formData.append('email', email);
    formData.append('mobile', mobile);
    formData.append('internId', internId);
    formData.append('profile_photo', profile_photo);


	var siteUrl = window.location.origin;
	var url = siteUrl+'/intern/profile';

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$.ajax({
      url:url,
      type:"post",
      data: formData,
      processData: false,
      contentType: false,
		success:function(response){
			if(response.status_code ==0){
				$('.firstname').text("");
				$('.lastname').text("");
				$('.email').text("");
				$('.mobile').text("");
				$.each(response.error, function(prefix, val){
					$('.'+prefix).text(val);
				});
			}else{
				$(".internProUpdate").text(response.message);
			}
		}
	});
});


$("#changeInternPwd").on('click', function(e){
	var currentPassword = $("#currentPassword").val();
	var newPassword = $("#newPassword").val();
	var new_password_confirmation = $("#new_password_confirmation").val();
	var siteUrl = window.location.origin;
	var url = siteUrl+'/intern/intern-password-change';

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$.ajax({
		url:url,
		type:"post",
		data:{current_password:currentPassword, new_password:newPassword,new_password_confirmation:new_password_confirmation},
		success:function(response){
			if(response.status_code ==0){
				$('.current_password').text("");
				$('.new_password').text("");
				$('.new_password_confirmation').text("");
				$.each(response.error, function(prefix, val){
					$('.'+prefix).text(val);
				});
			}else{
				$('.current_password').text("");
				$('.new_password').text("");
				$('.new_password_confirmation').text("");
				$(".passwordUpdate").text(response.message);
			}
		}

	});
});


$("#RemoveProfileinternImage").on('click', function(e){
	var internId = $("#internId").val();
	var siteUrl = window.location.origin;
	var url = siteUrl+'/intern/profile-image-delete';

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$.ajax({
		url:url,
		type:"post",
		data:{internId:internId},
		success:function(response){
			if(response.status_code ==0){
				$(".internProUpdate").text(response.message);
			}else{
				$(".internProUpdate").text(response.message);
			}
		}

	});
});


$("#RemoveProfiledoctorImage").on('click', function(e){
	var doctorId = $("#doctorId").val();
	var siteUrl = window.location.origin;
	var url = siteUrl+'/doctor/profile-image-delete';

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$.ajax({
		url:url,
		type:"post",
		data:{doctorId:doctorId},
		success:function(response){
			if(response.status_code ==0){
				$(".doctorProUpdate").text(response.message);
			}else{
				$(".doctorProUpdate").text(response.message);
			}
		}

	});
});



// select department 
$("#therapyDepartment").change(function() {
	var selectedValue = $(this).val();
	var userId = $("#patientId").val();

	$("#checkboxContainer").html("");

	var siteUrl = window.location.origin;
	var url = siteUrl+'/getTharapistWithdepartment';

  	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

  	$.ajax({
	  url: url,
	  type: "post",
	  data: { id: selectedValue, userId: userId },
	  success: function (response) {
	    if (response.status_code === 200) {
	      var data = response.data;
	      var list = $('<ul>');
	      $.each(data, function (index, item) {
	        var listItem = $('<li data=' + item.id + '>').text(item.therapy_name);
	        list.append(listItem);
	      });
	      $('#result').html(list);

	      var dates = response.userVisits;
	      var therapies = response.data;
	      var container = $('#checkboxContainer');

	      for (var i = 0; i < dates.length; i++) {
	        var date = dates[i];

	        var dateGroup = $('<div>').addClass('date-group');
	        var header = $('<h4>').text();
	        dateGroup.append(header);

	        for (var j = 0; j < therapies.length; j++) {
	          var therapy = therapies[j];
	          var checkboxId = date.date + '-' + j;

	         var checkbox = $('<input>').attr({
			  type: 'checkbox',
			  name: date.id+'[]',
			  value: therapy.id
			});

	          var label = $('<label>').attr('for', checkboxId).text();
	          dateGroup.append($('<div>').append(checkbox, label));
	        }

	        container.append(dateGroup);
	      }
	    }
	  }
	});

});


$(document).ready(function(){

$('.yogaTharapy').show();
$('.userDietsBreakfast').show();

  // Tharapy tables
  $('#therapyDepartment').on('change', function() {
    var selectedOption = $(this).val();
    
    // Hide all tables tharapy
    $('.tabletherapy').hide();
    if (selectedOption !== '') {
      $('#table' + selectedOption).show();
    }
  });

  // User diet table
  $('#userDiets').on('change', function() {
    var selectedOption = $(this).val();
    $('.userDietsTables').hide();
    if (selectedOption !== '') {
      $('#tablediet' + selectedOption).show();
    }
  });

flatpickr('.timeStartend', {
  enableTime: true,
  noCalendar: true,
  time_24hr: true,
  dateFormat: 'H:i:S',
});

});



$(document).on("click", ".patientDepartmentStatus", function() {

	var currentModal = $(this).closest(".modal");
	var userId = $(this).closest(".modal").find(".userId").val();
	var departmentStatus = $(this).closest(".modal").find("#departmentStatus").val();
	var siteUrl = window.location.origin;
	var url = siteUrl+'/patientdepartmentupdateapprove';

	 $(this).find(".departmentStatusMsg").html('');
	  	$(".modal").on("show.bs.modal", function() {
        $(".departmentStatusMsg").html("");
    });

	var modeId = "verticalycentered_"+userId;

  	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

  	$.ajax({
	   	url: url,
	  	type: "post",
	  	data: { userId: userId, departmentStatus:departmentStatus},
		success: function (response) {

			if(response.status_code ==0){
				$(".departmentStatusMsg").html(response.message);
				$("#modeId").css('display','none');

				setTimeout(function() {
				   	$(".modal").css('display','none');
					$(".modal-backdrop").css('display','none');
					location.reload(true);
				}, 2000);

			}else{
				$(".departmentStatusMsg").html(response.message);
				setTimeout(function() {
				   	$(".modal").css('display','none');
					$(".modal-backdrop").css('display','none');
					location.reload(true);
				}, 2000);
			}
		  	
		}
	})
});

// weekly therapy 

$("#therapyDepartmentweekly").change(function() {

	var selectedDepartment = $(this).val();
	
	var siteUrl = window.location.origin;
	var url = siteUrl+'/therapyasDepartment';

  	$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

  	$.ajax({
	   url: url,
	  type: "post",
	  data: { selectedDepartment: selectedDepartment},

		  success: function (data) {
		  	//$('#addDynamic').html(response);

		  	$('#Selectedtherapyweekly').empty();
	        $.each(data.selectedDepartment, function(key, therapy) {
	            $('#Selectedtherapyweekly').append('<option value="' + therapy.id + '">' + therapy.therapy_name + '</option>');
	            $('#Selectedtherapyweekly').selectpicker('refresh');
	        });

        }
	});
});



// department therapy
$("#therapyDepartment").change(function() {

	var selectedDepartment = $(this).val();
	//alert(selectedDepartment);

	var $dietTherapy = $("#dietTherapy");
    if(selectedDepartment == 7) {
        $dietTherapy.show();
      }else{
        $dietTherapy.hide();
     }

	var siteUrl = window.location.origin;
	var url = siteUrl+'/therapyasDepartment';

  	$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

  	$.ajax({
	   url: url,
	  type: "post",
	  data: { selectedDepartment: selectedDepartment},

	  success: function (data) {
	  	//$('#addDynamic').html(response);

	  	$('#Selectedtherapy').empty();
        $.each(data.selectedDepartment, function(key, therapy) {
            $('#Selectedtherapy').append('<option value="' + therapy.id + '">' + therapy.therapy_name + '</option>');
            $('#Selectedtherapy').selectpicker('refresh');
        });

        $('#departMentVenu').empty();
        $.each(data.venue, function(key, venue) {
            $('#departMentVenu').append('<option value="' + venue.id + '">' + venue.name + '</option>');
        });


        $('#SelectedtherapyDoctor').empty();
        $.each(data.doctor, function(key, doctor) {
            $('#SelectedtherapyDoctor').append('<option value="' + doctor.user_id + '">' + doctor.firstname + '</option>');
            $('#SelectedtherapyDoctor').selectpicker('refresh');
        });

        $('#SelectedtherapyIntern').empty();
        $.each(data.intern, function(key, intern) {
            $('#SelectedtherapyIntern').append('<option value="' + intern.user_id + '">' + intern.firstname + '</option>');
            $('#SelectedtherapyIntern').selectpicker('refresh');
        });

	  }
	})

});



$("#therapyDepartmentGroup").change(function() {

    var dietgroup = $("#therapyDepartmentGroup").val();
    var selectedDepartment = $("#therapyDepartment").val();

    var siteUrl = window.location.origin;
	var url = siteUrl+'/therapyasDepartmentwithGroup';

  	$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

  	$.ajax({
	   url: url,
	  type: "post",
	  data: { selectedDepartment: selectedDepartment, dietgroup: dietgroup},

	  success: function (data) {

	  	$('#Selectedtherapy').empty();
        $.each(data.selectedDepartment, function(key, therapy) {
            $('#Selectedtherapy').append('<option value="' + therapy.id + '">' + therapy.therapy_name + '</option>');
        });

        $('#departMentVenu').empty();
        $.each(data.venue, function(key, venue) {
            $('#departMentVenu').append('<option value="' + venue.id + '">' + venue.name + '</option>');
        });

        $('#SelectedtherapyDoctor').empty();
        $.each(data.doctor, function(key, doctor) {
            $('#SelectedtherapyDoctor').append('<option value="' + doctor.user_id + '">' + doctor.firstname + '</option>');
        });

        $('#SelectedtherapyIntern').empty();
        $.each(data.intern, function(key, intern) {
            $('#SelectedtherapyIntern').append('<option value="' + intern.user_id + '">' + intern.firstname + '</option>');
        });

	  }
	})

});

$(document).on("click", "#PrecautionMedicine", function() {
	var x = $("#medicineField");
    if (x.css("display") === "none"){
      x.css("display", "block");
    } else {
      x.css("display", "none");
    }
});



$(".statusPatient").change(function() {
	var selectedOption = $(this).val();
	var selectedUserId = $(this).data('userid');

	var siteUrl = window.location.origin;
	var url = siteUrl+'/patient-status-change';

  	Swal.fire({
	    title: "Are you sure ?",
	    text: "Patient status will change",
	    icon: "warning",
	    showCancelButton: true,
	    confirmButtonColor: "#3085d6",
	    cancelButtonColor: "#d33",
	    confirmButtonText: "Yes"
  	}).then((result) => {
    if (result.isConfirmed){
    	
      	$.ajaxSetup({
	        headers: {
	          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
      	});

      	$.ajax({
	        url: url,
	        type: "post",
	        data: { selectedUserId: selectedUserId , selectedOption:selectedOption},
	        success: function(response) {
	          if (response.status === 200) {
	            location.reload();
	          }

	          if (response.status === 403) {
	            Swal.fire({
                    title: 'Warning',
                    text: response.message,
                    icon: 'error',
                }).then((result) => {
    				if (result.isConfirmed){
    					location.reload();
    				}
    			});
	          }

	        },
		    error: function(xhr, status, error) {
		        Swal.fire({
		            title: "Error",
		            text: "An error occurred.",
		            icon: "error",
		          });
		        }
	     });
	    }
	});
});

// section status change
$(".sectionStatus").change(function() {

	var sectionStatus = $(this).val();
	var selectedUserId = $(this).data('userid');
	var doctorId = $("#loginDoctor").data('logindoctor');

	var siteUrl = window.location.origin;
	var url = siteUrl+'/patientsection-status';

  	Swal.fire({
	    title: "Are you sure ?",
	    text: "Patient section status will change",
	    icon: "warning",
	    showCancelButton: true,
	    confirmButtonColor: "#3085d6",
	    cancelButtonColor: "#d33",
	    confirmButtonText: "Yes"
  	}).then((result) => {
    if (result.isConfirmed){
    	
      	$.ajaxSetup({
	        headers: {
	          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
      	});

      	$.ajax({
	        url: url,
	        type: "post",
	        data: { selectedUserId:selectedUserId, sectionStatus:sectionStatus, doctorId:doctorId},
	        success: function(response) {
	          if (response.status_code === 200) {
	            location.reload();
	          }
	          if (response.status_code === 403) {
	            Swal.fire({
		            title: "Error",
		            text: response.message,
		            icon: "error",
		          });
	          }

	        },
		    error: function(xhr, status, error) {
		        Swal.fire({
		            title: "Error",
		            text: "An error occurred.",
		            icon: "error",
		          });
		        }
	     });
	    }
	});

});


$("#deleteSelected").on('click', function(e){

	 $(".toggleCheckbox").each(function() {
        $(this).prop("checked", !$(this).prop("checked"));
      });

      return false;

	var patientId = [];
	$(':checkbox:checked').each(function(key){
		var id = $(this).val();
		patientId[key] = id;
	});

	console.log(patientId);

});



$('.patientFilter').change(function() {
   $('#searchButton').trigger('click');
});


$('.patientSearchfilter').keyup(function() {
	setTimeout(function() {
      $('#searchButton').trigger('click');
    }, 1000);
});

$('#doctorSection').change(function() {
   $('#searchDoctor').trigger('click');
});

$('#table_size').change(function() {
   $('#searchDoctor').trigger('click');
});

$('#internSection').change(function() {
   $('#searchIntern').trigger('click');
});

$('#table_size').change(function() {
   $('#searchIntern').trigger('click');
});


$('#table_size').change(function() {
   $('#showAllTherapy').trigger('click');
});

$('#therapy-date').on('change', function() {
     $('#showAllTherapy').trigger('click');
});
