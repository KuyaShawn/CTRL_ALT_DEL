let tagInput = document.getElementById('tagInput');
tagInput.addEventListener("blur", updateTags);
tagInput.addEventListener('keyup', checkKey);

let tagTemplate = document.getElementById("tagTemplate");
let tagList = document.getElementById("tagList")
let tagString = "";
let charDisplay = document.getElementById("tagCharCount");

const MAX_LENGTH = 250;

document.addEventListener("load", setDynamicStyles);

function setDynamicStyles(){
    tagInput.classList.toggle('w-100'); //this way it follows clean formatting if JS is enabled but looks normal if it isn't;
}


//update tags on comma,
function checkKey(event){
    if(event.code === "Comma"){
        tagInput.value = tagInput.value.slice(0, -1);
        updateTags();
    }
    if(event.code === "Backspace" && tagInput.value.length === 0){
        let tags = tagList.querySelectorAll(".tag");
        if(tags.length > 0){
            let latestTag = tags[tags.length -1];
            tagInput.value = latestTag.querySelector("span").textContent;
            tagList.removeChild(latestTag);
        }
    }
    updateTagString();
}

function updateTags(){
    let textInput = tagList.querySelector("input");
    let tagArray = tagInput.value.split(', '); // split input string based on commas
    tagArray = tagArray.map(tag => tag.trim());
    tagInput.value = tagArray.join(", ");

    for (let tag of tagArray) {
        // Build tag element w/ event listeners
        tag.trim();
        if(tag.length !== 0){
            let tagElement = tagTemplate.content.cloneNode(true);
            tagElement.querySelector("span").textContent = tag;
            tagElement.querySelector(".tag-button").addEventListener("click", removeTag);

            tagList.insertBefore(tagElement, textInput); // append new tag element to list
        }
    }
    tagInput.value = "";
    updateTagString();
}

function removeTag(){
    let tagNode = this.parentElement;
    tagList.removeChild(tagNode);
    updateTagString();
}

function updateTagString(){
    let dataList = Array.from(document.querySelectorAll(".tag-text")).map(x => x = x.textContent);
    tagString = dataList.join(", ");

    if(tagInput.value.length > 0){
        if(tagString.length > 0){
            tagString += ", ";
        }
        tagString += tagInput.value;
    }

    charDisplay.textContent = tagString.length + " / " + MAX_LENGTH;

    if(tagString.length > MAX_LENGTH){
        charDisplay.classList.toggle('error', true);
    } else {
        charDisplay.classList.toggle('error', false);
    }
}