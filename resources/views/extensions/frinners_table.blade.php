<table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Giver</th>
            <th scope="col">Taker</th>
            <th scope="col">Taken</th>
            <th scope="col">Date</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($frinners as $frinner)
            <tr>
                <th>{{ $frinner->id }}</th>
                <td>{{ $frinner->user->name }}</td>

                @if ($frinner->taker_id == "")
                    <td></td>
                @else
                    <td>{{ $frinner->taker->name }}</td>
                @endif

                <td>{{ $frinner->taken ? "Yes" : "No" }}</td>
                <td>{{ \Carbon\Carbon::parse($frinner->created_at)->format('d/m/Y') }}</td>
                @if (!$frinner->taken)
                    <td>
                        <form action="/delete_frinner" method="POST">
                            @csrf
                            <input hidden type="text" name="frinner_id" value="{{ $frinner->id }}" />
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                @endif

                @if ($get_matric)
                    <td>
                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#getMatric"
                            onclick="$('#getMatric').find('#modal-body').text('The giver\'s matric number is {{ $frinner->user->matricNo }}.')">
                            Matric
                        </button>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>

@if ($get_matric)
    <div class="modal fade" id="getMatric" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Matric Number</h5>
                    <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="modal-body">The giver's matric number is </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
@endif