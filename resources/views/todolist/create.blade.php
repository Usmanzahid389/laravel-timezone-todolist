 
@include('todolist.header')

<div class="container" style="margin-top: 145px;">
  <h2>Create New Task</h2>
  <form action="{{url('/create')}}" method="post">
    @csrf
    <div class="form-group">
      <label for="task">Task Name</label>
      <input type="text" class="form-control" id="email" placeholder="Enter task name" name="name">
    </div>
    <div class="form-group">
      <label for="pwd">Deadline:</label>
      <input type="date" class="form-control" id="pwd" placeholder="Enter deadline" name="date">
    </div>

     <div class="form-group">
      <label for="pwd">Deadline Time</label>
      <input type="time" class="form-control" id="pwd" placeholder="Enter deadline" name="time">
    </div>
    
    <button type="submit" class="btn btn-primary float-lg-right">Submit</button>
  </form>
</div>
 
