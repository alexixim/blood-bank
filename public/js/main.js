$(function(){

	var showLoader = function(){
		$('#loader').show();
	};

	var hideLoader = function(){
		$('#loader').hide();
	}


	$("#notifi-dd").on('show.bs.dropdown', function () {

		// show loader
		$('.notifications.dropdown-menu').html("<li><a href=\"#\">Loading...</a></li>");

	  	$.ajax({
			url: '/bloodbank/public/notification',
			success: function(res){
				$('.notifications.dropdown-menu').html(res);
			}
		})
	})

	// get count
	var getNotifications = function(){

		$.ajax({
			url: '/bloodbank/public/notification/count',
			dataType: 'json',
			success: function(res){
				if(res.status == true){
					$("#notifi-dd .badge").text(res.count);
				}
			},
			error: function(){
				alert('Error!');
			}
		})


	}();

	setInterval(getNotifications, 30000);

	//Mobile Donation Javascripts
	$("#createDonation form[name='create-donation']").on('submit', function(e){
		e.preventDefault();

		var $form = $("form[name='create-donation']");
		var formdata = $form.serialize();

		showLoader();

		$.ajax({
			url: $form.attr('action'),
			method: 'POST',
			data: formdata,
			success: function(res){

				if(res.success == false){
					
					hideLoader();

					var $alerts = $("#createDonation .alert-danger");
					$alerts.removeClass('hidden').html(''); //html 0 karala balann

					$.each(res.messages, function(){
						var errmsg = this[0];
						var $ptag = $('<p />').text(errmsg);
						$alerts.append($ptag);
					});

					return;
				}

				//else if daanna liyanna

				// if successful
				$("#createDonation .alert-danger").hide();
				$("#createDonation .alert-success")
					.removeClass('hidden')
					.append($('<p />').text('Successfully created donation!'));


				/*var $donorslist = $('select[name="donor_id"]');
				$('option', $donorslist).remove();

				$.each(res.donors, function(key, donorname){
					var $option = $('<option />', {value: key}).text(donorname);
					$donorslist.append($option);
				});*/

				// select newly created donor
				//$donorslist.val(res.donor_id).change();

				setTimeout(function(){
					hideLoader();
					$('#createDonation').modal('hide');
					$("form[name='mobiles'] select[name='mobile_id']").trigger('change');
				}, 2000);
			}
		});
	});

	$("#create-donation-btn").click(function(){
		$("#createDonation form[name='create-donation']").submit();	
	});





	////////////////////////////////////////////////////////////////////////////////////////

	$("form[name='locations']").on('change', 'location_type_id', function(){

		var $pid = $('.form-group.pid');
		var $validTill = $('.form-group.valid-till');
		var $orgDetails = $('.form-group.org-details');

		if(location_type_id == 0 || location_type_id == 1){
			$pid.addClass('hidden');
			$validTill.addClass('hidden');
			$orgDetails.addClass('hidden');
			return;
		}

		if(location_type_id == 2){
			$pid.removeClass('hidden');
			return;
		}

		if(location_type_id == 3){
			$pid.removeClass('hidden');
			$validTill.removeClass('hidden');
			$orgDetails.removeClass('hidden');
			return;
		}

		
	}).trigger('change');

	//////////////////////////////////////////////////////////////////////////////////////////

	

});
