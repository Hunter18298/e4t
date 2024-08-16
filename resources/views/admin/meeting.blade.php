@extends('components.layouts.dashboard')

@section('content')
    <div class="container mx-auto p-4">
        @livewire('admin.meeting-table')
        <!-- Mark as Paid Modal -->
        <div class="modal fade" id="markPaidModal" tabindex="-1" aria-labelledby="markPaidModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="markPaidModalLabel">Mark as Paid</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('meetings.markPaid') }}">
                            @csrf
                            <input type="hidden" name="meeting_id" id="meetingId" value="">
                            <div class="mb-3">
                                <label for="paidAmount" class="form-label">Amount Paid:</label>
                                <input type="number" class="form-control" id="paidAmount" name="paidAmount" required>
                            </div>
                            <div class="mb-3">
                                <label for="courseGroup" class="form-label">Course Group:</label>
                                <select name="groupId" id="courseGroup" class="form-select">
                                    @foreach ($courseGroups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="colorStatus" class="form-label">Color Status:</label>
                                <select name="colorStatusId" id="colorStatus" class="form-select">
                                    @foreach ($colorStatus as $status)
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
