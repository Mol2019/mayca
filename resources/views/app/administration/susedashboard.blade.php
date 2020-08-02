@extends('app.layouts.default',["title" => "Dashboard"])

@section('content')
 <div class="stockprice-feed-project-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                    <div class="welcome-wrapper shadow-reset res-mg-t mg-b-30">
                        <div class="welcome-adminpro-title">
                            <h1>Bienvenue utilisateur ID: {{ Auth::user()->id }}</h1>
                            <p>Vous avez {{ $data['rsdCount'] }} nouveaux rsd en attente.</p>
                        </div>

                    </div>
                </div>
                 <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                    <div class="welcome-wrapper shadow-reset res-mg-t mg-b-30">
                        <div class="welcome-adminpro-title">
                            <p>Vous avez {{ $data['fusionCount'] }} nouvelles fusions en attente.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



