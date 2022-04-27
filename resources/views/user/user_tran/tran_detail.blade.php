@extends('layouts.user.main')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <form method="POST" action="{{ url('/transaction/detail') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @include ('user.user_tran.detail_form') 

                    </form>
                   
                </div>
            </div>
        </div>
    </div>
@endsection
