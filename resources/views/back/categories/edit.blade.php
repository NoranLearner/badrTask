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

                                        <!-- Breadcrumb -->
                                        <nav class="hk-breadcrumb" aria-label="breadcrumb">
                                            <ol class="breadcrumb breadcrumb-light bg-transparent">
                                                <li class="breadcrumb-item"><a
                                                        href="{{ route('categories.index') }}">Categories</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
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
                                                Edit Category
                                            </h4>
                                        </div>
                                        <!-- /Title -->


                                        {{-- Start Form --}}

                                        <section class="hk-sec-wrapper">

                                            <div class="row">
                                                <div class="col-sm">

                                                    <form action="{{ route('categories.update', $category->id) }}" method="post">

                                                        @csrf

                                                        @method('PUT')

                                                        {{-- Category Name --}}
                                                        <div class="form-group">
                                                            <label for="name">Name:</label>
                                                            <input class="form-control" type="text"
                                                                placeholder="Category Name" id="name" name="name"
                                                                value="{{ $category->name }}">
                                                            @error('name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        {{-- Choose Parent Category --}}
                                                        <div class="form-group">
                                                            <label for="input_tags">Choose Parent Category:</label>
                                                            <select id="input_tags" class="form-control" name="parent_cat_id">
                                                                <option value=""> Main Category </option>
                                                                @foreach ($mainCategories as $mainCat)
                                                                    <option value="{{ $mainCat->id }}" {{ $mainCat->id == $category->parent_cat_id ? 'selected' : '' }}>
                                                                        {{ $mainCat->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('parent_cat_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <button class="btn btn-primary" type="submit">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </section>

                                        {{-- End Form --}}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Row -->

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
