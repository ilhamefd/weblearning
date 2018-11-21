var App = function() {
	var ajaxParams = {};

	// IE mode
	var isRTL = false,
		isIE8 = false,
		isIE9 = false,
		isIE10 = false;

	var resizeHandlers = [],
		assetsPath = '<?php echo base_url(); ?>assets/',
		loadingGif = 'img/spinners/';

	// initializes main settings
	var handleInit = function() {
		if ($('body').css('direction') === 'rtl') {
			isRTL = true;
		}

		isIE8 = !!navigator.userAgent.match(/MSIE 8.0/);
		isIE9 = !!navigator.userAgent.match(/MSIE 9.0/);
		isIE10 = !!navigator.userAgent.match(/MSIE 10.0/);

		if (isIE10) {
			$('html').addClass('ie10'); // detect IE10 version
		}

		if (isIE10 || isIE9 || isIE8) {
			$('html').addClass('ie'); // detect IE10 version
		}
	};

	// runs callback functions set by App.addResponsiveHandler().
	var _runResizeHandlers = function() {
		// reinitialize other subscribed elements
		for (var i = 0; i < resizeHandlers.length; i++) {
			var each = resizeHandlers[i];
			each.call();
		}
	};

	// handle the layout reinitialization on window resize
	var handleOnResize = function() {
		var resize;
		if (isIE8) {
			var currheight;
			$(window).resize(function() {
				if (currheight == document.documentElement.clientHeight) {
					return; //quite event since only body resized not window.
				}
				if (resize) {
					clearTimeout(resize);
				}
				resize = setTimeout(function() {
					_runResizeHandlers();
				}, 50); // wait 50ms until window resize finishes.
				currheight = document.documentElement.clientHeight; // store last body client height
			});
		} else {
			$(window).resize(function() {
				if (resize) {
					clearTimeout(resize);
				}
				resize = setTimeout(function() {
					_runResizeHandlers();
				}, 50); // wait 50ms until window resize finishes.
			});
		}
	};

	// Fix input placeholder issue for IE8 and IE9
	var handleFixInputPlaceholderForIE = function() {
		//fix html5 placeholder attribute for ie7 & ie8
		if (isIE8 || isIE9) { // ie8 & ie9
			// this is html5 placeholder fix for inputs, inputs with placeholder-no-fix class will be skipped(e.g: we need this for password fields)
			$('input[placeholder]:not(.placeholder-no-fix), textarea[placeholder]:not(.placeholder-no-fix)').each(function() {
				var input = $(this);

				if (input.val() === '' && input.attr("placeholder") !== '') {
					input.addClass("placeholder").val(input.attr('placeholder'));
				}

				input.focus(function() {
					if (input.val() == input.attr('placeholder')) {
						input.val('');
					}
				});

				input.blur(function() {
					if (input.val() === '' || input.val() == input.attr('placeholder')) {
						input.val(input.attr('placeholder'));
					}
				});
			});
		}
	};

	// Custom Datatable
	var custom_dt = function(url, header, order, sort, ele) {
		reset_ajaxParams();
		
		var data_ID = (ele != null) ? $(ele) : $('#datatable_ajax');

		if(data_ID.length) {
			if(data_ID.length) {
				// DataTable
				var table = data_ID.DataTable({
					"serverSide"		: true,
					"aLengthMenu"		: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
					"iDisplayLength"	: 10,
					"ajax" 				: {
											url 		: url,
											type 		: 'POST',
											dataSrc		: 'data',
											data 		: function(data){
															$.each(ajaxParams, function(key, value) {
																data[key] = value;
															});
														  },
										  },
					"columns"			: header,
					"order" 			: order,
					"columnDefs"		: [
											{ "orderable": false, "targets": sort }
										  ],
					"searching" 		: false,
				});
			}

			$('.filter-submit').on('click', function(e) {
				e.preventDefault();
				App.setAjaxParam('action', 'filter');
				App.submitFilter(table);
			});

			$('.filter-reset').on('click', function(){
				$('.form-filter').val('');
				reset_ajaxParams();
				select_style('');
				App.setAjaxParam('action', '');
				table.ajax.reload();
			});

			$('.select-filter').on('change', function(e){
				e.preventDefault();
				App.setAjaxParam('action', 'filter');
				App.submitFilter(table);
			});
		}
	};
	
	var reset_ajaxParams = function() {
		ajaxParams = {};
	};

	// Add style
	var input_style = function() {
		// Checkbox
		var checkbox = $('[input-style-checkbox]');

		checkbox.each(function(){
			$(this).iCheck({
				checkboxClass: 'icheckbox_md',
				radioClass: 'iradio_md',
				increaseArea: '20%'
			});
		});

	};

	var switc_style = function() {
		var $elem = $('[data-switchery]');
		if($elem.length) {
			$elem.each(function() {
				if(!$(this).siblings('.switchery').length) {
					var $this = this,
						this_size = $($this).attr('data-switchery-size'),
						this_color = $($this).attr('data-switchery-color'),
						this_secondary_color = $($this).attr('data-switchery-secondary-color');

					var switchery = new Switchery($this, {
						color: (typeof this_color !== 'undefined') ? hex2rgba(this_color,50) : hex2rgba('#009688',50),
						jackColor: (typeof this_color !== 'undefined') ? hex2rgba(this_color,100) : hex2rgba('#009688',100),
						secondaryColor: (typeof this_secondary_color !== 'undefined') ? hex2rgba(this_secondary_color,50) : 'rgba(0, 0, 0,0.26)',
						jackSecondaryColor: (typeof this_secondary_color !== 'undefined') ? hex2rgba(this_secondary_color,50) : '#fafafa',
						className: 'switchery' + ( (typeof this_size !== 'undefined') ? ' switchery-'+ this_size : '' )
					});

					$(this).data('ObjSwitchery', switchery);

				}
			})
		}
	}

	var select_style = function(val) {
		var select = $('[select-style]');

		select.each(function(){
			var thisPosBottom = $(this).attr('select-style-bottom');

			var selectize = $(this)
				.after('<div class="selectize_fix"></div>')
				.selectize({
					allowEmptyOption: false,
					hideSelected: true,
					dropdownParent: 'body',
					onDropdownOpen: function($dropdown) {
						$dropdown
							.hide()
							.velocity('slideDown', {
								begin: function() {
									if (typeof thisPosBottom !== 'undefined') {
										$dropdown.css({'margin-top':'0'})
									}
								},
								duration: 200,
								easing: easing_swiftOut
							})
					},
					onDropdownClose: function($dropdown) {
						$dropdown
							.show()
							.velocity('slideUp', {
								complete: function() {
									if (typeof thisPosBottom !== 'undefined') {
										$dropdown.css({'margin-top': ''})
									}
								},
								duration: 200,
								easing: easing_swiftOut
							});
					}
				});

			var dataSelect = selectize[0].selectize;

			if(val != null) {
				dataSelect.setValue(val);
			}
		});
	};

	return {
		init: function() {
			//Core handlers
			handleInit(); // initialize core variables
			handleOnResize(); // set and handle responsive
			// custom_dt(); // set datatable
			input_style();
			select_style();
			switc_style();

			// Hacks
			handleFixInputPlaceholderForIE(); //IE8 & IE9 input placeholder issue fix
		},

		//main function to initiate core javascript after ajax complete
		initAjax: function() {
			input_style();
			select_style();
			switc_style();
			altair_md.card_panel();
			// altair_md.card_panel();
			// custom_dt(); // set datatable
		},

		//init main components
		initComponents: function() {
			this.initAjax();
		},

		runResizeHandlers: function() {
			_runResizeHandlers();
		},

		scrollTo: function(el, offeset) {
			var pos = (el && el.size() > 0) ? el.offset().top : 0;
			
			$('html,body').animate({
				scrollTop: pos
			}, 'slow');
		},

		scrollTop: function() {
			App.scrollTo();
		},

		pageLoading: function(options) {
			options = $.extend(true, {}, options);

			if(options.target) {
				let el = $(options.target),
					wi = el.outerWidth(),
					hi = el.outerHeight();

				let imgLoading = assetsPath+loadingGif+'reload.svg',
					divLoading = "<div style='position: fixed; width: "+wi+"px; height: "+hi+"px; top: 0px; background: rgba(241, 241, 241, 0.75); z-index: 1005;'></div>";
					// divLoading = "<div style='position: fixed; width: "+wi+"px; height: "+hi+"px; top: 0px; background: rgba(241, 241, 241, 0.75) url("+imgLoading+") 50% 50% no-repeat; z-index: 1005;'></div>";

				el.css('position', 'relative');
				el.append(divLoading);
			}
		},

		setDatatable: function(url, header, order, sort, ele) {
			custom_dt(url, header, order, sort, ele);
		},

		submitFilter: function(table) {
			// get all typeable inputs
			$('textarea.form-filter, select.form-filter, input.form-filter:not([type="radio"],[type="checkbox"])').each(function() {
				App.setAjaxParam($(this).attr("name"), $(this).val());
			});

			// get all checkboxes
			$('input.form-filter[type="checkbox"]:checked').each(function() {
				App.addAjaxParam($(this).attr("name"), $(this).val());
			});

			// get all radio buttons
			$('input.form-filter[type="radio"]:checked').each(function() {
				App.setAjaxParam($(this).attr("name"), $(this).val());
			});

			table.ajax.reload();
		},

		setAjaxParam: function(name, value) {
			ajaxParams[name] = value;
		},

		notif: function(title, message, type) {
			// Type = success, info, warning, error
			toastr[type](message, title);

			toastr.options = {
				"closeButton": true,
				"debug": false,
				"newestOnTop": true,
				"progressBar": false,
				"positionClass": "toast-top-right",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "1000",
				"timeOut": "5000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			}
		},

		datepicker: function(ele) {
			var inp = (ele != null) ? $(ele) : $('.datepicker');
			$(inp).kendoDatePicker({
				// start: "year",
				// depth: "year",
				format: "yyyy-MM-dd",
			});
		},

		select_val: function(val) {
			select_style(val);
		},

		masked_input: function(ele){
			var inp  	= (ele != null) ? $(ele) : $('.masked'),
				element = $(inp).attr('format'),
				format 	= (typeof element !== 'undefined') ? element : "000-000-000-000";

			$(inp).kendoMaskedTextBox({
				mask: format
			});	

		}
	}
}();

jQuery(window).on('popstate', function(e){
	e.preventDefault();
	var href 	= window.location.href;
	location.href = href;
});

jQuery(document).ready(function() {
	App.init(); // init metronic core componets
});

function f_status(stat, ele, e, dtele) {
	e.preventDefault();
	dtGrid = (dtele != null ? $("#"+dtele): $("#datatable_ajax") );

	if(stat == 1){
		var mes = "Are you sure want to change Status ?";
		var sus = "Successfully Change Status!";
		var err = "Error Change Status!";
		var html = false;
	}else if(stat == 2){
		var mes = "Are you sure want to Delete data ?";
		var sus = "Successfully Delete data!";
		var err = "Error Delete data!";
		var html = false;
	}else if(stat == 3){
		var mes = "<b>This will delete all related Subscription too!</b></br>Are you sure want to Delete data ?";
		var sus = "Successfully Delete data!";
		var err = "Error Delete data!";
		var html = true;
	}

	var href 	= $(ele).attr('href');
		table 	= dtGrid.DataTable();

	swal({
		title: "Are you sure?",
		text: mes,
		// html: html,
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#DD6B55',
		confirmButtonText: 'Yes',
	}).then(
		function(result){
			$.post(href, function(data, textStatus, xhr) {
				if(data.status == 1){
					table.ajax.reload();
					swal("Success", sus, "success");
				}else{
					swal("Error", err, "error");
				}
			}, 'json');
		}, function(dismiss) {
			return false;
		}
	);
};