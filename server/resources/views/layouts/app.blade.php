@extends('layouts.html')

@section('body')
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ route('events.index') }}">Event Platform</a>
        <span class="navbar-organizer w-100">{{ auth()->user()->name }}</span>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <form action="{{ route('auth.logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-link text-secondary">Sign out</button>
                </form>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('events.index') }}">
                                Manage Events
                            </a>
                        </li>
                    </ul>

                    @if(request()->path() !== 'events' && request()->path() !== 'events/create')
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span>{{ $event->name }}</span>
                        </h6>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="{{ route('events.show', $event->id) }}" class="nav-link">
                                    Overview
                                </a>
                            </li>
                        </ul>

                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span>Reports</span>
                        </h6>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="{{ route('reports.index', $event->id) }}" class="nav-link">
                                    Room Capacity
                                </a>
                            </li>
                        </ul>
                    @endif
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

                @include('layouts.alert')

                @yield('main')

            </main>
        </div>
    </div>
@endsection
