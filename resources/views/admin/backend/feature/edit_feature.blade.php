@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="content">
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">

                                <div class="col-lg-12 col-xl- 12">
                                    <div class="card border mb-0">
                                        <div class="card-header">
                                            <h4 class="card-title mb-0">Add Review</h4>
                                        </div>


                                        <form action="{{ route('update.feature') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" name="id" value="{{ $feature->id }}">

                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Title</label>
                                                    <input class="form-control" type="text" name="title"
                                                        value="{{ $feature->title }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Icon</label>
                                                    <input class="form-control" type="text" name="icon"
                                                        value="{{ $feature->icon }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Description</label>
                                                    <textarea name="description" class="form-control" rows="3">{{ $feature->description }}</textarea>
                                                </div>


                                                <button type="submit" class="btn btn-primary">Edit Feature</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
