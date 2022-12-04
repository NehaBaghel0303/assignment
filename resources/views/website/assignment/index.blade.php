@extends('website.layout.main')
@push('scopedCss')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
@endpush
@section('content')
   <section>
        <div class="container mt-5">
            <div class="row mt-5">
                <div class="col-lg-8 mx-auto">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h5>Assignement</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('assignment.store') }}" class="repeater" id="storeRecord" method="POST">
                                @csrf
                                <div data-repeater-list="data" class="">
                                    <div data-repeater-item class="row">
                                        <div class="col-lg-5 mb-2">
                                            <div class="">
                                                <input placeholder="Enter Text" class="form-control" type="text" name="title" value=""/>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-2">
                                            <input class="delete-btn btn btn-danger" data-repeater-delete type="button" value="Delete"/>
                                        </div>
                                    </div>
                                </div>
                                <input class="add-btn btn btn-success"  data-repeater-create  value="Add"/>

                                <button type="submit"  class="btn btn-primary saveBtn">Save</button>
                            </form>
                            <div class="mt-5 " id="showData">
                                @include('website.assignment.include.data')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
@endsection

@push('scopedJs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>

    <script>

        $('.repeater').repeater({
            initEmpty: false,
            defaultValues: {
                'text-input': ''
            },
            show: function () {
                $(this).slideDown();    
            },
            hide: function (deleteElement) {
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            isFirstItemUndeletable: true
        });
        $('.saveBtn').on('click',function(e){
            e.preventDefault();
            $('#storeRecord').submit();
        }); 
        
        $('#storeRecord').on('submit',function(e){
            e.preventDefault();
            jQuery.ajax({  
                type: $(this).attr('method'),   
                url: $(this).attr('action'),   
                data: $(this).serialize(),
                dataType: "json",  
                success: function(res) {
                    $("#storeRecord")[0].reset();
                    $('#showData').html(res.showData); 
                    $.toast({
                        heading: 'SUCCESS',
                        text: res.title,
                        showHideTransition: 'slide',
                        icon: 'success',
                        loaderBg: '#f96868',
                        position: 'top-right'
                    });     
                    $('[data-repeater-item]').slice(1).remove();
                }  
            }); 
        });
  
    </script>
@endpush


