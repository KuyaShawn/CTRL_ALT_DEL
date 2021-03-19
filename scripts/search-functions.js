let overlay = document.getElementById('overlay');
let popup = document.getElementById('popup');

let modalTitle = document.getElementById('modal-title');
let modalAbout = document.getElementById('modal-tagline');
let modalUrlSection = document.getElementById('modal-url-section');
let modalurl = document.getElementById('modal-url');

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

//TODO: Maybe look into creating elements rather then constantly setting IDs for some of these
function updateModalData(data){
    //Set Company Name
    modalTitle.textContent = data.name;


    //Set About
    modalAbout.textContent = data.about;


    //Set URL

    let url
    if(data.url){
        //Build universal url no matter input by parsing via regex
        let urlMatch = data.url.match(/(?:(?:http(?:s)?:\/\/)?(?:www\.)?)?(?<domain>[\w\.-]+){1}(?<path>.*)/);
        url = "https://" + urlMatch.groups.domain + urlMatch.groups.path;

        modalUrlSection.classList.toggle('d-none', false);
    } else {
        url = "";

        modalUrlSection.classList.toggle('d-none', true);
    }
    document.getElementById('modal-url').textContent = url;
    document.getElementById('modal-url').setAttribute('href', url);


    //Set Company Logo/Image
    let imagePath = (data.logo_path) ? data.logo_path : '/images/placeholder.png';
    document.getElementById('modal-image').setAttribute('src', imagePath);


    //Set Company Category
    let modalCategory = document.getElementById('modal-category');
    document.getElementById('modal-category').textContent = data.category;

    let svgNode = document.createElementNS('http://www.w3.org/2000/svg', 'svg'),
        useNode = document.createElementNS('http://www.w3.org/2000/svg', 'use');

    svgNode.classList.add('modal-icon');
    useNode.setAttribute("href", "/images/symbol-defs.svg#energy");
    svgNode.appendChild(useNode);

    console.log(svgNode);
    modalCategory.prepend(svgNode.cloneNode(true));


    //Set Company Location
    if(data.city){
        document.getElementById('modal-city').textContent = data.city;
        document.getElementById('modal-city').classList.toggle('d-none', false);
    } else {
        document.getElementById('modal-city').textContent = "";
        document.getElementById('modal-city').classList.toggle('d-none', true);
    }

    if(!data.city && !data.state && !data.country){
        document.getElementById('modal-location').textContent = "No Location Provided";
    } else {
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
    }


    //Set Company Contact Info
    if(!data.phone && !data.email){
        document.getElementById('modal-contact-error').classList.toggle('d-none', false);
    } else {
        document.getElementById('modal-contact-error').classList.toggle('d-none', true);
    }

    if(data.phone){
        document.getElementById('modal-phone').textContent = data.phone;
        document.getElementById('modal-phone').classList.toggle('d-none', false);
    } else {
        document.getElementById('modal-phone').textContent = "";
        document.getElementById('modal-phone').classList.toggle('d-none', true);
    }

    if(data.email){
        document.getElementById('modal-email').textContent = data.email;
        document.getElementById('modal-email').classList.toggle('d-none', false);
    } else {
        document.getElementById('modal-email').textContent = "";
        document.getElementById('modal-email').classList.toggle('d-none', true);
    }

}
