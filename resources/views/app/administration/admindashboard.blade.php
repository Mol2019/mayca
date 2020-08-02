@extends('app.layouts.default',["title" => "Dashboard"])

@section('content')
 <div class="stockprice-feed-project-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="welcome-wrapper shadow-reset res-mg-t mg-b-30">
                        <div class="welcome-adminpro-title">
                            <h1>Bienvenue administrateur</h1>
                            <p>Vous avez {{ $data['adhesionNrCount'] }} nouvelles demandes d'adhésion .</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="income-dashone-total income-monthly shadow-reset nt-mg-b-30 res-mg-t-30">
                        <div class="income-title">
                            <div class="main-income-head">
                                <h2>Bonus administration</h2>
                                <div class="main-income-phara">
                                </div>
                            </div>
                        </div>
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-adminpro-rate">
                                    <h3><span class="counter">{{ $data['bonus'] }}</span></h3>
                                </div>
                                <div class="price-graph">
                                    <span id="sparkline1"></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="income-dashone-total income-monthly shadow-reset nt-mg-b-30 res-mg-t-30">
                        <div class="income-title">
                            <div class="main-income-head">
                                <h2>Utilisateurs</h2>
                                <div class="main-income-phara">
                                </div>
                            </div>
                        </div>
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-adminpro-rate">
                                    <h3><span class="counter">{{ $data['userCount'] }}</span></h3>
                                </div>
                                <div class="price-graph">
                                    <span id="sparkline1"></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="income-dashone-total orders-monthly shadow-reset nt-mg-b-30">
                        <div class="income-title">
                            <div class="main-income-head">
                                <h2>Top masters</h2>
                            </div>
                        </div>
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-adminpro-rate">
                                    <h3><span class="counter">{{ $data['leadersCount'] }}</span></h3>
                                </div>
                                <div class="price-graph">
                                    <span id="sparkline6"></span>
                                </div>
                            </div>

                            <div class="clear"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection



