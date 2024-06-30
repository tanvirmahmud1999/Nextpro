(function ($) {
  // jQuery(document).ready(function () {
  "use strict";

  // custom coursor
  if ($(".custom-cursor").length) {
    var cursor = document.querySelector(".custom-cursor-one");
    var cursorinner = document.querySelector(".custom-cursor-two");
    var a = document.querySelectorAll("a");

    document.addEventListener("mousemove", function (e) {
      var x = e.clientX;
      var y = e.clientY;
      cursor.style.transform = `translate3d(calc(${x}px - 50%), calc(${y}px - 50%), 0)`;
    });

    document.addEventListener("mousemove", function (e) {
      var x = e.clientX;
      var y = e.clientY;
      cursorinner.style.left = x + "px";
      cursorinner.style.top = y + "px";
    });

    document.addEventListener("mousedown", function () {
      cursor.classList.add("click");
      cursorinner.classList.add("custom-cursor-innerhover");
    });

    document.addEventListener("mouseup", function () {
      cursor.classList.remove("click");
      cursorinner.classList.remove("custom-cursor-innerhover");
    });

    a.forEach((item) => {
      item.addEventListener("mouseover", () => {
        cursor.classList.add("custom-cursor-hover");
      });
      item.addEventListener("mouseleave", () => {
        cursor.classList.remove("custom-cursor-hover");
      });
    });
  }

  let hasRun = false;
  function navContainerFun() {
    if (!hasRun) {
      let mobileNav = $('.hamburger-bar');
      let sectionHeaderRow = $('.section-header__row');
      $(sectionHeaderRow).append(mobileNav);
      hasRun = true;
    }
  }
  setTimeout(navContainerFun, 300);

  var codeExecuted = false;
  function mobileMenu() {
    if ($(".mobileMenu").length && $("#mb_menu_holder").length) {
      if (!codeExecuted) {
        const mb_menuUL = $('.mobileMenu');
        const mb_menu_holder = $('#mb_menu_holder');
        $(mb_menu_holder).append($(mb_menuUL).clone());
      }
    }
    $('.mobileMenu li').each(function (index, item) {
      if ($(item).find('ul').length) {
        $(item).addClass('dropdown-arrow');
      }

      $(item).on('click', function (e) {
        e.stopPropagation();

        if ($(this).hasClass('dropdown-arrow')) {
          $('.mobileMenu li').not(this).find('ul').slideUp(300);

          $(this).children('ul').slideToggle(300);

          if (!$(this).hasClass('openUL')) {
            $(this).siblings().removeClass('openUL');
            $(this).addClass('openUL');
          } else {
            $(this).removeClass('openUL');
          }

          // For nested submenus
          $(this).find('ul li').each(function (index, subItem) {
            $(subItem).off('click').on('click', function (e) {
              e.stopPropagation();

              if ($(subItem).hasClass('dropdown-arrow')) {
                $(subItem).siblings().find('ul').slideUp(300);
                $(subItem).children('ul').slideToggle(300);

                if (!$(this).hasClass('openUL')) {
                  $(this).siblings().removeClass('openUL');
                  $(this).addClass('openUL');
                } else {
                  $(this).removeClass('openUL');
                }
              }
            });
          });
        }
      });
    });

    $('.menu-icon').each(function (index, item) {
      const self = $(item);
      $(self).on('click', function (e) {
        e.preventDefault();
        if (!$(self).hasClass('openMb_menu')) {
          $(self).parents($('.section-header__row')).find('.hamburger-bar').addClass('openMb_menu');
          $(self).parents($('.mobilenav-container')).find('.menu-icon').addClass('openMb_menu');
          $('.mobilenav-container').addClass('expanded');
          $('body').addClass('locked');
        } else {
          $(self).parents($('.section-header__row')).find('.hamburger-bar').removeClass('openMb_menu');
          $(self).parents($('.mobilenav-container')).find('.menu-icon').removeClass('openMb_menu');
          $('.mobilenav-container').removeClass('expanded');
          $('body').removeClass('locked');
        }
      });
    });
  }
  if ($(window).width() <= 1200) {
    mobileMenu();
  }

  // path dynamic class add js
  function dynamicCurrentMenuClass(selector) {
    let pathFileName = window.location.href.split("/").reverse()[0];
    selector.find("li").each(function () {
      let anchor = $(this).find("a");
      if ($(anchor).attr("href") == pathFileName) {
        $(this).addClass("active");
      }
    });
    // if any li has .active elmnt add class
    selector.children("li").each(function () {
      if ($(this).find(".active").length) {
        $(this).addClass("active");
      }
    });
    // if no file name return
    if ("" == pathFileName) {
      selector.find("li").eq(0).addClass("active");
    }
  }
  if ($(".mobileMenu").length) {
    let mainNavUL = $(".mobileMenu");
    dynamicCurrentMenuClass(mainNavUL);
  }

  const throttled = (delay, fn) => {
    let lastCall = 0;
    return function (...args) {
      const now = new Date().getTime();
      if (now - lastCall < delay) {
        return;
      }
      lastCall = now;
      return fn(...args);
    };
  };

  // moving html elements js
  const movableElementsWrapper = document.querySelector("body");
  const mouseMoveHandler = (e) => {
    const y = e.movementY;
    const x = e.movementX;
    let moveX = x > 0 ? -x : x;
    let moveY = y > 0 ? -y : y;
    const movableElements = document.querySelectorAll(".moving-element");
    movableElements.forEach((movableElement) => {
      gsap.to(movableElement, { x: moveX, y: moveY, duration: 1 });
    });
  };
  const speed = 0.12;
  const mouseMoveHandler2 = (e) => {
    const movableElements = document.querySelectorAll(".moving-element");
    movableElements.forEach((movableElement) => {
      const shiftValue = movableElement.getAttribute("data-value");
      const moveX = (e.clientX * shiftValue) / 150;
      const moveY = (e.clientY * shiftValue) / 150;
      gsap.to(movableElement, { x: moveX, y: moveY, duration: 0.4 });
    });
  };
  const tHandler = throttled(200, mouseMoveHandler2);

  if ($(window).width() >= 1280) {
    movableElementsWrapper.onmousemove = tHandler;
  }

  if ($(window).width() >= 1280) {
    animateDiv(".section-hero__right__square1");
    animateDiv(".section-hero__right__square2");
    animateDiv(".section-hero__right__square3");
    function makeNewPosition() {
      var h = $(window).height() - 50;
      var w = $(window).width() - 50;
      var nh = Math.floor(Math.random() * h);
      var nw = Math.floor(Math.random() * w);
      return [nh, nw];
    }
    function animateDiv(myclass) {
      var newq = makeNewPosition();
      $(myclass).animate({ top: newq[-0], left: newq[6] }, 5000, function () {
        animateDiv(myclass);
      });
    }
  }

  // owl slider
  let NextMarketingowlCarousel = $(".nextmarketing-owl__carousel");
  if (NextMarketingowlCarousel.length) {
    NextMarketingowlCarousel.each(function () {
      let elm = $(this);
      let options = elm.data("owl-options");
      elm.owlCarousel(
        "object" === typeof options ? options : JSON.parse(options)
      );

    });
  }

  // dynamic-year js
  let dynamicyearElm = $(".dynamic-year");
  if (dynamicyearElm.length) {
    let currentYear = new Date().getFullYear();
    dynamicyearElm.html(currentYear);
  }

  // progress bar js
  if ($(".count-bar").length) {
    $(".count-bar").appear(
      function () {
        var el = $(this);
        var percent = el.data("percent");
        $(el).css("width", percent).addClass("counted");
      },
      {
        accY: -50
      }
    );
  }

  // =======CounterUp JS-Odometer========>>>>>   
  if ($('.odometer').length > 0) {
    let initialTop = 0;
    $(window).on('scroll', function () {
      var scrollTop = jQuery(this).scrollTop();
      var offTop = $(".odometer").offset().top - window.innerHeight;
      if (scrollTop > offTop) {
        setTimeout(function () {
          $('.odometer').each(function () {
            $(this).html($(this).data('count-to'));
          });
        }, 200);
        initialTop = 1;
      }
    });

    $(window).on('load', function () {
      $(window).trigger('scroll');
    });
  }

  // =======CounterUp JS-Odometer========>>>>>

  // =======CounterUp number JS-========>>>>>
  if ($(".count-box").length) {
    $(".count-box").appear(
      function () {
        var $t = $(this),
          n = $t.find(".count-text").attr("data-stop"),
          r = parseInt($t.find(".count-text").attr("data-speed"), 10);

        if (!$t.hasClass("counted")) {
          $t.addClass("counted");
          $({
            countNum: $t.find(".count-text").text()
          }).animate(
            {
              countNum: n
            },
            {
              duration: r,
              easing: "linear",
              step: function () {
                $t.find(".count-text").text(Math.floor(this.countNum));
              },
              complete: function () {
                $t.find(".count-text").text(this.countNum);
              }
            }
          );
        }
      },
      {
        accY: 0
      }
    );
  }

  // price tab js
  function tabSwitchFun(tabId, switchId) {
    $('#' + tabId).closest('.tabs-wrapper').find('.tab-item').removeClass('tab-active');
    $('.tab-item[data-tab="' + tabId + '"]').addClass('tab-active');

    $('#' + tabId).closest('.tabs-wrapper').find('.tab-content').removeClass('content-active');
    $('#' + tabId).addClass('content-active');

    if (tabId === 'tab1') {
      $('#' + switchId).removeClass('switch-year').addClass('switch-month');
    } else if (tabId === 'tab2') {
      $('#' + switchId).removeClass('switch-month').addClass('switch-year');
    }
  }

  // tab click event handler
  $('.tab-item').each(function (index, item) {
    $(item).on("click", function () {
      if ($(this).parents('.tabs-wrapper').find('.slide').length > 0) {
        let position = $(this).position().left;
        let width = $(this).width();
        console.log(position);
        let slide = $('.slide');
        slide.css({
          "left": position + "px",
          "width": width + "px"
        });
      }

      let tabId = $(this).attr('data-tab');
      let switchId = $(this).closest('.tab-item-parent').find('.section-price-table__tabs-switch input[type="checkbox"]').attr('id');
      tabSwitchFun(tabId, switchId);
    });
  });

  // Switch change event handler
  $('.section-price-table__tabs-switch input[type="checkbox"]').change(function () {
    let switchId = $(this).attr('id');
    let tabId = $(this).closest('.tab-item-parent').find('.tab-item.tab-active').attr('data-tab');
    if ($(this).is(":checked")) {
      tabSwitchFun('tab2', switchId);
    } else {
      tabSwitchFun('tab1', switchId);
    }
  });

  // price tbl match height js
  matchHeight();
  function matchHeight() {
    if ($('.without-switchtab').length) {
      if ($(window).width() > 1280) {
        let highestNull = null;
        let initialHeight = 0;
        let maxHeight = $(".section-price-table__planing");
        $(maxHeight).each(function (index, item) {
          let eachHeight = $(item).height();
          if (eachHeight > initialHeight) {
            initialHeight = eachHeight;
            highestNull = $(this);
          }
        });
        $(maxHeight).css({ "min-height": initialHeight + "px" });
      }
    }
  }

  $('.section-price__titlewrap').each(function () {
    let $thisParent = $(this);
    let $valueCheck = $thisParent.children('.section-price__valuetag');
    if ($valueCheck.length > 0) {
      $thisParent.addClass('adjust-padding');
    }
  });

  // FAQ js 
  if ($('.section-faq__row').length) {
    $('.section-faq__title').each(function (index) {
      let selfTitle = $(this);
      let selfParent = selfTitle.parent();
      $(selfTitle).on("click", function () {
        if (!$(selfParent).hasClass('active')) {
          $(selfParent).siblings().removeClass('active');
          $(selfParent).addClass('active');
          $(selfParent).siblings().find('.section-faq__content').slideUp(300);
          $(selfParent).find('.section-faq__content').slideDown(300);
        } else {
          $(selfParent).removeClass('active');
          $(selfParent).find('.section-faq__content').slideUp(300);
        }
      });
      if (index === 0) {
        $(selfParent).find('.section-faq__content').slideDown(300);
        $(selfParent).addClass('active');
      }
    });
  }

  // =======Sticky-header========>>>>>
  // pricing section sticky js
  if ($(".section-header").length) {
    if (!$(".section-header").hasClass('one-page-scroll-header')) {
      $(".section-header").clone().insertAfter(".section-header").addClass("header-sticky-cloned");
    }
  }

  let previousScroll = 0;
  $(window).on('scroll', function () {
    var scroll = $(window).scrollTop();
    let headerHeight = $(".section-header").height() + 10;
    if (scroll > 500) {
      if (scroll > previousScroll) {
        $(".section-header").removeClass("sticky-active");
        $(".sticky-elements").css({ "top": 30 + "px" });
      } else {
        $(".section-header").addClass("sticky-active");
        $(".sticky-elements").css({ "top": headerHeight + "px" });
      }
    } else {
      $(".section-header").removeClass("sticky-active");
    }

    if ($('.one-page-scroll-header').length > 0) {
      if (scroll > 0) {
        if ($(".section-header").hasClass('one-page-scroll-header')) {
          $(".section-header").addClass("sticky-active");
        } else {
          $(".section-header").removeClass("sticky-active");
        }
      }
    }
    previousScroll = scroll;

    OnePageMenuScroll();
  });
  // =======Sticky-header========>>>>>

  // marquee js
  marqueeFun();
  function marqueeFun() {
    if ($('.marquee-parent').length) {
      let marqueeRun = false;
      setTimeout(function () {
        if (!marqueeRun) {
          const root = document.documentElement;
          const marqueeElementsDisplayed = getComputedStyle(root).getPropertyValue("--marquee-elements-displayed");
          const marqueeContent = document.querySelector(".marquee-parent");
          root.style.setProperty("--marquee-elements", marqueeContent.children.length);
          for (let i = 0; i < marqueeElementsDisplayed.length; i++) {
            marqueeContent.appendChild(marqueeContent.children[i].cloneNode(true));
          }
          marqueeRun = true;
        }
      }, 600);

      const scrollerMarquee = document.querySelectorAll(".marquee-parent");
      scrollerMarquee.forEach((scroller) => {
        scroller.setAttribute("data-animated", true);
      });

      let textItemWrap = jQuery('.marquee-parent');
      let textItem = jQuery('.marquee-clone');
      textItemWrap.each(function () {
        for (let i = 0; i < 5; i++) {
          jQuery(this).append(textItem.clone());
        }
      });
    }
  };

  // custom select box js
  customSelect();
  function customSelect() {
    const custom_selected = $('.custom_selected');
    const custom_select_opt_wrap = $('.custom_select_opt_wrap');
    const custom_select_opt = $('.custom_select_opt');

    custom_selected.each(function (index, elem) {
      $(elem).on('click', function (e) {
        e.preventDefault();
        const selfThis = $(this);
        const parentCustomSelect = selfThis.parent();
        if (!parentCustomSelect.hasClass('open_opt_wrap')) {
          parentCustomSelect.addClass('open_opt_wrap');
          parentCustomSelect.find(custom_select_opt_wrap).slideDown(300);
        } else {
          parentCustomSelect.removeClass('open_opt_wrap');
          parentCustomSelect.find(custom_select_opt_wrap).slideUp(300);
        }
      });
    });

    custom_select_opt.each(function (index, elem) {
      $(elem).on('click', function (e) {
        e.preventDefault();
        const selfThis = $(this);
        const parentCustomSelect = selfThis.parents('.custom-select');
        parentCustomSelect.removeClass('open_opt_wrap');
        parentCustomSelect.find(custom_select_opt_wrap).slideUp(300);

        if (selfThis.text() !== "Select a Service") {
          parentCustomSelect.find(custom_selected).text(selfThis.text());
          parentCustomSelect.find(custom_selected).addClass('custom_selected').addClass('attr-remove');
        } else {
          parentCustomSelect.find(custom_selected).text("Select a Service");
          parentCustomSelect.find(custom_selected).removeClass('custom_selected').removeClass('attr-remove');
        }
        custom_select_opt.removeAttr('data-select');
        if (selfThis.text() !== "Select a Service") {
          selfThis.attr('data-select', 'selected');
        } else {
          parentCustomSelect.find(custom_selected).removeAttr('data-select');
        }
        parentCustomSelect.find(custom_selected).attr('data-select', 'selected');
      });
    });
  }

  // custom language js
  customLng();
  function customLng() {
    const custom_Lng = $('.lng-selected');
    const custom_Lng_opt_wrap = $('.topbar-two__themelng-opt');
    const custom_Lng_opt = $('.lng-opt');

    custom_Lng.each(function (index, elem) {
      $(elem).on('click', function (e) {
        e.preventDefault();
        const selfThis = $(this);
        const parentCustomLng = selfThis.parent();
        if (!parentCustomLng.hasClass('open_opt_wrap')) {
          parentCustomLng.addClass('open_opt_wrap');
          parentCustomLng.find(custom_Lng_opt_wrap).slideDown(200);
        } else {
          parentCustomLng.removeClass('open_opt_wrap');
          parentCustomLng.find(custom_Lng_opt_wrap).slideUp(200);
        }
      });
    });
    custom_Lng_opt.each(function (index, elem) {
      $(elem).on('click', function (e) {
        e.preventDefault();
        const selfThis = $(this);
        const selfHTML = selfThis.html();
        const parentCustomLng = selfThis.parents('.topbar-two__themelngwrap');
        parentCustomLng.removeClass('open_opt_wrap');
        parentCustomLng.find(custom_Lng_opt_wrap).slideUp(200);
        parentCustomLng.find(custom_Lng).html(selfHTML);
      });
    });
  }

  function OnePageMenuScroll() {
    var windScroll = $(window).scrollTop();
    if (windScroll >= 117) {
      var menuAnchor = $(".one-page-scroll-menu .scrollToLink").children("a");
      menuAnchor.each(function () {
        var sections = $(this).attr("href");
        $(sections).each(function () {
          if ($(this).offset().top <= windScroll + 100) {
            var SectionId = $(sections).attr("id");
            $(".one-page-scroll-menu").find("a[href*=\\#" + SectionId + "]");
          }
        });
      });
    }
  }

  // Isotope js
  isotopefun();
  function isotopefun() {
    if ($(".masonry-layout").length) {
      $(".masonry-layout").imagesLoaded(function () {
        $(".masonry-layout").isotope({
          layoutMode: "masonry"
        });
      });
    }
    if ($(".fitRow-layout").length) {
      $(".fitRow-layout").imagesLoaded(function () {
        $(".fitRow-layout").isotope({
          layoutMode: "fitRows"
        });
      });
    }

    if ($(".post-filter").length) {
      var postFilterList = $(".post-filter li");
      // for first init
      $(".filter-layout").isotope({
        filter: ".filter-item",
        animationOptions: {
          duration: 500,
          easing: "linear",
          queue: false
        }
      });
      // on click filter links
      postFilterList.on("click", function () {
        var Self = $(this);
        var selector = Self.attr("data-filter");
        postFilterList.removeClass("active");
        Self.addClass("active");

        $(".filter-layout").isotope({
          filter: selector,
          animationOptions: {
            duration: 500,
            easing: "linear",
            queue: false
          }
        });
        return false;
      });
    }
  }

  // =======Magnific-PopUp========>>>>>  
  if ($('.image-link').length > 0) {
    $('.image-link').magnificPopup({
      type: 'image',
      gallery: {
        enabled: true
      },
      zoom: {
        enabled: true,
        duration: 300, // don't foget to change the duration also in CSS
        opener: function (element) {
          return element.find('img');
        }
      }
    });
  }

  // Video popup
  if ($('.video-popup-link').length > 0) {
    $('.video-popup-link').magnificPopup({
      disableOn: 200,
      type: 'iframe',
      mainClass: 'mfp-fade',
      removalDelay: 160,
      preloader: false,
      fixedContentPos: false
    });
  }
  // =======Magnific-PopUp========>>>>>

  // =========Leaflet map=========>>>>>
  if ($('#map').length > 0) {
    var map = L.map('map').setView([40.712776, -74.005974], 12);
    var locationsArray = [];

    function clickZoom(e) {
      map.setView(e.target.getLatLng(), 16);
    }

    $.each(NextMarketingLocations, function (index, location) {
      // Create Marker
      var marker = L.marker(location.markerPoint, {
        title: location.title,
        className: "marker-usa"  // Class for the marker
      }).addTo(map);

      // Bind Popup
      marker.bindPopup(`<div class="card card-map nextmarketing-map-card"><div class="card-body">
                          <h5 class="card-title service-title">${location.title}</h5><p class="mb-0 fw-semibold">${location.subtitle}</p><p class="mb-0 contact-home">${location.address}</p>                          
                        </div></div>`).on('click', clickZoom);

      // Store the location in the array
      locationsArray.push({ marker: marker, location: location });
    });

    // Handle external link clicks
    $('.btn-map-direction').on('click', function (e) {
      e.preventDefault();
      var markerTitle = $(this).data('title');

      // Find the marker in the array based on the title
      var selectedMarker = locationsArray.find(function (item) {
        return item.location.title === markerTitle;
      });

      // Open the popup for the selected marker
      if (selectedMarker) {
        selectedMarker.marker.openPopup();
        // Set the zoom level to 16
        map.setView(selectedMarker.marker.getLatLng(), 12);
      }
    });

    L.tileLayer('https://mt1.google.com/vt/lyrs=r&x={x}&y={y}&z={z}', {
      maxZoom: 26,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    // Outside click event
    $(document).on('click', function (e) {
      var mapContainer = $('#map');
      var isClickInsideMap = mapContainer.has(e.target).length > 0 || mapContainer.is(e.target);
    });
  }
  // =========Leaflet map=========>>>>>

  wowfunction();
  function wowfunction() {
    new WOW({
      boxClass: 'wow',      // default
      animateClass: 'animated', // default
      offset: 0,          // default
      mobile: true,       // default
      live: true        // default
    }).init();
  }

  $(document).on('submit', '#contactForm, #callRequestForm, #downloadForm', function (e) {
    e.preventDefault();
    var form = $(this);
    var formData = form.serialize();
    var responseDiv = form.find('.response');
    form.find('[type="submit"]').prop('disabled', true);
    formData += '&id=' + form.attr('id');
    responseDiv.html('<p>Working....</p>');
    $.ajax({
      type: 'POST',
      url: 'mail.php',
      data: formData,
      success: function (response) {
        var data = JSON.parse(response);
        if (data.error) {
          responseDiv.empty().html('<div class="alert alert-error">' + data.msg + '</div>');
        } else {
          responseDiv.empty().html('<div class="alert alert-sucess">' + data.msg + '</div>');
          form.get(0).reset();
        }
        form.find('[type="submit"]').prop('disabled', false);
      },
      error: function (error) {
        console.log('Error:', error);
        form.find('[type="submit"]').prop('disabled', false);
      }
    });
  });

  function preloaderFun() {
    let progressBar = $(".loader-progress-bar");
    let progressValue = 0;
    let interval = setInterval(increaseProgress, 1);
    function increaseProgress() {
      progressValue += 1;
      progressBar.css("width", progressValue + "%");
      $(".percentage").text(progressValue + "%");
      if (progressValue >= 100) {
        clearInterval(interval);
        $(".preloader").fadeOut(100);
      }
    }
  }

  $(window).on('load', function () {
    wowfunction();
    isotopefun();
    preloaderFun();
  });
  $(window).on('resize', function () {
    matchHeight();
  });
})(jQuery);
// });

document.addEventListener("DOMContentLoaded", function () {
  const topBar = document.querySelector('.topbar-two');
  const themeModeSticky = document.querySelector('.theme-mode-sticky');
  if (themeModeSticky) {
    if (!topBar > 0) {
      themeModeSticky.classList.add('visible');
    } else {
      themeModeSticky.classList.remove('visible');
    }
  }

  let progressCircleContainer = document.querySelectorAll('.progress-circle-container');
  if (progressCircleContainer.length) {
    // Progress circle
    function updateProgressCircle() {
      const themeModeSticky = document.querySelector('.theme-mode-sticky');
      const progressElement = document.querySelector(".progress-circle-bar");
      const totalHeight = document.body.scrollHeight - window.innerHeight;
      let progress = (window.pageYOffset / totalHeight) * 283;
      progress = Math.min(progress, 283);
      progressElement.style.strokeDashoffset = 283 - progress;
      if (window.scrollY > 500) {
        themeModeSticky.classList.add("show");
      } else {
        themeModeSticky.classList.remove("show");
      }
    }
    function scrollToTop() {
      window.scrollTo({ top: 0, behavior: "smooth" });
    }
    const scrollToTopElement = document.querySelector(".scroll-to-top");
    scrollToTopElement.addEventListener("click", scrollToTop);
    updateProgressCircle();
    window.addEventListener("scroll", updateProgressCircle);
    window.addEventListener("resize", updateProgressCircle);
  }

  const questionIcon = document.querySelector('.question-icon');
  if (questionIcon) {
    questionIcon.addEventListener("click", function () {
      let selfThis = this;
      if (!selfThis.classList.contains('open')) {
        selfThis.classList.add('open');
        document.querySelector('.quick-message').classList.add('open');
      } else {
        selfThis.classList.remove('open');
        document.querySelector('.quick-message').classList.remove('open');
      }
    });

    let msgCross = document.querySelector('.msg-cross');
    if (msgCross) {
      msgCross.addEventListener('click', function () {
        questionIcon.classList.remove('open');
        document.querySelector('.quick-message').classList.remove('open');
      })
    }
  }

  function themeModeFun() {
    const topbarModeicon = document.querySelectorAll('.topbar-two__modeicon');
    const btn = document.querySelectorAll(".themeModeBtn");
    btn.forEach((item) => {
      item.addEventListener("click", () => {
        const idCheck = item.getAttribute("data-id");
        if (idCheck === "light") {
          document.documentElement.setAttribute("data-bs-theme", "light");
          window.localStorage.setItem("theme", "light");
        } else {
          document.documentElement.setAttribute("data-bs-theme", "dark");
          window.localStorage.setItem("theme", "dark");
        }
        item.parentNode.classList.remove('visibility');
        const selfHTML = item.outerHTML;
        topbarModeicon.innerHTML = selfHTML;
      });
    });

    if (topbarModeicon) {
      topbarModeicon.forEach(function (elms) {
        elms.addEventListener("click", function (e) {
          selfThis = this;
          $('.topbar-two__themelng-opt').slideUp(200);
          $('.topbar-two__themelngwrap').removeClass('open_opt_wrap');
        });
      })
    }
  }
  themeModeFun();
});