/*if (matchMedia) {
    const mq = window.matchMedia("(min-width: 481px)");
    mq.addListener(WidthChange);
    WidthChange(mq);
}
// media query change
function WidthChange(mq) {
    if (mq.matches) {
        return;
    } else {
        var el = document.querySelector('#block-tema-mainnavigation');
        el.parentNode.removeChild(el);
        var el2 = document.querySelector('#block-footer');
        el2.parentNode.removeChild(el2);
        var el3 = document.querySelector('#block-tema-languageswitcher');
        el3.parentNode.removeChild(el3);
        var el4 = document.querySelector('#block-search');
        el4.parentNode.removeChild(el4);
        }
    }

var el = document.querySelector(".layout-container"),
    n = document.createElement("div");
el.insertBefore(n, el.firstChild), n.className = "home sesame";
var d1 = document.querySelector("#pre-header");
d1.insertAdjacentHTML("beforebegin", '<div id="modalOverlay"><div id="close">&times;</div><div id="menu-wrapper"><ul class="overlay-menu"><li class="overlay-menu-item"> <a href="http://sohomemory.org/posts">Posts</a></li><li class="overlay-menu-item"><a href="http://sohomemory.org/documents">Documents</a></li><li class="overlay-menu-item"><a href="http://sohomemory.org/people">People</a><li class="overlay-menu-item"><a href="http://sohomemory.org/places">Places</a></li><li class="overlay-menu-item"><a href="http://sohomemory.org/about">About</a></li></ul></div></div>');
var modal = document.getElementById("modalOverlay"),
    btn = document.getElementsByClassName("sesame")[0];
btn.onclick = function() {
    modalOverlay.style.display = "block"
};
var modal = document.getElementById("modalOverlay"),
    close = document.getElementById("close");
close.onclick = function() {
    modalOverlay.style.display = "none"
};
*/