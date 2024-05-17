let editorValue;
document.addEventListener("DOMContentLoaded", function () {
    if (document.getElementById("editor")) {
        ClassicEditor.create(document.querySelector("#editor"), {})
            .then((editor) => {
                editor.model.document.on("change:data", () => {
                    editorValue = editor.getData();
                    if (title) {
                        updateButtonColor();
                    }
                    if(projectActivityName){
                        submitProjectAndActivities();
                        console.log('test');
                    }
                });
            })
            .catch((error) => {
                console.error(error);
            });
    }
});
const fileInput = document.getElementById("image");
const fileInput2 = document.getElementById("image2");
const imageButton = document.getElementById("imageButton");
const imageButton2 = document.getElementById("imageButton2");
const submitParalelkiButton = document.getElementById('submit-paralelki')

if(fileInput && fileInput2){
    fileInput.addEventListener('input', submitParalelki);
    fileInput2.addEventListener('input', submitParalelki);
}
function submitParalelki(){
    if(fileInput.files.length > 0){
        imageButton.classList.remove('red-button');
        imageButton.classList.add('green-button');
    }
    if(fileInput2.files.length > 0){
        imageButton2.classList.remove('red-button');
        imageButton2.classList.add('green-button');
    }
    if (fileInput.files.length > 0 && fileInput2.files.length > 0) {
        submitParalelkiButton.classList.remove('red-button');
        submitParalelkiButton.classList.add('green-button');
    }
    
}

if (imageButton) {
    imageButton.addEventListener("click", function () {
        fileInput.click();
    });
}
if (imageButton2) {
    imageButton2.addEventListener("click", function () {
        fileInput2.click();
    });
}
const errorField = document.getElementsByClassName("error-field")[0];
const galleryForm = document.getElementById("galleryForm");
const imageInput = document.getElementById("image");
const uploadButton = document.getElementById("uploadButton");
if (imageInput && uploadButton) {
    imageInput.addEventListener("change", function () {
        if (imageInput.files.length > 0) {
            // If a file is selected, change the style of the Upload Image button to green
            uploadButton.classList.remove("red-button");
            uploadButton.classList.add("green-button");
            errorField.style.display = "none";
        } else {
            // If no file is selected, revert the style of the Upload Image button to red
            uploadButton.classList.remove("green-button");
            uploadButton.classList.add("red-button");
        }
    });
}
if (galleryForm) {
    galleryForm.addEventListener("submit", function (event) {
        if (imageInput.files.length === 0) {
            // If no file is selected, prevent form submission
            event.preventDefault();
            errorField.style.display = "block";
            errorField.textContent = "Please select an image to upload";
        } else {
            errorField.textContent = "";
        }
    });
}

const title = document.getElementById("title");
const shortContent = document.getElementById("short_content");
const editor = document.getElementById("editor");
const submitButton = document.getElementById("submit-button");
if (title) {
    title.addEventListener("input", updateButtonColor);
}
if (shortContent) {
    shortContent.addEventListener("input", updateButtonColor);
}

function updateButtonColor() {
    if (title.value && shortContent.value && editorValue !== undefined) {
        submitButton.classList.remove("red-button");
        submitButton.classList.add("green-button");
    } else {
        submitButton.classList.remove("green-button");
        submitButton.classList.add("red-button");
    }
}

const documentButton = document.getElementById("documentButton");
const documentInput = document.getElementById("document");
if (documentInput) {
    documentInput.addEventListener("change", () => {
        console.log(documentInput);
        if (documentInput.files.length > 0) {
            documentButton.classList.remove("red-button");
            documentButton.classList.add("green-button");
            documentButton.textContent = "Одбрано";
            if (document.getElementById("name")) {
                submitButtonChange();
            }
        } else {
            documentButton.classList.remove("green-button");
            documentButton.classList.add("red-button");
            documentButton.textContent = "Одбери";
        }
    });
}
if (documentButton) {
    documentButton.addEventListener("click", () => {
        documentInput.click();
    });
}
const nameErasmus = document.getElementById("name");
const startYear = document.getElementById("start_date");
const endYear = document.getElementById("end_date");

