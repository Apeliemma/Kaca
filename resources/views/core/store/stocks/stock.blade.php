@php use App\Repositories\StatusRepository; @endphp
@extends('layouts.dashboard')

@section('title')
    Part: {{ $stock->sparePart?->part_number }}
@endsection
@section('bread_crumb')
    <li class="breadcrumb-item"><a class="breadcrumb-link load-page"
                                   href="{{ url('store/stocks/spareparts') }}">Parts</a></li>
    <li class="breadcrumb-item"><a class="breadcrumb-link load-page"
                                   href="{{ url('store/stocks/spareparts/'.$stock->sparePart?->id) }}">View Part</a>
    </li>

@endsection

@section('content')

    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="float-right col-md-8">
                        <div class="table-responsive">
                            <table class="table table-striped table-condensed table-hover">
                                <tbody>
                                <tr>
                                    <th> Issue Type</th>
                                    <td>{{ $stock->entry_type }}</td>
                                </tr>

                                <tr>
                                    <th> Quantity</th>
                                    <td>{{ $stock->quantity }}</td>
                                </tr>
                                <tr>
                                    <th>State</th>
                                    <td>{{ $stock->state }}</td>
                                </tr>
                                <tr>
                                    <th>Reason</th>
                                    <td>{{ $stock->reason }}</td>
                                </tr>

                                <tr>
                                    <th>Initiator</th>
                                    <td>
                                        {{ $stock->user?->full_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if($stock->entry_type == 'RV')
                                            <badge> {{ StatusRepository::getReceiveStatus($stock->receive_status) }}</badge>
                                        @else
                                            {{ StatusRepository::getIssueStatus($stock->issue_status) }}
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th>Issued To</th>
                                    <td>
                                        @if($stock->account_issued == 'supplier')
                                            {{ $stock->supplier?->name }}
                                        @elseif($stock->account_issued == 'store')
                                            {{ $stock->store?->name }}
                                        @else
                                            Tech
                                        @endif
                                    </td>
                                </tr>

                                @if($stock->reference)
                                    <tr>
                                        <th>Reference</th>
                                        <td>{{ $stock->reference }}</td>
                                    </tr>
                                @endif

                                <tr>
                                    <th>Date Initiated</th>
                                    <td>{{ $stock->created_at->format('Y-m-d') }}</td>
                                </tr>

                                @if($stock->remarks)
                                    <tr>
                                        <th>Remarks</th>
                                        <td>
                                            <blockquote class="blockquote text-primary">
                                                <p>"{{ $stock->remarks }}"</p>
                                            </blockquote>

                                        </td>
                                    </tr>
                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div>

                </div>
            </div>
        </div>
    </div>

@endsection
