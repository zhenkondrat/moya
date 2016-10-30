@if ($errors->any())
    <div class="alert alert-danger alert-block">
        {{-- <button type="button" class="close" data-dismiss="alert"><i class="fa fa-minus-square"></i></button> --}}
        <strong>Ошибка</strong>
        @for ($i = 0; $i < $errors->getBag('default')->count(); $i++)
            {{ $errors->getBag('default')->all()[$i] }} </br>
        @endfor
        

        <script>
            $(document).ready(function(){
                swal("Ошибка!", "Ваше действие не произведено!", "error");
            });
        </script>
    </div>
@endif
 
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        {{-- <button type="button" class="close" data-dismiss="alert"><i class="fa fa-minus-square"></i></button> --}}
        <strong>Готово</strong> {{ $message }}
        <script>
            $(document).ready(function(){
                swal("Готово!", "Ваше действие успешно произведено!", "success");
            });
        </script>
    </div>
@endif