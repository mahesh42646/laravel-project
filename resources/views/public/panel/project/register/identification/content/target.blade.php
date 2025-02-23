<div class="px-3 pb-3" data-target-container>
    <div class="bg-white mb-3">
        <textarea  class="form-control" name="identification_target" rows="5" @if ($isRequireds[7]) required @endif>
            {{ $project->identification_target }}
        </textarea>
    </div>
    <div data-target-alert></div>
    <button type="button" class="w-100 bg-white btn text-dark px-3 py-1 mb-2" style="border: 1px solid #ced4da;"
        onclick="saveTarget(this)"
    >
        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="#ff9d0a" viewBox="0 0 256 256">
            <path d="M221.66,90.34,192,120,136,64l29.66-29.66a8,8,0,0,1,11.31,0L221.66,79A8,8,0,0,1,221.66,90.34Z" opacity="0.2"></path>
            <path d="M53.92,34.62A8,8,0,1,0,42.08,45.38l48.2,53L36.68,152A15.89,15.89,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31l50.4-50.39,47.69,52.46a8,8,0,1,0,11.84-10.76Zm63,93.12L68,176.69,51.31,160l49.75-49.74ZM48,179.31,76.69,208H48Zm48,25.38L79.32,188l48.41-48.41,15.89,17.48ZM227.32,73.37,182.63,28.69a16,16,0,0,0-22.63,0L118.33,70.36a8,8,0,0,0,11.32,11.31L136,75.31,152.69,92,145,99.69A8,8,0,1,0,156.31,111l7.69-7.69L180.69,120l-9,9A8,8,0,0,0,183,140.34L227.32,96A16,16,0,0,0,227.32,73.37ZM192,108.69,147.32,64l24-24L216,84.69Z"></path>
        </svg>
        <span class="ml-1 font-weight-bold">SALVAR RASCUNHO</span>
    </button>
</div>
