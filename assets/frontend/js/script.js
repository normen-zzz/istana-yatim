$(window).scroll(function () {
  $('nav, a, span').toggleClass('scrolled', $(this).scrollTop() > 20);
});
window.onscroll = function () {
  scrollFunction();
};
function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById('navbar').style.padding = '25px 10px';
  } else {
    document.getElementById('navbar').style.padding = '20px 10px';
  }
}
