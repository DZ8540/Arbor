// show desktop menu while hover to menu link 
$(function() {
    $(".menu-hover-link").mouseenter(function() {
        $('.menu-hover').removeClass("d-none");
    });
    $(".menu-hover").mouseleave(function() {
        $('.menu-hover').addClass("d-none");
    });
});
// show desktop menu while hover to menu link 
$(function() {
    $(".cart-hover-main").mouseenter(function() {
        $('.cart-hover-block').removeClass("d-none");
    });
    $(".cart-hover-main").mouseleave(function() {
        $('.cart-hover-block').addClass("d-none");
    });
});

function changeFieldset(val, name, formId) {
    document.querySelectorAll('#' + formId + ' fieldset.' + name).forEach(function(item, i, arr) {
        if (item.id != val) {
            item.classList.add('d-none');
            item.setAttribute("disabled", "disabled");
        } else {
            item.classList.remove('d-none');
            item.removeAttribute("disabled");
        }
    });
}

/* adding new inputs */
function addInput(elem) {
    let cloneInput = elem.previousElementSibling.cloneNode(true);
    elem.after(cloneInput);
}