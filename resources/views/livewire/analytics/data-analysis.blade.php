<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        
        <h2 class="h4">Data Analysis Representation</h2>
    </div>
</div>
<div class="table-settings mb-4">
    <div class="row justify-content-between align-items-center">
        <div class="col-9 col-lg-8 d-md-flex">
            <select class="form-select fmxw-200 d-md-inline" id="change-year" aria-label="Message select example 2">
                @php $years = range(2020, 2040); @endphp
                @foreach($years as $year)
                    <option value="{{ $year }}" @if(Session::get('year') == $year) selected @endif>Year: {{ $year }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="col-12 mb-4">
    <div class="card border-0 shadow" >
        <div class="card-header d-sm-flex flex-row align-items-center flex-0">
            <div class="d-block mb-3 mb-sm-0">
                <div class="fs-5 fw-normal mb-2">Accident Data Analytics</div>
                @php $countAccident = 0; @endphp
                @foreach ($dataAnalysisReport as $dar)
                    @if($dar->type == "Accident")
                        @php $countAccident += 1; @endphp
                    @endif
                @endforeach
                <h2 class="fs-4 fw-extrabold">Reported Accidents: {{ $countAccident }}</h2>
                <div class="small mt-2"> 
                    <span class="fw-normal me-2">Year: {{ Session::get('year') }}</span>                              
                    <span class="fas fa-angle-up text-success"></span>                                   
                    <span class="text-success fw-bold">Line Graph</span>
                </div>
            </div>
            <div class="d-flex ms-auto">
                <a href="#" class="btn btn-secondary btn-sm me-2">Monthly</a>
            </div>
        </div>
        <div class="card-body p-2">
            <div class="ct-chart-accident-value ct-double-octave ct-series-g"></div>
        </div>
    </div>
</div>

<div id="chartContainerAccident" class="card border-0 shadow mb-4 rounded" style="height: 370px; width: 100%;"></div>

<div class="col-12 mb-4">
    <div class="card border-0 shadow" >
        <div class="card-header d-sm-flex flex-row align-items-center flex-0">
            <div class="d-block mb-3 mb-sm-0">
                <div class="fs-5 fw-normal mb-2">Crime Data Analytics</div>
                @php $countAccident = 0; @endphp
                @foreach ($dataAnalysisReport as $dar)
                    @if($dar->type == "Crime/Scandal")
                        @php $countAccident += 1; @endphp
                    @endif
                @endforeach
                <h2 class="fs-4 fw-extrabold">Reported Crimes: {{ $countAccident }}</h2>
                <div class="small mt-2"> 
                    <span class="fw-normal me-2">Year: {{ Session::get('year') }}</span>                              
                    <span class="fas fa-angle-up text-success"></span>                                   
                    <span class="text-success fw-bold">Line Graph</span>
                </div>
            </div>
            <div class="d-flex ms-auto">
                <a href="#" class="btn btn-secondary btn-sm me-2">Monthly</a>
            </div>
        </div>
        <div class="card-body p-2">
            <div class="ct-chart-crime-value ct-double-octave ct-series-g"></div>
        </div>
    </div>
</div>

<div id="chartContainerCrime" class="card border-0 shadow mb-4 rounded" style="height: 370px; width: 100%;"></div>

@if(Auth::user()->type ==1)

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow">
            <div class="card-header border-bottom d-flex align-items-center justify-content-between">
                <h2 class="fs-6 fw-bold mb-0">Top Barangays with highest Accident Rate</h2>
                    <a href="#" class="btn btn-sm btn-primary">Year: {{ Session::get('year') }}</a>
                </div>
            <div class="card-body">
                @foreach ($topBarangays as $tb)
                    @if($tb->type == "Accident")
                        @php $countAccident = 0; @endphp
                        @php $countAccidentTotal = 0; @endphp
                        @php $accidentPercentage = 0; @endphp
                            @foreach ($dataAnalysisReport as $dar)
                                @if($dar->type == "Accident")

                                    @php $countAccidentTotal += 1; @endphp

                                    @if($tb->location == $dar->location)
                                        @php $countAccident += 1; @endphp
                                    @endif

                                    @php $accidentPercentage = ($countAccident / $countAccidentTotal) * 100 @endphp

                                @endif
                            @endforeach

                        <!-- Project 1 -->
                        <div class="row mb-4">
                            <div class="col-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="currentColor" class="bi bi-pin-map-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z"/>
                                    <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"/>
                                </svg>                     
                            </div>
                            <div class="col">
                                <div class="progress-wrapper">
                                    <div class="progress-info">
                                        <div class="h6 mb-0">{{ $tb->Barangay->brgy }}</div>
                                        <div class="small fw-bold text-gray-500"><span>{{ number_format($accidentPercentage, 2) }}%</span></div>
                                    </div>
                                    <div class="progress mb-0">
                                        @if($accidentPercentage <= 10)
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $accidentPercentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $accidentPercentage }}%;"></div>
                                        @endif
                                        @if($accidentPercentage > 10 && $accidentPercentage <= 25)
                                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="{{ $accidentPercentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $accidentPercentage }}%;"></div>
                                        @endif
                                        @if($accidentPercentage > 25 && $accidentPercentage <= 50)
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{ $accidentPercentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $accidentPercentage }}%;"></div>
                                        @endif
                                        @if($accidentPercentage > 50)
                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{ $accidentPercentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $accidentPercentage }}%;"></div>
                                        @endif                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow">
            <div class="card-header border-bottom d-flex align-items-center justify-content-between">
                <h2 class="fs-6 fw-bold mb-0">Top Barangays with highest Crime Rate</h2>
                    <a href="#" class="btn btn-sm btn-primary">Year: {{ Session::get('year') }}</a>
                </div>
            <div class="card-body">
                @foreach ($topBarangays as $tb)
                    @if($tb->type == "Crime/Scandal")
                        @php $countCrime = 0; @endphp
                        @php $countCrimeTotal = 0; @endphp
                        @php $crimePercentage = 0; @endphp
                            @foreach ($dataAnalysisReport as $dar)
                                @if($dar->type == "Crime/Scandal")

                                    @php $countCrimeTotal += 1; @endphp

                                    @if($tb->location == $dar->location)
                                        @php $countCrime += 1; @endphp
                                    @endif

                                    @php $crimePercentage = ($countCrime / $countCrimeTotal) * 100 @endphp

                                @endif
                            @endforeach

                        <!-- Project 1 -->
                        <div class="row mb-4">
                            <div class="col-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="currentColor" class="bi bi-pin-map-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z"/>
                                    <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"/>
                                </svg>                     
                            </div>
                            <div class="col">
                                <div class="progress-wrapper">
                                    <div class="progress-info">
                                        <div class="h6 mb-0">{{ $tb->Barangay->brgy }}</div>
                                        <div class="small fw-bold text-gray-500"><span>{{ number_format($crimePercentage, 2) }}%</span></div>
                                    </div>
                                    <div class="progress mb-0">
                                        @if($crimePercentage <= 10)
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $crimePercentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $crimePercentage }}%;"></div>
                                        @endif
                                        @if($crimePercentage > 10 && $crimePercentage <= 25)
                                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="{{ $crimePercentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $crimePercentage }}%;"></div>
                                        @endif
                                        @if($crimePercentage > 25 && $crimePercentage <= 50)
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{ $crimePercentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $crimePercentage }}%;"></div>
                                        @endif
                                        @if($crimePercentage > 50)
                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{ $crimePercentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $crimePercentage }}%;"></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div id="chartPieAccident" class="card border-0 shadow mb-4 rounded" style="height: 300px; width: 100%;"></div>
    </div>
    <div class="col-md-6">
        <div id="chartPieCrime" class="card border-0 shadow mb-4 rounded" style="height: 300px; width: 100%;"><div>
    </div>
