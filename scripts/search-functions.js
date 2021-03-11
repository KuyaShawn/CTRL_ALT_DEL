let overlay = document.getElementById('overlay');
let popup = document.getElementById('popup');

async function openModal(id) {

    let response = await fetch('https://api.ctrl-alt-delete.greenriverdev.com/v1/company/read.php?id=' + id)
    let data = await (response.json());

    updateModalData(data);

    if (popup == null) return
    popup.classList.add('active')
    overlay.classList.add('active')
}

function closeModal() {
    if (popup == null) return
    popup.classList.remove('active')
    overlay.classList.remove('active')
}

function updateModalData(data){
    document.getElementById('modal-title').textContent = data.name;
    document.getElementById('modal-tagline').textContent = data.about;

    let url
    if(data.url !== ""){
        document.getElementById('modal-url-heading').classList.toggle('d-none', false);
        let urlMatch = data.url.match(/(?:(?:http(?:s)?:\/\/)?(?:www\.)?)?(?<domain>[\w\.-]+){1}(?<path>.*)/);
        url = "https://" + urlMatch.groups.domain + urlMatch.groups.path;
    } else {
        document.getElementById('modal-url-heading').classList.toggle('d-none', true);
        url = "";
    }

    let imagePath = (data.logo_path !== 0) ? data.logo_path : '/images/dirt_plants.png';

    document.getElementById('modal-image').setAttribute('src', imagePath);



    document.getElementById('modal-url').textContent = url;
    document.getElementById('modal-url').setAttribute('href', url);

    /*
    Doesn't work, need research on how to get svg nodes to properly append and prepend
    let modalCategory = document.getElementById('modal-category');
    modalCategory.removeChild(modalCategory.firstChild);

    let iconNode = document.createElement('svg')
    iconNode.classList.add('nav-icon');
    let useNode = document.createElement('use');
    useNode.setAttribute("href", "/images/symbol-defs.svg#" + data.category);
    iconNode.appendChild(useNode);

    console.log(iconNode);
    modalCategory.prepend(iconNode.cloneNode(true));
    */

    //document.getElementById('modal-icon').href = ('/images/symbol-defs.svg#' + data.category);
    document.getElementById('modal-category').textContent = data.category;

    let locationString = "";
    if(data.state !== ""){
        locationString += data.state;
    }
    if(data.country !== ""){
        if(data.state !== ""){
            locationString += ", ";
        }
        locationString += data.country;
    }

    document.getElementById('modal-location').textContent = locationString;
    document.getElementById('modal-phone').textContent = data.phone;
}
