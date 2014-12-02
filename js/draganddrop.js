  $(function() {
    $('#Speakers').sortable({
        update: function(event, ui) {
            var list_sortable = $(this).sortable('toArray').toString();
    		// change order in the database using Ajax
            $.ajax({
                url: 'controllers/main.php',
                type: 'POST',
                data: {action:"speaker_sort", list_order:list_sortable},
                success: function(data) {
                    //finished
                }
            });
        }
    }); // fin sortable
});