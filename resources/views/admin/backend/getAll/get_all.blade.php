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
                                            <h4 class="card-title mb-0">Edit Get All Feature</h4>
                                        </div>

                                        <form action="{{ route('update.getall') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            {{-- Method PUT/PATCH:" agar mempermudah database membaca data yang akan dirubah" --}}
                                            <input type="hidden" name="id" value="{{ $getall->id }}">

                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Title Get All</label>
                                                    <input class="form-control" type="text" name="title"
                                                        value="{{ $getall->title }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Description Get All</label>
                                                    <textarea name="description" class="form-control" rows="3">{{ $getall->description }}</textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Feature Title1</label>
                                                    <input class="form-control" type="text" name="feature_title1"
                                                        value="{{ $getall->feature_title1 }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Feature Title2</label>
                                                    <input class="form-control" type="text" name="feature_title2"
                                                        value="{{ $getall->feature_title2 }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Feature Description1</label>
                                                    <textarea name="feature_detail1" class="form-control" rows="3">{{ $getall->feature_detail1 }}</textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Feature Description2</label>
                                                    <textarea name="feature_detail2" class="form-control" rows="3">{{ $getall->feature_detail2 }}</textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Image</label>
                                                    <input class="form-control" type="file" name="image"
                                                        id="image">
                                                </div>

                                                <div class="mb-3">
                                                    <img id="showImage" src="{{ asset($getall->image) }}"
                                                        class="rounded-circle avatar-xxl img-thumbnail" alt="image profile">
                                                </div>


                                                <button type="submit" class="btn btn-primary">Update Feature Get
                                                    All</button>
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


        <script type="text/javascript">
            $(document).ready(function() {
                $('#image').change(function(e) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#showImage').attr('src', e.target.result);
                    }
                    if (e.target.files && e.target.files[0]) {
                        reader.readAsDataURL(e.target.files[0]);

                    }
                })
            });
        </script>
    @endsection
