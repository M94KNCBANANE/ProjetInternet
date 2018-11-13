function getProductTypes() {
    $.ajax({
        type: 'GET',
        url: urlToRestApi,
        dataType: "json",
        success:
                function (productTypes) {
                    var productTypesTable = $('#productTypesData');
                    productTypesTable.empty();
                    var count = 1;
                    $.each(productTypes.data, function (key, value)
                    {
                        var editDeleteButtons = '</td><td>' +
                                '<a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editproductTypes(' + value.id + ')"></a>' +
                                '<a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete data?\') ? productTypesAction(\'delete\', ' + value.id + ') : false;"></a>' +
                                '</td></tr>';
                        productTypesTable.append('<tr><td>' + value.id + '</td><td>' + value.name + editDeleteButtons);
                        count++;
                    });
                 }
    });
}
 /* Function takes a jquery form
 and converts it to a JSON dictionary */
function convertFormToJSON(form) {
    var array = $(form).serializeArray();
    var json = {};
     $.each(array, function () {
        json[this.name] = this.value || '';
    });
     return json;
}
 /*
 $('#productTypesAddForm').submit(function (e) {
 e.preventDefault();
 var data = convertFormToJSON($(this));
 alert(data);
 console.log(data);
 });
 */
 function productTypesAction(type, id) {
    id = (typeof id == "undefined") ? '' : id;
    var statusArr = {add: "added", edit: "updated", delete: "deleted"};
    var requestType = '';
    var productTypesData = '';
    var ajaxUrl = urlToRestApi;
    if (type == 'add') {
        requestType = 'POST';
        productTypesData = convertFormToJSON($("#addForm").find('.form'));
    } else if (type == 'edit') {
        requestType = 'PUT';
		ajaxUrl = ajaxUrl + "/" + idEdit.value;
        productTypesData = convertFormToJSON($("#editForm").find('.form'));
		
    } else {
        requestType = 'DELETE';
        ajaxUrl = ajaxUrl + "/" + id;
    }
    $.ajax({
        type: requestType,
        url: ajaxUrl,
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify(productTypesData),
        success: function (msg) {
            if (msg) {
                alert('Product Types data has been ' + statusArr[type] + ' successfully.');
                getProductTypes();
                $('.form')[0].reset();
                $('.formData').slideUp();
            } else {
                alert('Some problem occurred, please try again.');
            }
        }
    });
}
 /*** à déboguer ... ***/
function editproductTypes(id) {
    $.ajax({
        type: 'GET',
        dataType: 'JSON',
        url: urlToRestApi+ "/" + id,
        success: function (data) {
            $('#idEdit').val(data.data.id);
            $('#nameEdit').val(data.data.name);
            $('#editForm').slideDown();
        }
    });
} 