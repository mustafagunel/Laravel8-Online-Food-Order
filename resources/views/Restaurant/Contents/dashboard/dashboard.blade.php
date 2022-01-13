<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Kazanç (Ay)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">₺{{ $sales[0]->last_month }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-lira-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Kazanç (Yıl)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">₺{{ $sales[1]->last_year }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-lira-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
</div>

<!-- Content Row -->

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Gelir Grafiği</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>


    <div class="d-none">
        <div id="ocak">@if ($sales[2]['ocak']==NULL) 0 @else {{ $sales[2]['ocak'] }}  @endif</div>
        <div id="subat">@if ($sales[2]['subat']==NULL) 0 @else {{ $sales[2]['subat'] }}  @endif</div>
        <div id="mart">@if ($sales[2]['mart']==NULL) 0 @else {{ $sales[2]['mart'] }}  @endif</div>
        <div id="nisan">@if ($sales[2]['nisan']==NULL) 0 @else {{ $sales[2]['nisan'] }}  @endif</div>
        <div id="mayis">@if ($sales[2]['mayis']==NULL) 0 @else {{ $sales[2]['mayis'] }}  @endif</div>
        <div id="haziran">@if ($sales[2]['haziran']==NULL) 0 @else {{ $sales[2]['haziran'] }}  @endif</div>
        <div id="temmuz">@if ($sales[2]['temmuz']==NULL) 0 @else {{ $sales[2]['temmuz'] }}  @endif</div>
        <div id="agustos">@if ($sales[2]['agustos']==NULL) 0 @else {{ $sales[2]['agustos'] }}  @endif</div>
        <div id="eylul">@if ($sales[2]['eylul']==NULL) 0 @else {{ $sales[2]['eylul'] }}  @endif</div>
        <div id="ekim">@if ($sales[2]['ekim']==NULL) 0 @else {{ $sales[2]['ekim'] }}  @endif</div>
        <div id="kasim">@if ($sales[2]['kasim']==NULL) 0 @else {{ $sales[2]['kasim'] }}  @endif</div>
        <div id="aralik">@if ($sales[2]['aralik']==NULL) 0 @else {{ $sales[2]['aralik'] }}  @endif</div>
    </div>