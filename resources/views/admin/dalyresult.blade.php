@include('admin/header')
@include('admin/sidebar')

<style>
    .blinking {
	text-align:center;
    background: red;
	border-radius: 70px;
}

.blinking.blink {
	opacity:0;
}
</style>
	<!--page-wrapper-->
		<div class="page-wrapper">
			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
				<div class="page-content">
          <!--breadcrumb-->
          <div class="md-col-12">
            <span class="dcoder"></span>
          </div>
					<div class="row">
                        @php
                        $i = 1;
                        $j = 1;
                        @endphp
                        @if($games->count()> 0)
                         @foreach($games as $item)
                                <div class="col-12 col-lg-3">
                                    <div class="card radius-15">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <h2 class="mb-0 text-white">Amount:<span><?= $sumamou = DB::table('dalygame')->where('status',0)->where('game',$item->name)->sum('amount'); ?> </span></h2>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <p class="mb-0 text-white">name: <?= strtoupper($item->name ?? '') ?></p>
                                                    <p class="mb-0 text-white">Date: <?php
                                                       date_default_timezone_set('Asia/Kolkata');
                                                        echo date("Y-m-d");
                                                        ?>
                                                        </p>
                                                @if(empty(Session::get('mynumber1')))
                                                    @php
                                                    // session()->forget('mynumber1');
                                                    $digits = 2;
                                                    $uniq = rand(pow(10, $digits-1), pow(10, $digits)-1);
                                                    Session::put('mynumber'.$j,$item->name.$uniq);
                                                    @endphp
                                                @elseif(empty(Session::get('mynumber2')))
                                                @php
                                                    // session()->forget('mynumber2');
                                                    $digits = 2;
                                                    $uniq = rand(pow(10, $digits-1), pow(10, $digits)-1);
                                                    Session::put('mynumber'.$j,$item->name.$uniq);
                                                    @endphp
                                                @elseif(empty(Session::get('mynumber3')))
                                                @php
                                                //    session()->forget('mynumber3');
                                                    $digits = 2;
                                                    $uniq = rand(pow(10, $digits-1), pow(10, $digits)-1);
                                                    Session::put('mynumber'.$j,$item->name.$uniq);
                                                    @endphp
                                                @elseif(empty(Session::get('mynumber4')))
                                                @php
                                                //    session()->forget('mynumber4');
                                                    $digits = 2;
                                                    $uniq = rand(pow(10, $digits-1), pow(10, $digits)-1);
                                                    Session::put('mynumber'.$j,$item->name.$uniq);
                                                    @endphp
                                                @endif
                                                    <p style="display:none;" class="shownumber">This Number Is Open: <strong>{{ strtoupper(Session::get('mynumber'.$j)) }}</strong></p>
                                                    <p style="display:none;" class="mb-0 text-white shownumber"><button data-toggle="modal" data-target="#myModal{{ $i++ }}" class="btn btn-danger btn-sm">Edit</button></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @php $j++; @endphp
                            @endforeach
                        @endif

					</div>
					<!--end breadcrumb-->
				</div>
			</div>
			<!--end page-content-wrapper-->
        </div>
		@include('admin/footer')
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>


<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <form action="{{ url('admin/changenumber') }}" method="Post">
            @csrf
            <div class="form-group" >
                <select class="form-control" name="game" required>
                <option value="">Select Option</option>
                    @foreach($games as $gameitem)
                        <option value="{{ $gameitem->name ?? '' }}">{{ $gameitem->name ?? '' }}</option>
                    @endforeach
                </select>
            </div>
           <div class="form-group">
               <input type="text" class="form-control" name="number">
           </div>

           <input type="submit" name="submit" value="Submit" class="btn btn-success">
        </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <form action="{{ url('admin/changenumber1') }}" method="Post">
            @csrf
            <div class="form-group" >
                <select class="form-control" name="game" required>
                <option value="">Select Option</option>
                    @foreach($games as $gameitem)
                        <option value="{{ $gameitem->name ?? '' }}">{{ $gameitem->name ?? '' }}</option>
                    @endforeach
                </select>
            </div>
           <div class="form-group">
               <input type="text" class="form-control" name="number">
           </div>

           <input type="submit" name="submit" value="Submit" class="btn btn-success">
        </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <form action="{{ url('admin/changenumber2') }}" method="Post">
            @csrf
            <div class="form-group" >
                <select class="form-control" name="game" required>
                <option value="">Select Option</option>
                    @foreach($games as $gameitem)
                        <option value="{{ $gameitem->name ?? '' }}">{{ $gameitem->name ?? '' }}</option>
                    @endforeach
                </select>
            </div>
           <div class="form-group">
               <input type="text" class="form-control" name="number">
           </div>

           <input type="submit" name="submit" value="Submit" class="btn btn-success">
        </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="myModal4" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <form action="{{ url('admin/changenumber3') }}" method="Post">
            @csrf
            <div class="form-group" >
                <select class="form-control" name="game" required>
                <option value="">Select Option</option>
                    @foreach($games as $gameitem)
                        <option value="{{ $gameitem->name ?? '' }}">{{ $gameitem->name ?? '' }}</option>
                    @endforeach
                </select>
            </div>
           <div class="form-group">
               <input type="text" class="form-control" name="number">
           </div>

           <input type="submit" name="submit" value="Submit" class="btn btn-success">
        </form>
        </div>
      </div>
    </div>
  </div>


