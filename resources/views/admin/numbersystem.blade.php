@include('admin/header')
@include('admin/sidebar')
		<!--page-wrapper-->
		<div class="page-wrapper">
			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
				<div class="page-content">
					<!--breadcrumb-->
					<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
						<div class="breadcrumb-title pr-3">Game Add</div>
						<div class="pl-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Game Add</li>
								</ol>
							</nav>
						</div>

					</div>
					<!--end breadcrumb-->
					<div class="card radius-15">
						<div class="card-body">
                                <form action="" method="Post" id="savegame">
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="numbers" name="number" placeholder="Please Select Number" style="text-transform:uppercase">
                                        <span style="color:red;" id="numberss"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control" name="game">
                                            <option value=""> --Select Game-- </option>
                                           @foreach($game as $item)
                                            <option value="{{ $item->name ?? '' }}"> --{{ $item->name ?? '' }}-- </option>
                                            @endforeach
                                        </select>
                                        <span style="color:red;" id="games"></span>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control" name="datetime">
                                            <option value=""> --Select Time-- </option>
                                            @foreach($timeslote as $item1)
                                            <option value="{{ $item1->id }}"> --{{ $item1->times ?? '' }}-- </option>

                                            @endforeach
                                        </select>
                                        <span style="color:red;" id="datetimes"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control"  name="name" placeholder="Enter Name">
                                        <span style="color:red;" id="name"></span>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control"  name="mobile" placeholder="Enter Mobile">
                                        <span style="color:red;" id="mobile"></span>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control"  name="amount" placeholder="Enter Amount">
                                        <span style="color:red;" id="amount"></span>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success" value="Save">
                                    </div>
                                </div>
                            </div>
                             </form>


							</div>

					</div>
				</div>
			</div>
			<!--end page-content-wrapper-->
		</div>
		<!--end page-wrapper-->
		<!--start overlay-->
		<div class="overlay toggle-btn-mobile"></div>
		<!--end overlay-->
@include('admin/footer')
<script>
    var getNo = "{{ url('admin/getno') }}";
    $(function(){
        $('.mySelect').click(function(){
        var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });
        var token = $(this).data("token");
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
            $.ajax({
                type:'Post',
                url:getNo,
                data: {info:val},
                success: function (data) {
                $('#numbers').val(data.number);
                }
            });
        });
      });
var savegame = "{{ url('admin/savegame') }}";
  $(function () {
    $('#savegame').on('submit', function (e) {
      e.preventDefault();
      var token = $(this).data("token");
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
      $.ajax({
        type: 'post',
        url:savegame,
        data: $('form').serialize(),
        success: function (data) {
          if(data.status==201){
              $('#name').html(data.error.name);
              $('#mobile').html(data.error.mobile);
              $('#numberss').html(data.error.number);
              $('#games').html(data.error.game);
              $('#amount').html(data.error.amount);
              $('#datetimes').html(data.error.datetime);
              console.log(data.success.success);
          }else{
              $('#name').html("");
              $('#mobile').html("");
              $('#numberss').html("");
              $('#games').html("");
              $('#amount').html("");
              $('#datetimes').html("");
              $("#dels,msgs").show().delay(5000).fadeOut();
              swal("Game Save Successfull!");
                  $('#msgs').html(data.success);
                     setTimeout(function(){
                       window.location.reload(1);
            }, 2000);

          }
        }
       });
      });
    });



</script>