</div>
</div>
@endif

<script>
    //Chartist

    if(d.querySelector('.ct-chart-accident-value')) {
        //Chart 5
          new Chartist.Line('.ct-chart-accident-value', {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
            series: [
                [
                    <?php for($monthLoop = 01; $monthLoop <= 12; $monthLoop++) { ?>
                    <?php $countAccident = 0; ?>
                    <?php     foreach($dataAnalysisReport as $dar) {

                                    if($dar->type == "Accident") {
                                        if(date('m', strtotime($dar->created_at)) == $monthLoop) {
                                            $countAccident += 1;
                                        }
                                    }
                              }
                              ?> <?php echo $countAccident; ?>,
                    <?php } ?>

                ]
            ]
          }, {
            low: 0,
            showArea: true,
            fullWidth: false,
            fullHeight: true,
            plugins: [
              Chartist.plugins.tooltip()
            ],
            axisX: {
                // On the x-axis start means top and end means bottom
                position: 'end',
                showGrid: true
            },
            axisY: {
                // On the y-axis start means left and end means right
                showGrid: false,
                showLabel: false,
                labelInterpolationFnc: function(value) {
                    return '$' + (value / 1) + 'k';
                }
            }
        });
    }

    if(d.querySelector('.ct-chart-crime-value')) {
        //Chart 5
          new Chartist.Line('.ct-chart-crime-value', {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
            series: [
                [
                    <?php for($monthLoop = 01; $monthLoop <= 12; $monthLoop++) { ?>
                    <?php $countCrime = 0; ?>
                    <?php     foreach($dataAnalysisReport as $dar) {

                                    if($dar->type == "Crime/Scandal") {
                                        if(date('m', strtotime($dar->created_at)) == $monthLoop) {
                                            $countCrime += 1;
                                        }
                                    }
                              }
                              ?> <?php echo $countCrime; ?>,
                    <?php } ?>

                ]
            ]
          }, {
            low: 0,
            showArea: true,
            fullWidth: false,
            fullHeight: true,
            plugins: [
              Chartist.plugins.tooltip()
            ],
            axisX: {
                // On the x-axis start means top and end means bottom
                position: 'end',
                showGrid: true
            },
            axisY: {
                // On the y-axis start means left and end means right
                showGrid: false,
                showLabel: false,
                labelInterpolationFnc: function(value) {
                    return '$' + (value / 1) + 'k';
                }
            }
        });
    }
