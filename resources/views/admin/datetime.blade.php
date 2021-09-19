@include('admin/header')
@include('admin/sidebar')
		<!--page-wrapper-->
		<div class="page-wrapper">
			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
				<div class="page-content">
					<!--breadcrumb-->
					<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
						<div class="breadcrumb-title pr-3">Home</div>
						<div class="pl-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Date</li>
								</ol>
							</nav>
						</div>
						<div class="ml-auto">
							<div class="btn-group">
								<button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModal">Add Date</button>
							</div>
						</div>
					</div>
					<!--end breadcrumb-->
					<div class="card radius-15">
						<div class="card-body">
                            <div class="alert alert-success" id="dels" style="display: none;">
                                <strong id="msgs"></strong>
                              </div>
					    	<div class="table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th scope="col">SrNo.</th>
											<th scope="col">Date</th>
											<th scope="col">Action</th>
										</tr>
									</thead>
									<tbody>

                                    @if($data->count()> 0)
                                        @foreach($data as $item)
                                            <tr>
                                                <th scope="row">{{ ++$i  }}</th>
                                                <td>{{ date('Y-M-d', strtotime($item->datetime)) }}</td>
                                                <td><button class="btn btn-sm removeItem" value="{{ $item->id ?? '' }}"><i class="lni lni-trash"></i></button>
                                                    <button class="btn btn-sm EditItem" value="{{ $item->id ?? '' }}"><i class="lni lni-brush-alt"></i></button></td>

                                                   </td>
                                            </tr>
                                        @endforeach
                                    @endif
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end page-content-wrapper-->
		</div>
		<!--end page-wrapper-->
		<!--start overlay-->
		@include('admin/footer')

        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

              </div>
              <div class="modal-body">
                <div class="alert alert-success" id="del" style="display: none;">
                    <strong id="msg"></strong>
                  </div>
                <form method="Post" id="savedatetime">
                    @csrf
                    <input type="hidden" id="ids" name="id">
                    <div class="form-group">
                        <input name="datetime" type="date" class="form-control" id="" required>
                        <span style="color:red;" id="datetimes"></span>
                    </div>
                        <input type="submit" class="btn btn-success" style="width: 100%;">
                </form>
              </div>
            </div>

          </div>
        </div>
<script>

     var urldatetime = "{{ url('admin/datetimeinsert') }}";
     var editedate = "{{ url('admin/editedate') }}";
     $(function () {
          $('#savedatetime').on('submit', function (e) {
            e.preventDefault();
            var token = $(this).data("token");
               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
            $.ajax({
              type: 'post',
              url:urldatetime,
              data:new FormData(this),
              dataType:'JSON',
              contentType: false,
              cache: false,
              processData: false,
              success: function (data) {
                if(data.status==201){
                    $('#datetimes').html(data.error.datetime);
                 } else {
                  $('#del').show();
                  $("#del,msg").show().delay(5000).fadeOut();
                  $('#msg').html(data.success);
                     setTimeout(function(){
                       window.location.reload(1);
                     }, 2000);
                }
              }
             });
            });
          });
var removeurldatetime = "{{ url('admin/RemoveDate') }}";
   $('.removeItem').click(function (event) {
       var id = $(this).val();
     if (confirm('Are you sure you want to delete this?')) {
        $.ajax({
            url:removeurldatetime+'/'+id,
            type: "get",
            success:function (data) {
                $('#dels').show();
                  $("#dels,msgs").show().delay(5000).fadeOut();
                  $('#msgs').html(data.success);
                     setTimeout(function(){
                       window.location.reload(1);
                     }, 2000);
            }
        });
    }
});

$('.EditItem').click(function (event) {
       var id = $(this).val();
        $.ajax({
            url:editedate+'/'+id,
            type: "get",
            success:function (res) {
                if(res.status==200){
                  $('#ids').val(res.data.id);
                  $('#datetime').val(res.data.datetime);
                  $('#myModal').modal('show');
                }
            }
        });
});



</script>
