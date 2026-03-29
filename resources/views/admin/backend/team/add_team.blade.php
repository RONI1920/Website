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
                                            <h4 class="card-title mb-0">Add Our Team</h4>
                                        </div>


                                        <form id="myForm" action="{{ route('store.team') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="card-body">
                                                <div class=" form-group mb-3">
                                                    <label class="form-label">Name</label>
                                                    <input class="form-control" type="text" name="name">
                                                </div>
                                                <div class="form-group  mb-3">
                                                    <label class="form-label">Position</label>
                                                    <input class="form-control" type="text" name="position">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label">Our Team Image</label>
                                                    <input class="form-control" type="file" name="image"
                                                        id="image">
                                                </div>

                                                <div class="mb-3">
                                                    <img id="showImage" src="{{ asset('upload/no_image.jpg') }}"
                                                        class="rounded-circle avatar-xxl img-thumbnail" alt="image profile">
                                                </div>


                                                <button type="submit" class="btn btn-primary">Add Our Team</button>
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



        {{-- validate massege --}}
        <script type="text/javascript">
            $(document).ready(function() {
                $('#myForm').validate({
                    rules: {
                        name: {
                            required: true,
                        },
                        position: {
                            required: true,
                        },
                        image: {
                            required: true,
                        },

                    },
                    messages: {
                        name: {
                            required: 'Please Enter Name',
                        },
                        position: {
                            required: 'Please Field is Required',
                        },
                        image: {
                            required: 'Please Upload Image',
                        },


                    },
                    errorElement: 'span',
                    errorPlacement: function(error, element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight: function(element, errorClass, validClass) {
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                    },
                });
            });
        </script>



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
