let overlay = document.getElementById('overlay');
let rejectionBox = document.getElementById('rejectionBox');
let approvalBox = document.getElementById('approvalBox');


let focusID = -1;

function beginRejection(companyId){
    focusID = companyId;
    overlay.classList.toggle('active', true);
    rejectionBox.classList.toggle('active', true);
}

function beginApproval(companyId){
    focusID = companyId;
    overlay.classList.toggle('active', true);
    approvalBox.classList.toggle('active', true);
}

function closeDialogue(){
    overlay.classList.toggle('active', false);
    rejectionBox.classList.toggle('active', false);
    approvalBox.classList.toggle('active', false);
    focusID = -1
}

function alert(msg){
    $('#alert-content').text(msg);
    $("#alert").fadeTo(500, .8).delay(5000).fadeTo(500, 0);
}

async function approveCompany(){
    let companyId = focusID;
    closeDialogue();
    await fetch('https://api.ctrl-alt-delete.greenriverdev.com/v1/admin/company/update.php', {
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

async function rejectCompany(){
    let reason = document.getElementById('reason').value;
    let companyId = focusID;
    closeDialogue();
    await fetch('https://api.ctrl-alt-delete.greenriverdev.com/v1/admin/company/reject.php', {
        method: 'PATCH',
        body: JSON.stringify({
            id: companyId,
            status: 'REJECTED',
            reason:  reason
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