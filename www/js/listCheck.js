window.onload = function() {
    let elements = document.getElementsByClassName('checked');
    if(elements) {
        for(let elem of elements)
            elem.insertAdjacentHTML("afterbegin",'<span class="fa fa-check" aria-hidden="true"></span>');
    }
};