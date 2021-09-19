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
                                            <th scope="col">Number</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Time</th>
										</tr>
									</thead>
									<tbody>
                                    @if($dalygameresultlist->count()> 0)
                                        @foreach($dalygameresultlist as $item)
                                            <tr>
                                                <th scope="row">{{ ++$i  }}</th>
                                                <td>{{ $item->number ?? '' }}</td>
                                                <td>{{ $item->datetime }}</td>
                                                <td>{{ $item->time }}</td>

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

