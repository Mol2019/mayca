@extends('app.layouts.default',["title" => "Gestion des adhésions"])

@section('content')
 <!-- Data table area Start-->
        <div class="admin-dashone-data-table-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sparkline8-list shadow-reset">
                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">
                                    <h1>Gestion des adhésions</h1>

                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="id">ID</th>
                                                <th data-field="user" data-editable="false">Utilisateur</th>
                                                <th data-field="demande" data-editable="false">Date de demande</th>
                                                <th data-field="paiement" data-editable="false">Date de paiement adhésion</th>
                                                <th data-field="action"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $adhesion)

                                            <tr>
                                                <td>{{ $adhesion->id }}</td>
                                                <td>{{ $adhesion->user->nom ." ". $adhesion->user->prenoms}}</td>
                                                <td>{{ $adhesion->date_debut }}</td>
                                                <td>{{ $adhesion->date_demande }}</td>
                                                <td>
                                                    @if($adhesion->is_new)
                                                        <button id="{{$adhesion->id }}" data-toggle="modal" data-target="#treat" href="#treat"  class="btn btn-success tread_id">Traiter</button>
                                                    @endif
                                                    <button id="{{ $adhesion->id }}" class="btn btn-danger delete_id" data-toggle="modal" data-target="#delete" href="#delete">Supprimer</button>
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
        <div class="modal" id="treat">
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
    </div>
@endsection


@section('mesScripts')
    <script type="text/javascript">
        $(document).ready(function(){
            let adhesion_id = "";
            $('#result-zone').hide();


            //treat or untreat
            $('.tread_id').click(function(e){
                console.log(this.id)
                adhesion_id = this.id;
            });

            $('#treat .ok').click(function(e){
                e.preventDefault();
                $.ajax({
                    url : "/adhesions/treat/"+adhesion_id,
                    type : "GET",
                    success : function()
                    {
                        location.reload()
                    }
                });
            });


            //delete
            $('.delete_id').click(function(e){
                adhesion_id = this.id;
            });

            $('#delete .ok').click(function(e){
                e.preventDefault();
                $.ajax({
                    url : "/adhesions/delete/"+adhesion_id,
                    type : "GET",
                    success : function()
                    {
                        location.reload()
                    }
                });
            });

            //submit form
            $('#add-form').on('submit',function(e){
                e.preventDefault();
                $.ajax({
                    url : "{{ route('master.add') }}",
                    type : "POST",
                    data : $('#add-form').serialize(),
                    success : function(data){
                        if(data.errors){
                            $("#nom-error").text(data.errors[0]);
                            $("#prenoms-error").text(data.errors[1]);
                            $("#contact-error").text(data.errors[2]);
                            $("#password-error").text(data.errors[3]);
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
        })
    </script>
@endsection
