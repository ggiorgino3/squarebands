function generate_row(information) {
    
    information = initialize_information(information);

    new_row =
        "<tr>" +
        "<td class='align-middle'>" 
            + `<div class="input-group my-1">
                    <div class="input-group-text">
                        <input id="visible" type="checkbox" ` + (information.visible ? 'checked' : '' )+ `/>
                    </div> 
                </div>` 
            +
        "</td>" +
        "<td class='align-middle'>" 
            + `<div class="input-group my-1">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Key</span>
                    </div>
                    <input type='text' class='form-control' id="key" value='${information.key}' />` 
                    +
        "</td>" +
        "<td class='align-middle'>" 
            + `<div class="input-group  my-1">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Title</span>
                    </div>
                    <input type='text' id="title" class='form-control title' ` + (information.visible ? '' : 'disabled' )+ ` value='${information.title}' />` 
                    +
        "</td>" +
        "<td>" +
             `<div class="input-group my-1">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Value</span>
                    </div>
                    <input type='text' id="value" class='form-control' value='${information.value}' />` +
        "</td>"+
        "<td class='align-middle'>";
        if(information.id) {
            new_row += `<div class="text-center">
                            <a id="save" class="mx-2" data-id_elem="${information.id}" href="#"><i class="fas fa-save icons"></i></a>
                            <a id="delete" class="mx-2" data-id_elem="${information.id}" href="#"><i class="fas fa-trash icons"></i></a>
                        </div>`;
        } else {
            new_row += `<div class="text-center">
                            <a id="create" class="mx-2" href="#"><i class="fas fa-save icons"></i></a>
                        </div>`;
        }
        new_row += "</td></tr>";
    return new_row;
}

function initialize_information (information) {
    if(information) {
        information.key ??= "";
        information.value ??= "";
        information.title ??= "";
        information.visible ??= "";
        information.id ??= "";
        return information
    } else {
        new_info = new Object();
        new_info.key = '';
        new_info.value = '';
        new_info.title = '';
        new_info.visible = '';
        new_info.id = '';
        return new_info;
    }
}

$(document).on("click", "#create", function () {
   
    const tr = $(this).closest('tr');
    const meta_key = $("input#key", tr).val();
    const title = $("input#title", tr).val();
    const meta_value = $("input#value", tr).val();
    const visible = + $("input#visible", tr).is(":checked");

    const new_info = {meta_key: meta_key, title: title, meta_value: meta_value, visible_on_frontend: visible };
    $.ajax({
        type: "POST",
        url: ROUTE_POST,
        data: new_info,
        success: ( response ) => {
            alert("Information created successfully ");
            new_info.id = response.id;
            new_info.key = new_info.meta_key;
            new_info.title = new_info.title;
            new_info.value = new_info.meta_value;
            new_info.visible = new_info.visible_on_frontend;
            $('tbody').append(generate_row(new_info));
            tr.remove();
        }
        //dataType: dataType
      });

 });

 $(document).on("click", "#save", function () {
    const id = $(this).data('id_elem'); 
   
    const tr = $(this).closest('tr');
    const meta_key = $("input#key", tr).val();
    const title = $("input#title", tr).val();
    const meta_value = $("input#value", tr).val();
    const visible = + $("input#visible", tr).is(":checked");

    $.ajax({
        type: "PUT",
        url: ROUTE_POST +'/' + id,
        data: {id: id, meta_key: meta_key, title: title, meta_value: meta_value, visible: visible },
        success: () => alert("Information updated successfully"),
        //dataType: dataType
      });
 });


$(document).on("click","#delete", function () {
    const id = $(this).data('id_elem'); 
    const tr = $(this).closest('tr');

    $.ajax({
        type: "DELETE",
        url: ROUTE_POST +'/' +  id,
        data: {id: id},
        success: function () {
            
            alert("Information deleted successfully");
            tr.remove();

        }
        //dataType: dataType
      });
 });
