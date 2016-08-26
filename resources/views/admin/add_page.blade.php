@extends('layouts.add_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавить страницу</div>

                    <div class="panel-body">
                        <form id="form" action="{{route('savePage')}}" method="post">
                            <label for="title">Название страницы</label>
                            <div class="form-group ">
                                <input type="text" name="title" class="col-md-4">
                                <input type="hidden" name="img" class="col-md-4">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                            </div>
                            <br>
                            <div class="form-group">
                            <textarea name="text" id="" cols="30" rows="10"></textarea>
                            </div>
                            <input type="submit" class="btn-primary" value="Отправить">
                        </form>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <ul class="img col-md-10"></ul>
                    </div>
                    <a class="popup-with-form btn" href=".laradrop">Добавть фотографию</a>
                    <div class="laradrop white-popup-block mfp-hide" laradrop-csrf-token="{{ csrf_token() }}"> </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        jQuery(document).ready(function(){
            // With custom params:
            jQuery('.laradrop').lafiles({
                breadCrumbRootText: 'My Root', // optional
                actionConfirmationText: 'Удалить?', // optional
                my: "Cool",
                onInsertCallback: function (obj){ // optional
                    // if you need to bind the select button, implement here
                    var img =  $(".img");
                    img.append("" +
                            "<li>" +
                            "<a href='#'><i id=" + obj.id +" class='fa fa-trash' aria-hidden='true'></i></a>" +
                            "<a class='imgs'><img  src=" + obj.src +"></a>" +" </li> ");
                    var id  = obj.id + "|";

                    var input = $("#form input[name*='img']");
                         input.val(input.val() + id);

                    ///////**************////////


                    $(".fa-trash").on('click', function(e){
                        e.preventDefault();

                        var si = String(input.val());
                        //console.log(si);

                        if(this.id == obj.id){

                            var v = this.id ;

                            var b =  si.replace( new RegExp('(\d+.?)*('+ v +'.?)(\d\|)', 'g') ,'$1$3');

                            console.log($(this).closest("li").fadeOut());
                            input.val(b);
                        }

                    });


                   // console.log(del);

                },
                onErrorCallback: function(msg){ // optional
                    // if you need an error status indicator, implement here
                    alert('An error occured: '+msg);
                },
                onSuccessCallback: function(serverRes){ // optional
                    // if you need a success status indicator, implement here
                }
            });

            $('.popup-with-form').magnificPopup({
                type: 'inline',
                preloader: false,
                focus: '#name',

                // When elemened is focused, some mobile browsers in some cases zoom in
                // It looks not nice, so we disable it:
                callbacks: {
                    beforeOpen: function() {
                        if($(window).width() < 700) {
                            this.st.focus = false;
                        } else {
                            this.st.focus = '#name';
                        }
                    }
                }
            });
        });
    </script>
    @endsection
