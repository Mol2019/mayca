@extends('app.layouts.default',["title" => "Gestion des rsds"])

@section('content')
    <!-- Data table area Start-->
        <div class="admin-dashone-data-table-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sparkline8-list shadow-reset">
                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">
                                    <h1>Retour sur dons en attente</h1>
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="id">ID</th>
                                                <th data-field="receieveFrom" data-editable="true">Reçu de</th>
                                                <th data-field="montant" data-editable="true">Montant</th>
                                                <th data-field="make">Fait le </th>
                                                <th data-field="reference">Réfrérence</th>
                                                <th data-field="action"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <!--<tr>
                                                <td></td>
                                                <td>1</td>
                                                <td>
                                                    Bosson Armel
                                                </td>
                                                <td>50000</td>
                                                <td>17/07/2020</td>
                                                <td>MP15451215454684781SDSDS</td>
                                                <td>
                                                    <button class="btn btn-success">Valider reception</button>
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
@endsection
