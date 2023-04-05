@extends('layouts.app')

@section('content')
<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<div class="row">
									<div class="col-lg-12">
          

                                    <div class="card card-custom gutter-b example example-compact">
											<div class="card-header">
                                            <h1 class="card-title">              Create New store
</h1></div>

                    <div class="card-body">
                        <!-- <a href="{{ url('/admin/stores') }}" title="Back"><button class="btn btn-danger btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a> -->
                     

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif 

                        <form method="POST" action="{{ route('vendor.saveStore') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('stores.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('stores.list')

@endsection