@php
  $timeslot = DB::table('timeslote')->get();
  $starttime = strtotime("-5 minutes", strtotime($timeslot[1]->times));
  $h = date('h', $starttime);
  $m = date('i', $starttime);
  $hov = strtotime($timeslot[1]->times);
  $hover = date('h', $hov);
  $min = date('i', $hov);


  $starttime1 = strtotime("-5 minutes", strtotime($timeslot[2]->times));
  $h1 = date('h', $starttime1);
  $m1 = date('i', $starttime1);

  $hov1 = strtotime($timeslot[1]->times);
  $hover1 = date('h', $hov1);
  $min1 = date('i', $hov1);


  $starttime2 = strtotime("-5 minutes", strtotime($timeslot[3]->times));
  $h2 = date('h', $starttime2);
  $m2 = date('i', $starttime2);

  $hov2 = strtotime($timeslot[3]->times);
  $hover2 = date('h', $hov2);
  $min2 = date('i', $hov2);

  $starttime3 = strtotime("-5 minutes", strtotime($timeslot[4]->times));
  $h3 = date('h', $starttime3);
  $m3 = date('i', $starttime3);

  $hov3 = strtotime($timeslot[4]->times);
  $hover3 = date('h', $hov3);
  $min3 = date('i', $hov3);

  $starttime4 = strtotime("-5 minutes", strtotime($timeslot[5]->times));
  $h4 = date('h', $starttime4);
  $m4 = date('i', $starttime4);

  $hov4 = strtotime($timeslot[5]->times);
  $hover4 = date('h', $hov4);
  $min4 = date('i', $hov4);

  $starttime5 = strtotime("-5 minutes", strtotime($timeslot[6]->times));
  $h5 = date('h', $starttime5);
  $m5 = date('i', $starttime5);

  $hov5 = strtotime($timeslot[6]->times);
  $hover5 = date('h', $hov5);
  $min5 = date('i', $hov5);

  $starttime6 = strtotime("-5 minutes", strtotime($timeslot[7]->times));

  $h6 = date('h', $starttime6);
  $m6 = date('i', $starttime6);

  $hov6 = strtotime($timeslot[7]->times);
  $hover6 = date('h', $hov6);
  $min6 = date('i', $hov6);

  $starttime7 = strtotime("-5 minutes", strtotime($timeslot[8]->times));

  $h7 = date('h', $starttime7);
  $m7 = date('i', $starttime7);

  $hov7 = strtotime($timeslot[8]->times);
  $hover7 = date('h', $hov7);
  $min7 = date('i', $hov7);

  $starttime8 = strtotime("-5 minutes", strtotime($timeslot[9]->times));

  $h8 = date('h', $starttime8);
  $m8 = date('i', $starttime8);

  $hov8 = strtotime($timeslot[9]->times);
  $hover8 = date('h', $hov8);
  $min8 = date('i', $hov8);

  $starttime9 = strtotime("-5 minutes", strtotime($timeslot[10]->times));
  $h9 = date('h', $starttime9);
  $m9 = date('i', $starttime9);

  $hov9 = strtotime($timeslot[10]->times);
  $hover9 = date('h', $hov9);
  $min9 = date('i', $hov9);

  $starttime10 = strtotime("-5 minutes", strtotime($timeslot[11]->times));
  $h10 = date('h', $starttime10);
  $m10 = date('i', $starttime10);

  $hov10 = strtotime($timeslot[11]->times);
  $hover10 = date('h', $hov10);
  $min10 = date('i', $hov10);

  $starttime11 = strtotime("-5 minutes", strtotime($timeslot[12]->times));
  $h11 = date('h', $starttime11);
  $m11 = date('i', $starttime11);

  $hov11 = strtotime($timeslot[12]->times);
  $hover11 = date('h', $hov11);
  $min11 = date('i', $hov11);

  $starttime12 = strtotime("-5 minutes", strtotime($timeslot[13]->times));

  $h12 = date('h', $starttime12);
  $m12 = date('i', $starttime12);

  $hov12 = strtotime($timeslot[13]->times);
  $hover12 = date('h', $hov12);
  $min12 = date('i', $hov12);

  $starttime13 = strtotime("-5 minutes", strtotime($timeslot[14]->times));
  $h13 = date('h', $starttime13);
  $m13 = date('i', $starttime13);

  $hov13 = strtotime($timeslot[14]->times);
  $hover13 = date('h', $hov13);
  $min13 = date('i', $hov13);

  $starttime14 = strtotime("-5 minutes", strtotime($timeslot[15]->times));

  $h14 = date('h', $starttime14);
  $m14 = date('i', $starttime14);

  $hov14 = strtotime($timeslot[15]->times);
  $hover14 = date('h', $hov14);
  $min14 = date('i', $hov14);

  $starttime15 = strtotime("-5 minutes", strtotime($timeslot[16]->times));
  $starttimes15 = date('h:i', $starttime15);
  $h15 = date('h', $starttime15);
  $m15 = date('i', $starttime15);

  $hov15 = strtotime($timeslot[16]->times);
  $hover15 = date('h', $hov15);
  $min15 = date('i', $hov15);

  $starttime16 = strtotime("-5 minutes", strtotime($timeslot[17]->times));

  $h16 = date('h', $starttime16);
  $m16 = date('i', $starttime16);

  $hov16 = strtotime($timeslot[17]->times);
  $hover16 = date('h', $hov16);
  $min16 = date('i', $hov16);

  $starttime17 = strtotime("-5 minutes", strtotime($timeslot[18]->times));
  $h17 = date('h', $starttime17);
  $m17 = date('i', $starttime17);

  $hov17 = strtotime($timeslot[18]->times);
  $hover17 = date('h', $hov17);
  $min17 = date('i', $hov17);

  $starttime18 = strtotime("-5 minutes", strtotime($timeslot[19]->times));
  $h18 = date('h', $starttime18);
  $m18 = date('i', $starttime18);

  $hov18 = strtotime($timeslot[19]->times);
  $hover18 = date('h', $hov18);
  $min18 = date('i', $hov18);

  $starttime19 = strtotime("-5 minutes", strtotime($timeslot[20]->times));

  $h19 = date('h', $starttime19);
  $m19 = date('i', $starttime19);

  $hov19 = strtotime($timeslot[20]->times);
  $hover19 = date('h', $hov19);
  $min19 = date('i', $hov19);


  $starttime20 = strtotime("-5 minutes", strtotime($timeslot[21]->times));
  $h20 = date('h', $starttime20);
  $m20 = date('i', $starttime20);

  $hov20 = strtotime($timeslot[21]->times);
  $hover20 = date('h', $hov20);
  $min20 = date('i', $hov20);

  $starttime21 = strtotime("-5 minutes", strtotime($timeslot[22]->times));

  $h21 = date('h', $starttime21);
  $m21 = date('i', $starttime21);

  $hov21 = strtotime($timeslot[22]->times);
  $hover21 = date('h', $hov21);
  $min21 = date('i', $hov21);

  $starttime22 = strtotime("-5 minutes", strtotime($timeslot[23]->times));
  $h22 = date('h', $starttime22);
  $m22 = date('i', $starttime22);

  $hov22 = strtotime($timeslot[23]->times);
  $hover22 = date('h', $hov22);
  $min22 = date('i', $hov22);

  $starttime23 = strtotime("-5 minutes", strtotime($timeslot[24]->times));
  $h23 = date('h', $starttime23);
  $m23 = date('i', $starttime23);

  $hov23 = strtotime($timeslot[24]->times);
  $hover23 = date('h', $hov23);
  $min23 = date('i', $hov23);

  $starttime24 = strtotime("-5 minutes", strtotime($timeslot[25]->times));
  $h24 = date('h', $starttime24);
  $m24 = date('i', $starttime24);

  $hov24 = strtotime($timeslot[25]->times);
  $hover24 = date('h', $hov24);
  $min24 = date('i', $hov24);


  $starttime25 = strtotime("-5 minutes", strtotime($timeslot[26]->times));
  $h25 = date('h', $starttime25);
  $m25 = date('i', $starttime25);

  $hov25 = strtotime($timeslot[26]->times);
  $hover25 = date('h', $hov25);
  $min25 = date('i', $hov25);

  $starttime26 = strtotime("-5 minutes", strtotime($timeslot[27]->times));
  $h26 = date('h', $starttime26);
  $m26 = date('i', $starttime26);

  $hov26 = strtotime($timeslot[27]->times);
  $hover26 = date('h', $hov26);
  $min26 = date('i', $hov26);

  $starttime27 = strtotime("-5 minutes", strtotime($timeslot[28]->times));
  $h27 = date('h', $starttime27);
  $m27 = date('i', $starttime27);

  $hov27 = strtotime($timeslot[28]->times);
  $hover27 = date('h', $hov27);
  $min27 = date('i', $hov27);

  $starttime28 = strtotime("-5 minutes", strtotime($timeslot[29]->times));
  $h28 = date('h', $starttime28);
  $m28 = date('i', $starttime28);

  $hov28 = strtotime($timeslot[29]->times);
  $hover28 = date('h', $hov28);
  $min28 = date('i', $hov28);

  $starttime29 = strtotime("-5 minutes", strtotime($timeslot[30]->times));
  $h29 = date('h', $starttime29);
  $m29 = date('i', $starttime29);

  $hov29 = strtotime($timeslot[30]->times);
  $hover29 = date('h', $hov29);
  $min29 = date('i', $hov29);


  $starttime30 = strtotime("-5 minutes", strtotime($timeslot[31]->times));
  $h30 = date('h', $starttime30);
  $m30 = date('i', $starttime30);

  $hov30 = strtotime($timeslot[31]->times);
  $hover30 = date('h', $hov30);
  $min30 = date('i', $hov30);

  $starttime31 = strtotime("-5 minutes", strtotime($timeslot[32]->times));
  $h31 = date('h', $starttime31);
  $m31 = date('i', $starttime31);

  $hov31 = strtotime($timeslot[32]->times);
  $hover31 = date('h', $hov31);
  $min31 = date('i', $hov31);


  $starttime32 = strtotime("-5 minutes", strtotime($timeslot[33]->times));
  $h32 = date('h', $starttime32);
  $m32 = date('i', $starttime32);

  $hov32 = strtotime($timeslot[33]->times);
  $hover32 = date('h', $hov32);
  $min32 = date('i', $hov32);


  $starttime33 = strtotime("-5 minutes", strtotime($timeslot[34]->times));
  $h33 = date('h', $starttime33);
  $m33 = date('i', $starttime33);

  $hov33 = strtotime($timeslot[34]->times);
  $hover33 = date('h', $hov33);
  $min33 = date('i', $hov33);


  $starttime34 = strtotime("-5 minutes", strtotime($timeslot[35]->times));
  $h34 = date('h', $starttime34);
  $m34 = date('i', $starttime34);

  $hov34 = strtotime($timeslot[35]->times);
  $hover34 = date('h', $hov34);
  $min34 = date('i', $hov34);


  $starttime35 = strtotime("-5 minutes", strtotime($timeslot[36]->times));
  $h35 = date('h', $starttime35);
  $m35 = date('i', $starttime35);

  $hov35 = strtotime($timeslot[36]->times);
  $hover35 = date('h', $hov35);
  $min35 = date('i', $hov35);









 @endphp

