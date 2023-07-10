"use strict";
var menuMobile, animaScroll, btnDropMenu, listDropMenu, dropMenu, imgFecha, bgsPet, bgsCinz, bgsAz, bgsVer, tela = window.innerWidth;
tela <= 1024 ? (menuMobile = function() {
    var e = document.querySelector(".menu-hamburguer")
      , o = document.querySelector(".items-menu");
    e.addEventListener("click", function() {
        e.classList.toggle("ativo"),
        o.classList.toggle("ativo")
    })
}
)() : (document.querySelector("nav.nav-desktop") && window.addEventListener("scroll", animaScroll = function() {
    var e = document.querySelector("nav.nav-desktop");
    document.querySelector(".banner").getBoundingClientRect().top < -350 ? e.classList.add("ativo") : e.classList.remove("ativo")
}
),
document.querySelector("nav.nav-desktop .drop-menu a") && (btnDropMenu = document.querySelector("nav.nav-desktop .drop-menu a"),
listDropMenu = document.querySelector("nav.nav-desktop .drop-items-menu"),
btnDropMenu.addEventListener("mouseover", dropMenu = function(e) {
    listDropMenu.classList.toggle("ativo")
}
),
listDropMenu.addEventListener("mouseleave", dropMenu))),
document.querySelector(".sec-novidades") && $(".owl-carousel-novidades").owlCarousel({
    loop: !1,
    margin: 40,
    nav: !1,
    dots: !0,
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2
        },
        1e3: {
            center: !1,
            items: 3,
            loop: !1
        }
    }
}),
document.querySelector(".header-form img.fecha") && (imgFecha = document.querySelector(".header-form img.fecha")).addEventListener("click", function() {
    window.history.back()
}),
document.querySelector(".modal-formulario.modal-padrao") && setTimeout(function() {
    function o(e) {
        var o = e.target.value;
        "00000000000000" != (o = o.replace(/[^\d]+/g, "")) && "11111111111111" != o && "22222222222222" != o && "33333333333333" != o && "44444444444444" != o && "55555555555555" != o && "66666666666666" != o && "77777777777777" != o && "88888888888888" != o && "99999999999999" != o || (alert("Adicione um cnpj válido"),
        setTimeout(function() {
            e.target.value = ""
        }, 1e3))
    }
    function t(e) {
        "firstname" == e.target.name ? u = 0 < e.target.value.length : "email" == e.target.name ? (l = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(e.target.value),
        e.target.value.includes("@omie") && (alert("Emails @omie não são permitidos"),
        setTimeout(function() {
            e.target.value = ""
        }, 1e3))) : "phone" == e.target.name ? c = /^\([1-9]{2}\)(\s)(?:[2-8]|9[1-9])[0-9]{3}\-[0-9]{4}$/.test(e.target.value) : "document" == e.target.name && (d = /(^\d{3}\.\d{3}\.\d{3}\-\d{2}$)|(^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$)/.test(e.target.value)),
        l && c && u && d ? a.forEach(function(e) {
            return e.removeAttribute("disabled")
        }) : a.forEach(function(e) {
            return e.disabled = !0
        })
    }
    var e = document.querySelectorAll(".modal-formulario.modal-padrao form")
      , r = document.querySelectorAll(".modal-formulario.modal-padrao input[name=document]")
      , n = document.querySelectorAll(".modal-formulario.modal-padrao input[name=origem_de_convesao]")
      , a = document.querySelectorAll(".modal-formulario.modal-padrao input.hs-button")
      , u = !1
      , l = !1
      , c = !1
      , d = !1
      , i = window.location.href;
    window.localStorage.setItem("page_ref", i),
    n.forEach(function(e) {
        return e.value = i
    }),
    a.forEach(function(e) {
        return e.disabled = !0
    });
    r.forEach(function(e) {
        return e.addEventListener("input", o)
    }),
    e.forEach(function(e) {
        return e.addEventListener("input", t)
    })
}, 2e3),
document.querySelector(".owl-carousel-depoimentos") && $(".owl-carousel-depoimentos").owlCarousel({
    loop: !1,
    margin: 10,
    nav: !1,
    responsiveClass: !0,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        }
    }
}),
document.querySelector(".bg-petroleo") && (bgsPet = document.querySelectorAll(".bg-petroleo")).forEach(function(e) {
    e.style.backgroundColor = "rgb(0, 30, 39)"
}),
document.querySelector(".bg-cinza") && (bgsCinz = document.querySelectorAll(".bg-cinza")).forEach(function(e) {
    e.style.backgroundColor = "rgb(247, 247, 247)"
}),
document.querySelector(".bg-azul") && (bgsAz = document.querySelectorAll(".bg-azul")).forEach(function(e) {
    e.style.backgroundColor = "rgb(0, 226, 244)"
}),
document.querySelector(".bg-verde") && (bgsVer = document.querySelectorAll(".bg-verde")).forEach(function(e) {
    e.style.backgroundColor = "rgba(216, 254, 0)"
});
