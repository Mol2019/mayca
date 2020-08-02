@extends('app.layouts.default',["title" => "Gestion des dons"])

@section('content')
    <!-- Data table area Start-->
        <div class="admin-dashone-data-table-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sparkline8-list shadow-reset">
                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">
                                    <h1>Gestion des dons</h1>
                                    <div class="sparkline8-outline-icon">
                                        @if(! Auth::user()->is_locked)
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#form" href="#form" class="btn btn-primary">Faire un don</button>
                                        @else
                                            <a href="{{ route('adhesion.ask',Auth::user()->id) }}" class="btn btn-success">Faire votre abonnement</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="montant" data-editable="true">Montant</th>
                                                <th data-field="make">Fait le </th>
                                                <th data-field="action"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $don)
                                                <tr>
                                                    <td></td>
                                                    <td>{{ $don->pack->montant }}</td>
                                                    <td>{{ $don->created_at }}</td>
                                                    <td>
                                                         <button id="{{ $don    ->id }}" class="btn btn-info edit_id" data-toggle="modal" data-target="#edit">Modifier</button>
                                                        <button id="{{ $don ->id }}" class="btn btn-danger delete_id" data-toggle="modal" data-target="#delete" href="#delete">Supprimer</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Data table area End-->

        <!-- Data table area Start-->
        <div class="admin-dashone-data-table-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sparkline8-list shadow-reset">
                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">
                                    <h1>Mes fusions</h1>
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="email" data-editable="true">Statut</th>
                                                <th data-field="montant" data-editable="true">Montant</th>
                                                <th data-field="make">Fait le </th>
                                                <th data-field="sendto">Envoyé à </th>
                                                <th data-field="reference">Réfrérence</th>
                                                <th data-field="action"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <!-- <tr>
                                                <td></td>
                                                <td>
                                                    Fusionné à envoyer
                                                </td>
                                                <td>50000</td>
                                                <td>17/07/2020</td>
                                                <td>MOLOU Kouassi</td>
                                                <td>MP15451215454684781SDSDS</td>
                                                <td>
                                                    <button class="btn btn-info">Modifier</button>
                                                    <button class="btn btn-danger">Supprimer</button>
                                                </td>
                                            </tr>-->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Data table area End-->
         <!-- Data table area End-->
        <div class="modal" id="lock">
             <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header flex-column">
                        <h4 class="modal-title w-100">Etes vous sure?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Voulez vous réelement effectuer cette action ? </p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-danger ok">Valider</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="delete">
             <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header flex-column">
                        <h4 class="modal-title w-100">Etes vous sure?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Voulez vous réelement supprimer cet utilisateur ? </p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-danger ok">Valider</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Data table area End-->
        <div class="modal" id="edit">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <form action="" method="post" id="update-form">
        <div class="modal-header flex-column text-center bg-primary">
            <h4 class="modal-title w-100">Modifier votre don</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
                 @csrf
                  <div class="form-group">
                    <label for="pack">Choisir un pack : </label>
                    <select name="pack" id="pack" class="form-control">
                        <option value="">Prendre un pack</option>
                        @foreach($data->packs as $pack)
                            <option value="{{ $pack->id }}">{{ $pack->titre ."-".$pack->montant }}</option>
                        @endforeach
                    </select>
                <span class="text-danger" id="pack-error"> </span>
                </div>

                <input type="hidden" name="hidden_id" id="hidden_id" >
         </div>
        <div class="modal-footer justify-content-center">
            <button type="reset" class="btn btn-default btn-reset" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">Valider</button>
        </div>
    </form>
                </div>
            </div>
        </div>
@endsection
@section('form-modal')
    <form action="{{ route('don.add') }}" method="post" id="add-form">
        <div class="modal-header flex-column text-center bg-primary">
            <h4 class="modal-title w-100">Ajouter un nouveau don</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
            @csrf
            <div class="form-group">
                <label for="pack">Choisir un pack : </label>
                <select name="pack" id="pack" class="form-control">
                    <option value="">Prendre un pack</option>
                    @foreach($data->packs as $pack)
                        <option value="{{ $pack->id }}">{{ $pack->titre ."-".$pack->montant }}</option>
                    @endforeach
                </select>
                <span class="text-danger" id="pack-error"> </span>
            </div>
        </div>
        <div class="modal-footer justify-content-center">
            <button type="reset" class="btn btn-default btn-reset" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">Valider</button>
        </div>
    </form>
@endsection
@section('mesScripts')
    <script type="text/javascript">
        $(document).ready(function(){
            let user_id = "";
            $('#result-zone').hide();

            $('.btn-reset').click(function(e){
                e.preventDefault();
                $("#pack-error").text("");
                $("#form").hide();
                });

            //delete
            $('.delete_id').click(function(e){
                don_id = this.id;
            });

            $('#delete .ok').click(function(e){
                e.preventDefault();
                $.ajax({
                    url : "/dons/delete/"+don_id,
                    type : "GET",
                    success : function()
                    {
                        location.reload()
                    }
                });
            });

             //edit or unedit
            $('.edit_id').click(function(e){
                e.preventDefault();
                don_id = this.id;
                $.ajax({
                    url : "/dons/edit/"+don_id,
                    type : "GET",
                    success : function(data)
                    {
                        console.log(data)
                        $("#edit #pack").val(data.data.pack);
                        $("#edit #hidden_id").val(data.data.id);
                    }
                });
            });

            //submit form
            $('#add-form').on('submit',function(e){
                e.preventDefault();
                $.ajax({
                    url : "{{ route('don.add') }}",
                    type : "POST",
                    data : $('#add-form').serialize(),
                    success : function(data){
                        if(data.errors){
                            $("#pack-error").text(data.errors[0]);
                        }
                        if(data.error){
                            $('#result-zone').show();
                            $('error-disp strong').text(data.error);
                            $('success-disp').hide();

                        }
                        if(data.success)
                        {
                            $('error-disp').hide();
                            $("#nom-error").text("");
                            $("#prenoms-error").text("");
                            $("#contact-error").text("");
                            $("#password-error").text("");
                            $("#form").modal("hide");
                            $('error-disp strong').text("");
                            $('#result-zone').show();

                            $('success-disp strong').text(data.success);


                           setTimeout(function(){

                                $('#result-zone').hide();
                                $('success-disp strong').text("");
                                $('error-disp strong').text("");
                                location.reload();
                            }, 3000);
                        }
                    }
                })
            });

             //submit form
            $('#update-form').on('submit',function(e){
                e.preventDefault();
                $.ajax({
                    url : "{{ route('don.update') }}",
                    type : "POST",
                    data : $('#update-form').serialize(),
                    success : function(data){
                        if(data.errors){
                            $("#edit #pack-error").text(data.errors[0]);
                        }
                        if(data.error){
                            $('#result-zone').show();
                            $('error-disp strong').text(data.error);
                            $('success-disp').hide();

                        }
                        if(data.success)
                        {
                            $('error-disp').hide();
                            $("#edit #pack-error").text("");
                             $("#form").modal("hide");
                            $('error-disp strong').text("");
                            $('#result-zone').show();

                            $('success-disp strong').text(data.success);


                           setTimeout(function(){

                                $('#result-zone').hide();
                                $('success-disp strong').text("");
                                $('error-disp strong').text("");
                                location.reload();
                            }, 3000);
                        }
                    }
                })
            });
        })
    </script>
@endsection
