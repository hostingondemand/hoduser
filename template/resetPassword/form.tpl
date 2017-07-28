<form action="{{url("","","doReset")}}" method="post" class="form-horizontal">
    {{message}}
    {{if(showForm)}}
    <div class="form-group">{{bootstrap.label(language("field.password"))}} {{bootstrap.inputFor("password","password")}}</div>
    <div class="form-group">{{bootstrap.label(language("field.rePassword"))}} {{bootstrap.inputFor("rePassword","password")}}</div>
    <input type="submit" name="submit" value="{{language("action.save")}}" class="btn btn-success">
    {{inputFor("code","hidden")}}
    {{/if}}
</form>
