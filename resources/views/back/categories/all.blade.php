@extends('custom_layout.back.app')

@section('content')

    <!-- Main Content -->
    <div class="hk-pg-wrapper">

        <!-- Container -->
        <div class="container mt-xl-50 mt-sm-30 mt-15">

            <!-- Title -->
            <div class="hk-pg-header align-items-top">
                <div>
                    <h2 class="hk-pg-title font-weight-600 mb-10">Category Management</h2>
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

                                        {{-- Start Categories Table --}}

                                        <!-- Breadcrumb -->
                                        <nav class="hk-breadcrumb" aria-label="breadcrumb">
                                            <ol class="breadcrumb breadcrumb-light bg-transparent">
                                                <li class="breadcrumb-item"><a href="#">Categories</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Show Categories</li>
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
                                                All Categories
                                            </h4>
                                        </div>
                                        <!-- /Title -->

                                        <section class="hk-sec-wrapper">

                                            <a href="{{ route('categories.create') }}" class="btn btn-outline-success mb-4">Add New Category</a>

                                            <div class="row">
                                                <div class="col-sm">
                                                    <div class="table-wrap">
                                                        <div class="table-responsive">
                                                            <table
                                                                class="table table-hover table-bordered table-striped mb-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Category Name</th>
                                                                        <th>Category Parent</th>
                                                                        <th>Actions</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($categories as $category)
                                                                        <tr>
                                                                            <td>{{ $category->id }}</td>
                                                                            <td>{{ $category->name }}</td>
                                                                            <td>{{ $category->parent->name ?? 'Main Category' }}</td>
                                                                            <td>
                                                                                <a href="{{ route('categories.edit', $category->id) }}"
                                                                                    class="mr-25" data-toggle="tooltip"
                                                                                    data-original-title="Edit">
                                                                                    <i class="icon-pencil"></i>
                                                                                </a>
                                                                                <form
                                                                                    action="{{ route('categories.destroy', $category->id) }}"
                                                                                    method="post"
                                                                                    style="display: inline-block;">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button class="btn btn-link text-danger"
                                                                                        data-toggle="tooltip"
                                                                                        data-original-title="Delete">
                                                                                        <i class="icon-trash txt-danger"></i>
                                                                                    </button>
                                                                                </form>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                        {{-- End Category Table --}}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Row -->

            {{-- {{ $data->links('pagination::bootstrap-5') }} --}}

        </div>
        <!-- /Container -->

        <!-- Footer -->
        <div class="hk-footer-wrap container">
            <footer class="footer">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <p>Pampered by<a href="https://hencework.com/" class="text-dark" target="_blank">Hencework</a> ©
                            2019</p>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <p class="d-inline-block">Follow us</p>
                        <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span
                                class="btn-icon-wrap"><i class="fa fa-facebook"></i></span></a>
                        <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span
                                class="btn-icon-wrap"><i class="fa fa-twitter"></i></span></a>
                        <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span
                                class="btn-icon-wrap"><i class="fa fa-google-plus"></i></span></a>
                    </div>
                </div>
            </footer>
        </div>
        <!-- /Footer -->

    </div>
    <!-- /Main Content -->

@endsection
