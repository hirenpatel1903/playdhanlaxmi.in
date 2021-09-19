<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<title>playdhanlaxmi.in</title>
<!-- CSS -->
<link href="{{ asset('public/') }}/assets/css/font-awesome.min.css" rel="stylesheet">
<link href="{{ asset('public/') }}/assets/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('public/') }}/assets/css/bootstrap-datepicker.css" rel="stylesheet">
<link href="{{ asset('public/') }}/assets/css/style.css" rel="stylesheet">
<link href="{{ asset('public/') }}/assets/css/responsive.css" rel="stylesheet">
</head>
<body onload = "JavaScript:AutoRefresh(1200000);">
<!--========= Main Section ======== -->
<div class="main">
  <div class="overflow"></div>
  <header>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="show-result">
            <h1>Show Result</h1>
          </div>
        </div>
      </div>
      <div class="row">
        {{-- <div class="col-md-12">
          <div class="select-date">
            <label class="date-lavel">Start Date</label>
            <input id="txtSDate" type="text" class="form-control date-input" />
            <label class="input-group-btn" for="txtSDate"> <span class="calendar"><i class="fa fa-calendar" aria-hidden="true"></i> </span></label>
          </div>
          <div class="select-date">
            <label class="date-lavel">End Date</label>
            <input id="txtEDate" type="text" class="form-control date-input"  />
            <label class="input-group-btn" for="txtEDate"> <span class="calendar"><i class="fa fa-calendar" aria-hidden="true"></i> </span></label>
          </div>
          <div class="send-go">
            <button class="sendto form-control">Go <i class="fa fa-angle-double-right"></i></button>
          </div>
        </div> --}}
      </div>
    </div>
  </header>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="results-sec">
         @php
           date_default_timezone_set('Asia/Kolkata');
           $timestamp = date("M-d-Y h:i:s a");
         @endphp
          <h2>Result Of Date {{ $timestamp ?? '' }} </h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="number-table table-responsive">
          <table class="table table-bordered fixed_headers" width="100%" border="0">
            <tbody>
            <thead>
              <tr class="table-fixed">
                <th class="topbg">Date</th>
                <th class="topbg">Time</th>
            @php
              $data = DB::table('games')->latest()->get();
              $number = DB::table('numberdaly')->where('datetime',date('d/m/Y'))->latest()->get();
            @endphp
            @foreach($data as $item)
                 <th class="topbg txtcenter">{{ strtoupper($item->name ?? '') }}</th>
            @endforeach
              </tr>
            </thead>
        @foreach($number as $itemnumber)
            <tr>
              <td class="tate1">
                 {{ $itemnumber->datetime ?? '' }}
                </td>
              <td>
                <?php

                echo date('h:i a', strtotime($itemnumber->created_at));
                ?>
              </td>
              <td class="txtcenter">{{ strtoupper($itemnumber->number3 ?? '') }}</td>
              <td class="txtcenter">{{ strtoupper($itemnumber->number2 ?? '') }}</td>
              <td class="txtcenter">{{ strtoupper($itemnumber->number1 ?? '') }}</td>

              <td class="txtcenter">{{ strtoupper($itemnumber->number ?? '') }}</td>


            </tr>
        @endforeach

            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!--========= /Main Section======== -->
<script src="{{ asset('public/') }}/assets/js/jquery.min.js"></script>
<script src="{{ asset('public/') }}/assets/js/bootstrap-datepicker.js"></script>
<script src="{{ asset('public/') }}/assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
        $(function () {
            $('#txtSDate').datepicker({
                format: "dd/mm/yyyy"
            });
			$('#txtEDate').datepicker({
                format: "dd/mm/yyyy"
            });
        });
    </script>
     <script type = "text/JavaScript">
         <!--
            function AutoRefresh( t ) {
               setTimeout("location.reload(true);", t);
            }
         //-->
      </script>
      
   	@include('admin/footer')   
      
</body>
</html>