<script>

var hov1 = "{{  $hover }}";
var min1 = "{{  $min }}";
    var hs1= "{{ $h }}";
    var ms1= "{{ $m }}";



var hov2 = "{{  $hover1 }}";
var min2 = "{{  $min1 }}";
    var hs2 = "{{ $h2 }}";
    var ms2 = "{{ $m2 }}";


var hov3 = "{{  $hover2 }}";
var min3 = "{{  $min2 }}";
    var hs3 = "{{ $h3 }}";
    var ms3 = "{{ $m3 }}";

var hov4 = "{{  $hover3 }}";
var min4 = "{{  $min3 }}";
    var hs4 = "{{ $h4 }}";
    var ms4 = "{{ $m4 }}";

var hov5 = "{{  $hover4 }}";
var min5 = "{{  $min4 }}";
    var hs5 = "{{ $h5 }}";
    var ms5 = "{{ $m5 }}";

var hov6 = "{{  $hover5 }}";
var min6 = "{{  $min5 }}";
    var hs6 = "{{ $h6 }}";
    var ms6 = "{{ $m6 }}";

var hov7 = "{{  $hover6 }}";
var min7 = "{{  $min6 }}";
    var hs7 = "{{ $h7 }}";
    var ms7 = "{{ $m7 }}";

