@extends('layouts.app')

@section('title')
    {{ Auth::user()->restaurants->name }} | Orders Dashboard
@endsection

@section('content')
    @include('partials.header')
    @include('partials.header-resp')

    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}" title="Welcome Page" itemprop="url">Home</a></li>
                <li class="breadcrumb-item">Restaurant</li>
                <li class="breadcrumb-item active">Orders</li>
            </ol>
        </div>
    </div>

    <section>
        <div class="block less-spacing gray-bg top-padd30">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="sec-box">
                            <div class="dashboard-tabs-wrapper">
                                <div class="row">

                                    @include('account.sidebar')

                                    <div class="col-md-8 col-sm-12 col-lg-8">
                                        <div class="tab-content">
                                            <div class="tab-pane fade in active" id="dashboard">
                                                <div class="tabs-wrp brd-rd5 p-0">
                                                    <h4 class="mt-3 mb-3" itemprop="headline">RECEIVED ORDERS</h4>
                                                    {{--<div class="select-wrap-inner">--}}
                                                        {{--<a class="btn brd-rd3 red-bg pull-right" href="{{ route('account.restaurant.menu.create') }}" title="" itemprop="url">New Menu <i class="fa fa-plus-circle"></i></a>--}}
                                                    {{--</div>--}}

                                                    <div class="booking-table">
                                                        <table>
                                                            <thead>
                                                            <tr><th>#REFERENCE</th><th>DATE</th><th>STATUS</th></tr>
                                                            </thead>
                                                            <tbody>
                                                            @forelse($orders as $order)
                                                            <tr>
                                                                <td><h5 itemprop="headline"><a href="#" title="" itemprop="url">#{{ $order->ref_number }}</a></h5></td>
                                                                <td style="font-size: 0.9em">{{ Carbon\Carbon::parse($order->created_at)->isoFormat('MMM Do, YYYY') }} <br/>
                                                                        <i class="fa fa-clock-o"></i> {{ $order->created_at->diffForHumans() }}</td>
                                                                <td><span class="brd-rd3 processing text-capitalize">{{ $order->status }}</span>
                                                                    <a class="detail-link brd-rd50" href="{{ route('account.restaurant.order.show', $order->ref_number) }}" title="View Order" itemprop="url"><i class="fa fa-forward"></i></a>
                                                                </td>
                                                            </tr>
                                                            @empty
                                                                <tr><td colspan="3">
                                                                    <div class="alert alert-info" style="font-size: 0.9em">You do not have any incoming orders yet</div>
                                                                    </td></tr>
                                                            @endforelse
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div><!-- Section Box -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')
@endsection


{{--<h2>{{ $count }}</h2>--}}
{{--@foreach($orders as $order)--}}
    {{--{{ $order->ref_number.' - '.$order->created_at->diffForHumans() }} <br/>--}}
{{--@endforeach--}}
