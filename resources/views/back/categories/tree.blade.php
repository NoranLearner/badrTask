@extends('custom_layout.back.app')

@section('content')

    <!-- Main Content -->
    <div class="hk-pg-wrapper">

        <!-- Container -->
        <div class="container mt-xl-50 mt-sm-30 mt-15">

            <!-- Title -->
            <div class="hk-pg-header align-items-top">
                <div>
                    <h2 class="hk-pg-title font-weight-600 mb-10">Category Tree</h2>
                </div>
            </div>
            <!-- /Title -->

            <!-- Row -->
            <div class="row">

                <div class="col-xl-12">

                    <div class="hk-row">

                        <div class="col-sm-12">

                            <div class="card-group hk-dash-type-2">

                                <div class="card card-sm">

                                    <div class="card-body">

                                        <!-- Breadcrumb -->
                                        <nav class="hk-breadcrumb" aria-label="breadcrumb">
                                            <ol class="breadcrumb breadcrumb-light bg-transparent">
                                                <li class="breadcrumb-item"><a href="{{ url('categories') }}">Categories</a>
                                                </li>
                                                <li class="breadcrumb-item active" aria-current="page">Tree</li>
                                            </ol>
                                        </nav>
                                        <!-- /Breadcrumb -->

                                        <!-- Title -->
                                        <div class="hk-pg-header">
                                            <h4 class="hk-pg-title">
                                                <span class="pg-title-icon">
                                                    <span class="feather-icon">
                                                        <i data-feather="shopping-bag"></i>
                                                    </span>
                                                </span>
                                                Category Tree
                                            </h4>
                                        </div>
                                        <!-- /Title -->

                                        <section class="hk-sec-wrapper">

                                            {{-- {{ $categories }} --}}

                                            <div class="w-50 mx-auto">

                                                <div class="my-4">

                                                    <x-categories :categories="$categories" />

                                                </div>

                                            </div>

                                        </section>

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
