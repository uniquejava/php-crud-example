$(function () {
    $(document).on('click', 'a#user_list', function () {
        getUserList(this);
    })
});

function getUserList(element) {
    $('#indicator').show();

    $.post('Controller.php', {action: 'get_users'}, function (data, status) {
        renderUserList(data);
        $('#indicator').hide();

    }, 'json');

}

function renderUserList(jsonData) {

    var table = '<table width="600" cellpadding="5" class="table table-hover table-bordered"><thead><tr><th scope="col">Name</th><th scope="col">Email</th><th scope="col">Mobile</th><th scope="col">Address</th><th scope="col"></th></tr></thead><tbody>';

    $.each(jsonData, function (index, user) {
        table += '<tr>';
        table += '<td class="edit" field="name" user_id="' + user.id + '">' + user.name + '</td>';
        table += '<td class="edit" field="email" user_id="' + user.id + '">' + user.email + '</td>';
        table += '<td class="edit" field="mobile" user_id="' + user.id + '">' + user.mobile + '</td>';
        table += '<td class="edit" field="address" user_id="' + user.id + '">' + user.address + '</td>';
        table += '<td><a href="javascript:void(0);" user_id="' + user.id + '" class="delete_confirm btn btn-danger"><i class="icon-remove icon-white"></i></a></td>';
        table += '</tr>';
    });

    table += '</tbody></table>';

    $('div#content').html(table);
}