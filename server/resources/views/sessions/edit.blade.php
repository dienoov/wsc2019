@extends('layouts.app')

@section('main')
    <div class="border-bottom mb-3 pt-3 pb-2">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <h1 class="h2">{{ $event->name }}</h1>
        </div>
        <span class="h6">{{ $event->date }}</span>
    </div>

    <div class="mb-3 pt-3 pb-2">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <h2 class="h4">Edit session</h2>
        </div>
    </div>

    <form class="needs-validation" novalidate action="{{ route('sessions.update', [$event->id, $session->id]) }}"
          method="post">
        @method('put')
        @csrf

        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <label for="selectType">Type</label>
                <select class="form-control @if($errors->has('type')) is-invalid @endif" id="selectType" name="type">
                    <option value="talk" @if($session->type === 'talk') selected @endif>Talk</option>
                    <option value="workshop" @if($session->type === 'talk') selected @endif>Workshop</option>
                </select>
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <label for="inputTitle">Title</label>
                <!-- adding the class is-invalid to the input, shows the invalid feedback below -->
                <input type="text" class="form-control @if($errors->has('title')) is-invalid @endif" id="inputTitle"
                       name="title" placeholder="" value="{{ $session->title }}">
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <label for="inputSpeaker">Speaker</label>
                <input type="text" class="form-control @if($errors->has('speaker')) is-invalid @endif" id="inputSpeaker"
                       name="speaker" placeholder="" value="{{ $session->speaker }}">
                @if($errors->has('speaker'))
                    <div class="invalid-feedback">
                        {{ $errors->first('speaker') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <label for="selectRoom">Room</label>
                <select class="form-control @if($errors->has('room')) is-invalid @endif" id="selectRoom" name="room_id">
                    @foreach($event->channels as $channel)
                        @foreach($channel->rooms as $room)
                            <option value="{{ $room->id }}"
                                    @if($session->room_id === $room->id) selected @endif>{{ $room->name }}
                                / {{ $channel->name }}</option>
                        @endforeach
                    @endforeach
                </select>
                @if($errors->has('room'))
                    <div class="invalid-feedback">
                        {{ $errors->first('room') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <label for="inputCost">Cost</label>
                <input type="number" class="form-control @if($errors->has('cost')) is-invalid @endif" id="inputCost"
                       name="cost" placeholder="" value="{{ $session->cost }}">
                @if($errors->has('cost'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cost') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-6 mb-3">
                <label for="inputStart">Start</label>
                <input type="datetime-local"
                       class="form-control @if($errors->has('start')) is-invalid @endif"
                       id="inputStart"
                       name="start"
                       placeholder="yyyy-mm-dd HH:MM"
                       value="{{ $session->startTime }}">
                @if($errors->has('start'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start') }}
                    </div>
                @endif
            </div>
            <div class="col-12 col-lg-6 mb-3">
                <label for="inputEnd">End</label>
                <input type="datetime-local"
                       class="form-control @if($errors->has('end')) is-invalid @endif"
                       id="inputEnd"
                       name="end"
                       placeholder="yyyy-mm-dd HH:MM"
                       value="{{ $session->endTime }}">
                @if($errors->has('end'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-3">
                <label for="textareaDescription">Description</label>
                <textarea class="form-control @if($errors->has('description')) is-invalid @endif"
                          id="textareaDescription" name="description" placeholder=""
                          rows="5">{{ $session->description }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
            </div>
        </div>

        <hr class="mb-4">
        <button class="btn btn-primary" type="submit">Save session</button>
        <a href="{{ route('events.show', $event->id) }}" class="btn btn-link">Cancel</a>
    </form>
@endsection
