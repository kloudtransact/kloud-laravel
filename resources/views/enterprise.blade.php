@extends("layout")

@section('title',"Enterprise Log in")

@section('content')
<h1>Enterprise Log in</h1>
<div class="row">
    <div class="col-md-12">
        <section>
                <h4>Log in to your Enterprise Account</h4>
                <hr>
                <form>
                <div class="text-danger"></div>
                <div class="form-group">
                    <label>Enterprise</label>
                    <select class="form-control">
                      <option value="none">Select enterprise</option>
                    </select>
                    <span class="text-danger"></span>
                </div>
                <div class="form-group">
                    <label>Staff Id</label>
                    <input type="email" class="form-control" />
                    <span class="text-danger"></span>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" />
                    <span class="text-danger"></span>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label">
                            <input type="checkbox" />
                            Remember me
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Log in</button>
                </div>
                <div class="form-group">
                    <p>
                        <a id="forgot-password">Forgot your password?</a>
                    </p>
                    <p>
                        <a href="#">Coming soon</a>
                    </p>
                </div>
              </form>
        </section>
    </div>
</div>
@stop