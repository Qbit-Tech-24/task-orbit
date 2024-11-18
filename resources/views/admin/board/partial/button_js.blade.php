<script>
    // Handle add list button for list
    function convertToInput() {
        document.getElementById('addListButton').style.display = 'none';
        document.getElementById('inputContainer').style.display = 'block';
    }
    // cancel input for list
    function cancelInput() {
        resetUI();
    }
    // Handle reset button for list
    function resetUI() {
        document.getElementById('inputContainer').style.display = 'none';
        document.getElementById('addListButton').style.display = 'block';
        document.getElementsByClassName('newListName')[0].value = '';
    }

    $(document).ready(function(){
         // Handle Save Card button click for card
        $(document).on('click', '.add-card-btn', function() {
            var listId = $(this).data('list_id');
            // Show the input field and action buttons for adding a card
            $(this).addClass('d-none');
            $('#list-item-' + listId + ' .new-card-container').removeClass('d-none');
        });

        // Handle Save Card button click for card
        $(document).on('click', '.add-card-btn', function() {
            var listId = $(this).data('list_id');
            // Show the input field and action buttons for adding a card
            $(this).addClass('d-none');
            $('#list-item-' + listId + ' .new-card-container').removeClass('d-none');
        });

        // Handle close button for card
        $(document).on('click', '.close-card-btn', function() {
            // Reset the input field and hide the input form for  card
            var listId = $(this).closest('.new-card-container').data('list_id');
            $('#list-item-' + listId + ' .new-card-input').val('');
            $('#list-item-' + listId + ' .new-card-container').addClass('d-none');
            $('#list-item-' + listId + ' .add-card-btn').removeClass('d-none');
        });

        // Handle Toggle the description textarea
        $(document).on('click', '[id^=description-toggle-]', function() {
            const cardId = $(this).attr('id').split('-')[2];
            $(`#description-toggle-${cardId}`).hide();
            $(`#textarea-div-${cardId}`).show();
        });

        // Handle Close description editor without saving
        $(document).on('click', '[id^=close-description-btn-]', function() {
            const cardId = $(this).attr('id').split('-')[3];
            $(`#textarea-div-${cardId}`).hide();
            $(`#description-toggle-${cardId}`).show();
        });

        // Handle Toggle the due date input field
        $(document).on('click', '[id^=due-date-toggle-]', function() {
            const cardId = $(this).attr('id').split('-')[3];
            $(`#due-date-toggle-${cardId}`).hide();
            $(`#due-date-input-div-${cardId}`).show();
        });

        // Handle Close due date input without saving
        $(document).on('click', '[id^=close-due-date-btn-]', function() {
            const cardId = $(this).attr('id').split('-')[3];
            $(`#due-date-input-div-${cardId}`).hide();
            $(`#due-date-toggle-${cardId}`).show();
        });
    });
</script>
