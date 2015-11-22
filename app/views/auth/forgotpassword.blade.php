    @extends('layouts.scaffold')

@section('main')
 <div class="row">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                      <h3 class="text-center">Forgot Password?</h3>
                      <p>If you have forgotten your password - reset it here.</p>
                        <div class="panel-body">
                          
                          <form class="form" method="POST" action="resetpassword"><!--start form--><!--add form action as needed-->
                            <fieldset>
                              <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                  <!--EMAIL ADDRESS-->
                                  <input id="emailInput" placeholder="email address" class="form-control" type="email" name="email" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <input class="btn btn-lg btn-primary btn-block" value="Send My Password" type="submit">
                              </div>
                            </fieldset>
                            <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="/login">Login</a></div>
                          </form><!--/end form-->
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop