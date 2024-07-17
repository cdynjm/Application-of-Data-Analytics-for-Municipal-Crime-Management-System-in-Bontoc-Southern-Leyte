<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

<div class="table-settings mb-4 mt-4">
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
@if(Auth::user()->type == 1)
<div class="col-12 mb-4">
    <div class="card border-0 shadow" >
        <div class="card-header d-sm-flex flex-row align-items-center flex-0">
            <div class="d-block mb-3 mb-sm-0">
                <div class="fs-6 fw-normal mb-2">Your Municipality Data Summary</div>
                <h2 class="fs-4 fw-extrabold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="currentColor" class="bi bi-pin-map-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z"/>
                        <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"/>
                    </svg>     
                   {{ 'Bontoc' }}
                </h2>
                <div class="small mt-2"> 
                    <span class="fw-normal me-2">Province of Southern Leyte</span>                              
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(Auth::user()->type == 2 || Auth::user()->type == 3)
<div class="col-12 mb-4">
    <div class="card border-0 shadow" >
        <div class="card-header d-sm-flex flex-row align-items-center flex-0">
            <div class="d-block mb-3 mb-sm-0">
                <div class="fs-6 fw-normal mb-2">Your Barangay Data Summary</div>
                <h2 class="fs-4 fw-extrabold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="currentColor" class="bi bi-pin-map-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z"/>
                        <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"/>
                    </svg>     
                   {{ Auth::user()->Barangay->brgy }}
                </h2>
                <div class="small mt-2"> 
                    <span class="fw-normal me-2">Bontoc, Southern Leyte</span>                              
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<div class="row">
    @if(Auth::user()->type == 1)
    <div class="col-12 col-sm-6 col-xl-3 mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row d-block d-xl-flex align-items-center">
                    <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                        <div class="icon-shape icon-shape-info rounded me-4 me-sm-0">
                            <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
                        </div>
                        <div class="d-sm-none">
                            <h2 class="h5">Barangay</h2>
                            <h3 class="fw-extrabold mb-1">{{ $countBarangay }}</h3>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 px-xl-0">
                        <div class="d-none d-sm-block">
                            <h2 class="h6 text-gray-400 mb-0">Barangay</h2>
                            <h3 class="fw-extrabold mb-2">{{ $countBarangay }}</h3>
                        </div>
                        <small class="d-flex align-items-center text-gray-500">
                            Total Accounts
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if(Auth::user()->type == 2)
    <div class="col-12 col-sm-6 col-xl-3 mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row d-block d-xl-flex align-items-center">
                    <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                        <div class="icon-shape icon-shape-info rounded me-4 me-sm-0">
                            <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
                        </div>
                        <div class="d-sm-none">
                            <h2 class="h5">Users</h2>
                            <h3 class="fw-extrabold mb-1">{{ $countUser }}</h3>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 px-xl-0">
                        <div class="d-none d-sm-block">
                            <h2 class="h6 text-gray-400 mb-0">Users</h2>
                            <h3 class="fw-extrabold mb-2">{{ $countUser }}</h3>
                        </div>
                        <small class="d-flex align-items-center text-gray-500">
                            Total Accounts
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="col-12 col-sm-6 @if(Auth::user()->type == 1 || Auth::user()->type == 2) col-xl-3 @endif @if(Auth::user()->type == 3) col-xl-4 @endif mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row d-block d-xl-flex align-items-center">
                    <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                        <div class="icon-shape icon-shape-danger rounded me-4 me-sm-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-radioactive" viewBox="0 0 16 16">
                                <path d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1ZM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8Z"/>
                                <path d="M9.653 5.496A2.986 2.986 0 0 0 8 5c-.61 0-1.179.183-1.653.496L4.694 2.992A5.972 5.972 0 0 1 8 2c1.222 0 2.358.365 3.306.992L9.653 5.496Zm1.342 2.324a2.986 2.986 0 0 1-.884 2.312 3.01 3.01 0 0 1-.769.552l1.342 2.683c.57-.286 1.09-.66 1.538-1.103a5.986 5.986 0 0 0 1.767-4.624l-2.994.18Zm-5.679 5.548 1.342-2.684A3 3 0 0 1 5.005 7.82l-2.994-.18a6 6 0 0 0 3.306 5.728ZM10 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                            </svg>                        
                        </div>
                        <div class="d-sm-none">
                            <h2 class="fw-extrabold h5">Emergency</h2>
                            <h3 class="mb-1">{{ $countEmergency }}</h3>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 px-xl-0">
                        <div class="d-none d-sm-block">
                            <h2 class="h6 text-gray-400 mb-0">Emergency</h2>
                            <h3 class="fw-extrabold mb-2">{{ $countEmergency }}</h3>
                        </div>
                        <small class="d-flex align-items-center text-gray-500">
                            Emergency Alert
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 @if(Auth::user()->type == 1 || Auth::user()->type == 2) col-xl-3 @endif @if(Auth::user()->type == 3) col-xl-4 @endif  mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row d-block d-xl-flex align-items-center">
                    <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                        <div class="icon-shape icon-shape-success rounded me-4 me-sm-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-shield-fill-exclamation" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm-.55 8.502L7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0zM8.002 12a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                            </svg>                        
                        </div>
                        <div class="d-sm-none">
                            <h2 class="fw-extrabold h5"> Accidents</h2>
                            <h3 class="mb-1">{{ $countAccident }}</h3>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 px-xl-0">
                        <div class="d-none d-sm-block">
                            <h2 class="h6 text-gray-400 mb-0"> Accidents</h2>
                            <h3 class="fw-extrabold mb-2">{{ $countAccident }}</h3>
                        </div>
                        <small class="text-gray-500">
                            Total Count
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 @if(Auth::user()->type == 1 || Auth::user()->type == 2) col-xl-3 @endif @if(Auth::user()->type == 3) col-xl-4 @endif  mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row d-block d-xl-flex align-items-center">
                    <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                        <div class="icon-shape icon-shape-warning rounded me-4 me-sm-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>                        
                        </div>
                        <div class="d-sm-none">
                            <h2 class="fw-extrabold h5"> Crimes</h2>
                            <h3 class="mb-1">{{ $countCrime }}</h3>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 px-xl-0">
                        <div class="d-none d-sm-block">
                            <h2 class="h6 text-gray-400 mb-0"> Crimes</h2>
                            <h3 class="fw-extrabold mb-2">{{ $countCrime }}</h3>
                        </div>
                        <small class="text-gray-500">
                            Total Count
                        </small>
                    </div>
                </div>
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
</div>

