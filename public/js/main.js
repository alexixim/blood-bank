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

	$("#createDonor form[name='create-donor']").on('submit', function(e){
		e.preventDefault();

		var $form = $("form[name='create-donor']");
		var formdata = $form.serialize();

		showLoader();

		$.ajax({
			url: $form.attr('action'),
			method: 'POST',
			data: formdata,
			success: function(res){

				if(res.success == false){
					
					hideLoader();

					var $alerts = $("#createDonor .alert-danger");
					$alerts.removeClass('hidden').html('');

					$.each(res.messages, function(){
						var errmsg = this[0];
						var $ptag = $('<p />').text(errmsg);
						$alerts.append($ptag);
					});

					return;
				}

				// if successful
				$("#createDonor .alert-danger").hide();
				$("#createDonor .alert-success")
					.removeClass('hidden')
					.append($('<p />').text('Successfully created donor!'));

				var $donorslist = $('select[name="donor_id"]');
				$('option', $donorslist).remove();

				$.each(res.donors, function(key, donorname){
					var $option = $('<option />', {value: key}).text(donorname);
					$donorslist.append($option);
				});

				// select newly created donor
				$donorslist.val(res.donor_id).change();

				setTimeout(function(){
					hideLoader();
					$('#createDonor').modal('hide');
				}, 2000);
			}
		});
	});

	$("#create-donor-btn").click(function(){
		$("#createDonor form[name='create-donor']").submit();	
	});

	$("form[name='send-alerts'] select[name='blood_group_id']").on('change', function(){

		var blood_group_id = $(this).val();
		var $donorsListCont = $('.form-group.donors-list');

		if(blood_group_id == 0){
			$donorsListCont.addClass('hidden');
			return;
		}

		// if blood group is selected
		
		showLoader();

		$.ajax({
			url: '/bloodbank/public/donor/get-eligible-donors/' + blood_group_id,
			success: function(res){
			
				hideLoader();
				

				$donorsListCont.removeClass('hidden');
				if(res.donors !== undefined){
					var $donorListTable = $('table tbody', $donorsListCont);
					$('tr', $donorListTable).remove();

					if(res.donors.length == 0){
						$donorListTable.append('<tr><td colspan="3">No matching donors available.</td></tr>');
						return	
					}

					$.each(res.donors, function(key, donor){
						var $tr = $('<tr />');

						var $checkbox = $('<input />', {
							name: 'donors[]', 
							value: donor.id, 
							type: 'checkbox', 
							checked: true
						});

						var $th1 = $('<td />').append($checkbox);
						var $th2 = $('<td />').text(donor.name);
						var $th3 = $('<td />').text(donor.last_blood_donated_date_ago);


						$tr.append($th1, $th2, $th3);

						$donorListTable.append($tr);
						// $('#detail').append($tr);
					});
				}
			}
		})
	}).trigger('change');

	

});
