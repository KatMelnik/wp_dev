/*! js-cookie v3.0.0-rc.1 | MIT */
!function(e,t){"object"==typeof exports&&"undefined"!=typeof module?module.exports=t():"function"==typeof define&&define.amd?define(t):(e=e||self,function(){var n=e.Cookies,r=e.Cookies=t();r.noConflict=function(){return e.Cookies=n,r}}())}(this,function(){"use strict";function e(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var r in n)e[r]=n[r]}return e}var t={read:function(e){return e.replace(/(%[\dA-F]{2})+/gi,decodeURIComponent)},write:function(e){return encodeURIComponent(e).replace(/%(2[346BF]|3[AC-F]|40|5[BDE]|60|7[BCD])/g,decodeURIComponent)}};return function n(r,o){function i(t,n,i){if("undefined"!=typeof document){"number"==typeof(i=e({},o,i)).expires&&(i.expires=new Date(Date.now()+864e5*i.expires)),i.expires&&(i.expires=i.expires.toUTCString()),t=encodeURIComponent(t).replace(/%(2[346B]|5E|60|7C)/g,decodeURIComponent).replace(/[()]/g,escape),n=r.write(n,t);var c="";for(var u in i)i[u]&&(c+="; "+u,!0!==i[u]&&(c+="="+i[u].split(";")[0]));return document.cookie=t+"="+n+c}}return Object.create({set:i,get:function(e){if("undefined"!=typeof document&&(!arguments.length||e)){for(var n=document.cookie?document.cookie.split("; "):[],o={},i=0;i<n.length;i++){var c=n[i].split("="),u=c.slice(1).join("=");'"'===u[0]&&(u=u.slice(1,-1));try{var f=t.read(c[0]);if(o[f]=r.read(u,f),e===f)break}catch(e){}}return e?o[e]:o}},remove:function(t,n){i(t,"",e({},n,{expires:-1}))},withAttributes:function(t){return n(this.converter,e({},this.attributes,t))},withConverter:function(t){return n(e({},this.converter,t),this.attributes)}},{attributes:{value:Object.freeze(o)},converter:{value:Object.freeze(r)}})}(t,{path:"/"})});

(function ($) {
    let GammaCookie = {
        cookies: {
            performance: [
                {
                    name: '_qa1',
                    path: '/2020/09/01/hello-world',
                    domain: 'events.pr'
                },
                {
                    name: '_qa2',
                    path: '/sample-page',
                    domain: false
                }
            ],
            functional: [
                {
                    name: '_qa3',
                    path: false,
                    domain: 'events.pr'
                },
                {
                    name: '_qa4',
                    path: false,
                    domain: false,
                }
            ]
        },
        selectedCookieCategories: [],
        popupContainer: $('#cookie-popup'),
        bannerContainer: $('#cookie-banner'),

        init() {

            if(this.cookieAction.isAcceptCookies()){
                this.bannerContainer.remove();
                this.popupContainer.remove();
                this.cookieAction.deleteNotAcceptedCookies();
                return;
            }


            this.bannerContainer.css('display', 'flex');

            this.popup.events();
            this.accordion.events();
            this.checkboxes.events();
            this.cookieAction.events();
        },

        popup: {
            events() {
                let self = this;
                GammaCookie.bannerContainer.find('#cookie-open-options-popup').on('click', function (event){
                    event.preventDefault();
                    self.open();
                });
                GammaCookie.popupContainer.find('.popup-close').on('click', self.close);
            },

            open() {
                $('body').css('position', 'fixed');
                GammaCookie.popupContainer.fadeIn(500);
            },
            close() {

                GammaCookie.popupContainer.fadeOut(500, function (){
                    $('body').css('position', 'static');
                });

            }
        },

        accordion: {
            events() {
                GammaCookie.popupContainer.find('.open-description').on('click', function (event){
                    let currentOption = $(this).closest('.cookie-option');
                    currentOption.find('.cookie-option-description').slideToggle(500);
                    currentOption.toggleClass('open');
                });
            }
        },

        checkboxes: {
            events() {
                let self = this;
                GammaCookie.popupContainer.find('.checkbox').on('change', function (event){
                    self.toggleShowAllowAll();
                });
                GammaCookie.popupContainer.find('#cookie-allow-all').on('click', function (evwnt) {
                    event.preventDefault();
                    self.allowAll();
                })
            },

            allowAll() {
                GammaCookie.popupContainer.find('.checkbox').each((index, checkbox) => {
                    $(checkbox).prop('checked', true);
                });
                this.toggleShowAllowAll();
            },

            toggleShowAllowAll() {
                let checkboxValues = this.getValues();
                if(Object.values(checkboxValues).find(value => value===false) === false)
                    $('.cookie-allow-all-wrap').fadeIn(150);
                else
                    $('.cookie-allow-all-wrap').fadeOut(150);

            },

            getValues()  {
                let values = {};
                 GammaCookie.popupContainer.find('.checkbox').each((index, checkbox) => {
                     values[$(checkbox).attr('name')] = $(checkbox).prop('checked');
                });
                return values;
            }
        },

        cookieAction: {
            events() {
                let self = this;
                GammaCookie.bannerContainer.find('#cookie-accept-btn').on('click', function (event){
                    event.preventDefault();
                    self.setAcceptCookie();
                    self.deleteNotAcceptedCookies();

                });
            },

            deleteNotAcceptedCookies() {
                let value = Cookies.get('__gi_a_c_');

                if(value === 'none')
                    return;

                let categories = value.split('--');

                for (let i = 0; i < categories.length; i++){

                    if( !GammaCookie.cookies.hasOwnProperty(categories[i]) )
                        continue;

                    let cookies = GammaCookie.cookies[categories[i]];
                    cookies.forEach(function (cookie, index){
                        if(!cookie.path && !cookie.domain)
                            Cookies.remove(cookie.name);
                        else if(!cookie.domain)
                            Cookies.remove(cookie.name, {path: cookie.path});
                        else if(!cookie.path)
                            Cookies.remove(cookie.name, {domain: cookie.domain});
                        else
                            Cookies.remove(cookie.name, {path: cookie.path, domain: cookie.domain});

                    });
                }

            },
            setAcceptCookie() {
                let categories = [];
                let choicesCategories = this.getChoicesCategory();
                for (let category in choicesCategories){
                    if(!choicesCategories[category])
                        categories.push(category);
                }

                categories = categories.length ? categories:['none'];

                Cookies.set('__gi_a_c_', categories.join('--'), {expires:365});

                GammaCookie.bannerContainer.remove();
                GammaCookie.popupContainer.remove();

                this.deleteNotAcceptedCookies();
            },
            getChoicesCategory() {
                return GammaCookie.checkboxes.getValues();
            },
            isAcceptCookies() {
                return Cookies.get('__gi_a_c_') !== undefined;
            }
        }
    }

    $(document).ready(function (){
        GammaCookie.init();
    });
})(jQuery);
