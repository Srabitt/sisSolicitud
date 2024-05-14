@extends('index')

@section('title','Realizar solicitud')

@section('contenido')
    <h1>Registrar solicitud</h1>
    <form action="{{ url('/empleaod') }}" method="POST" class="form-enviar">
        @csrf
        <!--Datos personales-->
        <div class="d-block bg-light m-2 p-4">
            <div>
                <h4>Datos personales</h1>
            </div>
            <!--Input de DNI-->
            <div class="d-inline-block m-2">
                <div class="d-block">
                    <label class="">DNI</label>

                </div>
                <div class="d-block">
                    <input type="text" class="form-control fs-6 @error('DNI') is-invalid @enderror"
                            for="DNI" placeholder="DNI" size="15px"
                            name="DNI" maxlength="8" value="{{old('DNI')}}">
                    @error('DNI')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                    @enderror

                </div>
            </div>

            <!--Input de Nombre-->
            <div class="d-inline-block m-4">
                <div class="d-block">
                    <label class="">Nombre</label>
                </div>
                <div class="d-block">
                    <input type="text" class="form-control fs-6 @error('Nombre') is-invalid @enderror"
                    id="nombre" placeholder="Nombre" size="40px"
                    name="Nombre">
                    @error('Nombre')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                    @enderror
                </div>
            </div>
            <!--Input de Apellido-->
            <div class="d-inline-block m-4">
                <div class="d-block">
                    <label class="">Apellido</label>
                </div>
                <div class="d-block">
                    <input type="text" class="form-control fs-6 @error('Apellido') is-invalid @enderror"
                    id="apellido" placeholder="Apellido" size="40px"
                    name="Apellido">
                    @error('Apellido')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                    @enderror
                </div>
            </div>
            <br>
            <!--Input de Celular-->
            <div class="d-inline-block m-2">
                <div class="d-block">
                    <label class="">Celular</label>
                </div>
                <div class="d-block">
                    <input type="text" class="form-control fs-6 @error('Celular') is-invalid @enderror"
                    id="celular" placeholder="Celular" size="15px"
                    name="Celular" maxlength="9">
                    @error('Celular')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                    @enderror
                </div>
            </div>
             <!--Input de Correo-->
             <div class="d-inline-block m-4">
                <div class="d-block">
                    <label class="">Correo</label>
                </div>
                <div class="d-block">
                    <input type="text" class="form-control fs-6 @error('Correo') is-invalid @enderror"
                    id="correo" placeholder="Correo" size="40px"
                    name="Correo">
                    @error('Correo')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                    @enderror
                </div>
            </div>
             <!--Input de Direccion-->
            <div class="d-inline-block m-4">
                <div class="d-block">
                    <label class="">Direccion</label>
                </div>
                <div class="d-block">
                    <input type="text" class="form-control fs-6 @error('Direccion') is-invalid @enderror"
                    id="direccion" placeholder="Direccion" size="40px"
                    name="Direccion">
                    @error('Direccion')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <hr>
        <!--Datos de solicitud-->
        <div class="d-block bg-light m-2 p-4">
            <div>
                <h4>Datos de Solicitud</h1>
            </div>
            <!--Asunto-->
            <div class="d-inline-block m-2">
                <label for="select1" class="form-label">Tipo de solicitud</label>
                    <select id="select1" class="form-select fs-6 @error('TipoSol') is-invalid @enderror"
                    style="width: 500px" name="TipoSol">
                        <option>Solicitud para Matricula</option>
                        @error('TipoSol')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                </select>
            </div>
            <!--Tipo de documento-->
            <div class="d-inline-block m-2">
                <label for="select2" class="form-label">Curso de interés</label>
                    <select id="select2" class="form-select fs-6 @error('Curso') is-invalid @enderror"
                    style="width: 500px" name="Curso">
                        <option>Office 360</option>
                        <option>Unity</option>
                        <option>Adobe</option>
                    @error('Curso')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                    @enderror
                </select>
            </div>
            <div class="d-inline-block m-2">
                <label for="textarea" class="form-label">Comentario</label>
                <div class="d-block">
                    <input type="text" class="form-control fs-6"
                    id="comentario" placeholder="comentario" size="50px" name="Comentario" value="-">
                </div>
            </div>
        </div>
        <!--Archivo-->
        <div class="d-block text-center">
            <button type="submit" class=" btn btn-primary enviarS">Enviar</button>
            <button type="button" class="btn btn-danger">Canelar</button>
        </div>
    </form>
@endsection


@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@php
    $correctS =  $correctS??'null';
@endphp

@if ($correctS=='ok')
        <script>

           Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Solicitud enviada correctamente",
                showConfirmButton: false,
                timer: 1500
            }).then((el)=>{
                window.location.href = "http://127.0.0.1/miWordPress";

            });
        </script>
    @endif

<script>
    const buttonEnviar = document.querySelector('.enviarS')

    buttonEnviar.addEventListener('click',(e)=>{
        e.preventDefault();
            Swal.fire({
            title: "¿Estás seguro de enviar la solicitud?",
            text: "Si envia se guardara",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Confirmar...!",
            cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.querySelector('.form-enviar').submit();
                }
            });
    })

    </script>
@endsection