</script>

<script>

window.onload = function () {

    var chartCrime = new CanvasJS.Chart("chartContainerCrime", {
        animationEnabled: true,
        title: {
            text: "Crimes",
            fontFamily: "tahoma",
            fontSize: 23,
            fontWeight: "bold"
        },
        axisX: {
            interval: 1
        },
        axisY: {
            title: "Year <?php echo Session::get('year'); ?>",
            titleFontFamily: "tahoma",
            titleFontSize: 15,
            interlacedColor: "#F8F1E4",
            tickLength: 10,
            includeZero: true,
        },
        data: [{
            type: "bar",
            dataPoints: [
                <?php foreach($type as $ty) {
                        if($ty->type == 2) {
                            $countCrime = 0;
                            foreach($dataAnalysisReport as $dar) {
                                if($ty->id == $dar->subtype) {
                                    $countCrime += 1;
                                }
                             } ?>
                            { label: "<?php echo $ty->subtype ?>", y: <?php echo $countCrime; ?> },
                <?php
                        } 
                    } ?>
            ]
        }]
    });
    
var chartAccident = new CanvasJS.Chart("chartContainerAccident", {
	animationEnabled: true,
	title: {
        text: "Accidents",
        fontFamily: "tahoma",
        fontSize: 23,
        fontWeight: "bold"
    },
    axisX: {
        interval: 1
    },
    axisY: {
        title: "Year <?php echo Session::get('year'); ?>",
        titleFontFamily: "tahoma",
        titleFontSize: 15,
        interlacedColor: "#F8F1E4",
        tickLength: 10,
        includeZero: true,
    },
	data: [{
		type: "bar",
		dataPoints: [
            <?php foreach($type as $ty) {
                    if($ty->type == 1) {
                        $countAccident = 0;
                        foreach($dataAnalysisReport as $dar) {
                            if($ty->id == $dar->subtype) {
                                $countAccident += 1;
                            }
                         } ?>
			            { label: "<?php echo $ty->subtype ?>", y: <?php echo $countAccident; ?> },
            <?php
                    } 
                } ?>
		]
	}]
});

var chartPieAccident = new CanvasJS.Chart("chartPieAccident",
	{
		theme: "light",
		title:{
			text: "Top Barangays with highest Accident Rate <?php echo Session::get('year'); ?>",
            fontFamily: "tahoma",
            fontSize: 14,
            fontWeight: "bold"
		},		
        legend: {
			maxWidth: 350,
			itemWidth: 120
		},
		data: [
		{       
			type: "pie",
			showInLegend: true,
			toolTipContent: "{y} - #percent %",
			legendText: "{indexLabel}",
			dataPoints: [
                <?php foreach ($topBarangays as $tb) { 
                        if($tb->type == "Accident") {
                            $countAccident = 0;
                            foreach($dataAnalysisReport as $dar) {
                                if($dar->type == "Accident") {
                                    if($tb->location == $dar->location) {
                                       $countAccident += 1; 
                                    }
                                }
                            }
                            ?>
				    {  y: <?php echo $countAccident; ?>, indexLabel: "<?php echo $tb->Barangay->brgy; ?>" },
                
                    <?php }
                        } ?>
			]
		}
		]
	});

    var chartPieCrime = new CanvasJS.Chart("chartPieCrime",
	{
		theme: "light",
		title:{
			text: "Top Barangays with highest Crime Rate <?php echo Session::get('year'); ?>",
            fontFamily: "tahoma",
            fontSize: 14,
            fontWeight: "bold"
		},	
        legend: {
			maxWidth: 350,
			itemWidth: 120
		},	
		data: [
		{       
			type: "pie",
			showInLegend: true,
			toolTipContent: "{y} - #percent %",
			legendText: "{indexLabel}",
			dataPoints: [
                <?php foreach ($topBarangays as $tb) { 
                        if($tb->type == "Crime/Scandal") {
                            $countCrime = 0;
                            foreach($dataAnalysisReport as $dar) {
                                if($dar->type == "Crime/Scandal") {
                                    if($tb->location == $dar->location) {
                                       $countCrime += 1; 
                                    }
                                }
                            }
                            ?>
				    {  y: <?php echo $countCrime; ?>, indexLabel: "<?php echo $tb->Barangay->brgy; ?>" },
                
                    <?php }
                        } ?>
			]
		}
		]
	});

chartAccident.render();
chartCrime.render();
chartPieAccident.render();
chartPieCrime.render();

}
</script>