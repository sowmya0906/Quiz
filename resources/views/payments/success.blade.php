@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
                <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Payment Page') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <h1>Your Payment success</h1>
                                    <script type="text/javascript">
      setTimeout("location.href = '{{url('/')}}';",1500);
                        </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
