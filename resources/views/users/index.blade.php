<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Furmulario crud</title>
  </head>
  <body>
    <h1>Hello, world!</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <div class="container">
      <div class="row">
        <div class="col-sm-8 mx-auto">        
            <div class="card border-0 shadow">
               @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                - {{$error}} <br>
                @endforeach
              </div>
              @endif
              
              <form action="index.php{{route('users.store', [] ,false)}}" method="POST">
                <div class="form-row">
                  @csrf
                  <div class="col-sm-4">            
                    <input type="text" name="name" class="form-control" placeholder="nombre" value="{{old('name')}}">  
                  </div>
                  <div class="col-sm-4">            
                    <input type="email" name="email" class="form-control" placeholder="email"
                    value="{{old('email')}}">  
                  </div>
                  <div class="col-sm-4">            
                    <input type="password" name="password" class="form-control" placeholder="password">  
                  </div>
                  <div class="col-auto">
                    <input type="submit" value="Enviar" class="btn btn-primary" >
                  </div>
                </div>
              </form>
            </div>
          
        </div>        
      </div>
      
    </div>

    <table class="table border">
      <tbody>
      @foreach($users as $user)
      <tr>
        <td>
          {{$user->id}}
        </td>
        <td>
          {{$user->name}}
        </td>
        <td>
          {{$user->email}}
        </td>
        <td>
          {{$user->password}}
        </td>

        <td>          
          <form action="index.php{{route('users.destroy', $user, false)}}" method="POST">
            @method('DELETE')
            @csrf
            
            <input type="submit" value="Eliminar" class="btn btn btn-danger" onclick="return confirm('¿Deseas eliminar? ...')">

          </form>
        </td>
      </tr>
      </tbody>
      @endforeach 
      
    </table>



  </body>
</html>
