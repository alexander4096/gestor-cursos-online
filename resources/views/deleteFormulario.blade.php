<h1>Furmulario para Enviar a DELETE</h1>
<form method="post" action="{{ url('deletemetodo') }}" >
        @csrf
        @method('DELETE')
        <p>Formulario para enviar a la vista DELETE</p>
       <input type="submit" value="Submit">
</form>