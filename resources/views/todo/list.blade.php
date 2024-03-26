<h4 class="center">Todo App</h4>
<div>
    <h5>12 March 2024</h5>
    <hr style="margin-top: 0px; margin-bottom: 0px"/>
    <ul style="list-style: none">
        @for($i=0; $i<sizeof($todos); $i++)
            <li>
                <input type="checkbox" />
                <img src="/{{ str_replace('public', 'storage', $todos[$i]['image_url']) }}" />
                {{ $todos[$i]["task"] }}
            </li>
        @endfor
    </ul>
</div>