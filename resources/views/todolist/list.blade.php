
@include('todolist.header')
<div class="container mt-5">
      <div class="row">
           <div class="col-md-12 col-lg-12">
            </div>        
         
      </div>

  </div>  
<div class="container mt-5">
    <div class="row">
     
    @foreach($tasks as $task)
    <div class="col-md-3">
      <div class="card-counter danger">
        <i class="fa fa-ticket"></i>
        <span class="count-numbers">{{$task->name}}</span>
        <span class="count-name">{{$task->deadline}}</span>
      </div>
    </div>
    @endforeach

    

   
  </div>
</div>