var hov8 = "{{  $hover7 }}";
var min8 = "{{  $min7 }}";
    var hs8 = "{{ $h8 }}";
    var ms8 = "{{ $m8 }}";

var hov9 = "{{  $hover8 }}";
var min9 = "{{  $min8 }}";
    var hs9 = "{{ $h9 }}";
    var ms9 = "{{ $m9 }}";

var hov10 = "{{  $hover9 }}";
var min10 = "{{  $min9 }}";
    var hs10 = "{{ $h10 }}";
    var ms10 = "{{ $m10 }}";

var hov11 = "{{  $hover10 }}";
var min11 = "{{  $min10 }}";
    var hs11 = "{{ $h11 }}";
    var ms11 = "{{ $m11 }}";


var hov12 = "{{  $hover11 }}";
var min12 = "{{  $min11 }}";
    var hs12 = "{{ $h12 }}";
    var ms12 = "{{ $m12}}";

var hov13 = "{{  $hover12 }}";
var min13 = "{{  $min12 }}";
    var hs13 = "{{ $h13 }}";
    var ms13 = "{{ $m13 }}";

var hov14 = "{{  $hover13 }}";
var min14 = "{{  $min13 }}";
    var hs14 = "{{ $h14 }}";
    var ms14 = "{{ $m14 }}";

