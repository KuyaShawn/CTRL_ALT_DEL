function alert(msg){
    $('#alert-content').text(msg);
    $("#alert").fadeTo(500, .8).delay(5000).fadeTo(500, 0);
}

function acceptCompany(companyId){
    fetch('https://api.ctrl-alt-delete.greenriverdev.com/v1/admin/company/update.php', {
        method: 'PATCH',
        body: JSON.stringify({
            id: companyId,
            status: 'APPROVED'
        }),
        headers: {
            'Content-type': 'application/json; charset=UTF-8'
        }
    })
        .then(response => response.json())
        .then(json => alert(json.message));

    document.getElementById(companyId).style.display = 'none';
    document.getElementById(companyId).classList.remove('d-flex');
}

function rejectCompany(companyId){
    fetch('https://api.ctrl-alt-delete.greenriverdev.com/v1/admin/company/reject.php', {
        method: 'PATCH',
        body: JSON.stringify({
            id: companyId,
            status: 'REJECTED',
            reason:  'Not enough information'
        }),
        headers: {
            'Content-type': 'application/json; charset=UTF-8'
        }
    })
        .then(response => response.json())
        .then(json => alert(json.message));

    document.getElementById(companyId).style.display = 'none';
    document.getElementById(companyId).classList.remove('d-flex');
}