<h1>{{userName}}</h1>
<h2>{{groupName}}</h2>

<table>
    {{foreach(access,accessLine)}}
        <tr>
            <td>{{accessLine["type"]}}</td>
            <td>{{accessLine["key"]}}</td>
            <td>{{accessLine["level"]}}</td>
        </tr>
    {{/foreach}}
</table>