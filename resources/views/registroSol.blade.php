
<table class="table table-white">
    <thead  class="table">
        <tr>
            <th>ID</th>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Celular</th>
            <th>Correo</th>
            <th>Direccion</th>
            <th>TipoSol</th>
            <th>Curso</th>
            <th>Comentario</th>
            <th>fecha envio</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datos as $dato )
            <tr>
                <td>{{$dato->id}}</td>
                <td>{{$dato->DNI}}</td>
                <td>{{$dato->Nombre}}</td>
                <td>{{$dato->Apellido}}</td>
                <td>{{$dato->Celular}}</td>
                <td>{{$dato->Correo}}</td>
                <td>{{$dato->Direccion}}</td>
                <td>{{$dato->TipoSol}}</td>
                <td>{{$dato->Curso}}</td>
                <td>{{$dato->Comentario}}</td>
                <td>{{$dato->fechEnvi}}</td>
                <td>
                    <form action="{{ url('aceptar-soli')}}" class="aceptarSol">
                        <input type="submit" onclick="" value="Aceptar" class="btn btn-success">
                    </form>
                    <br>
                    <form action="{{ url('/empleaod/'.$dato->id) }}" method="post" class="eliminarSol">
                        @csrf
                        {{method_field('DELETE')}}
                        <input type="submit" onclick="" value="Rechazar" class="btn btn-danger">
                    </form>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
