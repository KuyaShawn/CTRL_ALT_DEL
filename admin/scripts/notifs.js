function alert(msg){
    $('#alert-content').text(msg);
    $("#alert").fadeTo(500, .8).delay(5000).fadeTo(500, 0);
}

function acceptCompany(id){
    document.getElementById(id).style.display = 'none';
    document.getElementById(id).classList.remove('d-flex');
    alert("All Power Labs successfully added to catalog");
}

function rejectCompany(id){
    document.getElementById(id).style.display = 'none';
    document.getElementById(id).classList.remove('d-flex');
    alert("All Power Labs successfully rejected from catalog");
}