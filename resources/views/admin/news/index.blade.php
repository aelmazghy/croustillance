@extends('layouts.app')

@section('content')

    <div class="col-md-12">
        <ul class="breadcrumb">
            <li class="">Accueil / actualités</li>
        </ul>
    </div>
    <div class="col-md-12">
        <div class="card-box">
            <form method="POST" action="" accept-charset="UTF-8">
                <div class="row">
                    <div class="box-tools form-group form-action m-b-30">
                        <div class="col-sm-4">
                            <select class="form-control" name="action">
                                <option value="" selected="selected">Brouillon</option>
                                <option value="">Mettre à la corbeille</option>
                            </select>
                        </div>
                        <input class="btn btn-light delete-btn" type="submit" value="Appliquer">
                        <div class="col text-right">
                            <a href="{{ route('admin.news.create')  }}" class="btn btn-success ajouter-btn" ><i class="fas fa-plus-square"></i>Ajouter</a>
                        </div>
                    </div>
                </div>
                <table id="newsTable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 1px;">
                            <input id="CbSelectAll" type="checkbox">
                        </th>
                        <th>#ID</th>
                        <th>Titre</th>
                        <th>Image</th>
                        <th>Date</th>
                        <th>New</th>
                        <th>Vues</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($news as $new)

                                <tr id="row-1">
                                    <td class="text-center">
                                        <input class="check-all" name="checkboxes[]" type="checkbox" value="1">
                                    </td>
                                    <td>{{ $new->id }}</td>
                                    <td>{{ $new->title }}</td>
                                    <td>{{ $new->imag }}</td>
                                    <td>{{ $new->datenews }}</td>
                                    <td>{{ $new->description }}</td>
                                    <td>{{ $new->vues }}</td>
                                    <td class="td-btn">
                                        <a href="#" class="btn btn-info btn-xs">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger delete-btn btn-xs">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr><!--end tr // end table line-->

                        @endforeach
                    </tbody>
                </table>

            </form>
            <div class="text-center"></div>
        </div><!-- /.card-box -->
    </div>
    <!--end sidebar div-->

@endsection
