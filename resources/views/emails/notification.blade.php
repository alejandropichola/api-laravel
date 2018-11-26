<div>
    <div style="text-align: center;">
        <img width="200" src="http://dicarsa.esy.es/assets/img/dicarsa-logo.png"/>
    </div>
    <div>
        <label>Nombres: </label>&nbsp;{{$firstName}}<br/>
        <label>Apellidos: </label>&nbsp;{{$lastName}}<br/>
        <label>Correo: </label>&nbsp;{{$email}}<br/>
        <label>Ciudad: </label>&nbsp;{{$city}}<br/>
        <label>Subdivisión: </label>&nbsp;{{$subdivision}}<br/>
        <label>Teléfono: </label>&nbsp;{{$phone}}<br>
    </div>
    <content>
        {{$description}}
    </content>
</div>