  'use strict';
  $(document).ready(function () {
      //Basic alert
      $(document).on("click", ".sweet-1", function () {
          var id = ($(this).data('id'));
          swal({
                  title: "Are you sure?",
                  text: "You want to Delete this record ?",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "Yes, delete it!",
                  closeOnConfirm: false
              },
              function () {
                  $('#delete_' + id).submit();
                  // swal("Deleted!", "Your imaginary file has been deleted.", "success");
              })
      });

      $(document).on("click", ".sweet-activate", function () {
          var id = ($(this).data('id'));
          swal({
                  title: "Are you sure?",
                  text: "You want to Activate this ?",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-info",
                  confirmButtonText: "Yes, activate it!",
                  closeOnConfirm: false
              },
              function () {
                  $('#activate_' + id).submit();
                  // swal("Deleted!", "Your imaginary file has been deleted.", "success");
              })
      });

      $(document).on("click", ".sweet-verify", function () {
          var id = ($(this).data('id'));
          swal({
                  title: "Are you sure?",
                  text: "You want to Verify this ?",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-info",
                  confirmButtonText: "Yes, verify it!",
                  closeOnConfirm: false
              },
              function () {
                  $('#verify_' + id).submit();
                  // swal("Deleted!", "Your imaginary file has been deleted.", "success");
              })
      });

      $(document).on("click", ".sweet-upgrade-plan", function () {
          var id = ($(this).data('id'));
          swal({
                  title: "Are you sure?",
                  text: "You want to Upgrade Plan of this user to Enterprise ?",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-info",
                  confirmButtonText: "Yes, upgrade!",
                  closeOnConfirm: false
              },
              function () {
                  $('#upgrade_plan_' + id).submit();
                  // swal("Deleted!", "Your imaginary file has been deleted.", "success");
              })
      });

      $(document).on("click", ".sweet-allow-room", function () {
          var id = ($(this).data('id'));
          swal({
                  title: "Are you sure?",
                  text: "You want to Allow user to make room?",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-info",
                  confirmButtonText: "Yes, allow!",
                  closeOnConfirm: false
              },
              function () {
                  $('#allow_room_' + id).submit();
                  // swal("Deleted!", "Your imaginary file has been deleted.", "success");
              })
      });

      $(document).on("click", ".sweet-delete-record", function () {
          var id = ($(this).data('id'));
          swal({
                  title: "Are you sure?",
                  text: "If you delete this item, all of its associated data will also be deleted. ",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "Yes, delete!",
                  closeOnConfirm: false
              },
              function () {
                  $('#delete_record_' + id).submit();
                  // swal("Deleted!", "Your imaginary file has been deleted.", "success");
              })
      });

      
      // document.querySelector('.sweet-1').onclick = function(){
      // 	swal({
      // 		title: "Are you sure?",
      // 		text: "Your will not be able to recover this imaginary file!",
      // 		type: "warning",
      // 		showCancelButton: true,
      // 		confirmButtonClass: "btn-danger",
      // 		confirmButtonText: "Yes, delete it!",
      // 		closeOnConfirm: false
      // 	},
      // 	function(){
      // 		swal("Deleted!", "Your imaginary file has been deleted.", "success");
      // 	})
      // };
      //success message
      // document.querySelector('.alert-success-msg').onclick = function(){
      // 	swal("Good job!", "You clicked the button!", "success");
      // };

      //Alert confirm
      // document.querySelector('.alert-confirm').onclick = function(){
      // 	swal({
      // 				title: "Are you sure?",
      // 				text: "Your will not be able to recover this imaginary file!",
      // 				type: "warning",
      // 				showCancelButton: true,
      // 				confirmButtonClass: "btn-danger",
      // 				confirmButtonText: "Yes, delete it!",
      // 				closeOnConfirm: false
      // 			},
      // 			function(){
      // 				swal("Deleted!", "Your imaginary file has been deleted.", "success");
      // 			});
      // };

      //Success or cancel alert
      // document.querySelector('.alert-success-cancel').onclick = function(){
      // 	swal({
      // 				title: "Are you sure?",
      // 				text: "You will not be able to recover this imaginary file!",
      // 				type: "warning",
      // 				showCancelButton: true,
      // 				confirmButtonClass: "btn-danger",
      // 				confirmButtonText: "Yes, delete it!",
      // 				cancelButtonText: "No, cancel plx!",
      // 				closeOnConfirm: false,
      // 				closeOnCancel: false
      // 			},
      // 			function(isConfirm) {
      // 				if (isConfirm) {
      // 					swal("Deleted!", "Your imaginary file has been deleted.", "success");
      // 				} else {
      // 					swal("Cancelled", "Your imaginary file is safe :)", "error");
      // 				}
      // 			});
      // };


      //prompt alert
      $(document).on("click", ".prompt-reject", function () {
          var id = ($(this).data('id'));
          swal({
              title: "Are you sure ?",
              text: "Write the reason for rejection:",
              type: "input",
              showCancelButton: true,
              closeOnConfirm: false,
              inputPlaceholder: "Write something"
          }, function (inputValue) {
              if (inputValue === false) return false;
              if (inputValue === "") {
                  swal.showInputError("You need to write something!");
                  return false
              }
              // swal("Nice!", "You wrote: " + inputValue, "success");
              var input_field = document.getElementById('reject-' + id);
              input_field.value = inputValue;
              $('#reject_' + id).submit();
              // swal("Deleted!", "Your imaginary file has been deleted.", "success");

          });
      });

      //Ajax alert
      // document.querySelector('.alert-ajax').onclick = function(){
      // 	swal({
      // 		title: "Ajax request example",
      // 		text: "Submit to run ajax request",
      // 		type: "info",
      // 		showCancelButton: true,
      // 		closeOnConfirm: false,
      // 		showLoaderOnConfirm: true
      // 	}, function () {
      // 		setTimeout(function () {
      // 			swal("Ajax request finished!");
      // 		}, 2000);
      // 	});
      // };


      $('#openBtn').on('click', function () {
          $('#myModal').modal({
              show: true
          })
      });

      $(document).on('show.bs.modal', '.modal', function (event) {
          var zIndex = 1040 + (10 * $('.modal:visible').length);
          $(this).css('z-index', zIndex);
          setTimeout(function () {
              $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
          }, 0);
      });
  });
