@include('admin/header')
@include('admin/sidebar')
		<!--page-wrapper-->
		<div class="page-wrapper">
			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
				<div class="page-content">
					<!--breadcrumb-->

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
											<th scope="col">Name</th>
											<th scope="col">Mobile</th>
											<th scope="col">Game</th>
											<th scope="col">Time</th>
											<th scope="col">Number</th>
											<th scope="col">Amount</th>
											<th scope="col">Action</th>
										</tr>
									</thead>
									<tbody>
                                    @if($dalygame->count()> 0)
                                        @foreach($dalygame as $item)
                                        <tr>
                                                <th scope="row">{{ ++$i  }}</th>
                                                <td>{{ $item->name ?? '' }}</td>
                                                <td>{{ $item->mobile ?? '' }}</td>
                                                <td>{{ $item->game ?? '' }}</td>
                                             @php
                                              $slot = DB::table('timeslote')->where('id',$item->datetime)->first();
                                             @endphp
                                                <td>{{ $slot->times ?? '' }}</td>
                                                <td>{{ $item->number ?? '' }}</td>
                                                <td>{{ $item->amount ?? '' }}</td>
                                                <td><button class="btn btn-sm removeItem" value="{{ $item->id ?? '' }}"><i class="lni lni-trash"></i></button>
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
                        <input name="datetime" type="datetime-local" class="form-control" id="" required>
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
                     }, 1000);
                }
              }
             });
            });
          });
var removeurldatetime = "{{ url('admin/removedatetime') }}";
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
                     }, 1000);
            }
        });
    }
});



</script>
