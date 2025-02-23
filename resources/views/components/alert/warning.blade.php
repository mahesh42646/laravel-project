@if ($error)
    <div class="alert alert-dismissible fade show" role="alert" style="color: #121b22; background-color: #fff0d3; border-color: #ffecb5;">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" fill="#ffbc39" viewBox="0 0 16 16" style="margin-right: 8px;">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            {!! $error !!}
            <button type="button" data-dismiss="alert" aria-label="Close" style="position: absolute; right: 0; z-index: 2; font-weight: 600; box-sizing: content-box; width: 1em; height: 1em; margin-right: 5px; border: 0; border-radius: .25rem; opacity: .5; background-color: transparent;outline: none; padding: 0px 20px;">X</button>
        </div>
    </div>
@endif
