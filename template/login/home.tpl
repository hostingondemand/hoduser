{{language("head")}}

<form action="{{url("","","doLogin")}}" method="post">
    <p><label>{{language("field.username")}}</label> {{inputFor("username","string")}}</p>
    <p><label>{{language("field.password")}}</label> {{inputFor("password","password")}}</p>
    <input type="submit" name="submit" value="{{language("action.login")}}">
</form>