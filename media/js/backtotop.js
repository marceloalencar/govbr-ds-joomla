const backtotoplink = document.getElementById('gotop')
const onScroll = () => {
  const scroll = document.documentElement.scrollTop
  if (scroll > 300) {
    backtotoplink.classList.add("active");
  } else {
    backtotoplink.classList.remove("active")
  }
}
window.addEventListener('scroll', onScroll)
