@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        @include('admin.partials.header')

        <div class="app-main">
            @include('admin.partials.sidebar', ['active' => 'restaurants'])

            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-monitor icon-gradient bg-mean-fruit"> </i>
                                </div>
                                <div>
                                    All Restaurants
                                    <div class="page-title-subheading">
                                        View and manage registered restaurants.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-header">
                                    Restaurant
                                    <div class="btn-actions-pane-right">
                                        <div role="group" class="btn-group-sm btn-group">
                                            <button class="active btn btn-focus">{{ $count }} Registered Restaurants</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="align-middle mb-4 table table-borderless table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Name</th>
                                            <th>Contact</th>
                                            <th class="text-center">status</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($restaurants as $restaurant)
                                            <tr>
                                                <td class="text-center text-muted">#{{ $restaurant->ref_number }}</td>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <div class="widget-content-left">
                                                                    <img
                                                                            width="40"
                                                                            class="rounded-circle"
                                                                            src="{{ asset('images/avatars/icon_restaurant.png') }}"
                                                                            alt=""
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading">{{ $restaurant->name }}</div>
                                                                <div class="widget-subheading opacity-7">
                                                                    {{ $restaurant->address }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="">{{ $restaurant->email }} <br> {{ $restaurant->phone }}</td>
                                                <td class="text-center">
                                                    <div class="badge badge-warning">{{ $restaurant->status }}</div>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.restaurant.show', $restaurant->ref_number) }}" type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">
                                                        More
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <h4 class="m-4">No Restaurant found...</h4>
                                        @endforelse
                                        </tbody>
                                    </table>
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