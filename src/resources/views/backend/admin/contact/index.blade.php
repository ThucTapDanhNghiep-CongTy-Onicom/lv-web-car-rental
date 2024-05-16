@extends('backend.admin.dasbroad.index')
@section('main-content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                <h5 class="card-title">Default Datatable</h5>
                <p class="card-title-desc">DataTables has most features enabled by
                    default, so all you need to do to use it with your own tables is to call
                    the construction function: <code>$().DataTable();</code>.
                </p>
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Created_at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($contacts))
                            @foreach($contacts as $contact)
                            <tr>
                                <td>{{$contact->id}}</td>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->message}}</td>
                                <td>{{$newDateFormat = date('d M Y', strtotime($contact->created_at))}}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>

@endsection