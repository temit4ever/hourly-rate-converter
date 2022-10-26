@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <strong>User Details</strong>
                    </div>
                    <div class="card-body">
                        <div><strong>Name:</strong>
                            {{$userDetails->name}}
                        </div><hr/>
                        <div><strong>Company Name:</strong>
                            {{$userDetails->company_name}}
                        </div><hr/>
                        <div><strong>Occupation:</strong>
                            {{$userDetails->occupation}}
                        </div><hr/>
                        <div><strong>Rates:</strong>
                           <div>
                               £
                           </div>
                            <div>
                                €
                            </div>
                            <div>
                                $
                            </div>
                        </div><hr/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
