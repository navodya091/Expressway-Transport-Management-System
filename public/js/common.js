$(document).ready(function() {

  $('.delete-button').on('click', function(event) {
      event.preventDefault(); 

      const deleteButton = $(this);
      const itemId = deleteButton.data('item-id');

      // Show a confirmation dialog using SweetAlert2
      Swal.fire({
          title: 'Are you sure?',
          text: 'You won\'t be able to revert this!',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Yes, delete it!',
      }).then((result) => {
          if (result.isConfirmed) {
              $.ajax({
                  url: deleteButton.attr('href'), 
                  method: 'DELETE',
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function(data) {
                      if (data.success) {
                          // Display a success message
                          Swal.fire('Deleted!', 'The item has been deleted.', 'success').then(() => {
                              
                              location.reload();
                          });
                      } else {
                          Swal.fire('Error', 'Something went wrong. The item was not deleted.', 'error');
                      }
                  },
                  error: function(data) {
                      console.error('Error:', data);
                  }
              });
          }
      });
  });
});