<div class="row">
    <div class="col-md-6">
        <div id="chartContainerAccident" class="card border-0 shadow mb-4 rounded" style="height: 370px; width: 100%;"></div>
    </div>
    <div class="col-md-6">
        <div id="chartContainerCrime" class="card border-0 shadow mb-4 rounded" style="height: 370px; width: 100%;"></div>
    </div>
</div>

@if(Auth::user()->type == 1 || Auth::user()->type == 2)
<div class="card card-body shadow border-0 table-wrapper table-responsive mb-4">
    <h6 class="text-secondary"><span class="me-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-flag-fill" viewBox="0 0 16 16">
  <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001"/>
</svg></span> Recent Reports</h6>
<table class="table table-centered table-nowrap mb-0 rounded mt-4">
        <thead class="thead-light">
            <tr>
                <th class="border-bottom">No.</th>
                <th class="border-bottom">Photo</th>
                <th class="border-bottom">Reporter</th>
                <th class="border-bottom">Description</th>
                <th class="border-bottom">Type</th>
                <th class="border-bottom">Location/Barangay</th>
                <th class="border-bottom">Date & Time</th>
                <th class="border-bottom">Status</th>
            </tr>
        </thead>
        <tbody>
            @php $cnt = 1; @endphp
            @php $limit = 0; @endphp
            @foreach ($reports as $rep)

                <!-- The Modal -->
                <div class="modal fade" id="view-photo-modal-{{ $rep->id }}" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Photo Evidence</h5>
                                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">  
                                <img src="{{ asset("storage/files/".$rep->photo) }}" alt="" id="view-photo" class="rounded" style="width: auto; height: auto;">
                            </div>
                        </div>
                    </div>
                </div> 
            <tr>

                <td photoid='{{ $rep->id }}' hidden></td>
                <td reportid='{{ $rep->id }}' hidden></td>
                <td>
                   {{ $cnt }}
                </td>
                <td>
                   <button class="btn p-0" id="view-photo">
                        <img src="{{ asset("storage/files/".$rep->photo) }}" alt="" id="view-photo" style=" border-radius: 5px; width: 30px; height: 30px;">
                    </button>
                </td>
                <td><span class="fw-normal text-wrap">{{ $rep->User->last_name }} {{ $rep->User->first_name }}</span></td>
                <td><span class="fw-normal text-wrap">{{ $rep->description }}</span></td>
                <td><span class="fw-normal text-wrap">{{ $rep->type }} ({{ $rep->Type->subtype }})</span></td>
                <td><span class="fw-normal text-wrap d-flex align-items-center">{{ $rep->Barangay->brgy }} ({{ $rep->zone }})</span></td>
                <td>
                    <span class="fw-normal text-wrap">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-danger me-1" width="16" height="16" fill="currentColor" class="bi bi-exclamation-diamond-fill" viewBox="0 0 16 16">
                            <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098L9.05.435zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        {{ date('M d, Y - h:i A', strtotime($rep->created_at)) }}
                    </span>
                    <br>
                    @if($rep->status == 0)
                    <span class="fw-normal text-wrap">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-success me-1" width="16" height="16" fill="currentColor" class="bi bi-shield-fill-check" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm2.146 5.146a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647z"/>
                        </svg>
                        {{ date('M d, Y - h:i A', strtotime($rep->updated_at)) }}
                    </span>
                    @endif
                </td>
                
                <td>
                   @if($rep->status == 0)<span class="fw-bolder text-success text-wrap">Responded</span>@endif
                   @if($rep->status == 1)<span class="fw-bolder text-danger text-wrap">Reported (Barangay)</span>@endif
                   @if($rep->status == 2)<span class="fw-bolder text-danger text-wrap">Reported (Police)</span>@endif
                </td>
            </tr>
            @php $cnt += 1; @endphp
            @php $limit += 1; @endphp

            @if($limit > 4) @break @endif

            @endforeach
        </tbody>
    </table>
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

chartAccident.render();
chartCrime.render();

}
</script>