var hov15 = "{{  $hover14 }}";
var min15 = "{{  $min14 }}";
    var hs15 = "{{ $h15 }}";
    var ms15 = "{{ $m15 }}";

var hov16 = "{{  $hover15 }}";
var min16 = "{{  $min15 }}";
    var hs16 = "{{ $h16 }}";
    var ms16 = "{{ $m16 }}";

var hov17 = "{{  $hover16 }}";
var min17 = "{{  $min16 }}";
    var hs17 = "{{ $h17 }}";
    var ms17 = "{{ $m17 }}";


var hov18 = "{{  $hover17 }}";
var min18 = "{{  $min17 }}";
    var hs18 = "{{ $h18 }}";
    var ms18 = "{{ $m18 }}";


var hov19 = "{{  $hover18 }}";
var min19 = "{{  $min18 }}";
    var hs19 = "{{ $h19 }}";
    var ms19 = "{{ $m19 }}";

var hov20 = "{{  $hover19 }}";
var min20 = "{{  $min19 }}";
    var hs20 = "{{ $h20 }}";
    var ms20 = "{{ $m20 }}";


var hov21 = "{{  $hover20 }}";
var min21 = "{{  $min20 }}";
    var hs21 = "{{ $h21 }}";
    var ms21 = "{{ $m21 }}";

var hov22 = "{{  $hover21 }}";
var min22 = "{{  $min21 }}";
    var hs22 = "{{ $h22 }}";
    var ms22 = "{{ $m22 }}";

var hov23 = "{{  $hover22 }}";
var min23 = "{{  $min22 }}";
    var hs23 = "{{ $h23 }}";
    var ms23 = "{{ $m23 }}";

var hov24 = "{{  $hover23 }}";
var min24 = "{{  $min23 }}";
    var hs24 = "{{ $h24 }}";
    var ms24 = "{{ $m24 }}";

var hov25 = "{{  $hover24 }}";
var min25 = "{{  $min24 }}";
    var hs25 = "{{ $h25 }}";
    var ms25 = "{{ $m25 }}";

var hov26 = "{{  $hover25 }}";
var min26 = "{{  $min25 }}";
    var hs26 = "{{ $h26 }}";
    var ms26 = "{{ $m26 }}";

var hov27 = "{{  $hover26 }}";
var min27= "{{  $min26 }}";
    var hs27 = "{{ $h27 }}";
    var ms27 = "{{ $m27 }}";

var hov28 = "{{  $hover27 }}";
var min28= "{{  $min27 }}";
    var hs28 = "{{ $h28 }}";
    var ms28 = "{{ $m28 }}";

var hov29 = "{{  $hover28 }}";
var min29= "{{  $min28 }}";
    var hs29 = "{{ $h29 }}";
    var ms29 = "{{ $m29 }}";

