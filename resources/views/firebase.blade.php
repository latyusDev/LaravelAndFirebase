{{-- @section('content') --}}
    @if (session()->has('msg'))
        {{session('msg')}}
    @endif
   <div style=" display:flex; justify-content:center; align-items:center;
    position:fixed; top:0; left:0; right:0; bottom:0; font-family:Arial, Helvetica, sans-serif;">
    <div style=" max-width:800px; width:80%;  ">
       @foreach ($values as $key =>  $value)
           <div style="padding-inline:10px; display:flex; justify-content:space-between;
            align-items:center; border-bottom: 3px solid red;  ">
            <p>{{$value['fname']}}</p>
            <p>{{$value['fname']}}</p>
            <p>{{$value['email']}}</p>
            <a href={{"/index/$key"}} style="text-decoration: none; 
            padding:10px 29px 10px 29px; font-family:Arial, Helvetica, sans-serif;
            color:white; background:blue; border-radius:8px;"
            >show</a>
            <a href={{"/destroy/$key"}} style="text-decoration: none; 
            padding:10px 29px 10px 29px; font-family:Arial, Helvetica, sans-serif;
            color:white; background:red; border-radius:8px;"
            >delete</a>
            <a href={{"/update/$key"}} style="text-decoration: none; 
            padding:10px 29px 10px 29px; font-family:Arial, Helvetica, sans-serif;
            color:white; background:green; border-radius:8px;"
            >update</a>
            
           </div>

       @endforeach

       
    </div>
   </div>
{{-- @endsection --}}