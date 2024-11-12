<div class="modal fade" id="{{ $id ?? 'defaultModal' }}" tabindex="-1" aria-labelledby="{{ $id ?? 'defaultModal' }}Label" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog {{ $size ?? '' }} {{ $scrollable ? 'modal-dialog-scrollable' : '' }} {{ $centered ? 'modal-dialog-centered' : '' }}">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $id ?? 'defaultModal' }}Label">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            @if(isset($footer))
                <div class="modal-footer">
                    {{ $footer }}
                </div>
            @else

            @endif
        </div>
    </div>
</div>