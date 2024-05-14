@extends('adminlte::page')

@section('title', 'Gestor')

@section('content_header')
    <h1>Gestor de Solicitudes</h1>
@stop

@section('content')
    @include('registroSol')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="icon" type="image/x-icon" href="{{asset('img/MUGcentro.png')}}">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('eliminarF')=='ok')
        <script>
            Swal.fire({
            title: "Rechazado Correctamente",
            text: "La solicitud a sido eliminada",
            icon: "success"
            });
        </script>
    @endif
    @if (session('aceptarF')=='ok')
        <script>
            Swal.fire({
            title: "Enviado Correcto",
            text: "Se envio el correo electronico",
            icon: "success"
            });
        </script>
    @endif
    <script>
        $('.aceptarSol').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: "¿Estás seguro de aceptar la solicitud?",
            text: "Si acepta se enviara un correo",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Confirmar...!",
            cancelButtonText: "Cancelar"
            }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
            });

        });
    </script>
    <script>
        $('.eliminarSol').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: "¿Estás seguro de rechazar la solicitud?",
            text: "Si, se confirma no se podra cambiar...!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Confirmar...!",
            cancelButtonText: "Cancelar"
            }).then((result) => {
            if (result.isConfirmed) {
                this.submit();   
            }
            });

        });
        /*
        
        */
    </script>
@stop
