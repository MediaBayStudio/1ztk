var mask,lazy,menu,burger,hdr,ftr,overlay,body,fakeScrollbar,mobileMenu,SLIDER={hasSlickClass:function(e){return e.hasClass("slick-slider")},unslick:function(e){e.slick("unslick")},createArrow:function(e,t){return'<button type="button" class="arrow arrow-'+(e=(-1===e.indexOf("prev")?"next ":"prev ")+e)+'">'+t+"</button>"}},windowFuncs={load:[],resize:[],scroll:[],call:function(e){for(var t=windowFuncs[e.type]||e,n=t.length-1;0<=n;n--)t[n]()}},q=function(e,t){return(t=t||body).querySelector(e)},qa=function(e,t,n){return t=t||body,n?Array.prototype.slice.call(t.querySelectorAll(e)):t.querySelectorAll(e)},id=function(e){return document.getElementById(e)},setVh=function(){var e=.01*window.innerHeight;document.documentElement.style.setProperty("--vh",e+"px")},media=function(e){return window.matchMedia(e).matches},scrollToTarget=function(e,t){var n,i,r,a,o;e.preventDefault(),_=this===window?e.target:this,(t=(t=!(t=0==t?body:t||_.getAttribute("data-scroll-target"))&&"A"===_.tagName?q(_.getAttribute("href")):t).constructor===String?q(t):t)&&(menu&&menu.close(),n=window.pageYOffset,e=getComputedStyle(t),i=t.getBoundingClientRect().top-+e.paddingTop.slice(0,-2)-+e.marginTop.slice(0,-2),r=null,a=.35,o=function(e){null===r&&(r=e),5e3<Math.abs(i-n)?a=.15:2e3<Math.abs(i-n)&&(a=.2);e-=r,e=i<0?Math.max(n-e/a,n+i):Math.min(n+e/a,n+i);window.scrollTo(0,e),e!=n+i&&requestAnimationFrame(o)},requestAnimationFrame(o))},dispatchEvent=function(e,t){"function"==typeof window.CustomEvent&&(t=new CustomEvent(t),e.dispatchEvent(t))},pageScroll=function(e){fakeScrollbar.classList.toggle("active",e),body.classList.toggle("no-scroll",e),body.style.paddingRight=e?fakeScrollbar.offsetWidth-fakeScrollbar.clientWidth+"px":""},sticky=function(e,t,n){e="string"==typeof e?q(e):e,n=n||"fixed",t=t||"bottom";var i=e.getBoundingClientRect()[t]+pageYOffset,r=e.cloneNode(!0),a=e.parentElement,o=function(){!e.classList.contains(n)&&pageYOffset>=i&&(a.appendChild(a.replaceChild(r,e)),e.classList.add(n),window.removeEventListener("scroll",o),window.addEventListener("scroll",s))},s=function(){e.classList.contains(n)&&pageYOffset<=i&&(a.replaceChild(e,r),e.classList.remove(n),window.removeEventListener("scroll",s),window.addEventListener("scroll",o))};r.classList.add("cloned"),o(),window.addEventListener("scroll",o)},initDropdownLinks=function(e){!e||e&&!e.length||e.forEach(function(t,e){var n=q(".nav-link",t).offsetHeight+"px",i=t.scrollHeight+"px";t.style.maxHeight=n,t.classList.add("collapse"),t.addEventListener("click",function(e){e.target.classList.contains("nav-link")&&"#"===e.target.getAttribute("href")&&(e=t.style.maxHeight===i?n:i,qa(".nav-link",t).forEach(function(e){return e.blur()}),t.classList.toggle("collapse"),t.style.maxHeight=e)}),0===e&&(t.classList.toggle("collapse"),t.style.maxHeight=i)})};document.addEventListener("DOMContentLoaded",function(){for(var e in body=document.body,function(){mask=function(){var e="+7(___)___-__-__",t=0,n=e.replace(/\D/g,""),i=this.value.replace(/\D/g,"");n.length>=i.length&&(i=n),this.value=e.replace(/./g,function(e){return/[_\d]/.test(e)&&t<i.length?i.charAt(t++):t>=i.length?"":e}),"blur"===event.type?2===this.value.length&&(this.value="",this.classList.remove("filled")):(n=this.value.length,(e=this).focus(),e.setSelectionRange?e.setSelectionRange(n,n):e.createTextRange&&((e=e.createTextRange()).collapse(!0),e.moveEnd("character",n),e.moveStart("character",n),e.select()))};for(var e=qa("[name=tel]"),t=0;t<e.length;t++)e[t].addEventListener("input",mask),e[t].addEventListener("focus",mask),e[t].addEventListener("blur",mask)}(),function(){function e(e){var u=e.form,t=e.formBtn,l=e.uploadFilesBlock,c="invalid",f=(e.filesInput,{name:{required:!0},tel:{required:!0,pattern:/\+7\([0-9]{3}\)[0-9]{3}\-[0-9]{2}\-[0-9]{2}/,or:"email"},email:{required:!0,pattern:/^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z])+$/,or:"tel"},msg:{required:!0,pattern:/[^\<\>\[\]%\&'`]+$/},policy:{required:!0}}),p={tel:{required:"Введите ваш телефон или E-mail",pattern:"Укажите верный телефон"},name:{required:"Введите ваше имя"},email:{required:"Введите ваш E-mail или телефон",pattern:"Введите верный E-mail"},msg:{required:"Введите ваше сообщение",pattern:"Введены недопустимые символы"},policy:{required:"Согласитель с политикой обработки персональных данных"}},v=function(e){var t,n={},i=u,r=function(e){var t,n=e.elements,i={};for(t in f){var r=n[t];r&&(i[t]=r.value)}return i}(i);for(t in r){var a=f[t],o=i[t],s=r[t],l=a.or,c=i[l];if(a&&(o.hasAttribute("required")||!0===a.required)){var d=o.type,a=a.pattern;if(("checkbox"===d||"radio"===d)&&!o.checked||""===s){if(!l||!c){n[t]=p[t].required;continue}if(""===c.value){n[t]=p[t].required;continue}}"cehckbox"!==d&&"radio"!==d&&a&&""!==s&&!1===a.test(s)?n[t]=p[t].pattern:h(o)}}0==Object.keys(n).length?(i.removeEventListener("change",v),i.removeEventListener("input",v),u.validatie=!0):(i.addEventListener("change",v),i.addEventListener("input",v),m(i,n),u.validatie=!1)},m=function(e,t){var n,i=e.elements;for(n in t){var r=t[n],a='<label class="'+c+'">'+r+"</label>",o=i[n],s=o.nextElementSibling;s&&s.classList.contains(c)?s.textContent!==r&&(s.textContent=r):(o.insertAdjacentHTML("afterend",a),o.classList.add(c))}},h=function(e){var t=e.nextElementSibling;e.classList.remove(c),t&&t.classList.contains(c)&&t.parentElement.removeChild(t)};u.setAttribute("novalidate",""),u.validatie=!1,t.addEventListener("click",function(){v(),!1===u.validatie?event.preventDefault():u.classList.add("loading")}),document.wpcf7mailsent||(document.addEventListener("wpcf7mailsent",function(e){var t=q("#"+e.detail.id+">form");if("wpcf7mailsent"===e.type){for(var n=t.elements,i=0;i<n.length;i++)h(n[i]),n[i].classList.remove("filled");t.reset(),l&&(l.innerHTML="")}t.classList.remove("loading"),setTimeout(function(){t.classList.remove("sent")},3e3),thanksPopup.openPopup(),"download-form"===t.id?q(".thanks-popup__descr",thanksPopup).innerHTML='Теперь вы можее скачать документы по <a href="'+downloadPopup.caller.href+'" target="_blank" style="border-bottom:1px solid;">ссылке</a>':thanksPopupTimer=setTimeout(function(){thanksPopup.closePopup()},3e3)}),document.wpcf7mailsent=!0),u.addEventListener("input",function(){var e=event.target,t=e.type,n=e.files,i=e.classList,r=e.value;if("text"===t||"TEXTAREA"===e.tagName)""===r?i.remove("filled"):i.add("filled");else if("file"===t){for(var a="",o=0,s=n.length;o<s;o++)a+='<span class="uploadedfiles__file"><span class="uploadedfiles__file-text">'+n[o].name+"</span></span>";l.innerHTML=a}})}for(var t=[q(".index-contacts-sect__form"),id("applicants-form"),id("download-form"),id("submit-form")],n=t.length-1;0<=n;n--)t[n]&&e({form:t[n],formBtn:q("button",t[n]),uploadFilesBlock:q(".uploadedfiles",t[n]),filesInput:q('input[type="file"]',t[n])})}(),mobileMenu=function(e){function i(e,t){for(var n=[e,t],i=["transform","transition"],r=["translate3d("+e+", 0px, 0px)","transform "+t],a=n.length-1;0<=a;a--)0!==n[a]&&(""===n[a]?n[a]="":n[a]=r[a],u.style[i[a]]=n[a])}function t(e){return e.constructor===String?q(e):e}function n(){z||(d.hasAttribute("style")&&(d.removeAttribute("style"),d.offsetHeight),dispatchEvent(d,"menubeforeopen"),d.classList.add("active"),f.classList.add("active"),u.scrollTop=0,w||(i("0px",".5s"),I=u.offsetWidth),h||pageScroll(!0))}function r(e,t){var n;z&&(n=e&&e.target,(t||!e||"keyup"===e.type&&27===e.keyCode||n===d||n===p)&&(d.classList.remove("active"),f.classList.remove("active"),w||i(y,".5s")))}function a(e){F&&(e=e.touches[0]||window.e.touches[0],H=B=!1,Y=N=e.clientX,D=e.clientY,v=Date.now(),u.addEventListener("touchend",b),u.addEventListener("touchmove",E),i(0,""))}function o(e){e.target!==u&&e.target!==d||(w?"opacity"===e.propertyName&&k():"transform"===e.propertyName&&k(),F=!0)}function s(){d=t(e.menu),u=t(e.menuCnt),f=t(e.openBtn),p=t(e.closeBtn),h=x.allowPageScroll,g=x.toRight,L=x.toLeft,y=L?"100%":g?"-100%":0,w=x.fade,_("add"),w?g=L=!1:(i(y,0),d.addEventListener("touchstart",a)),d.isOpened=!1}function l(){z&&r(),w?g=L=!1:(i("",""),d.removeEventListener("touchstart",a)),_("remove"),p=f=u=d=null}function c(){if(A){for(var e in C=null,A)media(e)&&(C=e);C!==M&&function(){if(C){for(var e in A[C])x[e]=A[C][e];M=C}else{for(var t in S)x[t]=S[t];M=null}d&&(l(),s())}()}d||s()}var d,u,f,p,v,m,h,g,L,y,w,E=function(e){var t;F&&(t=e.touches[0]||window.e.touches[0],e=+u.style.transform.match(O)[0],R=N-t.clientX,N=t.clientX,P=D-t.clientY,D=t.clientY,H||B||(t=Math.abs(P),Math.abs(R),7<t||0===R?B=!0:t<7&&(H=!0)),H&&i(L&&N<Y||g&&Y<N?"0px":e-R+"px",0))},b=function(e){Z=Y-N;var t=Math.abs(Z);m=Date.now(),1<t&&H&&((L&&Z<0||g&&0<Z)&&(I*T<=t||m-v<300?r(e,!0):(z=!1,n())),F=!1),d.removeEventListener("touchend",b),d.removeEventListener("touchmove",E)},k=function(){z?(d.isOpened=z=!1,f.addEventListener("click",n),p.removeEventListener("click",r),h||pageScroll(!1),sticky(hdr)):(d.isOpened=z=!0,f.removeEventListener("click",n),p.addEventListener("click",r))},_=function(e){f[e+"EventListener"]("click",n),d[e+"EventListener"]("click",r),d[e+"EventListener"]("transitionend",o),document[e+"EventListener"]("keyup",r)},x=JSON.parse(JSON.stringify(e)),S=JSON.parse(JSON.stringify(e)),A=e.responsive,C=null,M=null,T=.5,O=(pageYOffset,/([-0-9.]+(?=px))/),H=!1,B=!1,F=!1,z=!1,N=0,R=0,D=0,P=0,Y=0,Z=0,I=0;if(e.menu)return c(),windowFuncs.resize.push(c),{options:x,menu:d,menuCnt:u,openBtn:f,closeBtn:p,open:n,close:r,destroy:l,opened:z}},NodeList.prototype.forEach||(NodeList.prototype.forEach=Array.prototype.forEach),HTMLCollection.prototype.forEach||(HTMLCollection.prototype.forEach=Array.prototype.forEach),fakeScrollbar=id("fake-scrollbar"),hdr=q(".hdr"),burger=q(".hdr__burger",hdr),ftr=q(".ftr"),[q(".menu"),hdr,ftr].forEach(function(e){e.addEventListener("click",function(e){e.target.classList.contains("nav-link")&&"#"===e.target.getAttribute("href")&&e.preventDefault()})}),menu=mobileMenu({menu:q(".menu"),menuCnt:q(".menu__cnt"),openBtn:burger,closeBtn:q(".menu__burger"),toRight:!0,fade:!1,allowPageScroll:!1}),sticky(hdr),lazy=new lazyload({clearSrc:!0,clearMedia:!0}),window.svg4everybody&&svg4everybody(),windowFuncs.resize.push(setVh),windowFuncs){var t;"call"===e||0<(t=windowFuncs[e]).length&&(windowFuncs.call(t),window.addEventListener(e,windowFuncs.call))}});