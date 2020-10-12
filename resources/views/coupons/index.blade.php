@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
<div class="card">
<div class="card-header">{{_('Options')}}</div>
<div class="card-body">
<a href="{{route('admin')}}">Home</a>
</div>
</div>

        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <h4 style="text-align: center;">Coupons</h4>

                            </div>
                            <div class="col-sm">
                                <a href="{{route('coupons.create')}}"><button type="button" class="btn btn-primary">Create Coupon</button></a>

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm">
                                <table class="table table-striped">
                                  <thead>
                                      <tr>
                                        <td>ID</td>
                                        <td>Name</td>
                                        <td>Coupon Code</td>
                                        <td>Generated on</td>
                                        <td>Updated on</td>
                                        <td colspan = 2>Actions</td>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($coupons as $coupoun)
                                      <tr>
                                          <td>{{$coupoun->id}}</td>
                                          <td>{{$coupoun->name}} </td>
                                          <td>{{$coupoun->coupon_name}}</td>
                                          <td>{{$coupoun->created_at->diffForHumans()}}</td>
                                          <td>{{$coupoun->updated_at->diffForHumans()}}</td>
                                          <td>
                                              <a href="{{ route('coupons.edit',$coupoun->id)}}" class="btn btn-primary">Edit</a>
                                          </td>
                                          <td>
                                              <form action="{{ route('coupons.destroy', $coupoun->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                              </form>
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
</div>
@endsection