var hov30 = "{{  $hover29 }}";
var min30= "{{  $min29 }}";
    var hs30 = "{{ $h30 }}";
    var ms30 = "{{ $m30 }}";

var hov31 = "{{  $hover30 }}";
var min31 = "{{  $min30 }}";
    var hs31 = "{{ $h31 }}";
    var ms31 = "{{ $m31 }}";

var hov32 = "{{  $hover31 }}";
var min32 = "{{  $min31 }}";
    var hs32 = "{{ $h32 }}";
    var ms32 = "{{ $m32 }}";

var hov33 = "{{  $hover32 }}";
var min33 = "{{  $min32 }}";
    var hs33 = "{{ $h33 }}";
    var ms33 = "{{ $m33 }}";

var hov34 = "{{  $hover33 }}";
var min34 = "{{  $min33 }}";
    var hs34 = "{{ $h34 }}";
    var ms34 = "{{ $m34 }}";

var hov35 = "{{  $hover34 }}";
var min35 = "{{  $min34 }}";
    var hs35 = "{{ $h35 }}";
    var ms35 = "{{ $m35 }}";



var addnumber = "{{ url('admin/addnumber') }}";
$(function(){
	var $blinkText = $(".blinking");
	setInterval(function() {
		$blinkText.toggleClass("blink");
	}, 1000);
});

function refresh(){
    var now = new Date();
    var h = now.getHours() % 12 || 12;
    var m = now.getMinutes();
    var s = now.getSeconds();
    var mli = now.getMilliseconds();
    var out = h+" : "+m+" : "+s;
    var datetime = h+":"+m;
    // alert(datetime);
    var trig = setTimeout(refresh,500);

    document.getElementsByClassName("dcoder")[0].innerHTML = out;

    if(hs1==h && ms1==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }
    if(hs2==h && ms2==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }
    if(hs3==h && ms3==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }
    if(hs4==h && ms4==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }
    if(hs5==h && ms5==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }
    if(hs6==h && ms6==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }
    if(hs7==h && ms7==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }
    if(hs8==h && ms8==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }
    if(hs9==h && ms9==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }
    if(hs10==h && ms10==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }
    if(hs11==h && ms11==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }
    if(hs12==h && ms12==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }
    if(hs13==h && ms13==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }
    if(hs14==h && ms14==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }
    if(hs15==h && ms15==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }
    if(hs16==h && ms16==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }if(hs17==h && ms17==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }
    if(hs18==h && ms18==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }if(hs19==h && ms19==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }if(hs20==h && ms20==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }if(hs21==h && ms21==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }if(hs22==h && ms22==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }if(hs23==h && ms23==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }if(hs24==h && ms24==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }if(hs25==h && ms25==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }if(hs26==h && ms26==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }if(hs27==h && ms27==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }if(hs28==h && ms28==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }if(hs29==h && ms29==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }if(hs30==h && ms30==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }if(hs31==h && ms32==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }if(hs33==h && ms33==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }if(hs34==h && ms34==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }if(hs35==h && ms35==m){
        $(".shownumber").show();
        if(s==1){
             window.location.reload();
        }
    }

    if(h==hov1 && min1==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov2 && min2==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov3 && min3==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov4 && min4==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov5 && min5==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov6 && min6==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov7 && min7==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov8 && min8==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov9 && min9==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov10 && min10==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov11 && min11==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov12 && min12==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov13 && min13==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov14 && min14==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov15 && min15==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov16 && min16==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov17 && min17==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov18 && min18==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov19 && min19==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov20 && min20==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov21 && min21==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov22 && min22==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov23 && min23==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }
    if(h==hov24 && min24==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov25 && min25==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov26 && min26==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov27 && min27==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov28 && min28==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov29 && min29==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov30 && min30==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }
    if(h==hov31 && min31==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov32 && min32==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov33 && min33==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov34 && min34==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }if(h==hov35 && min35==m && s==1){
        $.ajax({
 	       type:'get',
 	       url:addnumber,
 	       success: function (data) {
            setTimeout(function(){
                  window.location.reload(1);
            }, 5000);
 	       }
 	    });
    }
}
refresh();

  var sessionclear = "{{ url('sessionclear') }}";

function sessionclear(){
    $.ajax({
 	       type:'get',
 	       url:sessionclear,
 	       success: function (data) {

 	       }
 	    });
}

</script>

