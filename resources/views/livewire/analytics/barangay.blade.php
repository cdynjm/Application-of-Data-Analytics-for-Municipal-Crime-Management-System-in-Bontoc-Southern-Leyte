<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        
        <h2 class="h4">Barangay Analytics</h2>
    </div>
</div>
@if(Auth::user()->type == 1)
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
@endif

<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-centered table-nowrap mb-0 rounded">
                <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start">No.</th>
                        <th class="border-0">Barangay</th>
                        <th class="border-0">No. of Accidents</th>
                        <th class="border-0">Accident Rate</th>
                        <th class="border-0">No. of Crimes</th>
                        <th class="border-0">Crime Rate</th>
                        <th class="border-0 rounded-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $cnt = 1; @endphp
                    @foreach ($barangayAnalytics as $ba)
                    <!-- Item -->
                    <tr>
                        <td><a href="#" class="text-primary fw-bold">{{ $cnt; }}</a> </td>
                        <td class="fw-bold d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="currentColor" class="bi bi-pin-map-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z"/>
                                <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"/>
                            </svg>                            
                        {{ $ba->brgy }}
                        </td>
                        <td class="text-center">
                            @php $countReport = 0; @endphp
                            @foreach ($reportCount as $rc)
                                @if($rc->type == "Accident")
                                    @if($rc->location == $ba->id)
                                        @php $countReport += 1; @endphp
                                    @endif
                                @endif
                            @endforeach
                            {{ $countReport }}
                        </td>
                        <td>
                        @php $countAccident = 0; @endphp
                        @php $countAccidentTotal = 0; @endphp
                        @php $accidentPercentage = 0; @endphp
                            @foreach ($reportCount as $rc)
                                @if($rc->type == "Accident")

                                    @php $countAccidentTotal += 1; @endphp

                                    @if($rc->location == $ba->id)
                                        @php $countAccident += 1; @endphp
                                    @endif

                                    @php $accidentPercentage = ($countAccident / $countAccidentTotal) * 100 @endphp

                                @endif
                            @endforeach

                            @if($accidentPercentage <= 10)
                                <div class="d-flex align-items-center text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="currentColor" class="bi bi-graph-down-arrow" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 11.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 0-1 0v2.6l-3.613-4.417a.5.5 0 0 0-.74-.037L7.06 8.233 3.404 3.206a.5.5 0 0 0-.808.588l4 5.5a.5.5 0 0 0 .758.06l2.609-2.61L13.445 11H10.5a.5.5 0 0 0-.5.5Z"/>
                                </svg>                            
                            @endif
                            @if($accidentPercentage > 10 && $accidentPercentage <= 25)
                                <div class="d-flex align-items-center text-info">
                                <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="currentColor" class="bi bi-graph-down-arrow" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 11.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 0-1 0v2.6l-3.613-4.417a.5.5 0 0 0-.74-.037L7.06 8.233 3.404 3.206a.5.5 0 0 0-.808.588l4 5.5a.5.5 0 0 0 .758.06l2.609-2.61L13.445 11H10.5a.5.5 0 0 0-.5.5Z"/>
                                </svg>                            
                            @endif
                            @if($accidentPercentage > 25 && $accidentPercentage <= 50)
                                <div class="d-flex align-items-center text-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-up" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5zm-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z"/>
                                </svg>                          
                            @endif
                            @if($accidentPercentage > 50)
                                <div class="d-flex align-items-center text-danger fw-bolder">
                                <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="currentColor" class="bi bi-graph-up-arrow" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z"/>
                                </svg>                         
                            @endif
                                <span class="fw-bold">{{ number_format($accidentPercentage, 1) }}%</span>
                            </div>
                        </td>
                        <td class="text-center">
                            @php $countReport = 0; @endphp
                            @foreach ($reportCount as $rc)
                                @if($rc->type == "Crime/Scandal")
                                    @if($rc->location == $ba->id)
                                        @php $countReport += 1; @endphp
                                    @endif
                                @endif
                            @endforeach
                            {{ $countReport }}
                        </td>
                        <td>
                        @php $countCrime = 0; @endphp
                        @php $countCrimeTotal = 0; @endphp
                        @php $crimePercentage = 0; @endphp
                            @foreach ($reportCount as $rc)
                                @if($rc->type == "Crime/Scandal")

                                    @php $countCrimeTotal += 1; @endphp

                                    @if($rc->location == $ba->id)
                                        @php $countCrime += 1; @endphp
                                    @endif

                                    @php $crimePercentage = ($countCrime / $countCrimeTotal) * 100 @endphp

                                @endif
                            @endforeach

                            @if($crimePercentage <= 10)
                                <div class="d-flex align-items-center text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="currentColor" class="bi bi-graph-down-arrow" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 11.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 0-1 0v2.6l-3.613-4.417a.5.5 0 0 0-.74-.037L7.06 8.233 3.404 3.206a.5.5 0 0 0-.808.588l4 5.5a.5.5 0 0 0 .758.06l2.609-2.61L13.445 11H10.5a.5.5 0 0 0-.5.5Z"/>
                                </svg>                            
                            @endif
                            @if($crimePercentage > 10 && $crimePercentage <= 25)
                                <div class="d-flex align-items-center text-info">
                                <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="currentColor" class="bi bi-graph-down-arrow" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 11.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 0-1 0v2.6l-3.613-4.417a.5.5 0 0 0-.74-.037L7.06 8.233 3.404 3.206a.5.5 0 0 0-.808.588l4 5.5a.5.5 0 0 0 .758.06l2.609-2.61L13.445 11H10.5a.5.5 0 0 0-.5.5Z"/>
                                </svg>                            
                            @endif
                            @if($crimePercentage > 25 && $crimePercentage <= 50)
                                <div class="d-flex align-items-center text-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-up" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5zm-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z"/>
                                </svg>                          
                            @endif
                            @if($crimePercentage > 50)
                                <div class="d-flex align-items-center text-danger fw-bolder">
                                <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="currentColor" class="bi bi-graph-up-arrow" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z"/>
                                </svg>                         
                            @endif
                                <span class="fw-bold">{{ number_format($crimePercentage, 1) }}%</span>
                            </div>
                        </td>
                        <td>
                            <a class="d-flex align-items-center text-info" href="{{ url('barangay-profile/'.$ba->id) }}" id="" title="View">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                    <!-- End of Item -->
                    @php $cnt += 1; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@if(Auth::user()->type == 1)

