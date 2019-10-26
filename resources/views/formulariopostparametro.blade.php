<h1>Formulario para direccionar al POST</h1>
<form method="post" action="{{ url('postparametro') }}" >
     @csrf
     <p>Formulario para enviar a la vista que tiene POST</p>
    <input type="submit" value="Submit">
</form>