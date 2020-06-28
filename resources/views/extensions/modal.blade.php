<div class="modal fade" id="{{ $modal_ID }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal">
                <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{ $body }}</p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ $submit_action }}">
                    @csrf
                    <button type="submit" class="btn btn-primary" onclick="">{{ $primary_button }}</button>
                </form>
                @isset($secondary_button)
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ $secondary_button }}</button>
                @endisset
            </div>
        </div>
    </div>
</div>