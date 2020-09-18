@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        @include('admin.partials.header')

        <div class="app-main">
            @include('admin.partials.sidebar', ['active' => 'charity'])

            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-monitor icon-gradient bg-mean-fruit"> </i>
                                </div>
                                <div>
                                    Application - Charity <strong>#{{ $application->ref_number }}</strong>
                                    <div class="page-title-subheading">
                                        View and manage new application of charities.
                                    </div>
                                </div>
                            </div>
                        </div>

                        @include('admin.partials.message')
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-header">
                                    <div class="btn-actions-pane-right">
                                        <div role="group" class="btn-group-sm btn-group">
                                            <a href="{{ route('admin.charity.application.index') }}" class="active btn btn-primary">All Applications</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col col-md-6">
                                            <h5 class="card-title"><u>Details</u></h5>
                                            <p>Reference: <strong>{{ $application->ref_number }}</strong></p>
                                            <p>Name: <strong>{{ $application->name }}</strong></p>
                                            <p>Address: <strong>{{ $application->address }}</strong></p>
                                            <p>Mobile: <strong>{{ $application->phone }}</strong></p>
                                            <p>Website: <strong>{{ $application->website }}</strong></p>
                                            <p>Email: <strong>{{ $application->email }}</strong></p>
                                            <p>Status: <strong>{{ $application->status }}</strong></p>
                                        </div>

                                        <div class="col col-md-6">
                                            <h5 class="card-title"><u>Submitted by</u></h5>
                                            <p>Name: <strong>{{ $application->user->firstname.' '.$application->user->lastname }}</strong></p>
                                            <p>Email: <strong>{{ $application->user->email }}</strong></p>
                                            <p>Mobile: <strong>{{ $application->user->mobile ? $application->user->mobile : '' }}</strong></p>
                                            <p>User Role: <strong>{{ $application->user->roles ? $application->user->roles()->pluck('name')->implode(' ') : '' }}</strong></p>
                                            <hr/>
                                            <p><strong>Details: </strong>{{ $application->details }}</p>
                                        </div>
                                    </div>

                                    @if($application->status === 'pending')
                                        <hr>
                                        <div class="row">
                                            <div class="col col-md-6">
                                                <h5 class="card-title">Update</h5>
                                            </div>

                                            <div class="col col-md-6">
                                                <form method="post" action="{{ route('admin.charity.application.update', $application->ref_number) }}">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col col-md-6">
                                                            <select name="role" class="form-control form-control-sm mb-4" required>
                                                                <option value="">Select Role</option>
                                                                @foreach($roles as $role)
                                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <input type="hidden" name="status_update" value="approved">
                                                            <input type="hidden" name="user_update" value="charity">
                                                            <input type="hidden" name="user_id" value="{{ $application->user->id }}">
                                                        </div>
                                                        <div class="col col-md-6">
                                                            <button type="submit" class="mb-2 mr-2 btn btn-primary btn-block">Approve Application
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('admin.partials.footer')
            </div>

            <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
@endsection