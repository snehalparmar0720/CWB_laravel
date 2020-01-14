<div class="col-md-10 col-md-offset-1">
@if (Session::has('success_msg'))
      <div class="alert alert-success">{{ Session::get('success_msg') }} <button type="button" class="close" data-dismiss="alert">×</button></div>
    @endif
  @if (Session::has('error_msg'))
      <div class="alert alert-danger">{{ Session::get('error_msg') }} <button type="button" class="close" data-dismiss="alert">×</button></div>
    @endif
</div>