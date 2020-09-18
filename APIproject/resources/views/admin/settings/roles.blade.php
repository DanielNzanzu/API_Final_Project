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
                                    Settings - Roles
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
                                    Roles
                                </div>

                                <div class="table-responsive">
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="pl-4">Role</th>
                                                <th>Permissions</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($roles as $role)
                                            <tr>
                                                <td class="pl-4">
                                                    <strong>{{ $role->name }}</strong>
                                                </td>
                                                <td>
                                                    {{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">
                                                        Edit
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <h4 class="alert alert-danger m-3">No Roles found</h4>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <div class="d-block text-right card-footer">
                                    <div class="d-inline-block dropdown">
                                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-success">
                                      <span class="btn-icon-wrapper pr-2 opacity-7">
                                        <i class="fa fa-arrow-right"></i>
                                      </span>
                                            Add New
                                        </button>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a href="{{ route('admin.role.create') }}" class="nav-link">
                                                        <span>New Role</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <span>New Permission</span>
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