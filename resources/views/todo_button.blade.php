<button type="button" class="btnChangeStatus btn btn-sm btn-outline {{ $statusBtn['btn-class'] }} {{ $statusBtn['btn-activity'] }}" data-id="{{ $todo->id }}" data-status="{{ $statusBtn['btn-status'] }}">
    <i class="fa {{ $statusBtn['btn-icon'] }} fa-fw"></i>
    {{ $statusBtn['btn-title'] }}
</button>