$(document).on("click","#delete", function () {
    const id = $(this).data('id'); 
    const tr = $(this).closest('tr');

    $.ajax({
        type: "DELETE",
        url: ROUTE_POST +'/' +  id,
        data: {id: id},
        success: function () {
            alert("User deleted successfully");
            tr.remove();
        }
      });
 });