<div class="row">
    @for($loop = 1; $loop <= 8; $loop++)
    <div class="col-12 col-xl-6">
        <div class="col-12 px-0 mb-4">
            <div class="card border-0 shadow">
                <div class="card-header d-flex flex-row align-items-center flex-0 border-bottom">
                    <div class="d-block">
                        <div class="h6 fw-normal text-gray mb-2">Chart Representation</div>
                        <h2 class="h3 fw-extrabold">Cluster {{ $loop }}</h2>
                        <div class="small mt-2">                               
                            <span class="fas fa-angle-up text-success"></span>                                   
                            <span class="text-success fw-bold">Column Graph</span>
                        </div>
                    </div>
                    <div class="d-block ms-auto">
                        <div class="d-flex align-items-center text-end mb-2">
                            <span class="dot rounded-circle bg-gray-800 me-2"></span>
                            <span class="fw-normal small">No. of Accident</span>
                        </div>
                        <div class="d-flex align-items-center text-end">
                            <span class="dot rounded-circle bg-secondary me-2"></span>
                            <span class="fw-normal small">No. of Crime</span>
                        </div>
                    </div>
                </div>
                <div class="card-body p-2">
                    <div class="ct-chart-group-{{ $loop }} ct-golden-section ct-series-a"></div>
                </div>
            </div>
        </div>
    </div>
    @endfor
</div>

@php $counterCondition = 0; @endphp

@for($chartLoop = 1; $chartLoop <= 8; $chartLoop++)

<script>
    if(d.querySelector('.ct-chart-group-<?php echo $chartLoop; ?>')) {
        var chart = new Chartist.Bar('.ct-chart-group-<?php echo $chartLoop; ?>', {
                
            labels: [
                <?php 
                    $limit = 0;
                    $counter = 0;
                    foreach($barangayAnalytics as $ba) {
                        if($limit < 5) {
                            if($counter >= $counterCondition) {
                    ?>
                    '<?php echo $ba->brgy; ?>',
                <?php $limit += 1; } } 
            
                    else {
                        break;
                    }
                    $counter += 1;
                    } ?>
            ],
            series: [
              [
                <?php 
                    $limit = 0;
                    $counter = 0;
                    foreach($barangayAnalytics as $ba) {
                        $countAccidentBar = 0;
                        if($limit < 5) {
                            if($counter >= $counterCondition) {
                                foreach($reportCount as $rc) {
                                    if($rc->type == "Accident") {
                                        if($rc->location == $ba->id) {
                        ?>
                                            <?php $countAccidentBar += 1; ?>
                        <?php           
                                        }
                                    }
                                } 
                                $limit += 1; ?>
                                <?php echo $countAccidentBar; ?>,
                        <?php } ?>  
                    <?php
                        } 
                        else {
                            break;
                        }
                        $counter += 1;
                    } ?>
              ],
              [
                <?php 
                    $limit = 0;
                    $counter = 0;
                    foreach($barangayAnalytics as $ba) {
                        $countCrimeBar = 0;
                        if($limit < 5) {
                            if($counter >= $counterCondition) {
                                foreach($reportCount as $rc) {
                                    if($rc->type == "Crime/Scandal") {
                                        if($rc->location == $ba->id) {
                        ?>
                                            <?php $countCrimeBar += 1; ?>
                        <?php           
                                        }
                                    }
                                } 
                                $limit += 1; ?>
                                <?php echo $countCrimeBar; ?>,
                        <?php } ?>
                    <?php
                        } 
                        else {
                            break;
                        }
                        $counter += 1;
                    } ?>
              ],
            ]
          }, {
            low: 0,
            showArea: true,
            plugins: [
              Chartist.plugins.tooltip()
            ],
            axisX: {
                // On the x-axis start means top and end means bottom
                position: 'end'
            },
            axisY: {
                // On the y-axis start means left and end means right
                showGrid: false,
                showLabel: false,
                offset: 0
            }
            });
          
          chart.on('draw', function(data) {
            if(data.type === 'line' || data.type === 'area') {
              data.element.animate({
                d: {
                  begin: 2000 * data.index,
                  dur: 2000,
                  from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                  to: data.path.clone().stringify(),
                  easing: Chartist.Svg.Easing.easeOutQuint
                }
              });
            }
        });
    }
    
</script>

@php $counterCondition += 5; @endphp

@endfor

@endif