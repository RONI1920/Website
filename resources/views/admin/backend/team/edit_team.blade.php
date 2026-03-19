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
                                            <h4 class="card-title mb-0">Edit Our Team</h4>
                                        </div>


                                        <form action="{{ route('update.team') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            {{-- Method PUT/PATCH:" agar mempermudah database membaca data yang akan dirubah" --}}
                                            <input type="hidden" name="id" value="{{ $team->id }}">

                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Name</label>
                                                    <input class="form-control" type="text" name="name"
                                                        value="{{ $team->name }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Position</label>
                                                    <input class="form-control" type="text" name="position"
                                                        value="{{ $team->position }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Our Team Photo</label>
                                                    <input class="form-control" type="file" name="image"
                                                        id="image">
                                                </div>

                                                <div class="mb-3">
                                                    <img id="showImage" src="{{ asset($team->image) }}"
                                                        class="rounded-circle avatar-xxl img-thumbnail" alt="image">
                                                </div>


                                                <button type="submit" class="btn btn-primary">Update Our Team</button>
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
