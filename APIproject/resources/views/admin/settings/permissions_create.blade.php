@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        @include('admin.partials.header')

        <div class="app-main">
            @include('admin.partials.sidebar', ['active' => 'settings'])

            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-monitor icon-gradient bg-mean-fruit"> </i>
                                </div>
                                <div>
                                    Settings - New Permission
                                    <div class="page-title-subheading">
                                        View and manage settings of the platform.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-header">
                                    Create Permission
                                </div>

                                <div class="card-body">

                                    @include('admin.partials.message')

                                    <form method="post" action="{{ route('admin.permission.store') }}">
                                        @csrf
                                        <div class="position-relative row form-group">
                                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input name="name" id="name" placeholder="Enter name..." type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label for="roles" class="col-sm-2 col-form-label">Assign to Roles</label>
                                            <div class="col-sm-10">
                                                <select multiple name="roles" id="roles" class="form-control">
                                                    @foreach($roles as $role)
                                                        <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-lg pl-5 pr-5 pull-right">Add Permission</button>
                                    </form>
                                </div>

                                <div class="d-block text-right card-footer">
                                    <div class="d-inline-block dropdown">
                                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-success">
                                      <span class="btn-icon-wrapper pr-2 opacity-7">
                                        <i class="fa fa-arrow-right"></i>
                                      </span>
                                            View
                                        </button>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a href="{{ route('admin.role.index') }}" class="nav-link">
                                                        <span>Roles</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{ route('admin.permission.index') }}" class="nav-link">
                                                        <span>Permissions</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
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