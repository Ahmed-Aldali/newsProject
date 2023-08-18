const ul = document.querySelector(".tag-ul"),
    input = document.querySelector(".tag-input"),
    tagNumb = document.querySelector(".tag-details span");

let maxTags = 10,
    tags = [];

countTags();
createTag();

function countTags() {
    // input.focus();
    tagNumb.innerText = maxTags - tags.length;
}

function createTag() {
    ul.querySelectorAll(".tag-li").forEach((li) => li.remove());
    tags.slice()
        .reverse()
        .forEach((tag) => {
            let liTag = `<li class="tag-li" >${tag} <i class="uit uit-multiply" onclick="remove(this, '${tag}')"></i></li>`;
            ul.insertAdjacentHTML("afterbegin", liTag);
        });
    countTags();
}

function remove(element, tag) {
    let index = tags.indexOf(tag);
    tags = [...tags.slice(0, index), ...tags.slice(index + 1)];
    element.parentElement.remove();
    countTags();
}

function addTag(e) {
    if (e.key == "Enter") {
        e.preventDefault();
        let tag = e.target.value.replace(/\s+/g, " ");
        if (tag.length > 1 && !tags.includes(tag)) {
            if (tags.length < 10) {
                tag.split(",").forEach((tag) => {
                    tags.push(tag);
                    createTag();
                });
            }
        }
        e.target.value = "";
    }
}

input.addEventListener("keypress", addTag);
// input.addEventListener("blur", function () {
//     input.value = tags;
// });

const removeBtn = document.querySelector(".tag-details button");
removeBtn.addEventListener("click", (e) => {
    e.preventDefault();
    tags.length = 0;
    ul.querySelectorAll(".tag-li").forEach((li) => li.remove());
    countTags();
});
