@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="page-inner ms-lg-0" style="background-color: {{ $board->board_color }}; height:100%">
        <div class="d-flex flex-column flex-md-row align-items-md-center pt-2 pb-4">
            <div class="w-100">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-dark px-3"
                    style="background-color: rgba(0, 0, 0, 0.6); backdrop-filter: blur(10px); border-radius: 5px;">
                    <div class="container-fluid d-flex justify-content-between align-items-center">
                        <!-- Left Side -->
                        <div class="d-flex align-items-center">
                            <span class="navbar-brand fw-bold">{{ $board->name }}</span>
                            <span class="badge bg-dark ms-3">
                                @if ($board->is_enabled == true)
                                public
                                @else
                                private
                                @endif
                            </span>
                            <button class="btn btn-outline-light btn-sm ms-2">Table</button>
                            <button class="btn btn-outline-light btn-sm ms-2">Dashboard</button>
                        </div>

                        <!-- Right Side -->
                        <div class="d-flex align-items-center">
                            <button class="btn btn-outline-light btn-sm mx-1"><i class="fas fa-filter"></i>
                                Filters</button>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('admin/img/profile2.jpg') }}" class="rounded-circle ms-2"
                                    alt="member" width="30" height="30">
                                <span
                                    class="rounded-circle bg-dark text-white d-flex align-items-center justify-content-center ms-2"
                                    style="width: 30px; height: 30px;">M</span>
                                <span
                                    class="rounded-circle bg-dark text-white d-flex align-items-center justify-content-center ms-2"
                                    style="width: 30px; height: 30px;">S</span>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <div class="row" id="board-list">
            @foreach ($board->lists as $list)
            <div class="col-6 col-sm-4 col-lg-2" id="list-item-{{ $list->id }}" style="padding: 5px">
                <div class="card bg-dark text-white border-0 shadow-sm" style="opacity: 3;">
                    <div
                        class="card-header d-flex justify-content-between align-items-center bg-dark text-white border-0">
                        <div id="list-item-{{ $list->id }}" class="board-list-item">
                            <span class="list-name" data-list_id="{{ $list->id }}">{{ $list->name }}</span>
                        </div>

                        <a type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-h text-white"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" id="delete_list" data-list_id="{{ $list->id }}" href="#">
                                    <span><i class="fas fa-trash"></i></span> Remove List</a></li>
                        </ul>
                    </div>

                    <ul class="list-group list-group-flush p-2 bg-dark text-white">
                        @foreach ($list->cards as $card)
                        <li class="list-group-item text-center my-1 border-1 rounded bg-dark text-white"
                            data-bs-toggle="modal" data-bs-target="#modal-{{ $card->id }}">
                            {{ $card->title }}
                            <!-- Display card title in the list -->
                        </li>

                        <!-- Modal for each card with dark background and new design -->
                        <div class="modal fade" id="modal-{{ $card->id }}" tabindex="-1"
                            aria-labelledby="modalLabel-{{ $card->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content bg-dark text-white">
                                    <!-- Dark background and white text -->
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel-{{ $card->id }}">{{ $card->title }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body cardModal">
                                        <div class="row">
                                            <!-- Left Column (col-8) -->
                                            <div class="col-lg-8">
                                                <!-- Description Section -->
                                                <div class="section-title">Description</div>
                                                <div class="form-control mb-3" id="description-toggle-{{ $card->id }}">
                                                    {{ 'Add a more detailed description...' }}
                                                </div>
                                                <div id="textarea-div-{{ $card->id }}" style="display: none;">
                                                    <textarea class="summernote"
                                                        id="summernote-{{ $card->id }}"></textarea>
                                                    <button class="btn btn-primary btn-sm"
                                                        id="save-description-btn-{{ $card->id }}">Save</button>
                                                    <button class="btn btn-danger btn-sm"
                                                        id="close-description-btn-{{ $card->id }}">
                                                        <i class="fas fa-window-close"></i> Close
                                                    </button>
                                                </div>

                                                <!-- Due Date Section -->

                                                {{-- <div class="section-title">Due Date</div>
                                                <div class="form-control mb-3" id="due-date-toggle-{{ $card->id }}">{{ '11/13/2024' }}</div>
                                                <div id="due-date-input-div-{{ $card->id }}" style="display: none;">
                                                    <input type="date" id="due_date-{{ $card->id }}" class="text-light"
                                                        style="background-color: transparent; border: none;">
                                                    <button class="btn btn-primary btn-sm"
                                                        id="save-due-date-btn-{{ $card->id }}">Save</button>
                                                    <button class="btn btn-danger btn-sm"
                                                        id="close-due-date-btn-{{ $card->id }}">
                                                        <i class="fas fa-window-close"></i> Close
                                                    </button>
                                                </div> --}}

                                                <div class="section-title">Custom Field</div>
                                                <div class="row g-3">
                                                    <div class="col-6">
                                                        <select class="form-control" aria-label="Priority">
                                                            <option selected>Priority</option>
                                                            <option>High</option>
                                                            <option>Medium</option>
                                                            <option>Low</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-6">
                                                        <select class="form-control" aria-label="Status">
                                                            <option selected>Status</option>
                                                            <option>To Do</option>
                                                            <option>In Progress</option>
                                                            <option>Completed</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="section-title">Members</div>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('admin/img/profile2.jpg') }}"
                                                        class="rounded-circle ms-2" alt="member" width="30" height="30">
                                                    <span
                                                        class="rounded-circle text-light d-flex align-items-center justify-content-center ms-2"
                                                        style="width: 30px; height: 30px; background-color:#4b4f55;">M</span>
                                                    <span
                                                        class="rounded-circle text-light d-flex align-items-center justify-content-center ms-2"
                                                        style="width: 30px; height: 30px; background-color:#4b4f55;">S</span>
                                                </div>

                                                <div class="section-title">Activity</div>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('admin/img/profile2.jpg') }}"
                                                        class="rounded-circle ms-2" alt="member" width="30" height="30">
                                                    &nbsp;
                                                    <input class="form-control mb-2"
                                                        placeholder="Write a comment..."></input>
                                                </div>
                                                <div class="activity-entry">
                                                    <div>
                                                        <img src="{{ asset('admin/img/profile2.jpg') }}"
                                                            class="rounded-circle ms-2" alt="member" width="30"
                                                            height="30">
                                                        <strong>Admin 01</strong> added this card name {{ $card->title
                                                        }}
                                                    </div>
                                                    <small>{{ $card->created_at->diffForHumans() }}</small>
                                                </div>
                                                <!-- Add more activity entries as needed -->
                                            </div>

                                            <!-- Right Column (col-4) -->
                                            <div class="col-lg-4">
                                                <button type="button" class="btn btn-action mb-2">Join</button>
                                                <button type="button" class="btn btn-action mb-2">Members</button>
                                                <button type="button" class="btn btn-action mb-2">Labels</button>
                                                <button type="button" class="btn btn-action mb-2">Checklist</button>
                                                <button type="button" class="btn btn-action mb-2">Due Date</button>
                                                <button type="button" class="btn btn-action mb-2">Custom Fields</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </ul>


                    <div class="card-footer bg-dark text-white border-0">
                        <a href="javascript:void(0);"
                            class="d-flex align-items-center text-decoration-none bg-dark text-white fw-bold add-card-btn"
                            data-list_id="{{ $list->id }}">
                            <i class="fas fa-plus me-2"></i> Add a card
                        </a>
                        <div class="new-card-container d-none" data-list_id="{{ $list->id }}">
                            <input type="text" class="new-card-input form-control mb-2"
                                placeholder="Enter card title...">
                            <button class="save-card-btn btn btn-primary btn-sm">Add</button>
                            <button class="close-card-btn btn btn-danger btn-sm">
                                <i class="fas fa-window-close"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="col-12 col-sm-6 col-lg-2 mb-3 listAddButton" style="padding: 5px">
                <div id="addListButton" onclick="convertToInput()" class="card bg-light border-0 shadow-sm"
                    style="opacity: 0.8;">
                    <div class="card-header d-flex justify-content-between align-items-center border-0 ">
                        <a href="#" class="text-dark">
                            <i class="fas fa-plus me-2"></i>Add List
                        </a>
                    </div>
                </div>
                {{-- add list button --}}
                <div id="inputContainer" class="input-container" style="display: none;">
                    <form id="formSubmit">
                        <div class="card bg-dark text-white border-0 shadow-sm">
                            <div class="card-header d-flex justify-content-between align-items-center bg-dark border-0">
                                @csrf
                                <!-- Hidden Board ID Field -->
                                <input type="hidden" id="board_id" name="board_id" value="{{ $board->id }}">
                                <input type="text" class="form-control input-field newListName" id="name" name="name"
                                    placeholder="Enter list name" required>
                            </div>
                            <div class="card-footer bg-dark text-white border-0">
                                <button type="submit" class="btn btn-primary submit-btn">Add</button>
                                <button onclick="cancelInput()" class="btn btn-danger cancel-btn">
                                    <i class="fas fa-window-close"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
    @include('admin.board.partial.button_js')
    @include('admin.board.partial.ajax_function_js')
@endpush
