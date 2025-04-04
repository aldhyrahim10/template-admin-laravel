@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Exam Result</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Exam Result</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Exam Result List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="myTable table table-bordered table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th style="width: 10%">No</th>
                                    <th>Course Name</th>
                                    @if (Auth::user()->user_role_id != 3)
                                    <th>User</th>
                                    @endif
                                    <th>Point</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="articleTableBody">
                                @foreach($results as $item)
                                    <tr class="item-content">
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>{{ $item->course_name }}</td>
                                        @if (Auth::user()->user_role_id != 3)
                                        <td>{{ $item->user_name }}</td>
                                        @endif
                                        <th class="text-center">
                                            {{ $item->course_exam_point }}
                                        </th>
                                        <td class="text-center">
                                            @if ($item->is_passed)
                                            <span class="badge text-success">Passed</span>
                                            @else
                                            <span class="badge text-danger">Not Passed</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection