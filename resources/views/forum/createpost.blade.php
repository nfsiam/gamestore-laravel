@extends('layouts.base')

@section('title','Create Post')

@section('css')
<style>
    .err{
        color: red;
    }
</style>
@endsection

@section('breadcumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('forum.index')}}">forum</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create Post</li>
    </ol>
</nav>
@endsection

@section('content')
<!-- form start -->
<form method="post" id="createForm" novalidate class="needs-validation" enctype="multipart/form-data">
    @csrf
    <div class="row mb-2">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="selectGame">Select Game</label>
                <select class="custom-select cvalid" id="gamename" name="gamename">
                    <option value=""></option>
                    <option value="gameID1">Game 1</option>
                    <option value="gameID3">Game 3</option>
                    <option value="gameID4">Game 4</option>
                </select>
                <small class="err" id="errgamename"></small>
            </div>

            <div class="form-group">
                <label for="selectType">Select Type</label>
                <select class="custom-select cvalid" id="type" name="type">
                    <option value=""></option>
                    <option value="issue">Issue</option>
                    <option value="review">Review</option>
                    <option value="walkthrough">Walkthrough</option>
                </select>
                <small class="err" id="errtype"></small>
            </div>

            <div class="form-group">
                <label for="shortDes">Title</label>
                <textarea class="form-control cvalid" id="title" rows="3" name="title"></textarea>
                <small class="form-text text-muted">
                    A short description or title, not more than 300 characters
                </small>
                <small class="err" id="errtitle"></small>
            </div>

            <div class="form-group">
                <label>Image (Optional)</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="selFile"
                            accept="image/x-png,image/gif,image/jpeg" name="pic">
                        <label class="custom-file-label" for="selFile">Choose file</label>
                    </div>
                </div>
                <small class="err" id="errfname"></small>
            </div>

            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="codeToggle">
                    <label class="custom-control-label" for="codeToggle">Enable Code Section (Optional)</label>

                </div>
                <textarea class="form-control cvalid" id="codes" rows="6" name="codes" disabled></textarea>
                <small class="err" id="errcodes"></small>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control cvalid" id="body" rows="6" name="body"></textarea>
                <small class="err" id="errbody"></small>
            </div>

            <div class="form-group d-flex justify-content-end">
                <button type="button" class="btn btn-secondary mr-2 reset">Clear</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>

</form>
<!-- form end -->
@endsection

@section('scripts')
<script>
    $(".reset").click(function () {
        $('#selFile')[0].value = null;
        $('.custom-file-label').html('Choose File');
        $('.cvalid').each(function () {
            $(this).removeClass('border-danger');
        });
        $('.err').each(function () {
            $(this).html('');
        });
        $('#codes').attr('disabled', true);
        $('#createForm').trigger("reset");
    });

    //code block toggle
    $("#codeToggle").change(function () {
        if ($(this).prop("checked") == true) {
            //run code
            $('#codes').attr('disabled', false);
        } else {
            $('#codes').attr('disabled', true);
        }
    });

    $('.cvalid').click(function () {
        $(this).removeClass('border-danger');
    })

    $('#selFile').click(function () {
        $(this)[0].value = null;
    });

    $('#selFile').change(function () {
        console.log($(this)[0].files[0]);
        var file = $(this)[0].files[0];
        var filename = file.name;
        $('.custom-file-label').html(filename);
    });

    function warning(id,arr){
        if(id == '#errtitle'){
            $(id).prev().prev().addClass('border-danger');
        }else{
            $(id).prev().addClass('border-danger');
        }
        $(id).html(arr.join(','));
    }

    //form submit
    $('#createForm').submit(function (e) {
        e.preventDefault();

        var formData = new FormData($(this)[0]);

        $.ajax({
            url: '{{route("forum.createpost")}}',
            method: 'POST',
            dataType: 'json',
            contentType: false,
            processData: false,
            data: formData,
            success: function (data) {
                if ('errors' in data) {
                    let obj = data.errors;
                    if ('title' in obj) {
                        warning('#errtitle',obj.title);
                    }
                    if ('body' in obj) {
                        warning('#errbody',obj.body);
                    }
                    if ('gamename' in obj) {
                        warning('#errgamename',obj.gamename);
                    }
                    if ('type' in obj) {
                        warning('#errtype',obj.type);
                    }
                    if ('fname' in obj) {
                        warning('#errfname',obj.fname);
                    }
                    if ('codes' in obj) {
                        warning('#errcodes',obj.codes);
                    }
                } else if ('failure' in data) {
                    alert("Something went wrong");
                    window.location.href = '{{route("forum.createpost")}}';
                } else if ('success' in data) {
                    alert("Your post has been submitted for approval");
                    window.location.href = '{{route("forum.index")}}';
                }
            },
        });
    });
</script>
@endsection