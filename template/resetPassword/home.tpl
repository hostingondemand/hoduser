<form action="{{url("","","send")}}" method="post" class="form-horizontal">
    <div class="form-group">{{bootstrap.label(language("field.email"))}} {{bootstrap.inputFor("email","string")}}</div>
    <input type="submit" name="submit" value="{{language("action.send")}}" class="btn btn-success">
</form>
