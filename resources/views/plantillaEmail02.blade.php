<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title></title>
</head>

<body>
<h1>Usuario: {{$usuario->name }} </h1>
<p>ID: {{$usuario->id }} <br>
   Email: {{$usuario->email }} </p>
<table class="table table-striped" style="border-collapse:collapse;" >
        <thead>
            <tr>
            <th scope="col" style="padding-top:.75rem;padding-bottom:.75rem;padding-right:.75rem;padding-left:.75rem;vertical-align:top;border-top-width:1px;border-top-style:solid;border-top-color:#dee2e6;" >#</th>
            <th scope="col" style="padding-top:.75rem;padding-bottom:.75rem;padding-right:.75rem;padding-left:.75rem;vertical-align:top;border-top-width:1px;border-top-style:solid;border-top-color:#dee2e6;" >titulo</th>
            <th scope="col" style="padding-top:.75rem;padding-bottom:.75rem;padding-right:.75rem;padding-left:.75rem;vertical-align:top;border-top-width:1px;border-top-style:solid;border-top-color:#dee2e6;" >destacado</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($cursos as $curso)
            <tr>
            <th scope="row" style="padding-top:.75rem;padding-bottom:.75rem;padding-right:.75rem;padding-left:.75rem;vertical-align:top;border-top-width:1px;border-top-style:solid;border-top-color:#dee2e6;" >{{ $curso->id }}</th>
            <td style="padding-top:.75rem;padding-bottom:.75rem;padding-right:.75rem;padding-left:.75rem;vertical-align:top;border-top-width:1px;border-top-style:solid;border-top-color:#dee2e6;" >{{ $curso->titulo }}</td>
            <td style="padding-top:.75rem;padding-bottom:.75rem;padding-right:.75rem;padding-left:.75rem;vertical-align:top;border-top-width:1px;border-top-style:solid;border-top-color:#dee2e6;" >{{ $curso->destacado }}</td>
            </tr> 
        @endforeach               
</body>
</html>
      