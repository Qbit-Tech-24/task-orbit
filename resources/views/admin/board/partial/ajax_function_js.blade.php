<script>
    $(document).ready(function(){
        //#################################  Add List #######################################
        $(document).on('submit', '#formSubmit', function(e) {
            e.preventDefault();
            let name = $('#name').val();
            let board_id = $('#board_id').val();

            $.ajax({
                method: 'POST',
                url: "{{ route('board_lists.store') }}",
                data: {
                    name: name,
                    board_id: board_id
                },
                success: function(res) {
                    if (res.status === 'success') {

                        $('.input-container').hide();
                        $('#name').val('');

                        let newList = `
                        <div class="col-6 col-sm-4 col-lg-2" id="list-item-${res.board_list.id}" style="padding:5px">
                            <div class="card bg-dark text-white border-0 shadow-sm" style="opacity: 3;">
                                <div class="card-header d-flex justify-content-between align-items-center bg-dark text-white border-0">
                                    <div id="list-item-${res.board_list.id}" class="board-list-item">
                                        <span class="list-name" data-list_id="${res.board_list.id}">${res.board_list.name}</span>
                                    </div>
                                    <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h text-white"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" id="delete_list" data-list_id="${res.board_list.id}" href="#">
                                                <span><i class="fas fa-trash"></i></span> Remove List</a></li>
                                    </ul>
                                </div>
                                <div class="card-footer bg-dark text-white border-0">
                                    <a href="javascript:void(0);" class="d-flex align-items-center text-decoration-none bg-dark text-white fw-bold add-card-btn" data-list_id="${res.board_list.id}">
                                        <i class="fas fa-plus me-2"></i> Add a card
                                    </a>
                                    <div class="new-card-container d-none" data-list_id="${res.board_list.id}">
                                        <input type="text" class="new-card-input form-control mb-2" placeholder="Enter card title...">
                                        <button class="save-card-btn btn btn-success btn-sm">Save</button>
                                        <button class="close-card-btn btn btn-danger btn-sm">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;

                        $('#addListButton').parent().before(newList);
                        $('#addListButton').css('display', 'block');
                    }
                },
                error: function(err) {
                    let error = err.responseJSON;
                    $.each(error.errors, function(index, value) {
                        alert(value);
                    });
                }
            });
        });

        //#################################  Delete List #######################################
        $(document).on('click', '#delete_list', function(e) {
            e.preventDefault();

            // Confirm the deletion
            if (confirm('Are you sure you want to delete this list?')) {
                var listId = $(this).data('list_id');

                $.ajax({
                    url: "{{ route('delete.board_lists') }}",
                    method: 'POST',
                    data: {
                        list_id: listId
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            $('#list-item-' + listId).remove();
                        } else {
                            alert('Failed to delete the list. Please try again.');
                        }
                    },
                    error: function() {
                        alert('An error occurred while deleting the list.');
                    }
                });
            }
        });

        //#################################  Update List Name #######################################
        $(document).on('click', '.list-name', function() {
            var currentName = $(this).text();
            var listId = $(this).data('list_id');

            var inputField = $('<input>', {
                type: 'text',
                value: currentName,
                class: 'list-name-input',
                'data-list_id': listId
            });

            $(this).replaceWith(inputField);

            inputField.focus();

            $(document).on('click', function(e) {
                if (!$(e.target).closest('.list-name-input').length && !$(e.target).closest(
                        '.list-name').length) {
                    var originalSpan = $('<span>', {
                        class: 'fw-bold list-name',
                        'data-list_id': listId,
                        text: currentName
                    });

                    inputField.replaceWith(originalSpan);
                }
            });
        });

        //#################################  List Name Input #######################################
        $(document).on('keydown', '.list-name-input', function(e) {
            if (e.key === 'Enter') {
                var updatedName = $(this).val();
                var listId = $(this).data('list_id');
                $.ajax({
                    url: "{{ route('update.board_list_name') }}",
                    method: 'POST',
                    data: {
                        list_id: listId,
                        name: updatedName
                    },
                    success: function(res) {
                        if (res.status === 'success') {
                            var updatedSpan = $('<span>', {
                                class: 'fw-bold list-name',
                                'data-list_id': listId,
                                text: updatedName
                            });
                            $(e.target).replaceWith(updatedSpan);
                        } else {
                            alert('Failed to update the list name.');
                        }
                    },
                    error: function() {
                        alert('Error occurred while updating.');
                    }
                });
            }
        });

        //#################################  Add Card #######################################
        $(document).on('click', '.save-card-btn', function() {
            var listId = $(this).closest('.new-card-container').data('list_id');
            var cardTitle = $('#list-item-' + listId + ' .new-card-input').val().trim();
            // Validate the card title before sending the request
            if (cardTitle === '') {
                alert('Please enter a card title');
                return;
            }

            $.ajax({
                url: "{{ route('add.card') }}",
                method: 'POST',
                data: {
                    title: cardTitle,
                    list_id: listId,
                },
                success: function(response) {
                    if (response.success) {
                        // Append the new card to the list dynamically
                        var newCardHtml = '<li class="list-group-item text-center my-1 border-1 rounded bg-dark text-white">' + response.card.title + '</li>';
                        $('#list-item-' + listId + ' .list-group').append(newCardHtml);

                        // Reset the form and hide the input field
                        $('#list-item-' + listId + ' .new-card-container').addClass('d-none');
                        $('#list-item-' + listId + ' .add-card-btn').removeClass('d-none');
                        $('#list-item-' + listId + ' .new-card-input').val('');
                    } else {
                        alert('Error saving card');
                    }
                },
                error: function() {
                    alert('Failed to communicate with the server');
                }
            });
        });
    });
</script>
