/*! For license information please see app.js.LICENSE.txt */
$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}}),$("#top").click((function(){return $("html, body").animate({scrollTop:0},"slow"),!1})),window.sendCV=function(e){e.closest("label").classList.add("loading"),e.closest("form").submit()},(()=>{var e=document.querySelector(".header");if(e){var t=document.querySelector("body"),o=e.querySelector(".feedback"),a=o.querySelector(".feedback-open-btn"),c=o.querySelector(".feedback-close-btn"),s=o.querySelector(".feedback-modal-close"),i=o.querySelector("form"),l=i.querySelector(".feedback-btn-wrap"),n=i.querySelector(".feedback-submit-btn"),r=i.querySelectorAll(".feedback-input");a.onclick=function(){t.classList.add("feedback"),setTimeout((function(){r[0].focus()}),200)},c.onclick=function(){t.classList.remove("feedback")},s.onclick=function(){t.classList.remove("feedback")},$("#phone").intlTelInput({initialCountry:"tj",nationalMode:!1,separateDialCode:!0}),n.onclick=function(e){e.preventDefault();var o=r[0].value,a=i.querySelector(".iti__selected-flag").title.split(":")[1],c=r[1].value,s=a+c;if(o.length<=0||c.length<=1)return l.classList.add("fail"),void setTimeout((function(){l.classList.remove("fail")}),3e3);l.classList.add("loading"),$.ajax({type:"POST",url:i.action,data:{name:o,phone:s},success:function(e){l.classList.add(e),l.classList.remove("loading"),"fail"==e?setTimeout((function(){l.classList.remove("fail")}),3e3):"success"==e&&(r.forEach((function(e){e.value=""})),t.onclick=function(){l.classList.remove("success")})}})};var u=e.querySelector(".products-dropdown"),d=u.querySelector('[data-action="show"]'),f=u.querySelector('[data-action="hide"]');d.onclick=function(){t.classList.add("products-dropdown")},f.onclick=function(){t.classList.remove("products-dropdown")}}})(),(()=>{var e=document.querySelector("body"),t=e.querySelector(".footer");if(t){var o=t.querySelectorAll("dt"),a=t.querySelectorAll("dl div");o.forEach((function(e){e.onclick=function(){e.parentElement.classList.contains("active")?e.parentElement.classList.remove("active"):(a.forEach((function(e){e.classList.remove("active")})),e.parentElement.classList.add("active"))}})),e.addEventListener("click",(function(e){e.target.matches("dt")||a.forEach((function(e){e.classList.remove("active")}))}))}})(),(()=>{var e=document.querySelector("body"),t=e.querySelector(".home-page");if(t){var o=t.querySelector(".feedback-form"),a=o.querySelector(".feedback-btn-wrap"),c=o.querySelector(".feedback-submit-btn"),s=o.querySelectorAll(".feedback-input");$("#home-phone").intlTelInput({initialCountry:"tj",nationalMode:!1,separateDialCode:!0}),c.onclick=function(t){t.preventDefault();var c=s[0].value,i=o.querySelector(".iti__selected-flag").title.split(":")[1],l=s[1].value,n=i+l;if(c.length<=0||l.length<=1)return a.classList.add("fail"),void setTimeout((function(){a.classList.remove("fail")}),3e3);a.classList.add("loading"),$.ajax({type:"POST",url:o.action,data:{name:c,phone:n},success:function(t){a.classList.add(t),a.classList.remove("loading"),"fail"==t?setTimeout((function(){a.classList.remove("fail")}),3e3):"success"==t&&(s.forEach((function(e){e.value=""})),e.onclick=function(){a.classList.remove("success")})}})},$(".companies-carousel").owlCarousel({loop:!0,autoplay:!0,autoplayTimeout:2e3,autoplayHoverPause:!0,nav:!1,responsive:{0:{items:1},390:{items:2},576:{items:3},768:{items:3},992:{items:4},1200:{items:5},1440:{margin:40,items:6}}})}})(),document.querySelector(".about-page")&&new SimpleLightbox(".certificates-list a",{}),document.querySelector(".publications-read-page")&&$(".publications-carousel .owl-carousel").owlCarousel({loop:!0,autoplay:!0,autoplayTimeout:2e3,autoplayHoverPause:!0,nav:!0,responsive:{0:{items:1},600:{items:1},1e3:{items:1}}}),window.toggleProjectContent=function(e){var t=e.querySelector(".project-content-wrapper");e.classList.toggle("content-hidden"),e.classList.toggle("content-shown"),e.classList.contains("content-shown")&&(t.style.height=t.scrollHeight+"px"),e.classList.contains("content-hidden")&&(t.style.height=0)},document.querySelector(".projects-page")&&$(".companies-carousel").owlCarousel({loop:!0,autoplay:!0,autoplayTimeout:2e3,autoplayHoverPause:!0,nav:!1,responsive:{0:{items:1},390:{items:2},576:{items:3},768:{items:3},992:{items:4},1200:{items:5},1440:{margin:40,items:6}}}),window.showFeedbackModal=function(){document.querySelector("body").classList.add("feedback")};