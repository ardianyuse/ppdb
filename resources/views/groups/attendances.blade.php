@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Group {{ $group->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/groups') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $group->id }}</td>
                                    </tr>
                                    <tr><th> Dosen Id </th><td> {{ $group->user->name }} </td></tr><tr><th> Name </th><td> {{ $group->name }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Absensi</div>
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student</th>
                                        <th>Absensi</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                        <form method="POST" action="{{ url('/groups') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                                @foreach($group->members as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->student->name }}</td>
                                        <td>
                                            <label class="radio-inline">
                                                <input type="radio" name="items[{{ $loop->iteration }}][absensi][0]" checked> Hadir
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="items[{{ $loop->iteration }}][absensi][1]"> Sakit
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="items[{{ $loop->iteration }}][absensi][2]"> Izin
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="items[{{ $loop->iteration }}][absensi][3]"> Alpha
                                            </label>
                                        </td>
                                        
                                        <td>
                                            <input type="text" class="form-control" name="items[{{ $loop->iteration }}][note]">
                                        </td>

                                    </tr>
                                @endforeach
                                

</form>
                                </tbody>
                            </table>
                            

                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Save">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