if (nameErasmus && startYear && endYear) {
    nameErasmus.addEventListener("input", submitButtonChange);
    startYear.addEventListener("input", submitButtonChange);
    endYear.addEventListener("input", submitButtonChange);
}
function submitButtonChange() {
    if (
        document.getElementById("editMode") &&
        document.getElementById("name")
    ) {
        console.log(true);
        console.log(nameErasmus.value);
        console.log(startYear.value);
        console.log(endYear.value);
        console.log(documentInput.files.length);
        if (nameErasmus.value && startYear.value && endYear.value !== "") {
            submitButton.classList.remove("red-button");
            submitButton.classList.add("green-button");
        } else {
            submitButton.classList.remove("green-button");
            submitButton.classList.add("red-button");
        }
    } else {
        if (
            nameErasmus.value &&
            startYear.value &&
            endYear.value !== "" &&
            documentInput.files.length > 0
        ) {
            submitButton.classList.remove("red-button");
            submitButton.classList.add("green-button");
        } else {
            submitButton.classList.remove("green-button");
            submitButton.classList.add("red-button");
        }
    }
}
const documentTitle = document.getElementById("documents-title");
const documentFile = document.getElementById("document");
const documentCategory = document.getElementsByClassName("category")[0];
const documentYear = document.getElementById("year");
const documentEndYear = document.getElementById("end_year");
const submitDocumentsButton = document.getElementById("submit-documents");
if ((documentTitle, documentFile, documentCategory, documentYear)) {
    documentTitle.addEventListener("input", submitDocuments);
    documentFile.addEventListener("input", submitDocuments);
    documentCategory.addEventListener("input", submitDocuments);
    documentYear.addEventListener("input", () => {
        submitDocuments();
        endYearOptions();
    });
}

function submitDocuments() {
    if (
        document.getElementById("editMode") &&
        document.getElementById("documents-title")
    ) {
        if (
            documentTitle.value &&
            documentCategory.value &&
            documentYear.value !== "" &&
            documentFile.files.length >= 0
        ) {
            submitDocumentsButton.classList.remove("red-button");
            submitDocumentsButton.classList.add("green-button");
        } else {
            submitDocumentsButton.classList.remove("green-button");
            submitDocumentsButton.classList.add("red-button");
        }
    } else {
        if (
            documentTitle.value &&
            documentCategory.value &&
            documentYear.value !== "" &&
            documentFile.files.length > 0
        ) {
            console.log(documentTitle.value);
            console.log(documentCategory.value);
            console.log(documentYear.value);
            console.log(documentEndYear.value);
            submitDocumentsButton.classList.remove("red-button");
            submitDocumentsButton.classList.add("green-button");
        } else {
            submitDocumentsButton.classList.remove("green-button");
            submitDocumentsButton.classList.add("red-button");
        }
    }
}
function endYearOptions() {
    let startYear = parseInt(documentYear.value);
    if (document.getElementById("editMode")) {
        console.log(documentEndYear.value);
        let endYear = documentEndYear.value;
        documentEndYear.innerHTML = "<option value=''>Одбери година</option>";
        for (let year = startYear + 1; year <= 2030; year++) {
            let option = document.createElement("option");
            option.value = year;
            option.textContent = year;
            if (year == endYear) {
                // Check if current year matches the desired year
                option.selected = true; // Set the 'selected' attribute
            }
            documentEndYear.appendChild(option);
        }
    } else {
        documentEndYear.innerHTML = "<option value=''>Одбери година</option>";
        for (let year = startYear + 1; year <= 2030; year++) {
            let option = document.createElement("option");
            option.value = year;
            option.textContent = year;
            documentEndYear.appendChild(option);
        }
    }
}
const flex = document.getElementsByClassName("flex-prvacinja");
const validationButton = document.getElementById("validationButton");
const prvacinjaType = document.getElementById("prvacijna-type");
const prvacinjaImage = document.getElementById('prvacinja-image')
const prvacinjaDocuments = document.getElementById('prvacinja-documents')


function validation() {
    if ( imageInput.files.length >= 0) {
        validationButton.classList.remove("red-button");
        validationButton.classList.add("green-button");
    } else {
        validationButton.classList.remove("green-button");
        validationButton.classList.add("red-button");
    }
}

const financeCategories = document.getElementsByClassName("finance-category")[0];

let categoryId = documentCategory?.value;

documentCategory?.addEventListener('change',()=>{
    let categoryId = documentCategory?.value;
    if(document.getElementById("editMode")){
        console.log(categoryId);
        if(documentCategory.value == 1){
            financeCategories.style.display = 'block';
        }
        else{
            financeCategories.style.display = 'none';
        }
    }
    else{
        if(documentCategory.value == 1){
            
            financeCategories.style.display = 'block';
        }
        else{
            financeCategories.style.display = 'none';
        }
    }
})

