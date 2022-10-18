@extends('frontend.layouts.template')

@include('frontend.pages.includes.header')

<style>
    .standard-logo img
    {
        height: 100px;
        width: 150px !important;
    }
    input
    {
        border: none !important;
        height: 50px !important;
        line-height: 50px !important;
        margin-bottom: 20px !important;
        border-bottom: 1px solid #ced4da !important;
    }
    textarea { border: none !important; border-bottom: 1px solid #ced4da !important;  }
    label { display: none;  }
</style>


@section('content')

    <div class="container">

        <div class="row">
            <div class="col-lg-4" style="margin-top: 6%">

                <h3> Contact Us </h3>

                <form style="max-width: 25rem;">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="email" class="form-control" id="exampleInputPassword1" required placeholder="email">
                    </div>
                    <div class="form-group">
                        <label for="subject">Subjet</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" required placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <label for="subject">Subjet</label>
                        <textarea type="text" class="form-control" rows="4" id="" required placeholder="Your Message"></textarea>
                    </div>
                    <button type="submit" class="button  button-circle">Submit</button>
                </form>


            </div>

            <div class="col-lg-7">
                <img src="{{ asset('front/images/contact_form.jpg') }}" style="position:absolute;top:-30px;left:30px;transition:opacity 0.5s;width:100%;height:125%;object-fit:cover;object-position:center;">
            </div>

        </div>

    </div>


@endsection
