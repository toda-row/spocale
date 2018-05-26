@if (count($errors) > 0)
<!-- Form Error List -->
<div class="alert alert-danger">
    <div>
        <strong> 入 力 した 文字 を 修正 してください。 </strong>
    </div>
    <div>
        <ul>
            @foreach ($errors->all() as $error) 
            <li>
                {{ $error }}
            </li>
            @endforeach 
        </ul>
    </div>
</div>
@endif