if(documentCategory?.value ==1){
    document.DOMContent
}

if(document.getElementById("editMode")){
    document.addEventListener("DOMContentLoaded", ()=>{
        if (categoryId ==1) {
            financeCategories.style.display = 'block';    
        }
        else{
            financeCategories.style.display = 'none';    
        }
    })
    // 
}

let prvacinjaTitle = document.getElementById('prvacinja-title');
let prvacinjaForm = document.getElementById('prvacinja-form');
let prvacinjaSubmit = document.getElementById('submit-prvacinja');
if(prvacinjaTitle && documentInput){
    prvacinjaTitle.addEventListener('input', submitPrvacinja)
    documentInput.addEventListener('input', submitPrvacinja)
    
}
function submitPrvacinja(){
    
    if(prvacinjaForm){
        if(prvacinjaTitle.value !== '' && documentInput.files.length > 0){
            prvacinjaSubmit.classList.remove("red-button")
            prvacinjaSubmit.classList.add('green-button')
        }
        else{
            prvacinjaSubmit.classList.remove("green-button")
            prvacinjaSubmit.classList.add('red-button')
        }
    }
    
}

let projectActivityName = document.getElementById('project-activity-name');
let projectActivityImage = document.getElementById('project-activity-image');
let projectActivityImageButton = document.getElementById('project-activity-image-button');
let submitProjectActivityButton = document.getElementById('submit-project-actvity-button');
let editProjectActivity = document.getElementById('edit-project-activity');


projectActivityImageButton?.addEventListener('click',()=>{
    projectActivityImage.click();
})

projectActivityImage?.addEventListener('change', ()=>{

    if(projectActivityImage.files.length > 0){
        projectActivityImageButton.classList.remove('red-button');
        projectActivityImageButton.classList.add('green-button');
        console.log(true);
        
    }
    else{
        projectActivityImageButton.classList.add('red-button');
        projectActivityImageButton.classList.remove('green-button');
        console.log(false);
    }
})

projectActivityName?.addEventListener('input', submitProjectAndActivities)
projectActivityImage?.addEventListener('input', submitProjectAndActivities)



if(editProjectActivity){
    submitProjectAndActivities();
    console.log(true);
    console.log(editorValue);
}
// if(editProjectActivity){
//     if(projectActivityImage.files.length > 0){
//         projectActivityImageButton.classList.remove('blue-button');
//         projectActivityImageButton.classList.add('green-button');
//     }
//     else{
//         projectActivityImageButton.classList.add('blue-button');
//         projectActivityImageButton.classList.remove('green-button');
//     }
// }
function submitProjectAndActivities(){
    if(editProjectActivity){
        if(projectActivityName !== "" && projectActivityImage.files.length >= 0 && editorValue !== ""){
            submitProjectActivityButton.classList.remove('red-button');
            submitProjectActivityButton.classList.add('green-button');
           
        }
        else{
            submitProjectActivityButton.classList.remove('green-button');
            submitProjectActivityButton.classList.add('red-button');
        }
    }
    else{
        if(projectActivityName !== "" && projectActivityImage.files.length > 0 && editorValue !== undefined){
            submitProjectActivityButton.classList.remove('red-button');
            submitProjectActivityButton.classList.add('green-button');
        }
        else{
            submitProjectActivityButton.classList.remove('green-button');
            submitProjectActivityButton.classList.add('red-button');
        }
    }
    
}

let publicProcurementName = document.getElementById('public-procurement-name');
let publicProcurementLink = document.getElementById('public-procurement-link');
let submitButtonPublicProcurement = document.getElementById('submit-public-procurement')

if(publicProcurementName && publicProcurementLink){
    publicProcurementName.addEventListener('input', submitPublicProcurement)
    publicProcurementLink.addEventListener('input', submitPublicProcurement)
}

function submitPublicProcurement(){
    if(publicProcurementName.value !== "" && publicProcurementLink.value !== ""){
        submitButtonPublicProcurement.classList.remove('red-button');
        submitButtonPublicProcurement.classList.add('green-button')
        console.log();
    }
    else{
        submitButtonPublicProcurement.classList.remove('green-button');
        submitButtonPublicProcurement.classList.add('red-button');
    }
}