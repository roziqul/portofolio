@extends('master')

@section('content')
    <section class="section">
        <div class="section-header">
          <h1>Administrator</h1>
          <div class="section-header-breadcrumb">
              <div class="breadcrumb-item">Users</div>
              <div class="breadcrumb-item"><a href="{{route('administrator-data.index')}}">Administrator</a></div>
          </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <div style="text-align:right">
                        <a href="{{route('administrator-data.create')}}" class="btn btn-icon icon-left btn-primary" style="margin-bottom: 10px; width:100px;">
                          <i class="fas fa-plus"></i>
                          Insert
                        </a>
                      </div>
                      <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                          <thead>
                            <tr>
                                <th style="text-align: center">No.</th>
                                <th style="text-align: center">Name</th>
                                <th style="text-align: center">Email</th>
                                <th style="text-align: center">Created At</th>
                                <th style="text-align: center">Updated At</th>
                                <th style="text-align: center">Menu</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($administrator as $val)
                            <tr>
                              <td style="text-align: center">{{$no++}}</td>
                              <td style="text-align: center">{{$val->fullname}}</td>
                              <td style="text-align: center">{{$val->email}}</td>
                              <td style="text-align: center">{{$val->created_at}}</td>
                              <td style="text-align: center">{{$val->updated_at}}</td>
                              <td style="text-align: center">
                                @if (auth()->user()->role == 'superadmin')
                                <div class="d-inline-block">
                                    <form action="#" method="post">
                                        @csrf
                                        <button type="submit" class="btn-sm btn-icon icon-center bg-transparent">
                                            <i class="fas fa-pen text-primary"></i>
                                        </button>
                                    </form>
                                </div> 
                                @endif                                                                                                   
                                <div class="d-inline-block">
                                    <button class="btn-sm btn-icon icon-center btn-primary">
                                        <a href="{{route('administrator-data.show', $val->id)}}" style="text-align: center">
                                            <i class="fas fa-search text-white icon-center">                                                            
                                            </i>
                                        </a>
                                    </button>                                                      
                                </div>
                                @if (auth()->user()->role == 'superadmin')
                                <div class="d-inline-block">
                                    <form action="#" method="post">
                                        @csrf
                                        <button type="submit" class="btn-sm btn-icon icon-center btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                @endif
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
    </section>
@endsection