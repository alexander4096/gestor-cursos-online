<h1>Furmulario para Enviar a PUT</h1>
<form method="post" action="{{ url('putmetodo') }}" >
        @csrf
        @method('PUT')
        <p>Formulario para enviar a la vista PUT</p>
       <input type="submit" value="Submit">
</form>