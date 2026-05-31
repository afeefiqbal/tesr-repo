document.addEventListener("DOMContentLoaded", function () {
  // ✅ Counter Logic
  let counterTriggered = false;

  function startCounter() {
    $(".counter").each(function () {
      let $this = $(this);
      let target =
        parseInt($this.data("target")) || parseInt($this.text()) || 0;

      $this.prop("Counter", 0).animate(
        { Counter: target },
        {
          duration: 2000,
          easing: "swing",
          step: function (now) {
            $this.text(Math.floor(now));
          },
          complete: function () {
            $this.text(target);
          },
        }
      );
    });

    $(".count").each(function () {
      let $this = $(this);
      let target = parseInt($this.text()) || 0;

      $this.prop("Counter", 0).animate(
        { Counter: target },
        {
          duration: 1000,
          easing: "swing",
          step: function (now) {
            $this.text(Math.floor(now));
          },
          complete: function () {
            $this.text(target);
          },
        }
      );
    });
  }

  $(window).on("scroll", function () {
    const $counterSection = $(".counter-section");
    if ($counterSection.length === 0) return;

    const counterSectionTop = $counterSection.offset().top;
    const scrollTop = $(window).scrollTop();
    const windowHeight = $(window).height();

    if (!counterTriggered && scrollTop + windowHeight > counterSectionTop) {
      counterTriggered = true;
      startCounter();
    }
  });

  // ✅ Hero Swiper
  const heroSwiper = new Swiper(".hero-swiper", {
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".hero-swiper .swiper-pagination",
      clickable: true,
    },
  });

  // ✅ Featured Products Swiper
  const featuredSwiper = new Swiper(".featured-products-list", {
    loop: false,

    navigation: {
      nextEl: ".featured-products-list .swiper-button-next",
      prevEl: ".featured-products-list .swiper-button-prev",
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
        spaceBetween: 10,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 10,
      },
      991: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
      1200: {
        slidesPerView: 4,
        spaceBetween: 30,
      },
    },
  });
});

// accordion
const accordionItemHeaders = document.querySelectorAll(
  ".accordion-item-header"
);

accordionItemHeaders.forEach((accordionItemHeader) => {
  accordionItemHeader.addEventListener("click", (event) => {
    // Uncomment in case you only want to allow for the display of only one collapsed item at a time!

    const currentlyActiveAccordionItemHeader = document.querySelector(
      ".accordion-item-header.active"
    );
    if (
      currentlyActiveAccordionItemHeader &&
      currentlyActiveAccordionItemHeader !== accordionItemHeader
    ) {
      currentlyActiveAccordionItemHeader.classList.toggle("active");
      currentlyActiveAccordionItemHeader.nextElementSibling.style.maxHeight = 0;
    }

    accordionItemHeader.classList.toggle("active");
    const accordionItemBody = accordionItemHeader.nextElementSibling;
    if (accordionItemHeader.classList.contains("active")) {
      accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
    } else {
      accordionItemBody.style.maxHeight = 0;
    }
  });
});



// category accordionItemBody

 
 
    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('categoryToggleBtn');
        const collapseEl = document.getElementById('customOuterCollapse');
        const bsCollapse = new bootstrap.Collapse(collapseEl, {
            toggle: false
        });
 if (window.innerWidth < 768) {
        toggleBtn.addEventListener('click', () => {
            if (collapseEl.classList.contains('show')) {
                bsCollapse.hide();
                toggleBtn.classList.add('collapsed');
            } else {
                bsCollapse.show();
                toggleBtn.classList.remove('collapsed');
            }
        });}else{
             bsCollapse.show();
                toggleBtn.classList.remove('collapsed');
        }
    });
 
 

    
const swiper = new Swiper(".company-logo", {
 loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
  slidesPerView: 2,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    768: {
      slidesPerView: 4,
    },
    1200: {
      slidesPerView: 6,
    },
  },
});

// mobile menu
const hamburger = document.getElementById("hamburgerBtn");
const closeBtn = document.getElementById("closeBtn");
const menu = document.getElementById("menu");
const menuLinks = menu.querySelectorAll("a");
let menuOpen = false;

hamburger.addEventListener("click", (e) => {
  e.stopPropagation();
  toggleMenu(true);
});

closeBtn.addEventListener("click", (e) => {
  e.stopPropagation();
  toggleMenu(false);
});

document.addEventListener("click", (e) => {
  if (menuOpen && !menu.contains(e.target) && !hamburger.contains(e.target)) {
    toggleMenu(false);
  }
});

function toggleMenu(open) {
  menuOpen = open;
  hamburger.classList.toggle("active", open);

  if (open) {
    gsap.to(menu, {
      duration: 0.4,
      width: "100%",
      ease: "power2.out",
      onComplete: () => {
        gsap.fromTo(
          menuLinks,
          { y: 20, opacity: 0 },
          { y: 0, opacity: 1, stagger: 0.1, duration: 0.4, ease: "power2.out" }
        );
      },
    });
  } else {
    gsap.to(menuLinks, {
      y: 20,
      opacity: 0,
      stagger: -0.05,
      duration: 0.2,
      ease: "power2.in",
      onComplete: () => {
        gsap.to(menu, {
          duration: 0.4,
          width: "0%",
          ease: "power2.in",
        });
      },
    });
  }
}
