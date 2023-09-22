// -------------------slider-----------------
const positionImg = document.querySelectorAll(".aspect-ratio-169 img");
const containerPosition = document.querySelector(".aspect-ratio-169");
const dotItem = document.querySelectorAll(".dot");
positionImg.forEach(function (img, index) {
  img.style.left = index * 100 + "%";
  dotItem[index].addEventListener("click", function (e) {
    e.preventDefault();
    slider(index);
  });
  let imgNumber = positionImg.length;
  function imgSlide() {
    index++;
    if (index >= imgNumber) {
      index = 0;
    }
    slider(index);
  }
  function slider(index) {
    containerPosition.style.left = "-" + index * 100 + "%";
    const dotActive = document.querySelector(".dot.active");
    dotActive.classList.remove("active");
    dotItem[index].classList.add("active");
  }
  setInterval(imgSlide, 3000);
});
// ----------------------Header:hover&scroll--------------
const header = document.querySelector("header");
window.addEventListener("scroll", function () {
  let x = window.pageYOffset;
  x = parseInt(x);
  if (x > 0) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
});
// ------------------------- Menu-slideBar------------
const itemSlidebar = document.querySelectorAll(".category-left-li");
itemSlidebar.forEach(function (menu, index) {
  menu.addEventListener("click", function () {
    menu.classList.toggle("block");
  });
});
// -------------------------Product-content--------------------
const chitiet = document.querySelector(".chitiet");
const baoquan = document.querySelector(".baoquan");
chitiet.addEventListener("click", function () {
  if (chitiet) {
    document.querySelector(
      ".product-content-right-bottom-content-chitiet"
    ).style.display = "block";
    document.querySelector(
      ".product-content-right-bottom-content-baoquan"
    ).style.display = "none";
  }
  baoquan.addEventListener("click", function () {
    if (baoquan) {
      document.querySelector(
        ".product-content-right-bottom-content-chitiet"
      ).style.display = "none";
      document.querySelector(
        ".product-content-right-bottom-content-baoquan"
      ).style.display = "block";
    }
  });
});
// ----------------Product-chevron-up-down-------------
const up = document.querySelector(".fa-chevron-up");
const down = document.querySelector(".fa-chevron-down");
const visibleContent = document.querySelector(".product-content-right-bottom-content-big")
down.addEventListener("click", function () {
  if (down) {
    down.style.display = "none";
    up.style.display = "block";
    visibleContent.style.display = "block";

  }
});
up.addEventListener("click", function () {
  if (up) {
    down.style.display = "block";
    up.style.display = "none";
    visibleContent.style.display = "none  ";
  }
});
// -------------------Product-Image-click------------------
const bigImg = document.querySelector(".product-content-left-big-img img");
const smallImg = document.querySelectorAll(".product-content-left-small-img img");
smallImg.forEach((item, x) =>{
  item.addEventListener("click", function () {
    bigImg.src = item.src;
  })
})
// ---------------product-zoomin--------------

window.addEventListener("load", function () {
  const imageCover = document.querySelector(".image-cover");
  imageCover.addEventListener("mousemove", handleHoverImage);
  const imageWrapper = document.querySelector(".image-wrapper");
  let imageWraperWidth = imageWrapper.offsetWidth;
  let imageWraperHeight = imageWrapper.offsetHeight;
  const image = document.querySelector(".image");
  function handleHoverImage(e) {
    const pX = e.pageX;
    const pY = e.pageY;
    image.style = "width: auto; height: auto; max-height: unset";
    let imageWidth = image.offsetWidth;
    let imageHeight = image.offsetHeight;
    let spaceX = (imageWidth / 2 - imageWraperWidth) * 2;
    let spaceY = (imageHeight / 2 - imageWraperHeight) * 2;
    imageWidth = imageWidth + spaceX;
    imageHeight = imageHeight + spaceY;
    let ratioX = imageWidth / imageWraperWidth / 2;
    let ratioY = imageHeight / imageWraperHeight / 2;
    let x = (pX - imageWrapper.offsetLeft) * ratioX;
    let y = (pY - imageWrapper.offsetTop) * ratioY;
    image.style = `left: ${-x}px; top: ${-y}px; width: auto; height: auto; max-height: unset; transform: none;`;
  }
  imageCover.addEventListener("mouseleave", handleLeaveImage);
  function handleLeaveImage() {
    image.style = "";
  }
});


