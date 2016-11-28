{{hodclient.require("bootstrap")}}

<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">{{language("head")}}</div>
            <div class="panel-body">
                <form action="{{url("","","doRegister")}}" method="post" class="form-horizontal">
                    <div class="form-group">{{bootstrap.label(language("field.username"))}} {{bootstrap.inputFor("username","string")}}</div>
                    <div class="form-group">{{bootstrap.label(language("field.password"))}} {{bootstrap.inputFor("password","password")}}</div>
                    <div class="form-group">{{bootstrap.label(language("field.rePassword"))}} {{bootstrap.inputFor("rePassword","password")}}</div>
                    <div class="form-group">{{bootstrap.label(language("field.email"))}} {{bootstrap.inputFor("email","string")}}</div>
                    <input type="submit" name="submit" value="{{language("action.register")}}" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</div>