/*
Jssor Slider (MIT license)
*/
/* eslint-disable */
!function(i,h,m,e,d,k,f){new(function(){});var c={u:m.PI,l:m.max,j:m.min,H:m.ceil,G:m.floor,P:m.abs,gb:m.sin,Cb:m.cos,Oe:m.tan,Xf:m.atan,Yf:m.atan2,xb:m.sqrt,B:m.pow,dd:m.random,$Round:m.round,Y:function(d,b){var a=c.B(10,b||0);return c.$Round(d*a)/a}};function r(a){return function(b){return c.$Round(b*a)/a}}var g=i.$Jease$={$Swing:function(a){return-c.Cb(a*c.u)/2+.5},$Linear:function(a){return a},$InQuad:function(a){return a*a},$OutQuad:function(a){return-a*(a-2)},$InOutQuad:function(a){return(a*=2)<1?1/2*a*a:-1/2*(--a*(a-2)-1)},$InCubic:function(a){return a*a*a},$OutCubic:function(a){return(a-=1)*a*a+1},$InOutCubic:function(a){return(a*=2)<1?1/2*a*a*a:1/2*((a-=2)*a*a+2)},$InQuart:function(a){return a*a*a*a},$OutQuart:function(a){return-((a-=1)*a*a*a-1)},$InOutQuart:function(a){return(a*=2)<1?1/2*a*a*a*a:-1/2*((a-=2)*a*a*a-2)},$InQuint:function(a){return a*a*a*a*a},$OutQuint:function(a){return(a-=1)*a*a*a*a+1},$InOutQuint:function(a){return(a*=2)<1?1/2*a*a*a*a*a:1/2*((a-=2)*a*a*a*a+2)},$InSine:function(a){return 1-c.Cb(c.u/2*a)},$OutSine:function(a){return c.gb(c.u/2*a)},$InOutSine:function(a){return-1/2*(c.Cb(c.u*a)-1)},$InExpo:function(a){return a==0?0:c.B(2,10*(a-1))},$OutExpo:function(a){return a==1?1:-c.B(2,-10*a)+1},$InOutExpo:function(a){return a==0||a==1?a:(a*=2)<1?1/2*c.B(2,10*(a-1)):1/2*(-c.B(2,-10*--a)+2)},$InCirc:function(a){return-(c.xb(1-a*a)-1)},$OutCirc:function(a){return c.xb(1-(a-=1)*a)},$InOutCirc:function(a){return(a*=2)<1?-1/2*(c.xb(1-a*a)-1):1/2*(c.xb(1-(a-=2)*a)+1)},$InElastic:function(a){if(!a||a==1)return a;var b=.3,d=.075;return-(c.B(2,10*(a-=1))*c.gb((a-d)*2*c.u/b))},$OutElastic:function(a){if(!a||a==1)return a;var b=.3,d=.075;return c.B(2,-10*a)*c.gb((a-d)*2*c.u/b)+1},$InOutElastic:function(a){if(!a||a==1)return a;var b=.45,d=.1125;return(a*=2)<1?-.5*c.B(2,10*(a-=1))*c.gb((a-d)*2*c.u/b):c.B(2,-10*(a-=1))*c.gb((a-d)*2*c.u/b)*.5+1},$InBack:function(a){var b=1.70158;return a*a*((b+1)*a-b)},$OutBack:function(a){var b=1.70158;return(a-=1)*a*((b+1)*a+b)+1},$InOutBack:function(a){var b=1.70158;return(a*=2)<1?1/2*a*a*(((b*=1.525)+1)*a-b):1/2*((a-=2)*a*(((b*=1.525)+1)*a+b)+2)},$InBounce:function(a){return 1-g.$OutBounce(1-a)},$OutBounce:function(a){return a<1/2.75?7.5625*a*a:a<2/2.75?7.5625*(a-=1.5/2.75)*a+.75:a<2.5/2.75?7.5625*(a-=2.25/2.75)*a+.9375:7.5625*(a-=2.625/2.75)*a+.984375},$InOutBounce:function(a){return a<1/2?g.$InBounce(a*2)*.5:g.$OutBounce(a*2-1)*.5+.5},$GoBack:function(a){return 1-c.P(2-1)},$InWave:function(a){return 1-c.Cb(a*c.u*2)},$OutWave:function(a){return c.gb(a*c.u*2)},$OutJump:function(a){return 1-((a*=2)<1?(a=1-a)*a*a:(a-=1)*a*a)},$InJump:function(a){return(a*=2)<1?a*a*a:(a=2-a)*a*a},$Early:c.H,$Late:c.G,$Mid:c.$Round,$Mid2:r(2),$Mid3:r(3),$Mid4:r(4),$Mid5:r(5),$Mid6:r(6)};function v(k,l,p){var d=this,f=[1,0,0,0,0,1,0,0,0,0,1,0,k||0,l||0,p||0,1],j=c.gb,i=c.Cb,n=c.Oe;function h(a){return a*c.u/180}function o(b,c,f,g,i,l,n,o,q,t,u,w,y,A,C,F,a,d,e,h,j,k,m,p,r,s,v,x,z,B,D,E){return[b*a+c*j+f*r+g*z,b*d+c*k+f*s+g*B,b*e+c*m+f*v+g*D,b*h+c*p+f*x+g*E,i*a+l*j+n*r+o*z,i*d+l*k+n*s+o*B,i*e+l*m+n*v+o*D,i*h+l*p+n*x+o*E,q*a+t*j+u*r+w*z,q*d+t*k+u*s+w*B,q*e+t*m+u*v+w*D,q*h+t*p+u*x+w*E,y*a+A*j+C*r+F*z,y*d+A*k+C*s+F*B,y*e+A*m+C*v+F*D,y*h+A*p+C*x+F*E]}function g(b,a){return o.apply(e,(a||f).concat(b))}d.$Scale=function(a,b,c){if(a!=1||b!=1||c!=1)f=g([a,0,0,0,0,b,0,0,0,0,c,0,0,0,0,1])};d.$Move=function(a,b,c){f[12]+=a||0;f[13]+=b||0;f[14]+=c||0};d.$RotateX=function(b){if(b){a=h(b);var c=i(a),d=j(a);f=g([1,0,0,0,0,c,d,0,0,-d,c,0,0,0,0,1])}};d.$RotateY=function(b){if(b){a=h(b);var c=i(a),d=j(a);f=g([c,0,-d,0,0,1,0,0,d,0,c,0,0,0,0,1])}};d.Cg=function(a){d.Vg(h(a))};d.Vg=function(a){if(a){var b=i(a),c=j(a);f=g([b,c,0,0,-c,b,0,0,0,0,1,0,0,0,0,1])}};d.Ug=function(a,b){if(a||b){k=h(a);l=h(b);f=g([1,n(l),0,0,n(k),1,0,0,0,0,1,0,0,0,0,1])}};d.Sg=function(){return"matrix3d("+f.join(",")+")"};d.Og=function(){return"matrix("+[f[0],f[1],f[4],f[5],f[12],f[13]].join(",")+")"}}var b=i.$Jssor$=new function(){var a=this,Eb=/\S+/g,R=1,mb=2,qb=3,pb=4,tb=5,T,t=0,n=0,I=0,M=navigator,Ab=M.appName,o=M.userAgent,r=parseFloat;function w(c,a,b){return c.indexOf(a,b)}function Qb(){if(!T){T={td:"ontouchstart"in i||"createTouch"in h};var a;if(M.pointerEnabled||(a=M.msPointerEnabled))T.re=a?"msTouchAction":"touchAction"}return T}function y(g){if(!t){t=-1;if(Ab=="Microsoft Internet Explorer"&&!!i.attachEvent&&!!i.ActiveXObject){var e=w(o,"MSIE");t=R;n=r(o.substring(e+5,w(o,";",e)))}else if(Ab=="Netscape"&&!!i.addEventListener){var d=w(o,"Firefox"),b=w(o,"Safari"),f=w(o,"Chrome"),c=w(o,"AppleWebKit");if(d>=0){t=mb;n=r(o.substring(d+8))}else if(b>=0){var h=o.substring(0,b).lastIndexOf("/");t=f>=0?pb:qb;n=r(o.substring(h+1,b))}else{var a=/Trident\/.*rv:([0-9]{1,}[\.0-9]{0,})/i.exec(o);if(a){t=R;n=r(a[1])}}if(c>=0)I=r(o.substring(c+12))}else{var a=/(opera)(?:.*version|)[ \/]([\w.]+)/i.exec(o);if(a){t=tb;n=r(a[2])}}}return g==t}function F(){return y(R)}function ob(){return y(qb)}function sb(){return y(tb)}function B(){y();return I>537||n>42||t==R&&n>=11}function U(a){var b;return function(d){if(!b){var c=a.substr(0,1).toUpperCase()+a.substr(1);b=j(["","WebKit","ms","Moz","O","webkit"],function(b){var e=b+(b?c:a);return d.style[e]!=f&&e})||a}return b}}var O=l("transform",8);function J(a){return a}function P(a){return i.SVGElement&&a instanceof i.SVGElement}function Ob(a){return{}.toString.call(a)}var S=Array.isArray||function(a){return N(a)=="array"},wb={};j(["Boolean","Number","String","Function","Array","Date","RegExp","Object"],function(a){wb["[object "+a+"]"]=a.toLowerCase()});function j(b,d){var a,c;if(S(b)){for(a=0;a<m(b);a++)if(c=d(b[a],a,b))return c}else for(a in b)if(c=d(b[a],a,b))return c}function N(a){return a==e?String(a):wb[Ob(a)]||"object"}function Z(a){for(var b in a)return d}function D(a){try{return N(a)=="object"&&!a.nodeType&&a!=a.window&&(!a.constructor||{}.hasOwnProperty.call(a.constructor.prototype,"isPrototypeOf"))}catch(b){}}function Db(a,b){return{x:a,y:b}}function Rb(b,a){setTimeout(b,a||0)}function q(a,b){return a===f?b:a}a.ud=Qb;a.ue=F;a.He=ob;a.gg=B;a.Cd=function(){return n};a.$Delay=Rb;a.wc=q;a.W=function(a,b){b.call(a);return x({},a)};function bb(a){a.constructor===bb.caller&&a.F&&a.F.apply(a,bb.caller.arguments)}a.F=bb;a.$GetElement=function(b){if(a.ag(b))b=h.getElementById(b);return b};a.xc=function(c){var b=[];j(c,function(d){var c=a.$GetElement(d);c&&b.push(c)});return b};function u(a){return a||i.event}a.Zf=u;a.$EvtSrc=function(c){c=u(c);var b=c.target||c.srcElement||h;if(b.nodeType==3)b=a.Lb(b);return b};a.Fe=function(a){a=u(a);return a.relatedTarget||a.toElement};a.Je=function(a){a=u(a);return a.which||([0,1,3,0,2])[a.button]||a.charCode||a.keyCode};a.Tc=function(a){a=u(a);return{x:a.clientX||0,y:a.clientY||0}};a.Ue=function(a,b){return Db(a.x-b.x,a.y-b.y)};a.eg=function(a,b){return a.x>=b.x&&a.x<=b.t&&a.y>=b.y&&a.y<=b.m};a.Ie=function(d,f){var c=b.dg(f),e=b.Tc(d);return a.eg(e,c)};a.Ib=function(b){return P(a.Lb(b))};function A(c,d,a){if(a!==f)c.style[d]=a==f?"":a;else{var b=c.currentStyle||c.style;a=b[d];if(a==""&&i.getComputedStyle){b=c.ownerDocument.defaultView.getComputedStyle(c,e);b&&(a=b.getPropertyValue(d)||b[d])}return a}}function fb(b,c,a,d){if(a===f){a=r(A(b,c));isNaN(a)&&(a=e);return a}d&&a!=e&&(a+=d);A(b,c,a)}function l(g,a,b,d){var c;if(a&2)c="px";if(a&4)c="%";if(a&16)c="em";var f=a&8&&U(g);a&=-9;d=d||(a?fb:A);return function(i,h){b&&h&&(h*=b);var a=d(i,f?f(i):g,h,c);return b&&a!=e?a/b:a}}function C(a){return function(c,b){s(c,a,b)}}var hb={r:["rotate"],sX:["scaleX",2],sY:["scaleY",2],tX:["translateX",1],tY:["translateY",1],kX:["skewX"],kY:["skewY"]};function jb(a){var b="";if(a){j(a,function(d,c){var a=hb[c];if(a){var e=a[1]||0;if(ib[c]!=d)b+=" "+a[0]+"("+d+(["deg","px",""])[e]+")"}});if(B())if(a.tX||a.tY||a.tZ!=f)b+=" translate3d("+(a.tX||0)+"px,"+(a.tY||0)+"px,"+(a.tZ||0)+"px)"}return b}function nb(a){return"rect("+a.y+"px "+a.t+"px "+a.m+"px "+a.x+"px)"}a.ug=l("transformOrigin",8);a.tg=l("backfaceVisibility",8);a.Jc=l("transformStyle",8);a.yg=l("perspective",10);a.xg=l("perspectiveOrigin",8);a.we=function(b,a){O(b,a==1?"":"scale("+a+")")};a.$AddEvent=function(b,c,d,e){b=a.$GetElement(b);b.addEventListener(c,d,e)};a.$RemoveEvent=function(b,c,d,e){b=a.$GetElement(b);b.removeEventListener(c,d,e)};a.$CancelEvent=function(a){a=u(a);a.preventDefault&&a.preventDefault();a.cancel=d;a.returnValue=k};a.$StopEvent=function(a){a=u(a);a.stopPropagation&&a.stopPropagation();a.cancelBubble=d};a.Z=function(d,c){var a=[].slice.call(arguments,2),b=function(){var b=a.concat([].slice.call(arguments,0));return c.apply(d,b)};return b};a.bd=function(b,c){if(c==f)return b.textContent||b.innerText;var d=h.createTextNode(c);a.Rb(b);b.appendChild(d)};a.ng=function(a,b){if(b==f)return a.innerHTML;a.innerHTML=b};a.dg=function(b){var a=b.getBoundingClientRect();return{x:a.left,y:a.top,w:a.right-a.left,h:a.bottom-a.top,t:a.right,m:a.bottom}};a.jb=function(d,c){for(var b=[],a=d.firstChild;a;a=a.nextSibling)(c||a.nodeType==1)&&b.push(a);return b};function zb(a,c,f,b){b=b||"u";for(a=a?a.firstChild:e;a;a=a.nextSibling)if(a.nodeType==1){if(K(a,b)==c)return a;if(!f){var d=zb(a,c,f,b);if(d)return d}}}a.$FindChild=zb;function Y(a,d,g,b){b=b||"u";var c=[];for(a=a?a.firstChild:e;a;a=a.nextSibling)if(a.nodeType==1){K(a,b)==d&&c.push(a);if(!g){var f=Y(a,d,g,b);if(m(f))c=c.concat(f)}}return c}a.rg=function(b,a){return b.getElementsByTagName(a)};a.kb=function(a,f,d,g){d=d||"u";var e;do{if(a.nodeType==1){var c;d&&(c=K(a,d));if(c&&c==q(f,c)||g==a.tagName){e=a;break}}a=b.Lb(a)}while(a&&a!=h.body);return e};a.qe=function(a){return db(["INPUT","TEXTAREA","SELECT"])[a.tagName]};function x(){for(var d=arguments,h=1&d[0],e=1+h,g=d[e-1]||{},c,b,a;e<m(d);e++)if(c=d[e])for(b in c){a=c[b];if(a!==f){a=c[b];var i=g[b];g[b]=h&&(D(i)||D(a))?x(h,{},i,a):a}}return g}a.v=x;function cb(f,g){var d={},c,a,b;for(c in f){a=f[c];b=g[c];if(a!==b){var e=k;if(D(a)&&D(b)){a=cb(a,b);e=!Z(a)}!e&&(d[c]=a)}}return d}a.Zg=cb;a.Pd=function(a,c){if(a){var b;j(c,function(c){if(a[c]!=f)(b=b||{})[c]=a[c];delete a[c]});return b}};a.Ph=function(a){return N(a)=="function"};a.Md=S;a.ag=function(a){return N(a)=="string"};a.Nd=function(a){return!S(a)&&!isNaN(r(a))&&isFinite(a)};a.f=j;a.Th=Z;a.Sh=D;function W(a){return h.createElement(a)}a.bc=function(){return W("DIV")};a.Rd=function(){return W("SPAN")};a.Kc=function(){};function s(b,c,a,d){if(a===f)return b.getAttribute(c);a=a==e?"":d?a+d:a;b.setAttribute(c,a)}function K(a,b){return s(a,b)||s(a,"data-"+b)}a.g=s;a.hb=K;a.q=function(e,c,d){var b=a.od(K(e,c));if(isNaN(b))b=d;return b};a.Hc=function(b,c,a){return eb(s(b,c),a)};function G(b,a){return s(b,"class",a)||""}function db(b){var a={};j(b,function(b){if(b!=f)a[b]=b});return a}function eb(a,b){return a&&a.match(b||Eb)||e}function V(b,a){return db(eb(b||"",a))}a.Fd=db;a.Ud=eb;a.mg=function(a){a&&(a=a.toLowerCase());return a};function gb(b,c){var a="";j(c,function(c){a&&(a+=b);a+=c});return a}function Q(a,c,b){G(a,gb(" ",x(cb(V(G(a)),V(c)),V(b))))}a.je=gb;a.Lb=function(a){return a.parentNode};a.Fc=function(b){a.nb(b,"none")};a.mb=function(b,c){a.nb(b,q(c,d)?"":"none")};a.Oh=function(b,a){b.removeAttribute(a)};a.kh=function(b,a){b.style.clip=nb(a)};a.Tb=function(){return+new Date};a.O=function(b,a){b.appendChild(a)};a.ph=function(c,b){j(b,function(b){a.O(c,b)})};a.pb=function(b,a,c){(c||a.parentNode).insertBefore(b,a)};a.oh=function(b,a,c){b.insertAdjacentHTML(a,c)};a.ib=function(b,a){a=a||b.parentNode;a&&a.removeChild(b)};a.ch=function(b,c){j(b,function(b){a.ib(b,c)})};a.Rb=function(b){a.ch(a.jb(b,d),b)};function Bb(){j([].slice.call(arguments,0),function(b){if(a.Md(b))Bb.apply(e,b);else b&&b.$Destroy&&b.$Destroy()})}a.$Destroy=Bb;a.Uc=function(b,c){var d=a.Lb(b);if(c&1){a.U(b,(a.K(d)-a.K(b))/2);a.Vd(b,e)}if(c&2){a.V(b,(a.J(d)-a.J(b))/2);a.be(b,e)}};var X={$Top:e,$Right:e,$Bottom:e,$Left:e,Eb:e,Gb:e};a.Ch=function(b){var c=a.bc();L(c,{Me:"block",Pb:a.db(b),$Top:0,$Left:0,Eb:0,Gb:0});var e=a.ve(b,X);a.pb(c,b);a.O(c,b);var f=a.ve(b,X),d={};j(e,function(b,a){if(b==f[a])d[a]=b});L(c,X);L(c,d);L(b,{$Top:0,$Left:0});return d};a.Fh=function(b,a){return parseInt(b,a||10)};a.od=r;a.Ae=function(b,a){var c=h.body;while(a&&b!==a&&c!==a)a=a.parentNode;return b===a};function ab(e,d,c){var b=e.cloneNode(!d);!c&&a.Oh(b,"id");return b}a.ab=ab;a.Vb=function(f,g){var b=new Image;function c(f,d){a.$RemoveEvent(b,"load",c);a.$RemoveEvent(b,"abort",e);a.$RemoveEvent(b,"error",e);g&&g(b,d)}function e(a){c(a,d)}if(sb()&&n<11.6||!f)c(!f);else{a.$AddEvent(b,"load",c);a.$AddEvent(b,"abort",e);a.$AddEvent(b,"error",e);b.src=f}};a.Eh=function(g,c,f){var d=1;function e(a){d--;if(c&&a&&a.src==c.src)c=a;!d&&f&&f(c)}j(g,function(f){var c=b.hb(f,"src");if(c){d++;a.Vb(c,e)}});e()};a.Ce=function(a,g,i,h){if(h)a=ab(a);var c=Y(a,g);if(!m(c))c=b.rg(a,g);for(var f=m(c)-1;f>-1;f--){var d=c[f],e=ab(i);G(e,G(d));b.th(e,d.style.cssText);b.pb(e,d);b.ib(d)}return a};function Lb(){var c=this;b.W(c,p);var e,q="",t=["av","pv","ds","dn"],g=[],r,n=0,l=0,k=0;function m(){Q(e,r,(g[k||l&2||l]||"")+" "+(g[n]||""));a.lc(e,k?"none":"")}function d(){n=0;c.T(i,"mouseup",d);c.T(h,"mouseup",d);c.T(h,"touchend",d);c.T(h,"touchcancel",d);c.T(i,"blur",d);m()}function o(){n=4;m();c.a(i,"mouseup",d);c.a(h,"mouseup",d);c.a(h,"touchend",d);c.a(h,"touchcancel",d);c.a(i,"blur",d)}c.Ye=function(a){if(a===f)return l;l=a&2||a&1;m()};c.$Enable=function(a){if(a===f)return!k;k=a?0:3;m()};c.F=function(f){c.$Elmt=e=a.$GetElement(f);s(e,"data-jssor-button","1");var d=b.Ud(G(e));if(d)q=d.shift();j(t,function(a){g.push(q+a)});r=gb(" ",g);g.unshift("");c.a(e,"mousedown",o);c.a(e,"touchstart",o)};b.F(c)}a.Lc=function(a){return new Lb(a)};a.xh=function(a,b){return c.xb(a*a+b*b)};a.R=A;l("backgroundColor");a.Fb=l("overflow");a.lc=l("pointerEvents");a.V=l("top",2);a.U=l("left",2);a.cb=l("opacity",1);a.N=l("zIndex",1);function yb(m,n,a,k,b,g,f){if(b){var h=b[0],d=b[1];if(f){var e=c.l(d*2,1),l=e*(f-1)+1;a=(a*l-h)/e;if(a>0){d/=e;h=0;var j=c.H(a)-1;a=a-j;if(a>d&&j<f-1)a=1-a}}a=(a-h)/d;a=c.j(c.l(a,0),1)}if(g){a=a*g;var i=c.G(a);a-i&&(a-=i);a=c.j(c.l(a,0),1)}if(b||g)a=c.Y(a,3);return m+n*k(a)}function kb(d,e,h,i){d=d||{};var g={},b={};function n(a){b[a]=d[a]}function l(){b.cc=d.x;h&&!e&&(b.cc-=h)}function m(){b.Wb=d.y;i&&!e&&(b.Wb-=i)}var k={cc:0,Wb:0,sX:1,sY:1,r:0,rX:0,rY:0,tX:0,tY:0,tZ:0,kX:0,kY:0},c={};if(!B()||e){c.tZ=a.Kc;c.tX=a.Kc;c.tY=a.Kc}if(B()||e){c.x=l;c.y=m}j(d,function(b,a){(c[a]||n)(a)});j(b,function(c,a){if(k[a]!=f){g[a]=c;delete b[a]}});Z(g)&&(b.Kd=g);return b}function vb(f,e){var b=[],h=e&1;e&2&&(h=!h);for(var k=c.H(f/2),a=0;a<f;a++){var d=a;if(e&4){var g=c.G(c.dd()*f);d=q(b[a],a);b[a]=q(b[g],g);b[g]=d}else{if(e&2){d=a<k?a*2:(f-a-1)*2+1;b[d]=a}if(e&32)d=c.G(a/2)+(a%2?c.H(k):0);b[d]=a}}h&&b.reverse();var i=[];j(b,function(b,a){i[b]=a});return i}function xb(b,h,e,d){for(var g=[],i=e?c.H((b+d)/2):b,f=1/(h*(i-1)+1),a=0;a<b;a++){var j=e?c.G((a+d)/2):a;g[a]=[j*h*f,f]}return g}function Jb(h,u,e){h=h||{d:e.$Elmt?s(e.$Elmt,"d"):""};var E=e.$Easing,k=e.Bd||{},g=k.r,z=g==0,F=k.dl||0;function x(c,a){var d=c[0],o=c[1],e=c[2],p=c[3],g=c[4],q=c[5],h=c[6],r=c[7];if(a===f)a=.5;var b=1-a,i=b*d+a*e,s=b*o+a*p,j=b*e+a*g,t=b*p+a*q,k=b*g+a*h,u=b*q+a*r,l=b*i+a*j,v=b*s+a*t,m=b*j+a*k,w=b*t+a*u,n=b*l+a*m,x=b*v+a*w;return[[d,o,i,s,l,v,n,x],[n,x,m,w,k,u,h,r]]}function w(c,g){for(var d=0,e=0,a=0,b=g?6:0;b<m(c);b+=6){d+=c[b];e+=c[b+1];a++}return{x:a?d/a:f,y:a?e/a:f}}function b(b){var l=m(b),j=b[0]==b[l-2]&&b[1]==b[l-1],g=w(b,j),k=[],h=[];function e(a){return{x:b[a],y:b[a+1]}}function f(j,f,b){var d=a.Ue(j,f);h[b]=a.xh(d.x,d.y);if(!h[b]&&b%6){var g=b%6<3?2:-2;d=a.Ue(e(b+g),f)}var i=c.Yf(d.y,d.x);k[b]=i}for(var d=0;d<m(b);d+=6){var i=e(d);f(i,g,d);f(e(d-2),i,d-2);f(e(d+2),i,d+2)}return{lb:b,qb:(m(b)-2)/6,kc:g.x,ic:g.y,Nc:k,Vc:h,vc:j}}function n(o){function i(a){return a.replace(/[\^\s]*([mhvlzcsqta]|\-?\d*\.?\d+)[,\$\s]*/gi," $1").replace(/([mhvlzcsqta])/gi," $1").trim().split("  ").map(l)}function l(a){return a.split(" ").map(k)}function k(a,b){return b===0?a:+a}var h=[],a,n=i(o||""),d,e,f,g;function c(b){f=b[m(b)-2];g=b[m(b)-1];a=a.concat(b)}j(n,function(i){var j=i.shift();switch(j){case"M":a&&h.push(b(a));a=[];d=i[0];e=i[1];c(i);break;case"L":c([f,g,i[0],i[1],i[0],i[1]]);break;case"C":c(i);break;case"Z":case"z":(f!=d||g!=e)&&c([f,g,d,e,d,e])}});a&&h.push(b(a));return h}function d(a,b){return c.Y(a,2)+","+c.Y(b,2)}function A(a){for(var c="M"+d(a[0],a[1]),b=2;b<m(a)-2;b+=6){c+="C";c+=d(a[b],a[b+1])+" ";c+=d(a[b+2],a[b+3])+" ";c+=d(a[b+4],a[b+5])}return c}function y(b){var a="";j(b,function(b){a+=A(b)});return a}function D(d){for(var c=[],a=0;a<m(d)-2;a+=6)c.push(b(d.slice(a,a+8)));return c}function B(c){var a=[];j(c,function(c,d){var b=c.lb;!d&&a.push(b[0],b[1]);a=a.concat(b.slice(2))});return b(a)}function l(d,a){var p=a.gf=[],q=a.bf=[],e=a.qb+(!d.vc||!d.vc);function n(b){return a.Nc[b]-d.Nc[b]}function h(b,a){a=a||0;return c.Y((b-a+c.u*101)%(c.u*2)-c.u+a,8)}function i(b,f){var e=d.Vc[b],g=a.Vc[b],i=g-e,c=n(b);c=h(c,f);p[b]=i;q[b]=c;return c}for(var l=0,b=0;b<e;b++)l+=h(n(b*6));var f=h(l/e);if(g){var j=g>0?1:-1;f=(f+c.u*2*j)%(c.u*2)||c.u*2*j;f+=c.u*2*(g-j)}for(var b=0;b<m(d.lb);b+=6){var o=i(b,f);i(b-2,o);i(b+2,o)}var s=xb(e,F),r=vb(e,k.o);a.ad=function(b,c){if(b>=0&&b<=a.qb)return yb(0,1,c,E,s[r[b%e]])}}function t(d,a,s,n,i){function q(d){for(var a=[0,.2,0,.09,.09,0,.2,0,.31,0,.4,.09,.4,.2,.4,.31,.31,.4,.2,.4,.09,.4,0,.31,0,.2],c=0;c<m(a);c+=2){a[c]+=d.kc-.2;a[c+1]+=d.ic-.2}var e=b(a);e.vc=d.vc;return e}d=s[i]=d||q(a);a=n[i]=a||q(d);var h=d.qb,g=a&&a.qb;if(h<g)return t(a,d,n,s,i);if(g<h){for(var r=D(a.lb),u=h/g,o=h-g,f=0,p=0;p<10&&f<o;p++){var v=u+u*p/10,e=0;j(r,function(d,g){e+=d.qb;var b=c.$Round((g+1)*v);if(e<b){var a=c.j(b-e,o-f);d.qb+=a;f+=a;e+=a}return o<f})}var k=[];j(r,function(d){var a=d.qb,c=d.lb;while(a-1){var e=x(c,1/a);k.push(b(e[0]));c=e[1];a--}k.push(b(c))});a=n[i]=B(k)}l(d,a);l(a,d)}function r(b,a){if(m(b)<m(a))return r(a,b);j(b,function(d,c){t(d,a[c],b,a,c)})}var o=n(h.d),p=n(u.d);r(o,p);function i(b,h,i,e,a,l){var d=b.lb;if(a>=0&&a<m(b.lb)){var k=h.lb,f,g;if(z){f=d[a]+(k[a]-d[a])*e;g=d[a+1]+(k[a+1]-d[a+1])*e}else{var o=b.Vc[a],p=h.gf[a],q=b.Nc[a],r=h.bf[a],j=o+p*e,n=q+r*e;f=j*c.Cb(n)+i.x;g=j*c.gb(n)+i.y}l[a]=f;l[a+1]=g;return{x:f,y:g}}}var v={E:function(a){if(!a)return h;if(a==1)return u;var b=[];j(o,function(c,n){for(var g=[],d=p[n],e=0;e<m(c.lb);e+=6){var f=d.ad(e/6,a),l=q(d.ad(e/6-1,a),f),k=q(d.ad(e/6+1,a),f),j={x:c.kc+(d.kc-c.kc)*f,y:c.ic+(d.ic-c.ic)*f},h=i(c,d,j,f,e,g);i(c,d,h,(f+l)/2,e-2,g);i(c,d,h,(f+k)/2,e+2,g)}b.push(g)});return{d:y(b)}},X:function(a){return a&&a.d||""},sb:C("d")};return v}function Hb(b){return x({wc:a.Ph(b)?b:g.$Linear},b)}function z(i,u,h,M,o){i=i||{};h=x({},h);var ab=h.$Elmt,p={},W={},w,y,r=h.le,P=h.Ib,F=k(Hb(h.$Easing)),V=k(h.Bd),X=k(h.$During),Z=k(h.$Round),Y=k(h.Pc,E),G=S(u);i=k(i,f,d);u=k(u,f,d);var U=B(),K=o?{c:R,Kd:L,pt:Jb,bl:Q,da:H,fc:n(C("fill"),[0,0,0,1]),sc:n(C("stroke")),cl:n(l("color"),[0,0,0,1]),bgc:n(l("backgroundColor")),bdc:n(l("borderColor")),rp:N}:{},s=h.Yc||o&&{o:4,so:4,Kd:4,ls:4,lh:4,sX:4,sY:4};function T(c){var d=V[c]||{};return b.v({},h,{$Easing:F[c]||F.wc||e,Pc:Y[c]||e,Bd:d,$During:X[c]||e,$Round:Z[c]||e,Mf:d.rd,Yc:a.Nd(s)?s:s&&s[c],le:0})}function t(a){return m(a)%2?a.concat(a):a}function k(a,c,b){a=M?kb(a,P,b&&h.Lf,b&&h.Of):a||{};return o?x({},c,a):a}function n(f,d){function c(a){return a=="transparent"?e:a||d}function a(a,b){a=c(a);b=c(b);if(!a&&b){a=b.slice(0);a[3]=0}return a||[0,0,0,0]}return function(c,d,g){d=a(d,c);c=a(c,d);var e=z(c,d,b.v({Yc:[0,0,0,4]},g));return{E:function(a){return e.E(a)},X:function(a){return"rgba("+a.join(",")+")"},sb:f}}}function I(b,k,a){b=b||0;var f=a.$Easing||g.$Linear,e=a.$During,i=a.$Round,h=a.Mf,j=k-b,d=q(a.Yc,2);return{E:function(a){return c.Y(yb(b,j,a,f,e,i,h),d)},X:J,sb:a.Pc}}function A(c,d,a,b){return{E:z(c,d,a).E,X:function(a){return a.join(",")},sb:b}}function Q(b,c,a){return A(t(b||[0]),t(c),a,C("stdDeviation"))}function H(a,c,h){var e=m(c);c=t(c);if(!a){a=c.slice(0);j(a,function(c,b){b%2&&(a[b]=0)})}a=t(a);for(var d=m(a),f,b=1;b<=d&&b<=e;b++)if(!(d%b)&&!(e%b))f=b;function g(b){var a=b;while(m(a)<d*e/f)a=a.concat(b);return a}return A(g(a),g(c),h,C("stroke-dasharray"))}function R(b,c,a){return{E:z(b,c,a).E,X:function(b){return(b.y||b.x||b.m-a.$OriginalHeight||b.t-a.$OriginalWidth)&&nb(b)||""},sb:l("clip")}}function L(e,f,c){var a=c.Nf,b;function d(b){var d=(b.rX||0)%360,e=(b.rY||0)%360,f=(b.r||0)%360,g=q(b.sX,1),h=q(b.sY,1),i=q(b.sZ,1),c=new v(b.tX,b.tY,b.tZ||0);a&&c.$Move(-a.x,-a.y);c.$Scale(g,h,i);c.Ug(b.kX,b.kY);c.$RotateX(d);c.$RotateY(e);c.Cg(f);a&&c.$Move(a.x,a.y);c.$Move(b.cc,b.Wb);return c}if(c.Ib){y=C("transform");b=function(a){return d(a).Og()}}else{y=O;if(U)b=function(a){return d(a).Sg()};else b=jb}return{E:z(e,f,c).E,sb:y,X:b||J}}function N(){var b=1e-5;return{E:J,X:J,sb:function(d){b*=-1;a.cb(d,c.Y(a.cb(d),4)+b)}}}j(u,function(b,a){var c=i&&i[a]||0;if(G||b!==c){var d=o&&K[a]||(D(b)?z:I);p[a]=d(c,b,T(a))}});w=function(b){var a;j(p,function(c,e){var d=c.E(b);c.sb(c.$Elmt||ab,c.X(d));e=="o"&&(a=d)});return a};r&&b.f(p,function(a,e){for(var d=[],b=0;b<r+1;b++)d[b]=a.X(a.E(b/r));W[e]=d;a.E=function(a){return d[c.$Round(a*r)]};a.X=J});w.E=function(c){var a=x(d,G?[]:{},i);b.f(p,function(b,d){a[d]=b.E(c)});return a};return w}a.Kf=z;a.Zd=vb;a.K=l("width",2);a.J=l("height",2);a.Vd=l("right",2);a.be=l("bottom",2);l("marginLeft",2);l("marginTop",2);a.db=l("position");a.nb=l("display");a.th=function(a,b){if(b!=f)a.style.cssText=b;else return a.style.cssText};a.Jf=function(b,a){if(a===f){a=A(b,"backgroundImage")||"";var c=/\burl\s*\(\s*["']?([^"'\r\n,]+)["']?\s*\)/gi.exec(a)||[];return c[1]}A(b,"backgroundImage",a?"url('"+a+"')":"")};var E;a.If=E={$Opacity:a.cb,$Top:a.V,$Right:a.Vd,$Bottom:a.be,$Left:a.U,Eb:a.K,Gb:a.J,Pb:a.db,Me:a.nb,$ZIndex:a.N,o:a.cb,x:a.U,y:a.V,i:a.N,dO:l("stroke-dashoffset",1),ls:l("letterSpacing",16),lh:l("lineHeight",1),so:l("startOffset",4,100,s)};a.ve=function(c,b){var a={};j(b,function(d,b){if(E[b])a[b]=E[b](c)});return a};function L(b,a){j(a,function(c,a){E[a]&&E[a](b,c)})}a.rb=L;var ib={cc:0,Wb:0,sX:1,sY:1,r:0,rX:0,rY:0,tX:0,tY:0,tZ:0,kX:0,kY:0},Pb=[g.$Linear,g.$Swing,g.$InQuad,g.$OutQuad,g.$InOutQuad,g.$InCubic,g.$OutCubic,g.$InOutCubic,g.$InQuart,g.$OutQuart,g.$InOutQuart,g.$InQuint,g.$OutQuint,g.$InOutQuint,g.$InSine,g.$OutSine,g.$InOutSine,g.$InExpo,g.$OutExpo,g.$InOutExpo,g.$InCirc,g.$OutCirc,g.$InOutCirc,g.$InElastic,g.$OutElastic,g.$InOutElastic,g.$InBack,g.$OutBack,g.$InOutBack,g.$InBounce,g.$OutBounce,g.$InOutBounce,g.$Early,g.$Late,g.$Mid,g.$Mid2,g.$Mid3,g.$Mid4,g.$Mid5,g.$Mid6];function ub(a){var c;if(b.Nd(a))c=Pb[a];else if(b.Sh(a)){c={};j(a,function(a,b){c[b]=ub(a)})}return c||a}a.Ld=ub;function m(a){return a.length}a.A=m;a.Qd=w;a.Vf=function(k,j,n,o){b.cb(k,1);var m={o:{j:0,l:1}},e={x:0,y:0,o:1,r:0,rX:0,rY:0,sX:1,sY:1,tZ:0,kX:0,kY:0};function h(e){var a=[],c=b.jb(e,d);b.f(c,function(d){if(d.nodeType==3){for(var f=b.bd(d),e=0;e<b.A(f);e++){var g=f[e],c=b.Rd();b.nb(c,"inline-block");b.db(c,"relative");g==" "?b.ng(c,"&nbsp;"):b.bd(c,g);b.pb(c,d);a.push(c);b.cb(c,j)}b.ib(d)}else a=a.concat(h(d))});return a}function l(n){var j=this,h=b.Zd(a,4),e=b.Pd(n,["b","d","e","p","dr"])||{},g={};function i(d,g,f){var b=f?a:g,e=0;if(d.Sd&2){b=c.H(b/2);if(!d.$Reverse){e=(b+1)%2*d.ed;b+=e}}return b}function d(d){var g=d&1,i=d&2||1,e=0;if(d&2)e=a%2;var f=d==68?h:b.Zd(a,d);return{Sd:d,ed:e,$Reverse:g,Od:f,Le:function(a){return c.G((f[a]+e*!g)/i)}}}function l(a,b,f,d){var e=i(a,b,f),c=1/(d*(e-1)+1);return{nc:function(e){return a.Od[e]<b&&[a.Le(e)*d*c,c]}}}function m(a){return{Pe:function(b){return a.Od[b]%2?1:-1}}}function k(b,g,k,h,j){var d=i(b,g,k),e=0;function f(a){return c.B(1-a/d,h)}if(b.Sd&2){d=c.H(a/2)-b.ed;e=f(d-1)/2*!b.ed}return{Se:function(a){a=b.Le(a);j&&(a=d-a-1);return f(a)-e}}}j.Uf=e;j.Rf=function(o){var i=g[o];if(!i){var h=e.p&&e.p[o]||{},y=b.wc(h.dl,.5),x=h.o||0,z=h.r||1,p=h.c,r=h.d,n=b.wc(h.dO,8),q=c.$Round(a*z),j=d(x),w=l(j,q,h.dlc,y),t=p&8?j:d(p),v=m(t),s=n&8?j:d(n),u=k(s,q,h.dc,r,n==9);i=g[o]={nc:w.nc,Qf:function(a){return(p!=f?v.Pe(a):1)*(r?u.Se(a):1)}}}return i}}var i=h(k),a=b.A(i),g=[];b.f(i,function(i,h){var a=[],d=b.v({},e),f=b.v({},e,{o:j});b.f(n,function(j,n){var i={},o={},k=g[n]=g[n]||new l(j);b.f(j,function(l,b){var n=k.Rf(b),p=n.nc(h);if(p){var a,g=c.Y(l-d[b],8);if(g){g=c.Y(l-e[b],8);g*=n.Qf(h);a=c.Y(g+e[b],4);var j=m[b];if(j){a=c.l(a,j.j);a=c.j(a,j.l)}}else a=l;if(a-f[b]){i[b]=a;o[b]=p}}});b.v(d,j);b.v(f,i);if(b.Th(i)){b.v(i,k.Uf);i.dr=o;a.push(i)}});b.A(a)&&o(i,a)})}};function p(){var a=this,f,e=[],c=[];function k(a,b){e.push({ec:a,gc:b})}function j(a,c){b.f(e,function(b,d){b.ec==a&&b.gc===c&&e.splice(d,1)})}function h(){e=[]}function g(){b.f(c,function(a){b.$RemoveEvent(a.Ne,a.ec,a.gc,a.Xe)});c=[]}a.Oc=function(){return f};a.a=function(f,d,e,a){b.$AddEvent(f,d,e,a);c.push({Ne:f,ec:d,gc:e,Xe:a})};a.T=function(f,d,e,a){b.f(c,function(g,h){if(g.Ne===f&&g.ec==d&&g.gc===e&&g.Xe==a){b.$RemoveEvent(f,d,e,a);c.splice(h,1)}})};a.Ve=g;a.$On=a.addEventListener=k;a.$Off=a.removeEventListener=j;a.k=function(a){var c=[].slice.call(arguments,1);b.f(e,function(b){b.ec==a&&b.gc.apply(i,c)})};a.$Destroy=function(){if(!f){f=d;g();h()}}}var l=function(C,F,l,m,L,M){C=C||0;var a=this,t,p,n,o,v,D=0,O=1,E,B=0,h=0,r=0,A,j,e,g,u,z,s=[],I=k,J,H=k;function R(a){e+=a;g+=a;j+=a;h+=a;r+=a;B+=a}function y(C){var k=C;if(u)if(!z&&(k>=g||k<e)||z&&k>=e)k=((k-e)%u+u)%u+e;if(!A||v||h!=k){var i=c.j(k,g);i=c.l(i,e);if(l.$Reverse)i=g-i+e;if(!A||v||i!=r){if(t){var y=(i-j)/(F||1),x=t(y),n;if(J){var o=i>e&&i<g;if(o!=H)n=H=o}if(!n&&x!=f){var p=!x;if(p!=I)n=I=p}if(n!=f){n&&b.lc(m,"none");!n&&b.lc(m,b.g(m,"data-events"))}}var w=r,q=r=i;b.f(s,function(c,d){var a=!A&&z||k<=h?s[b.A(s)-d-1]:c;a.L(i-B)});h=k;A=d;a.kd(w-j,q-j);a.zc(w,q)}}}function G(a,b,d){b&&a.$Shift(g);if(!d){e=c.j(e,a.yc()+B);g=c.l(g,a.vb()+B)}s.push(a)}var w=i.requestAnimationFrame||i.webkitRequestAnimationFrame||i.mozRequestAnimationFrame||i.msRequestAnimationFrame;if(b.He()&&b.Cd()<7||!w)w=function(a){b.$Delay(a,l.$Interval)};function N(){if(p){var c=b.Tb(),d=c-D;D=c;var a=h+d*o*O;if(a*o>=n*o)a=n;y(a);if(!v&&a*o>=n*o)P(E);else w(N)}}function x(f,i,j){if(!p){p=d;v=j;E=i;f=c.l(f,e);f=c.j(f,g);n=f;o=n<h?-1:1;a.Qc();D=b.Tb();w(N)}}function P(b){if(p){v=p=E=k;a.Rc();b&&b()}}a.$Play=function(a,b,c){x(a?h+a:g,b,c)};a.tc=x;a.Ff=function(a,b){x(g,a,b)};a.S=P;a.Be=function(){return h};a.Ee=function(){return n};a.z=function(){return r};a.L=y;a.uf=function(){y(g,d)};a.$IsPlaying=function(){return p};a.De=function(a){O=a};a.$Shift=R;a.je=G;a.M=function(a,b){G(a,0,b)};a.zd=function(a){G(a,1)};a.qd=function(a){g+=a};a.yc=function(){return e};a.vb=function(){return g};a.zc=a.Qc=a.Rc=a.kd=b.Kc;b.Tb();a.nf=function(){return t&&t.E(1)};l=b.v({$Interval:16},l);m&&(J=b.g(m,"data-inactive"));u=l.hc;z=l.pf;e=j=C;g=C+F;l.$Elmt=m;m&&(t=b.Kf(L,M,l,d,d))};var u=i.$JssorSlideshowFormations$=new function(){var i=this,e=0,a=1,g=2,f=3,t=1,s=2,u=4,r=8,x=256,y=512,w=1024,v=2048,k=v+t,j=v+s,p=y+t,n=y+s,o=x+u,l=x+r,m=w+u,q=w+r;function z(a){return(a&s)==s}function A(a){return(a&u)==u}function h(b,a,c){c.push(a);b[a]=b[a]||[];b[a].push(c)}i.$FormationStraight=function(f){for(var d=f.$Cols,e=f.$Rows,s=f.$Assembly,t=f.mc,r=[],a=0,b=0,i=d-1,q=e-1,g=t-1,c,b=0;b<e;b++)for(a=0;a<d;a++){switch(s){case k:c=g-(a*e+(q-b));break;case m:c=g-(b*d+(i-a));break;case p:c=g-(a*e+b);case o:c=g-(b*d+a);break;case j:c=a*e+b;break;case l:c=b*d+(i-a);break;case n:c=a*e+(q-b);break;default:c=b*d+a}h(r,c,[b,a])}return r};i.$FormationSwirl=function(r){var y=r.$Cols,z=r.$Rows,C=r.$Assembly,x=r.mc,B=[],A=[],v=0,c=0,i=0,s=y-1,t=z-1,u,q,w=0;switch(C){case k:c=s;i=0;q=[g,a,f,e];break;case m:c=0;i=t;q=[e,f,a,g];break;case p:c=s;i=t;q=[f,a,g,e];break;case o:c=s;i=t;q=[a,f,e,g];break;case j:c=0;i=0;q=[g,e,f,a];break;case l:c=s;i=0;q=[a,g,e,f];break;case n:c=0;i=t;q=[f,e,g,a];break;default:c=0;i=0;q=[e,g,a,f]}v=0;while(v<x){u=i+","+c;if(c>=0&&c<y&&i>=0&&i<z&&!A[u]){A[u]=d;h(B,v++,[i,c])}else switch(q[w++%b.A(q)]){case e:c--;break;case g:i--;break;case a:c++;break;case f:i++}switch(q[w%b.A(q)]){case e:c++;break;case g:i++;break;case a:c--;break;case f:i--}}return B};i.$FormationZigZag=function(q){var x=q.$Cols,y=q.$Rows,A=q.$Assembly,w=q.mc,u=[],v=0,c=0,d=0,r=x-1,s=y-1,z,i,t=0;switch(A){case k:c=r;d=0;i=[g,a,f,a];break;case m:c=0;d=s;i=[e,f,a,f];break;case p:c=r;d=s;i=[f,a,g,a];break;case o:c=r;d=s;i=[a,f,e,f];break;case j:c=0;d=0;i=[g,e,f,e];break;case l:c=r;d=0;i=[a,g,e,g];break;case n:c=0;d=s;i=[f,e,g,e];break;default:c=0;d=0;i=[e,g,a,g]}v=0;while(v<w){z=d+","+c;if(c>=0&&c<x&&d>=0&&d<y&&typeof u[z]=="undefined"){h(u,v++,[d,c]);switch(i[t%b.A(i)]){case e:c++;break;case g:d++;break;case a:c--;break;case f:d--}}else{switch(i[t++%b.A(i)]){case e:c--;break;case g:d--;break;case a:c++;break;case f:d++}switch(i[t++%b.A(i)]){case e:c++;break;case g:d++;break;case a:c--;break;case f:d--}}}return u};i.$FormationStraightStairs=function(i){var u=i.$Cols,v=i.$Rows,e=i.$Assembly,t=i.mc,r=[],s=0,c=0,d=0,f=u-1,g=v-1,x=t-1;switch(e){case k:case n:case p:case j:var a=0,b=0;break;case l:case m:case o:case q:var a=f,b=0;break;default:e=q;var a=f,b=0}c=a;d=b;while(s<t){if(A(e)||z(e))h(r,x-s++,[d,c]);else h(r,s++,[d,c]);switch(e){case k:case n:c--;d++;break;case p:case j:c++;d--;break;case l:case m:c--;d--;break;case q:case o:default:c++;d++}if(c<0||d<0||c>f||d>g){switch(e){case k:case n:a++;break;case l:case m:case p:case j:b++;break;case q:case o:default:a--}if(a<0||b<0||a>f||b>g){switch(e){case k:case n:a=f;b++;break;case p:case j:b=g;a++;break;case l:case m:b=g;a--;break;case q:case o:default:a=0;b++}if(b>g)b=g;else if(b<0)b=0;else if(a>f)a=f;else if(a<0)a=0}d=b;c=a}}return r};i.$FormationRectangle=function(f){var d=f.$Cols||1,e=f.$Rows||1,g=[],a,b,i;i=c.$Round(c.j(d/2,e/2))+1;for(a=0;a<d;a++)for(b=0;b<e;b++)h(g,i-c.j(a+1,b+1,d-a,e-b),[b,a]);return g};i.$FormationRandom=function(d){for(var e=[],a,b=0;b<d.$Rows;b++)for(a=0;a<d.$Cols;a++)h(e,c.H(1e5*c.dd())%13,[b,a]);return e};i.$FormationCircle=function(d){for(var e=d.$Cols||1,f=d.$Rows||1,g=[],a,i=e/2-.5,j=f/2-.5,b=0;b<e;b++)for(a=0;a<f;a++)h(g,c.$Round(c.xb(c.B(b-i,2)+c.B(a-j,2))),[a,b]);return g};i.$FormationCross=function(d){for(var e=d.$Cols||1,f=d.$Rows||1,g=[],a,i=e/2-.5,j=f/2-.5,b=0;b<e;b++)for(a=0;a<f;a++)h(g,c.$Round(c.j(c.P(b-i),c.P(a-j))),[a,b]);return g};i.$FormationRectangleCross=function(f){for(var g=f.$Cols||1,i=f.$Rows||1,j=[],a,d=g/2-.5,e=i/2-.5,k=c.l(d,e)+1,b=0;b<g;b++)for(a=0;a<i;a++)h(j,c.$Round(k-c.l(d-c.P(b-d),e-c.P(a-e)))-1,[a,b]);return j}};i.$JssorSlideshowRunner$=function(n,q,o,r,w,v){var a=this,f,m,i,t=0,s=r.$TransitionsOrder;function h(a){var c={$Left:"x",$Top:"y",$Bottom:"m",$Right:"t",$Rotate:"r",$ScaleX:"sX",$ScaleY:"sY",$TranslateX:"tX",$TranslateY:"tY",$SkewX:"kX",$SkewY:"kY",$Opacity:"o",$ZIndex:"i",$Clip:"c"};b.f(a,function(e,d){var b=c[d];if(b){a[b]=e;delete a[d];b=="c"&&h(e)}});if(a.$Zoom)a.sX=a.sY=a.$Zoom}function j(f,e){var a={$Duration:1,$Delay:0,$Cols:1,$Rows:1,$Opacity:0,$Zoom:0,$Clip:0,$Move:k,$SlideOut:k,$Reverse:k,$Formation:u.$FormationRandom,$Assembly:1032,$ChessMode:{$Column:0,$Row:0},$Easing:g.$Linear,$Round:{},Ic:[],$During:{}};b.v(a,f);if(a.$Rows==0)a.$Rows=c.$Round(a.$Cols*e);a.$Easing=b.Ld(a.$Easing);h(a);h(a.$Easing);h(a.$During);h(a.$Round);a.mc=a.$Cols*a.$Rows;a.Af=function(c,b){c/=a.$Cols;b/=a.$Rows;var f=c+"x"+b;if(!a.Ic[f]){a.Ic[f]={w:c,h:b};for(var d=0;d<a.$Cols;d++)for(var e=0;e<a.$Rows;e++)a.Ic[f][e+","+d]={y:e*b,t:d*c+c,m:e*b+b,x:d*c}}return a.Ic[f]};if(a.$Brother){a.$Brother=j(a.$Brother,e);a.$SlideOut=d}return a}function p(s,g,a,t,o,n){var h,e,j=a.$ChessMode.$Column||0,m=a.$ChessMode.$Row||0,i=a.Af(o,n),p=a.$Formation(a),r=a.$SlideOut;g=b.ab(g);b.N(g,1);b.Fb(g,"hidden");b.db(g,"absolute");v(g,0,0);!a.$Reverse&&p.reverse();var f={x:a.c&1,t:a.c&2,y:a.c&4,m:a.c&8},q=new l(0,0);b.f(p,function(w,v){if(r)v=b.A(p)-v-1;var x=a.$Delay*v;b.f(w,function(G){var J=G[0],I=G[1],O=J+","+I,v=k,w=k,z=k;if(j&&I%2){if(j&3)v=!v;if(j&12)w=!w;if(j&16)z=!z}if(m&&J%2){if(m&3)v=!v;if(m&12)w=!w;if(m&16)z=!z}var E=w?f.m:f.y,B=w?f.y:f.m,D=v?f.t:f.x,C=v?f.x:f.t,H=E||B||D||C,A=b.ab(g);e={x:0,y:0,o:1};h=b.v({},e);if(a.o)e.o=2-a.o;var N=a.$Cols*a.$Rows>1||H;if(a.sX||a.r){var M=d;if(M){e.sX=e.sY=a.sX?a.sX-1:1;h.sX=h.sY=1;var T=a.r||0;e.r=T*360*(z?-1:1);h.r=0}}if(N){var F=i[O];if(H){var p={},y=a.$ScaleClip||1;if(E&&B){p.y=i.h/2*y;p.m=-p.y}else if(E)p.m=-i.h*y;else if(B)p.y=i.h*y;if(D&&C){p.x=i.w/2*y;p.t=-p.x}else if(D)p.t=-i.w*y;else if(C)p.x=i.w*y;if(a.$Move){var R=(p.x||0)+(p.t||0),S=(p.y||0)+(p.m||0);e.x+=R;e.y+=S}h.c=F;b.f(p,function(b,a){p[a]=F[a]+b});e.c=p}else b.kh(A,F)}var P=v?1:-1,Q=w?1:-1;if(a.x)e.x+=o*a.x*P;if(a.y)e.y+=n*a.y*Q;var K={$Elmt:A,$Easing:a.$Easing,$During:a.$During,$Round:a.$Round,$Move:a.$Move,Eb:o,Gb:n,le:c.$Round(a.$Duration/4),$Reverse:!r};e=b.Zg(e,h);var L=new l(t+x,a.$Duration,K,A,h,e);q.M(L);s.Ef(A)})});q.L(-1);return q}a.Bf=function(){var a=0,d=r.$Transitions,e=b.A(d);if(s)a=t++%e;else a=c.G(c.dd()*e);d[a]&&(d[a].Qb=a);return d[a]};a.Ob=function(){n.Ob();m=e;i=e};a.Cf=function(v,y,w,x,s,k){f=j(s,k);var h=x.Re,d=w.Re,e=h,g=d,r=f,b=f.$Brother||j({},k);if(!f.$SlideOut){e=d;g=h}var l=b.$Shift||0,u=c.l(l,0),t=c.l(-l,0);m=p(n,g,b,u,q,o);i=p(n,e,r,t,q,o);a.Qb=v};a.of=function(){var a=e;if(i){a=new l(0,0);a.M(i);a.M(m);a.ye=f}return a}};var o={qf:"data-scale",yb:"data-autocenter",Dd:"data-nofreeze",ze:"data-nodrag"},q=new function(){var a=this;a.Ac=function(c,a,e,d){(d||!b.g(c,a))&&b.g(c,a,e)};a.Cc=function(a){var c=b.q(a,o.yb);b.Uc(a,c)}},s={uc:1};i.$JssorBulletNavigator$=function(){var a=this,E=b.W(a,p),h,v,C,B,m,l=0,g,r,n,z,A,i,k,u,t,x,j;function y(a){j[a]&&j[a].Ye(a==l)}function w(b){a.k(s.uc,b*r)}a.Sc=function(a){if(a!=m){var d=l,b=c.G(a/r);l=b;m=a;y(d);y(b)}};a.id=function(a){b.mb(h,!a)};a.nd=function(J){b.$Destroy(j);m=f;a.Ve();x=[];j=[];b.Rb(h);v=c.H(J/r);l=0;var F=u+z,G=t+A,s=c.H(v/n)-1;C=u+F*(!i?s:n-1);B=t+G*(i?s:n-1);b.K(h,C);b.J(h,B);for(var o=0;o<v;o++){var H=b.Rd();b.bd(H,o+1);var p=b.Ce(k,"numbertemplate",H,d);b.db(p,"absolute");var E=o%(s+1),I=c.G(o/(s+1)),y=g.Yb&&!i?s-E:E;b.U(p,(!i?y:I)*F);b.V(p,(i?y:I)*G);b.O(h,p);x[o]=p;g.$ActionMode&1&&a.a(p,"click",b.Z(e,w,o));g.$ActionMode&2&&a.a(p,"mouseenter",b.Z(e,w,o));j[o]=b.Lc(p)}q.Cc(h)};a.F=function(d,c){a.$Elmt=h=b.$GetElement(d);a.gd=g=b.v({$SpacingX:10,$SpacingY:10,$ActionMode:1},c);k=b.$FindChild(h,"prototype");u=b.K(k);t=b.J(k);b.ib(k,h);r=g.$Steps||1;n=g.$Rows||1;z=g.$SpacingX;A=g.$SpacingY;i=g.$Orientation&2;g.$AutoCenter&&q.Ac(h,o.yb,g.$AutoCenter)};a.$Destroy=function(){b.$Destroy(j,E)};b.F(a)};i.$JssorArrowNavigator$=function(){var a=this,v=b.W(a,p),f,c,g,l,r,k,h,m,j,i;function n(b){a.k(s.uc,b,d)}function u(a){b.mb(f,!a);b.mb(c,!a)}function t(){j.$Enable((g.$Loop||!l.lf(h))&&k>1);i.$Enable((g.$Loop||!l.ef(h))&&k>1)}a.Sc=function(c,a,b){h=a;!b&&t()};a.id=u;a.nd=function(g){k=g;h=0;if(!r){a.a(f,"click",b.Z(e,n,-m));a.a(c,"click",b.Z(e,n,m));j=b.Lc(f);i=b.Lc(c);b.g(f,o.Dd,1);b.g(c,o.Dd,1);r=d}};a.F=function(e,d,h,i){a.gd=g=b.v({$Steps:1},h);f=e;c=d;if(g.Yb){f=d;c=e}m=g.$Steps;l=i;if(g.$AutoCenter){q.Ac(f,o.yb,g.$AutoCenter);q.Ac(c,o.yb,g.$AutoCenter)}q.Cc(f);q.Cc(c)};a.$Destroy=function(){b.$Destroy(j,i,v)};b.F(a)};i.$JssorThumbnailNavigator$=function(){var i=this,E=b.W(i,p),h,B,a,y,C,m,l=[],A,z,g,n,r,w,v,x,t,u;function D(){var c=this;b.W(c,p);var h,f,n,l;function o(){n.Ye(m==h)}function j(e){if(e||!t.$LastDragSucceeded()){var c=g-h%g,a=t.Id((h+c)/g-1),b=a*g+g-c;if(a<0)b+=y%g;if(a>=C)b-=y%g;i.k(s.uc,b,k,d)}}c.Hd=o;c.F=function(g,i){c.Qb=h=i;l=g.nh||g.ih||b.bc();c.Wc=f=b.Ce(u,"thumbnailtemplate",l,d);n=b.Lc(f);a.$ActionMode&1&&c.a(f,"click",b.Z(e,j,0));a.$ActionMode&2&&c.a(f,"mouseenter",b.Z(e,j,1))};b.F(c)}i.Sc=function(a,e,d){if(a!=m){var b=m;m=a;b!=-1&&l[b].Hd();l[a]&&l[a].Hd()}!d&&t.$PlayTo(t.Id(c.G(a/g)))};i.id=function(a){b.mb(h,!a)};i.nd=function(I,J){b.$Destroy(t,l);m=f;l=[];var K=b.ab(B);b.Rb(h);a.Yb&&b.g(h,"dir","rtl");b.ph(h,b.jb(K));var i=b.$FindChild(h,"slides",d);y=I;C=c.H(y/g);m=-1;var e=a.$Orientation&1,s=w+(w+n)*(g-1)*(1-e),p=v+(v+r)*(g-1)*e,E=(e?c.l:c.j)(A,s),u=(e?c.j:c.l)(z,p);x=c.H((A-n)/(w+n)*e+(z-r)/(v+r)*(1-e));var G=s+(s+n)*(x-1)*e,F=p+(p+r)*(x-1)*(1-e);E=c.j(E,G);u=c.j(u,F);b.K(i,E);b.J(i,u);b.Uc(i,3);var o=[];b.f(J,function(k,f){var h=new D(k,f),d=h.Wc,a=c.G(f/g),j=f%g;b.U(d,(w+n)*j*(1-e));b.V(d,(v+r)*j*e);if(!o[a]){o[a]=b.bc();b.O(i,o[a])}b.O(o[a],d);l.push(h)});var H=b.v({$AutoPlay:0,$NaviQuitDrag:k,$SlideWidth:s,$SlideHeight:p,$SlideSpacing:n*e+r*(1-e),$MinDragOffsetToSlide:12,$SlideDuration:200,$PauseOnHover:1,$Cols:x,$PlayOrientation:a.$Orientation,$DragOrientation:a.$NoDrag||a.$DisableDrag?0:a.$Orientation},a);t=new j(h,H);q.Cc(h)};i.F=function(j,f,e){h=j;i.gd=a=b.v({$SpacingX:0,$SpacingY:0,$Orientation:1,$ActionMode:1},f);A=b.K(h);z=b.J(h);var c=b.$FindChild(h,"slides",d);u=b.$FindChild(c,"prototype");e=b.ab(e);b.pb(e,c);w=b.K(u);v=b.J(u);b.ib(u,c);b.db(c,"absolute");b.Fb(c,"hidden");g=a.$Rows||1;n=a.$SpacingX;r=a.$SpacingY;a.$AutoCenter&=a.$Orientation;a.$AutoCenter&&q.Ac(h,o.yb,a.$AutoCenter);B=b.ab(h)};i.$Destroy=function(){b.$Destroy(t,l,E)};b.F(i)};function n(e,d,c){var a=this;b.W(a,p);l.call(a,0,c.$Idle);a.qc=0;a.fd=c.$Idle}n.pc=21;n.Zb=24;var t=i.$JssorCaptionSlideo$=function(){var a=this,db=b.W(a,p);l.call(a,0,0);var f,j,B,C,w=new l(0,0),L=[],u=[],F,q=0;function H(c,f){var a=L[c];if(a==e){a=L[c]={ob:c,Zc:[],Te:[]};var d=0;!b.f(u,function(a,b){d=b;return a.ob>c})&&d++;u.splice(d,0,a)}return a}function Q(f,v){var s=b.K(f),r=b.J(f),m=b.Ib(f),j={x:m?0:b.U(f),y:m?0:b.V(f),cc:0,Wb:0,o:b.cb(f),i:b.N(f)||0,r:0,rX:0,rY:0,sX:1,sY:1,tX:0,tY:0,tZ:0,kX:0,kY:0,ls:0,lh:1,so:0,c:{y:0,t:s,m:r,x:0}},a,g;if(C){var o=C[b.q(f,"c")];if(o){a=H(o.r,0);a.sg=o.e||0}}var h=b.g(f,"data-to");if(h&&m){h=b.Ud(h);h={x:b.od(h[0]),y:b.od(h[1])}}var u={$Elmt:f,$OriginalWidth:s,$OriginalHeight:r,Nf:h,Lf:j.x,Of:j.y,Ib:m};b.f(v,function(e){var m=b.v({$Easing:b.Ld(e.e),$During:e.dr,Bd:e.p},u),i=b.v(d,{},e);b.Pd(i,["b","d","e","p","dr"]);var h=new l(e.b,e.d,m,f,j,i);q=c.l(q,e.b+e.d);if(a){if(!g)g=new l(e.b,0);g.M(h)}else{var k=H(e.b,e.b+e.d);k.Zc.push(h)}j=h.nf()});if(a&&g){g.uf();var i=g,n,k=g.yc(),p=g.vb(),t=c.l(p,a.sg);if(a.ob<p){if(a.ob>k){i=new l(k,a.ob-k);i.M(g,d)}else i=e;n=new l(a.ob,t-k,{hc:t-a.ob,pf:d});n.M(g,d)}i&&a.Zc.push(i);n&&a.Te.push(n)}return j}function N(d,c){b.f(d,function(d){var f=b.q(d,"play");if(c&&f){var e=new t(d,j,{xe:f});E.push(e);a.a(e,n.pc,I);a.a(e,n.Zb,G)}else{N(b.jb(d).concat(b.xc(b.Hc(d,"data-tchd"))),c+1);var g=b.xc(b.Hc(d,"data-tsep"));g.push(d);b.f(g,function(c){var a=B[b.q(c,"t")];a&&Q(c,a)})}})}function cb(f,e,g){var c=f.b-e;if(c){var b=new l(e,c);b.M(w,d);b.$Shift(g);a.M(b)}a.qd(f.d);return c}function bb(e){var c=w.yc(),d=0;b.f(e,function(e,f){e=b.v({d:3e3},e);cb(e,c,d);c=e.b;d+=e.d;if(!f||e.t==2){a.qc=c;a.fd=c+e.d}})}function A(i,d,e){var f=b.A(d);if(f>4)for(var j=c.H(f/4),a=0;a<j;a++){var g=d.slice(a*4,c.j(a*4+4,f)),h=new l(g[0].ob,0);A(h,g,e);i.M(h)}else b.f(d,function(a){b.f(e?a.Te:a.Zc,function(a){e&&a.qd(q-a.vb());i.M(a)})})}var i,M,y=0,g,x,S,R,z,E=[],O=[],r,D,m;function v(a){return a&2||a&4&&b.ud().td}function Z(){if(!z){g&8&&a.a(h,"keydown",J);if(g&32){a.a(h,"mousedown",s);a.a(h,"touchstart",s)}z=d}}function Y(){a.T(h,"keydown",J);a.T(h,"mousedown",s);a.T(h,"touchstart",s);z=k}function T(b){if(!r||b){r=d;a.S();b&&y&&a.L(0);a.De(1);a.Ff();Z();a.k(n.pc,a)}}function o(){if(!D&&(r||a.z())){D=d;a.S();a.Be()>a.qc&&a.L(a.qc);a.De(S||1);a.tc(0)}}function V(){!m&&o()}function U(c){var b=c;if(c<0&&a.z())b=1;if(b!=y){y=b;M&&a.k(n.Zb,a,y)}}function J(a){g&8&&b.Je(a)==27&&o()}function X(a){if(m&&b.Fe(a)!==e){m=k;g&16&&b.$Delay(V,160)}}function s(a){g&32&&!b.Ae(f,b.$EvtSrc(a))&&o()}function W(a){if(!m){m=d;if(i&1)b.Ie(a,f)&&T()}}function ab(j){var h=b.$EvtSrc(j),a=b.kb(h,e,e,"A"),c=a&&(b.qe(a)||a===f||b.Ae(f,a));if(r&&v(g))!c&&o();else if(v(i))!c&&T(d)}function I(b){var c=b.wg(),a=O[c];a!==b&&a&&a.vg();O[c]=b}function G(b,c){a.k(n.Zb,b,c)}a.wg=function(){return R||""};a.vg=o;a.Qc=function(){U(1)};a.Rc=function(){r=k;D=k;U(-1);!a.z()&&Y()};a.zc=function(){!m&&x&&a.Be()>a.fd&&o()};a.F=function(m,k,e){f=m;j=k;i=e.xe;F=e.cg;B=j.$Transitions;C=j.$Controls;N([f],0);A(w,u);if(i){a.M(w);F=d;x=b.q(f,"idle");g=b.q(f,"rollback");S=b.q(f,"speed",1);R=b.hb(f,"group");(v(i)||v(g))&&a.a(f,"click",ab);if((i&1||x)&&!b.ud().td){a.a(f,"mouseenter",W);a.a(f,"mouseleave",X)}M=b.q(f,"pause")}var l=j.$Breaks||[],c=l[b.q(f,"b")]||[],h={b:q,d:b.A(c)?0:e.$Idle||x||0};c=c.concat([h]);bb(c);a.vb();F&&a.qd(1e8);q=a.vb();A(a,u,d);a.L(-1);a.L(b.q(f,"initial")||0)};a.$Destroy=function(){b.$Destroy(db,E);a.S();a.L(-1)};b.F(a)},j=i.$JssorSlider$=(i.module||{}).exports=function(){var a=this,Gc=b.W(a,p),Ob="data-jssor-slider",ic="data-jssor-thumb",u,m,S,Cb,kb,jb,X,J,O,M,Zb,Cc,Hc=1,Bc=1,kc=1,sc=1,nc={},w,R,Mb,bc,Yb,wb,zb,yb,ab,H=[],Rb,r=-1,tc,q,I,G,P,ob,pb,E,N,lb,T,z,W,nb,Z=[],vc,xc,oc,t,vb,Hb,qb,eb,Y,Kb,Gb,Qb,Sb,F,Lb=0,cb=0,Q=Number.MAX_VALUE,K=Number.MIN_VALUE,C,mb,db,U=1,Xb=0,fb,y,Fb,Eb,L,Ab,Db,B,V,rb,A,Bb,cc=b.ud(),Vb=cc.td,x=[],D,hb,bb,Nb,hc,mc,ib;function Jb(){return!U&&Y&12}function Ic(){return Xb||!U&&Y&3}function Ib(){return!y&&!Jb()&&!A.$IsPlaying()}function Wc(){return!Ic()&&Ib()}function jc(){return z||S}function Pc(){return jc()&2?pb:ob}function lc(a,c,d){b.U(a,c);b.V(a,d)}function Fc(c,b){var a=jc(),d=(ob*b+Lb)*(a&1),e=(pb*b+Lb)*(a&2)/2;lc(c,d,e)}function dc(b,f){if(y&&!(C&1)){var e=b,d;if(b<K){e=K;d=-1}if(b>Q){e=Q;d=1}if(d){var a=b-e;if(f){a=c.Xf(a)*2/c.u;a=c.B(a*d,1.6)}else{a=c.B(a*d,.625);a=c.Oe(a*c.u/2)}b=e+a*d}}return b}function qc(a){return dc(a,d)}function Nc(a){return dc(a)}function xb(a,b){if(!(C&1)){var c=a-Q+(b||0),d=K-a+(b||0);if(c>0&&c>d)a=Q;else if(d>0)a=K}return a}function yc(a){return!(C&1)&&a-K<.0001}function wc(a){return!(C&1)&&Q-a<.0001}function sb(a){return!(C&1)&&(a-K<.0001||Q-a<.0001)}function Tb(c,a,d){!ib&&b.f(Z,function(b){b.Sc(c,a,d)})}function ec(b){var a=b,d=sb(b);if(d)a=xb(a);else{b=v(b);a=b}a=c.G(a);a=c.l(a,0);return a}function fd(a){x[r];Rb=r;r=a;tc=x[r]}function zc(){z=0;var b=B.z(),d=ec(b);Tb(d,b);if(sb(b)||b==c.G(b)){if(t&2&&(eb>0&&d==q-1||eb<0&&!d))t=0;fd(d);a.k(j.$EVT_PARK,r,Rb)}}function pc(a,b){if(q&&(!b||!A.$IsPlaying())){A.S();realPosition=qc(a);V.L(realPosition);zc()}}function ub(a){if(q){a=xb(a);a=v(a);fb=k;_IsStandBy=k;y=k;pc(a)}else Tb(0,0)}function Zc(){var b=j.Ke||0,a=mb;j.Ke|=a;return W=a&~b}function Uc(){if(W){j.Ke&=~mb;W=0}}function Dc(c){var a=b.bc();b.rb(a,ab);c&&b.Fb(a,"hidden");return a}function v(b,a){a=a||q||1;return(b%a+a)%a}function fc(c,a,b){t&8&&(t=0);tb(c,Gb,a,b)}function Ub(){b.f(Z,function(a){a.id(a.gd.$ChanceToShow<=U)})}function Mc(c){if(!U&&(b.Fe(c)||!b.Ie(c,u))){U=1;Ub();if(!y){Y&12&&Jc();x[r]&&x[r].Bc()}a.k(j.$EVT_MOUSE_LEAVE)}}function Lc(){if(U){U=0;Ub();y||!(Y&12)||Kc()}a.k(j.$EVT_MOUSE_ENTER)}function Wb(b,a){tb(b,a,d)}function tb(g,h,l,p){if(q&&(!y||m.$NaviQuitDrag)&&!Jb()&&!isNaN(g)){var e=B.z(),a=g;if(l){a=e+g;if(C&2){if(yc(e)&&g<0)a=Q;if(wc(e)&&g>0)a=K}}if(!(C&1))if(p)a=v(a);else a=xb(a,.5);if(l&&!sb(a))a=c.$Round(a);var i=(a-e)%q;a=e+i;if(h==f)h=Gb;var b=c.P(i),j=0;if(b){if(b<1)b=c.B(b,.5);if(b>1){var o=Pc(),n=(S&1?zb:yb)/o;b=c.j(b,n*1.5)}j=h*b}ib=d;A.S();ib=k;A.se(e,a,j)}}function Rc(e,h,n){var l=this,i={$Top:2,$Right:1,$Bottom:2,$Left:1},m={$Top:"top",$Right:"right",$Bottom:"bottom",$Left:"left"},g,a,f,j,k={};l.$Elmt=e;l.$ScaleSize=function(q,p,t){var l,s=q,r=p;if(!f){f=b.Ch(e);g=e.parentNode;j={$Scale:b.q(e,o.qf,1),$AutoCenter:b.q(e,o.yb)};b.f(m,function(c,a){k[a]=b.q(e,"data-scale-"+c,1)});a=e;if(h){a=b.ab(g,d);b.rb(a,{$Top:0,$Left:0});b.O(a,e);b.O(g,a)}}if(n){l=c.l(q,p);if(h)if(t>=0&&t<1){var v=c.j(q,p);l=c.j(l/v,1/(1-t))*v}}else s=r=l=c.B(O<M?p:q,j.$Scale);l*=h&&(l!=1||b.He())?1.001:1;h&&(sc=l);b.we(a,l);b.K(g,f.Eb*s);b.J(g,f.Gb*r);var u=b.ue()&&b.Cd()<9?l:1,w=(s-u)*f.Eb/2,x=(r-u)*f.Gb/2;b.U(a,w);b.V(a,x);b.f(f,function(d,a){if(i[a]&&d){var e=(i[a]&1)*c.B(q,k[a])*d+(i[a]&2)*c.B(p,k[a])*d/2;b.If[a](g,e)}});b.Uc(g,j.$AutoCenter)}}function dd(){var a=this;l.call(a,0,0,{hc:q});b.f(x,function(b){a.zd(b);b.$Shift(F/E)})}function cd(){var a=this,b=Bb.$Elmt;l.call(a,-1,2,{$Easing:g.$Linear,Pc:{Pb:Fc},hc:q,$Reverse:Hb},b,{Pb:1},{Pb:-1});a.Wc=b}function ed(){var b=this;l.call(b,-1e8,2e8);b.zc=function(e,b){if(c.P(b-e)>1e-5){var g=b,f=b;if(c.G(b)!=b&&b>e&&(C&1||b>cb))f++;var h=ec(f);Tb(h,g,d);a.k(j.$EVT_POSITION_CHANGE,v(g),v(e),b,e)}}}function Tc(o,n){var b=this,g,i,f,c,h;l.call(b,-1e8,2e8,{});b.Qc=function(){fb=d;a.k(j.$EVT_SWIPE_START,v(B.z()),V.z())};b.Rc=function(){fb=k;c=k;a.k(j.$EVT_SWIPE_END,v(B.z()),V.z());!y&&zc()};b.zc=function(e,b){var a=b;if(c)a=h;else if(f){var d=b/f;a=m.$SlideEasing(d)*(i-g)+g}a=qc(a);V.L(a)};b.se=function(a,c,h,e){y=k;f=h||1;g=a;i=c;ib=d;V.L(a);ib=k;b.L(0);b.tc(f,e)};b.Ng=function(){c=d;c&&b.$Play(e,e,d)};b.Wg=function(a){h=a};V=new ed;V.M(o);Sb&&V.M(n)}function Qc(){var c=this,a=Dc();b.N(a,0);c.$Elmt=a;c.Ef=function(c){b.O(a,c);b.mb(a)};c.Ob=function(){b.Fc(a);b.Rb(a)}}function bd(w,h){var g=this,hb=b.W(g,p),z,H=0,V,y,u,F,K,o,E=[],U,M,J,i,s,A,S;l.call(g,-N,N+1,{hc:C&1?q:f,$Reverse:Hb});function Q(){z&&z.$Destroy();Xb-=H;H=0;z=new kb.$Class(y,kb,{$Idle:b.q(y,"idle",Kb),cg:!t});z.$On(n.Zb,X)}function X(b,a){H+=a;Xb+=a;if(h==r)!H&&g.Bc()}function P(p,s,n){if(!M){M=d;if(o&&n){var q=b.q(o,"data-expand",0)*2,f=n.width,e=n.height,l=f,i=e;if(f&&e){if(F){if(F&3&&(!(F&4)||f>I||e>G)){var m=k,r=I/G*e/f;if(F&1)m=r>1;else if(F&2)m=r<1;l=m?f*G/e:I;i=m?G:e*I/f}b.K(o,l);b.J(o,i);b.V(o,(G-i)/2);b.U(o,(I-l)/2)}b.we(o,c.l((l+q)/l,(i+q)/i))}b.db(o,"absolute")}a.k(j.$EVT_LOAD_END,h)}s.Qe(k);p&&p(g)}function W(f,b,c,e){if(e==A&&r==h&&t&&Ib()&&!g.Oc()){var a=v(f);D.Cf(a,h,b,g,c,G/I);rb.$Shift(a-rb.yc()-1);rb.L(a);b.Tg();pc(a,d)}}function Z(b){if(b==A&&r==h&&Ib()&&!g.Oc()){if(!i){var a=e;if(D)if(D.Qb==h)a=D.of();else D.Ob();i=new ad(w,h,a,z);i.zg(s)}!i.$IsPlaying()&&i.sd()}}function L(a,d,k){if(a==h){if(a!=d)x[d]&&x[d].Jd();else!k&&i&&i.Ag();s&&s.$Enable();A=b.Tb();g.Vb(b.Z(e,Z,A))}else{var j=c.j(h,a),f=c.l(h,a),n=c.j(f-j,j+q-f),l=N+m.$LazyLoading-1;(!J||n<=l)&&g.Vb()}}function bb(){if(r==h&&i){i.S();s&&s.$Quit();s&&s.$Disable();i.he()}}function fb(){r==h&&i&&i.S()}function Y(b){!db&&a.k(j.$EVT_CLICK,h,b)}g.Qe=function(a){if(S!=a){S=a;a&&b.O(w,K);!a&&b.ib(K)}};g.Vb=function(f,c){c=c||g;if(b.A(E)&&!M){c.Qe(d);if(!U){U=d;a.k(j.$EVT_LOAD_START,h);b.f(E,function(a){var c=b.g(a,"data-load")||"src",d=!b.Qd(c,"data-")?c.substring(5):c;if(!b.g(a,d)){var e=b.hb(a,d)||b.hb(a,"src2");if(e){b.g(a,d,e);b.nb(a,b.g(a,"data-display"))}}})}b.Eh(E,o,b.Z(e,P,f,c))}else P(f,c)};g.Gg=function(){if(Wc())if(q==1){g.Jd();L(h,h)}else{var a;if(D)a=D.Bf(q);if(a){A=b.Tb();var c=h+eb,d=x[v(c)];return d.Vb(b.Z(e,W,c,d,a,A),g)}else(C||!sb(B.z())||!sb(B.z()+eb))&&Wb(eb)}};g.Bc=function(){L(h,h,d)};g.Jd=function(){s&&s.$Quit();s&&s.$Disable();g.Wd();i&&i.Hg();i=e;Q()};g.Tg=function(){b.Fc(w)};g.Wd=function(){b.mb(w)};function T(a,c){if(!c){u=b.$FindChild(a,"bg");y=u&&b.Lb(u)}if(!b.g(a,Ob)&&(c||!u)){var l=b.q(a,"data-arr");if(l!=f){function k(d,c){b.g(d,c,b.g(a,c))}var j=kb&&kb.$Transitions||{};b.Vf(a,b.cb(a),j[l],function(a,c){b.g(a,"data-t",b.A(j));j.push(c);k(a,"data-to");k(a,"data-bf");k(a,"data-c")});b.g(a,"data-arr","")}var g=b.jb(a);if(!u){y=a;u=Dc(d);b.g(u,"data-u","bg");var h="background";b.R(u,h+"Color",b.R(y,h+"Color"));b.R(u,h+"Image",b.R(y,h+"Image"));b.R(y,h,e);b.A(g)?b.pb(u,g[0]):b.O(y,u)}g=g.concat(b.xc(b.Hc(a,"data-tchd")));b.f(g,function(d){if(c<3&&!o)if(b.hb(d,"u")=="image"){o=d;o.border=0;b.rb(o,ab);b.rb(a,ab);b.R(o,"maxWidth","10000px");b.O(u,o)}T(d,c+1)});if(c){b.g(a,"data-events",b.lc(a));b.g(a,"data-display",b.nb(a));!b.Ib(a)&&b.ug(a,b.g(a,"data-to"));b.tg(a,b.g(a,"data-bf"));if(a.tagName=="IMG"){E.push(a);if(!b.g(a,"src")){J=d;b.Fc(a)}}var i=b.g(a,"data-load");i&&E.push(a)&&(J=J||!b.Qd(i,"data-"));var m=i&&b.g(a,i)||b.Jf(a);if(m){var n=new Image;b.g(n,"data-src",m);E.push(n)}c&&b.N(a,(b.N(a)||0)+1)}b.yg(a,b.q(a,"data-p"));b.xg(a,b.hb(a,"po"));b.Jc(a,b.g(a,"data-ts"))}}g.kd=function(c,b){var a=N-b;Fc(V,a)};g.Qb=h;T(w,0);b.rb(w,ab);b.Fb(w,"hidden");b.Jc(w,"flat");F=b.q(y,"data-fillmode",m.$FillMode);var O=b.$FindChild(y,"thumb",d);if(O){g.nh=b.ab(O);b.Fc(O)}b.mb(w);K=b.ab(R);b.N(K,1e3);g.a(w,"click",Y);Q();g.ih=o;g.Re=w;g.Wc=V=w;g.a(a,203,L);g.a(a,28,fb);g.a(a,24,bb);g.$Destroy=function(){b.$Destroy(hb,z,i)}}function ad(F,h,q,s){var c=this,E=b.W(c,p),i=0,u=0,g,m,f,e,o,w,v,z=x[h];l.call(c,0,0);function B(){c.sd()}function C(a){v=a;c.S();c.sd()}function A(){}c.sd=function(){if(!y&&!fb&&!v&&r==h&&!c.Oc()){var k=c.z();if(!k)if(g&&!o){o=d;c.he(d);a.k(j.$EVT_SLIDESHOW_START,h,u,i,u,g,e)}a.k(j.$EVT_STATE_CHANGE,h,k,i,m,f,e);if(!Jb()){var l;if(k==e)t&&b.$Delay(z.Gg,20);else{if(k==f)l=e;else if(!k)l=f;else l=c.Ee();(k!=f||!Ic())&&c.tc(l,B)}}}};c.Ag=function(){f==e&&f==c.z()&&c.L(m)};c.Hg=function(){D&&D.Qb==h&&D.Ob();var b=c.z();b<e&&a.k(j.$EVT_STATE_CHANGE,h,-b-1,i,m,f,e)};c.he=function(a){q&&b.Fb(T,a&&q.ye.$Outside?"":"hidden")};c.kd=function(c,b){if(o&&b>=g){o=k;z.Wd();D.Ob();a.k(j.$EVT_SLIDESHOW_END,h,g,i,u,g,e)}a.k(j.$EVT_PROGRESS_CHANGE,h,b,i,m,f,e)};c.zg=function(a){if(a&&!w){w=a;a.$On($JssorPlayer$.vf,C)}};c.a(s,n.pc,A);q&&c.zd(q);g=c.vb();c.zd(s);m=g+s.qc;e=c.vb();f=t?g+s.fd:e;c.$Destroy=function(){E.$Destroy();c.S()}}function rc(){Nb=fb;hc=A.Ee();bb=B.z();hb=Nc(bb)}function Kc(){rc();if(y||Jb()){A.S();a.k(j.kg)}}function Jc(f){if(Ib()){var b=B.z(),a=hb,e=0;if(f&&c.P(L)>=m.$MinDragOffsetToSlide){a=b;e=Db}a=c.H(a);a=xb(a+e,.5);var d=c.P(a-b);if(d<1&&m.$SlideEasing!=g.$Linear)d=c.B(d,.5);if((!db||!f)&&Nb)A.tc(hc);else if(b==a)tc.Bc();else A.se(b,a,d*Gb)}}function gc(a){!b.kb(b.$EvtSrc(a),f,o.ze)&&b.$CancelEvent(a)}function Ac(b){Fb=k;y=d;Kc();if(!Nb)z=0;a.k(j.$EVT_DRAG_START,v(bb),bb,b)}function Yc(a){Ec(a,1)}function Ec(c,d){L=0;Ab=0;Db=0;kc=sc;if(d){var i=c.touches[0];Eb={x:i.clientX,y:i.clientY}}else Eb=b.Tc(c);var e=b.$EvtSrc(c),g=b.kb(e,"1",ic);if((!g||g===u)&&!W&&(!d||b.A(c.touches)==1)){nb=b.kb(e,f,o.ze)||!mb||!Zc();a.a(h,d?"touchmove":"mousemove",ac);Fb=!nb&&b.kb(e,f,o.Dd);!Fb&&!nb&&Ac(c,d)}}function ac(a){var e,f;a=b.Zf(a);if(a.type!="mousemove")if(b.A(a.touches)==1){f=a.touches[0];e={x:f.clientX,y:f.clientY}}else gb();else e=b.Tc(a);if(e){var i=e.x-Eb.x,j=e.y-Eb.y,g=c.P(i),h=c.P(j);if(z||g>1.5||h>1.5)if(Fb)Ac(a,f);else{if(c.G(hb)!=hb)z=z||S&W;if((i||j)&&!z){if(W==3)if(h>g)z=2;else z=1;else z=W;if(Vb&&z==1&&h>g*2.4)nb=d}var l=i,k=ob;if(z==2){l=j;k=pb}(L-Ab)*qb<-1.5&&(Db=0);(L-Ab)*qb>1.5&&(Db=-1);Ab=L;L=l;mc=hb-L*qb/k/kc*m.$DragRatio;if(L&&z&&!nb){b.$CancelEvent(a);A.Ng(d);A.Wg(mc)}}}}function gb(){Uc();a.T(h,"mousemove",ac);a.T(h,"touchmove",ac);db=L;if(y){db&&t&8&&(t=0);A.S();y=k;var b=B.z();a.k(j.$EVT_DRAG_END,v(b),b,v(bb),bb);Y&12&&rc();Jc(d)}}function Oc(c){var e=b.$EvtSrc(c),a=b.kb(e,"1",Ob);if(u===a)if(db){b.$StopEvent(c);a=b.kb(e,f,"data-jssor-button","A");a&&b.$CancelEvent(c)}else{t&4&&(t=0);a=b.kb(e,f,"data-jssor-click");if(a){b.$CancelEvent(c);hitValues=(b.g(a,"data-jssor-click")||"").split(":");var g=b.Fh(hitValues[1]);hitValues[0]=="to"&&tb(g-1);hitValues[0]=="next"&&tb(g,f,d)}}}a.$SlidesCount=function(){return q};a.$CurrentIndex=function(){return r};a.$CurrentPosition=function(){return B.z()};a.$Idle=function(a){if(a==f)return Kb;Kb=a};a.$AutoPlay=function(a){if(a==f)return t;if(a!=t){t=a;t&&x[r]&&x[r].Bc()}};a.$IsDragging=function(){return y};a.$IsSliding=function(){return fb};a.$IsMouseOver=function(){return!U};a.$LastDragSucceeded=function(){return db};a.$OriginalWidth=function(){return O};a.$OriginalHeight=function(){return M};a.$ScaleHeight=function(b){if(b==f)return Cc||M;a.$ScaleSize(b/M*O,b)};a.$ScaleWidth=function(b){if(b==f)return Zb||O;a.$ScaleSize(b,b/O*M)};a.$ScaleSize=function(c,a,d){b.K(u,c);b.J(u,a);Hc=c/O;Bc=a/M;b.f(nc,function(a){a.$ScaleSize(Hc,Bc,d)});if(!Zb){b.pb(T,w);b.V(T,0);b.U(T,0)}Zb=c;Cc=a};a.lf=yc;a.ef=wc;a.$PlayTo=tb;a.$GoTo=ub;a.$Next=function(){Wb(1)};a.$Prev=function(){Wb(-1)};a.$Pause=function(){t=0};a.$Play=function(){a.$AutoPlay(t||1)};a.$SetSlideshowTransitions=function(a){m.$SlideshowOptions.$Transitions=a};a.Id=function(a){a=v(a);if(C&1){var d=F/E,b=v(B.z()),e=v(a-b+d),f=v(c.P(a-b));if(e>=N){if(f>q/2)if(a>b)a-=q;else a+=q}else if(a>b&&e<d)a-=q;else if(a<b&&e>d)a+=q}return a};function Xc(){cc.re&&b.R(w,cc.re,([e,"pan-y","pan-x","auto"])[mb]||"");a.a(u,"click",Oc,d);a.a(u,"mouseleave",Mc);a.a(u,"mouseenter",Lc);a.a(u,"mousedown",Ec);a.a(u,"touchstart",Yc);a.a(u,"dragstart",gc);a.a(u,"selectstart",gc);a.a(i,"mouseup",gb);a.a(h,"mouseup",gb);a.a(h,"touchend",gb);a.a(h,"touchcancel",gb);a.a(i,"blur",gb);m.$ArrowKeyNavigation&&a.a(h,"keydown",function(c){if(!b.qe(b.$EvtSrc(c))){var a=b.Je(c);if(a==37||a==39){t&8&&(t=0);fc(m.$ArrowKeyNavigation*(a-38)*qb,d)}}})}function uc(d){Gc.Ve();H=[];x=[];var e=b.jb(w),g=b.Fd(["DIV","A","LI"]);b.f(e,function(a){var c=a;if(g[a.tagName.toUpperCase()]&&!b.hb(a,"u")&&b.nb(a)!="none"){b.Jc(a,"flat");b.rb(a,ab);H.push(a)}b.N(c,(b.N(c)||0)+1)});q=b.A(H);if(q){var a=S&1?zb:yb;b.rb(R,ab);F=m.$Align;if(F==f)F=(a-E+P)/2;lb=a/E;N=c.j(q,m.$Cols||q,c.H(lb));C=N<q?m.$Loop:0;if(q*E-P<=a){lb=q-P/E;F=(a-E+P)/2;Lb=(a-E*q+P)/2}if(Cb){Qb=Cb.$Class;Sb=!F&&N==1&&q>1&&Qb&&(!b.ue()||b.Cd()>=9)}if(!(C&1)){cb=F/E;if(cb>q-1){cb=q-1;F=cb*E}K=cb;Q=K+q-lb-P/E}mb=(N>1||F?S:-1)&m.$DragOrientation;if(Sb)D=new Qb(Bb,I,G,Cb,Vb,lc);b.f(H,function(a,b){x.push(new bd(a,b))});rb=new cd;B=new dd;A=new Tc(B,rb);Xc()}b.f(Z,function(a){a.nd(q,x);d&&a.$On(s.uc,fc)})}function Pb(a,d,g){b.Md(a)&&(a=b.je("",a));var c,e;if(q){if(d==f)d=q;e="beforebegin";c=H[d];if(!c){e="afterend";c=H[q-1]}}b.$Destroy(x);a&&b.oh(c||w,e||"afterbegin",a);b.f(g,function(a){b.ib(a)});uc()}a.$AppendSlides=function(e,a){if(a==f)a=r+1;var d=H[r];Pb(e,a);var c=0;b.f(H,function(a,b){a==d&&(c=b)});ub(c)};a.$ReloadSlides=function(a){Pb(a,e,H);ub(0)};a.$RemoveSlides=function(f){var a=r,d=[];b.f(f,function(b){if(b<q&&b>=0){d.push(H[b]);b<r&&a--}});Pb(e,e,d);a=c.j(a,q-1);ub(a)};a.F=function(i,e){a.$Elmt=u=b.$GetElement(i);O=b.K(u);M=b.J(u);m=b.v({$FillMode:0,$LazyLoading:1,$ArrowKeyNavigation:1,$StartIndex:0,$AutoPlay:0,$Loop:1,$HWA:d,$NaviQuitDrag:d,$AutoPlaySteps:1,$Idle:3e3,$PauseOnHover:1,$SlideDuration:500,$SlideEasing:g.$OutQuad,$MinDragOffsetToSlide:20,$DragRatio:1,$SlideSpacing:0,$UISearchMode:1,$PlayOrientation:1,$DragOrientation:1},e);m.$HWA=m.$HWA&&b.gg();if(m.$DisplayPieces!=f)m.$Cols=m.$DisplayPieces;if(m.$ParkingPosition!=f)m.$Align=m.$ParkingPosition;t=m.$AutoPlay&63;!m.$UISearchMode;eb=m.$AutoPlaySteps;Y=m.$PauseOnHover;Y&=Vb?10:5;Kb=m.$Idle;Gb=m.$SlideDuration;S=m.$PlayOrientation&3;vb=b.mg(b.g(u,"dir"))=="rtl";Hb=vb&&(S==1||m.$DragOrientation&1);qb=Hb?-1:1;Cb=m.$SlideshowOptions;kb=b.v({$Class:n},m.$CaptionSliderOptions);jb=m.$BulletNavigatorOptions;X=m.$ArrowNavigatorOptions;J=m.$ThumbnailNavigatorOptions;var c=b.jb(u);b.f(c,function(a,d){var c=b.hb(a,"u");if(c=="loading")R=a;else{if(c=="slides"){w=a;b.R(w,"margin",0);b.R(w,"padding",0);b.Jc(w,"flat")}if(c=="navigator")Mb=a;if(c=="arrowleft")bc=a;if(c=="arrowright")Yb=a;if(c=="thumbnavigator")wb=a;if(a.tagName!="STYLE"&&a.tagName!="SCRIPT")nc[c||d]=new Rc(a,c=="slides",b.Fd(["slides","thumbnavigator"])[c])}});R&&b.ib(R);R=R||b.bc(h);zb=b.K(w);yb=b.J(w);I=m.$SlideWidth||zb;G=m.$SlideHeight||yb;ab={Eb:I,Gb:G,$Top:0,$Left:0,Me:"block",Pb:"absolute"};P=m.$SlideSpacing;ob=I+P;pb=G+P;E=S&1?ob:pb;Bb=new Qc;b.g(u,Ob,"1");b.N(w,b.N(w)||0);b.db(w,"absolute");T=b.ab(w,d);b.R(T,"pointerEvents","none");b.pb(T,w);b.O(T,Bb.$Elmt);b.Fb(w,"hidden");if(Mb&&jb){jb.Yb=vb;vc=new jb.$Class(Mb,jb,O,M);Z.push(vc)}if(X&&bc&&Yb){X.Yb=vb;X.$Loop=m.$Loop;xc=new X.$Class(bc,Yb,X,a);Z.push(xc)}if(wb&&J){J.$StartIndex=m.$StartIndex;J.$ArrowKeyNavigation=J.$ArrowKeyNavigation||0;J.Yb=vb;oc=new J.$Class(wb,J,R);!J.$NoDrag&&b.g(wb,ic,"1");Z.push(oc)}uc(d);a.$ScaleSize(O,M);Ub();ub(m.$StartIndex);b.R(u,"visibility","visible")};a.$Destroy=function(){t=0;b.$Destroy(x,Z,Gc);b.Rb(u)};b.F(a)};j.$EVT_CLICK=21;j.$EVT_DRAG_START=22;j.$EVT_DRAG_END=23;j.$EVT_SWIPE_START=24;j.$EVT_SWIPE_END=25;j.$EVT_LOAD_START=26;j.$EVT_LOAD_END=27;j.kg=28;j.$EVT_MOUSE_ENTER=31;j.$EVT_MOUSE_LEAVE=32;j.$EVT_POSITION_CHANGE=202;j.$EVT_PARK=203;j.$EVT_SLIDESHOW_START=206;j.$EVT_SLIDESHOW_END=207;j.$EVT_PROGRESS_CHANGE=208;j.$EVT_STATE_CHANGE=209}(window,document,Math,null,true,false);
/**
 * @file
 * JavaScript behaviors for the front-end display of slider.
 */

(function ($) {

  jssor_1_slider_init = function () {
    var jssor_1_SlideoTransitions = [
      [{b: 500, d: 1000, x: 0, e: {x: 6}}],
      [{b: -1, d: 1, x: 100, p: {x: {d: 1, dO: 9}}}, {b: 0, d: 2000, x: 0, e: {x: 6}, p: {x: {dl: 0.1}}}],
      [{b: -1, d: 1, x: 200, p: {x: {d: 1, dO: 9}}}, {b: 0, d: 2000, x: 0, e: {x: 6}, p: {x: {dl: 0.1}}}],
      [{b: -1, d: 1, rX: 20, rY: 90}, {b: 0, d: 4000, rX: 0, e: {rX: 1}}],
      [{b: -1, d: 1, rY: -20}, {b: 0, d: 4000, rY: -90, e: {rY: 7}}],
      [{b: -1, d: 1, sX: 2, sY: 2}, {b: 1000, d: 3000, sX: 1, sY: 1, e: {sX: 1, sY: 1}}],
      [{b: -1, d: 1, sX: 2, sY: 2}, {b: 1000, d: 5000, sX: 1, sY: 1, e: {sX: 3, sY: 3}}],
      [{b: -1, d: 1, tZ: 300}, {b: 0, d: 2000, o: 1}, {b: 3500, d: 3500, tZ: 0, e: {tZ: 1}}],
      [{b: -1, d: 1, x: 20, p: {x: {o: 33, r: 0.5}}}, {b: 0, d: 1000, x: 0, o: 0.5, e: {x: 3, o: 1}, p: {x: {dl: 0.05, o: 33}, o: {dl: 0.02, o: 68, rd: 2}}}, {b: 1000, d: 1000, o: 1, e: {o: 1}, p: {o: {dl: 0.05, o: 68, rd: 2}}}],
      [{b: -1, d: 1, da: [0, 700]}, {b: 0, d: 600, da: [700, 700], e: {da: 1}}],
      [{b: 600, d: 1000, o: 0.4}],
      [{b: -1, d: 1, da: [0, 400]}, {b: 200, d: 600, da: [400, 400], e: {da: 1}}],
      [{b: 800, d: 1000, o: 0.4}],
      [{b: -1, d: 1, sX: 1.1, sY: 1.1}, {b: 0, d: 1600, o: 1}, {b: 1600, d: 5000, sX: 0.9, sY: 0.9, e: {sX: 1, sY: 1}}],
      [{b: 0, d: 1000, o: 1, p: {o: {o: 4}}}],
      [{b: 1000, d: 1000, o: 1, p: {o: {o: 4}}}]
    ];

    var jssor_1_options = {
      $AutoPlay: 1,
      $CaptionSliderOptions: {
        $Class: $JssorCaptionSlideo$,
        $Transitions: jssor_1_SlideoTransitions
      },
      $ArrowNavigatorOptions: {
        $Class: $JssorArrowNavigator$
      },
      $BulletNavigatorOptions: {
        $Class: $JssorBulletNavigator$,
        $SpacingX: 16,
        $SpacingY: 16
      }
    };

    var jssor_1_slider = new $JssorSlider$('jssor_1', jssor_1_options);
    var MAX_WIDTH = 980;

    function ScaleSlider() {
      var containerElement = jssor_1_slider.$Elmt.parentNode;
      var containerWidth = containerElement.clientWidth;

      if (containerWidth) {

        var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

        jssor_1_slider.$ScaleWidth(expectedWidth);
      } else {
        window.setTimeout(ScaleSlider, 30);
      }
    }

    ScaleSlider();

    $Jssor$.$AddEvent(window, 'load', ScaleSlider);
    $Jssor$.$AddEvent(window, 'resize', ScaleSlider);
    $Jssor$.$AddEvent(window, 'orientationchange', ScaleSlider);

  };

  // Image slider.
  jssor_2_slider_init = function () {

    var jssor_2_SlideshowTransitions = [
      {$Duration: 800, x: 0.3, $During: {$Left: [0.3, 0.7]}, $Easing: {$Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear}, $Opacity: 2},
      {$Duration: 800, x: -0.3, $SlideOut: true, $Easing: {$Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear}, $Opacity: 2},
      {$Duration: 800, x: -0.3, $During: {$Left: [0.3, 0.7]}, $Easing: {$Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear}, $Opacity: 2},
      {$Duration: 800, x: 0.3, $SlideOut: true, $Easing: {$Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear}, $Opacity: 2},
      {$Duration: 800, y: 0.3, $During: {$Top: [0.3, 0.7]}, $Easing: {$Top: $Jease$.$InCubic, $Opacity: $Jease$.$Linear}, $Opacity: 2},
      {$Duration: 800, y: -0.3, $SlideOut: true, $Easing: {$Top: $Jease$.$InCubic, $Opacity: $Jease$.$Linear}, $Opacity: 2},
      {$Duration: 800, y: -0.3, $During: {$Top: [0.3, 0.7]}, $Easing: {$Top: $Jease$.$InCubic, $Opacity: $Jease$.$Linear}, $Opacity: 2},
      {$Duration: 800, y: 0.3, $SlideOut: true, $Easing: {$Top: $Jease$.$InCubic, $Opacity: $Jease$.$Linear}, $Opacity: 2},
      {$Duration: 800, x: 0.3, $Cols: 2, $During: {$Left: [0.3, 0.7]}, $ChessMode: {$Column: 3}, $Easing: {$Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear}, $Opacity: 2},
      {$Duration: 800, x: 0.3, $Cols: 2, $SlideOut: true, $ChessMode: {$Column: 3}, $Easing: {$Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear}, $Opacity: 2},
      {$Duration: 800, y: 0.3, $Rows: 2, $During: {$Top: [0.3, 0.7]}, $ChessMode: {$Row: 12}, $Easing: {$Top: $Jease$.$InCubic, $Opacity: $Jease$.$Linear}, $Opacity: 2},
      {$Duration: 800, y: 0.3, $Rows: 2, $SlideOut: true, $ChessMode: {$Row: 12}, $Easing: {$Top: $Jease$.$InCubic, $Opacity: $Jease$.$Linear}, $Opacity: 2},
      {$Duration: 800, y: 0.3, $Cols: 2, $During: {$Top: [0.3, 0.7]}, $ChessMode: {$Column: 12}, $Easing: {$Top: $Jease$.$InCubic, $Opacity: $Jease$.$Linear}, $Opacity: 2},
      {$Duration: 800, y: -0.3, $Cols: 2, $SlideOut: true, $ChessMode: {$Column: 12}, $Easing: {$Top: $Jease$.$InCubic, $Opacity: $Jease$.$Linear}, $Opacity: 2},
      {$Duration: 800, x: 0.3, $Rows: 2, $During: {$Left: [0.3, 0.7]}, $ChessMode: {$Row: 3}, $Easing: {$Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear}, $Opacity: 2},
      {$Duration: 800, x: -0.3, $Rows: 2, $SlideOut: true, $ChessMode: {$Row: 3}, $Easing: {$Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear}, $Opacity: 2},
      {$Duration: 800, x: 0.3, y: 0.3, $Cols: 2, $Rows: 2, $During: {$Left: [0.3, 0.7], $Top: [0.3, 0.7]}, $ChessMode: {$Column: 3, $Row: 12}, $Easing: {$Left: $Jease$.$InCubic, $Top: $Jease$.$InCubic, $Opacity: $Jease$.$Linear}, $Opacity: 2},
      {$Duration: 800, x: 0.3, y: 0.3, $Cols: 2, $Rows: 2, $During: {$Left: [0.3, 0.7], $Top: [0.3, 0.7]}, $SlideOut: true, $ChessMode: {$Column: 3, $Row: 12}, $Easing: {$Left: $Jease$.$InCubic, $Top: $Jease$.$InCubic, $Opacity: $Jease$.$Linear}, $Opacity: 2},
      {$Duration: 800, $Delay: 20, $Clip: 3, $Assembly: 260, $Easing: {$Clip: $Jease$.$InCubic, $Opacity: $Jease$.$Linear}, $Opacity: 2},
      {$Duration: 800, $Delay: 20, $Clip: 3, $SlideOut: true, $Assembly: 260, $Easing: {$Clip: $Jease$.$OutCubic, $Opacity: $Jease$.$Linear}, $Opacity: 2},
      {$Duration: 800, $Delay: 20, $Clip: 12, $Assembly: 260, $Easing: {$Clip: $Jease$.$InCubic, $Opacity: $Jease$.$Linear}, $Opacity: 2},
      {$Duration: 800, $Delay: 20, $Clip: 12, $SlideOut: true, $Assembly: 260, $Easing: {$Clip: $Jease$.$OutCubic, $Opacity: $Jease$.$Linear}, $Opacity: 2}
    ];

    var jssor_2_options = {
      $AutoPlay: 1,
      $SlideshowOptions: {
        $Class: $JssorSlideshowRunner$,
        $Transitions: jssor_2_SlideshowTransitions,
        $TransitionsOrder: 1
      },
      $ArrowNavigatorOptions: {
        $Class: $JssorArrowNavigator$
      },
      $ThumbnailNavigatorOptions: {
        $Class: $JssorThumbnailNavigator$,
        $SpacingX: 5,
        $SpacingY: 5
      }
    };

    var jssor_2_slider = new $JssorSlider$('jssor_2', jssor_2_options);
    var MAX_WIDTH = 980;

    function ScaleSlider() {
      var containerElement = jssor_2_slider.$Elmt.parentNode;
      var containerWidth = containerElement.clientWidth;

      if (containerWidth) {

        var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

        jssor_2_slider.$ScaleWidth(expectedWidth);
      } else {
        window.setTimeout(ScaleSlider, 30);
      }
    }

    ScaleSlider();

    $Jssor$.$AddEvent(window, 'load', ScaleSlider);
    $Jssor$.$AddEvent(window, 'resize', ScaleSlider);
    $Jssor$.$AddEvent(window, 'orientationchange', ScaleSlider);

  };

  jssor_3_slider_init = function () {

    var jssor_3_SlideshowTransitions = [
      {$Duration: 500, $Delay: 12, $Cols: 10, $Rows: 5, $Opacity: 2, $Clip: 15, $SlideOut: true, $Formation: $JssorSlideshowFormations$.$FormationStraightStairs, $Assembly: 2049, $Easing: $Jease$.$OutQuad},
      {$Duration: 500, $Delay: 40, $Cols: 10, $Rows: 5, $Opacity: 2, $Clip: 15, $SlideOut: true, $Easing: $Jease$.$OutQuad},
      {$Duration: 1000, x: -0.2, $Delay: 20, $Cols: 16, $SlideOut: true, $Formation: $JssorSlideshowFormations$.$FormationStraight, $Assembly: 260, $Easing: {$Left: $Jease$.$InOutExpo, $Opacity: $Jease$.$InOutQuad}, $Opacity: 2, $Outside: true, $Round: {$Top: 0.5}},
      {$Duration: 1600, y: -1, $Delay: 40, $Cols: 24, $SlideOut: true, $Formation: $JssorSlideshowFormations$.$FormationStraight, $Easing: $Jease$.$OutJump, $Round: {$Top: 1.5}},
      {$Duration: 1200, x: 0.2, y: -0.1, $Delay: 16, $Cols: 10, $Rows: 5, $Opacity: 2, $Clip: 15, $During: {$Left: [0.3, 0.7], $Top: [0.3, 0.7]}, $Formation: $JssorSlideshowFormations$.$FormationStraightStairs, $Assembly: 260, $Easing: {$Left: $Jease$.$InWave, $Top: $Jease$.$InWave, $Clip: $Jease$.$OutQuad}, $Round: {$Left: 1.3, $Top: 2.5}},
      {$Duration: 1500, x: 0.3, y: -0.3, $Delay: 20, $Cols: 10, $Rows: 5, $Opacity: 2, $Clip: 15, $During: {$Left: [0.2, 0.8], $Top: [0.2, 0.8]}, $Formation: $JssorSlideshowFormations$.$FormationStraightStairs, $Assembly: 260, $Easing: {$Left: $Jease$.$InJump, $Top: $Jease$.$InJump, $Clip: $Jease$.$OutQuad}, $Round: {$Left: 0.8, $Top: 2.5}},
      {$Duration: 1500, x: 0.3, y: -0.3, $Delay: 20, $Cols: 10, $Rows: 5, $Opacity: 2, $Clip: 15, $During: {$Left: [0.1, 0.9], $Top: [0.1, 0.9]}, $SlideOut: true, $Formation: $JssorSlideshowFormations$.$FormationStraightStairs, $Assembly: 260, $Easing: {$Left: $Jease$.$InJump, $Top: $Jease$.$InJump, $Clip: $Jease$.$OutQuad}, $Round: {$Left: 0.8, $Top: 2.5}}
    ];

    var jssor_3_options = {
      $AutoPlay: 1,
      $SlideshowOptions: {
        $Class: $JssorSlideshowRunner$,
        $Transitions: jssor_3_SlideshowTransitions,
        $TransitionsOrder: 1
      },
      $ArrowNavigatorOptions: {
        $Class: $JssorArrowNavigator$
      },
      $BulletNavigatorOptions: {
        $Class: $JssorBulletNavigator$,
        $SpacingX: 16,
        $SpacingY: 16
      }
    };

    var jssor_3_slider = new $JssorSlider$('jssor_3', jssor_3_options);
    var MAX_WIDTH = 980;

    function ScaleSlider() {
      var containerElement = jssor_3_slider.$Elmt.parentNode;
      var containerWidth = containerElement.clientWidth;

      if (containerWidth) {

        var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

        jssor_3_slider.$ScaleWidth(expectedWidth);
      } else {
        window.setTimeout(ScaleSlider, 30);
      }
    }

    ScaleSlider();

    $Jssor$.$AddEvent(window, 'load', ScaleSlider);
    $Jssor$.$AddEvent(window, 'resize', ScaleSlider);
    $Jssor$.$AddEvent(window, 'orientationchange', ScaleSlider);

  };

  // Banner slider.
  jssor_4_slider_init = function () {

    var jssor_4_SlideshowTransitions = [
      {$Duration: 800, x: -0.3, $During: {$Left: [0.3, 0.7]}, $Easing: {$Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear}, $Opacity: 2},
      {$Duration: 800, x: 0.3, $SlideOut: true, $Easing: {$Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear}, $Opacity: 2}
    ];

    var jssor_4_options = {
      $AutoPlay: 1,
      $SlideshowOptions: {
        $Class: $JssorSlideshowRunner$,
        $Transitions: jssor_4_SlideshowTransitions,
        $TransitionsOrder: 1
      },
      $ArrowNavigatorOptions: {
        $Class: $JssorArrowNavigator$
      },
      $ThumbnailNavigatorOptions: {
        $Class: $JssorThumbnailNavigator$,
        $Orientation: 2,
        $NoDrag: true
      }
    };

    var jssor_4_slider = new $JssorSlider$('jssor_4', jssor_4_options);
    var MAX_WIDTH = 980;

    function ScaleSlider() {
      var containerElement = jssor_4_slider.$Elmt.parentNode;
      var containerWidth = containerElement.clientWidth;

      if (containerWidth) {

        var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

        jssor_4_slider.$ScaleWidth(expectedWidth);
      } else {
        window.setTimeout(ScaleSlider, 30);
      }
    }

    ScaleSlider();

    $Jssor$.$AddEvent(window, 'load', ScaleSlider);
    $Jssor$.$AddEvent(window, 'resize', ScaleSlider);
    $Jssor$.$AddEvent(window, 'orientationchange', ScaleSlider);

  };

  // Carousel.
  jssor_5_slider_init = function () {

    var jssor_5_options = {
      $AutoPlay: 1,
      $AutoPlaySteps: 5,
      $SlideDuration: 160,
      $SlideWidth: 200,
      $SlideSpacing: 3,
      $ArrowNavigatorOptions: {
        $Class: $JssorArrowNavigator$,
        $Steps: 5
      },
      $BulletNavigatorOptions: {
        $Class: $JssorBulletNavigator$,
        $SpacingX: 16,
        $SpacingY: 16
      }
    };

    var jssor_5_slider = new $JssorSlider$('jssor_5', jssor_5_options);
    var MAX_WIDTH = 980;

    function ScaleSlider() {
      var containerElement = jssor_5_slider.$Elmt.parentNode;
      var containerWidth = containerElement.clientWidth;

      if (containerWidth) {

        var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

        jssor_5_slider.$ScaleWidth(expectedWidth);
      } else {
        window.setTimeout(ScaleSlider, 30);
      }
    }

    ScaleSlider();

    $Jssor$.$AddEvent(window, 'load', ScaleSlider);
    $Jssor$.$AddEvent(window, 'resize', ScaleSlider);
    $Jssor$.$AddEvent(window, 'orientationchange', ScaleSlider);

  };

  // Partial slider.
  jssor_6_slider_init = function () {

    var jssor_6_options = {
      $AutoPlay: 1,
      $SlideWidth: 720,
      $ArrowNavigatorOptions: {
        $Class: $JssorArrowNavigator$
      },
      $BulletNavigatorOptions: {
        $Class: $JssorBulletNavigator$,
        $SpacingX: 16,
        $SpacingY: 16
      }
    };

    var jssor_6_slider = new $JssorSlider$('jssor_6', jssor_6_options);
    var MAX_WIDTH = 980;

    function ScaleSlider() {
      var containerElement = jssor_6_slider.$Elmt.parentNode;
      var containerWidth = containerElement.clientWidth;

      if (containerWidth) {

        var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

        jssor_6_slider.$ScaleWidth(expectedWidth);
      } else {
        window.setTimeout(ScaleSlider, 30);
      }
    }

    ScaleSlider();

    $Jssor$.$AddEvent(window, 'load', ScaleSlider);
    $Jssor$.$AddEvent(window, 'resize', ScaleSlider);
    $Jssor$.$AddEvent(window, 'orientationchange', ScaleSlider);

  };

  // Verical slider with thumb.
  jssor_7_slider_init = function () {

    var jssor_7_SlideshowTransitions = [
      {$Duration: 1200, $Zoom: 1, $Easing: {$Zoom: $Jease$.$InCubic, $Opacity: $Jease$.$OutQuad}, $Opacity: 2},
      {$Duration: 1000, $Zoom: 11, $SlideOut: true, $Easing: {$Zoom: $Jease$.$InExpo, $Opacity: $Jease$.$Linear}, $Opacity: 2},
      {$Duration: 1200, $Zoom: 1, $Rotate: 1, $During: {$Zoom: [0.2, 0.8], $Rotate: [0.2, 0.8]}, $Easing: {$Zoom: $Jease$.$Swing, $Opacity: $Jease$.$Linear, $Rotate: $Jease$.$Swing}, $Opacity: 2, $Round: {$Rotate: 0.5}},
      {$Duration: 1000, $Zoom: 11, $Rotate: 1, $SlideOut: true, $Easing: {$Zoom: $Jease$.$InQuint, $Opacity: $Jease$.$Linear, $Rotate: $Jease$.$InQuint}, $Opacity: 2, $Round: {$Rotate: 0.8}},
      {$Duration: 1200, x: 0.5, $Cols: 2, $Zoom: 1, $Assembly: 2049, $ChessMode: {$Column: 15}, $Easing: {$Left: $Jease$.$InCubic, $Zoom: $Jease$.$InCubic, $Opacity: $Jease$.$Linear}, $Opacity: 2},
      {$Duration: 1200, x: 4, $Cols: 2, $Zoom: 11, $SlideOut: true, $Assembly: 2049, $ChessMode: {$Column: 15}, $Easing: {$Left: $Jease$.$InExpo, $Zoom: $Jease$.$InExpo, $Opacity: $Jease$.$Linear}, $Opacity: 2},
      {$Duration: 1200, x: 0.6, $Zoom: 1, $Rotate: 1, $During: {$Left: [0.2, 0.8], $Zoom: [0.2, 0.8], $Rotate: [0.2, 0.8]}, $Opacity: 2, $Round: {$Rotate: 0.5}},
      {$Duration: 1000, x: -4, $Zoom: 11, $Rotate: 1, $SlideOut: true, $Easing: {$Left: $Jease$.$InQuint, $Zoom: $Jease$.$InQuart, $Opacity: $Jease$.$Linear, $Rotate: $Jease$.$InQuint}, $Opacity: 2, $Round: {$Rotate: 0.8}},
      {$Duration: 1200, x: -0.6, $Zoom: 1, $Rotate: 1, $During: {$Left: [0.2, 0.8], $Zoom: [0.2, 0.8], $Rotate: [0.2, 0.8]}, $Opacity: 2, $Round: {$Rotate: 0.5}},
      {$Duration: 1000, x: 4, $Zoom: 11, $Rotate: 1, $SlideOut: true, $Easing: {$Left: $Jease$.$InQuint, $Zoom: $Jease$.$InQuart, $Opacity: $Jease$.$Linear, $Rotate: $Jease$.$InQuint}, $Opacity: 2, $Round: {$Rotate: 0.8}},
      {$Duration: 1200, x: 0.5, y: 0.3, $Cols: 2, $Zoom: 1, $Rotate: 1, $Assembly: 2049, $ChessMode: {$Column: 15}, $Easing: {$Left: $Jease$.$InCubic, $Top: $Jease$.$InCubic, $Zoom: $Jease$.$InCubic, $Opacity: $Jease$.$OutQuad, $Rotate: $Jease$.$InCubic}, $Opacity: 2, $Round: {$Rotate: 0.7}},
      {$Duration: 1000, x: 0.5, y: 0.3, $Cols: 2, $Zoom: 1, $Rotate: 1, $SlideOut: true, $Assembly: 2049, $ChessMode: {$Column: 15}, $Easing: {$Left: $Jease$.$InExpo, $Top: $Jease$.$InExpo, $Zoom: $Jease$.$InExpo, $Opacity: $Jease$.$Linear, $Rotate: $Jease$.$InExpo}, $Opacity: 2, $Round: {$Rotate: 0.7}},
      {$Duration: 1200, x: -4, y: 2, $Rows: 2, $Zoom: 11, $Rotate: 1, $Assembly: 2049, $ChessMode: {$Row: 28}, $Easing: {$Left: $Jease$.$InCubic, $Top: $Jease$.$InCubic, $Zoom: $Jease$.$InCubic, $Opacity: $Jease$.$OutQuad, $Rotate: $Jease$.$InCubic}, $Opacity: 2, $Round: {$Rotate: 0.7}},
      {$Duration: 1200, x: 1, y: 2, $Cols: 2, $Zoom: 11, $Rotate: 1, $Assembly: 2049, $ChessMode: {$Column: 19}, $Easing: {$Left: $Jease$.$InCubic, $Top: $Jease$.$InCubic, $Zoom: $Jease$.$InCubic, $Opacity: $Jease$.$OutQuad, $Rotate: $Jease$.$InCubic}, $Opacity: 2, $Round: {$Rotate: 0.8}}
    ];

    var jssor_7_options = {
      $AutoPlay: 1,
      $SlideshowOptions: {
        $Class: $JssorSlideshowRunner$,
        $Transitions: jssor_7_SlideshowTransitions,
        $TransitionsOrder: 1
      },
      $ArrowNavigatorOptions: {
        $Class: $JssorArrowNavigator$
      },
      $ThumbnailNavigatorOptions: {
        $Class: $JssorThumbnailNavigator$,
        $Rows: 2,
        $SpacingX: 14,
        $SpacingY: 12,
        $Orientation: 2,
        $Align: 156
      }
    };

    var jssor_7_slider = new $JssorSlider$('jssor_7', jssor_7_options);
    var MAX_WIDTH = 960;

    function ScaleSlider() {
      var containerElement = jssor_7_slider.$Elmt.parentNode;
      var containerWidth = containerElement.clientWidth;

      if (containerWidth) {

        var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

        jssor_7_slider.$ScaleWidth(expectedWidth);
      } else {
        window.setTimeout(ScaleSlider, 30);
      }
    }

    ScaleSlider();

    $Jssor$.$AddEvent(window, 'load', ScaleSlider);
    $Jssor$.$AddEvent(window, 'resize', ScaleSlider);
    $Jssor$.$AddEvent(window, 'orientationchange', ScaleSlider);

  };

  // Scrolling logo thumbnail slider.
  jssor_8_slider_init = function () {

    var jssor_8_options = {
      $AutoPlay: 1,
      $Idle: 0,
      $SlideDuration: 5000,
      $SlideEasing: $Jease$.$Linear,
      $PauseOnHover: 4,
      $SlideWidth: 140,
      $Align: 0
    };

    var jssor_8_slider = new $JssorSlider$('jssor_8', jssor_8_options);
    var MAX_WIDTH = 980;

    function ScaleSlider() {
      var containerElement = jssor_8_slider.$Elmt.parentNode;
      var containerWidth = containerElement.clientWidth;

      if (containerWidth) {

        var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

        jssor_8_slider.$ScaleWidth(expectedWidth);
      } else {
        window.setTimeout(ScaleSlider, 30);
      }
    }

    ScaleSlider();

    $Jssor$.$AddEvent(window, 'load', ScaleSlider);
    $Jssor$.$AddEvent(window, 'resize', ScaleSlider);
    $Jssor$.$AddEvent(window, 'orientationchange', ScaleSlider);

  };

  // Full width slider.
  jssor_9_slider_init = function () {

    var jssor_9_SlideoTransitions = [
      [{b: -1, d: 1, ls: 0.5}, {b: 0, d: 1000, y: 5, e: {y: 6}}],
      [{b: -1, d: 1, ls: 0.5}, {b: 200, d: 1000, y: 25, e: {y: 6}}],
      [{b: -1, d: 1, ls: 0.5}, {b: 400, d: 1000, y: 45, e: {y: 6}}],
      [{b: -1, d: 1, ls: 0.5}, {b: 600, d: 1000, y: 65, e: {y: 6}}],
      [{b: -1, d: 1, ls: 0.5}, {b: 800, d: 1000, y: 85, e: {y: 6}}],
      [{b: -1, d: 1, ls: 0.5}, {b: 500, d: 1000, y: 195, e: {y: 6}}],
      [{b: 0, d: 2000, y: 30, e: {y: 3}}],
      [{b: -1, d: 1, rY: -15, tZ: 100}, {b: 0, d: 1500, y: 30, o: 1, e: {y: 3}}],
      [{b: -1, d: 1, rY: -15, tZ: -100}, {b: 0, d: 1500, y: 100, o: 0.8, e: {y: 3}}],
      [{b: 500, d: 1500, o: 1}],
      [{b: 0, d: 1000, y: 380, e: {y: 6}}],
      [{b: 300, d: 1000, x: 80, e: {x: 6}}],
      [{b: 300, d: 1000, x: 330, e: {x: 6}}],
      [{b: -1, d: 1, r: -110, sX: 5, sY: 5}, {b: 0, d: 2000, o: 1, r: -20, sX: 1, sY: 1, e: {o: 6, r: 6, sX: 6, sY: 6}}],
      [{b: 0, d: 600, x: 150, o: 0.5, e: {x: 6}}],
      [{b: 0, d: 600, x: 1140, o: 0.6, e: {x: 6}}],
      [{b: -1, d: 1, sX: 5, sY: 5}, {b: 600, d: 600, o: 1, sX: 1, sY: 1, e: {sX: 3, sY: 3}}]
    ];

    var jssor_9_options = {
      $AutoPlay: 1,
      $LazyLoading: 1,
      $CaptionSliderOptions: {
        $Class: $JssorCaptionSlideo$,
        $Transitions: jssor_9_SlideoTransitions
      },
      $ArrowNavigatorOptions: {
        $Class: $JssorArrowNavigator$
      },
      $BulletNavigatorOptions: {
        $Class: $JssorBulletNavigator$,
        $SpacingX: 20,
        $SpacingY: 20
      }
    };

    var jssor_9_slider = new $JssorSlider$('jssor_9', jssor_9_options);
    var MAX_WIDTH = 1600;

    function ScaleSlider() {
      var containerElement = jssor_9_slider.$Elmt.parentNode;
      var containerWidth = containerElement.clientWidth;

      if (containerWidth) {

        var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

        jssor_9_slider.$ScaleWidth(expectedWidth);
      } else {
        window.setTimeout(ScaleSlider, 30);
      }
    }

    ScaleSlider();

    $Jssor$.$AddEvent(window, 'load', ScaleSlider);
    $Jssor$.$AddEvent(window, 'resize', ScaleSlider);
    $Jssor$.$AddEvent(window, 'orientationchange', ScaleSlider);


  };

  jssor_10_slider_init = function () {

    var jssor_10_SlideshowTransitions = [
      {$Duration: 800, x: 0.25, $Zoom: 1.5, $Easing: {$Left: $Jease$.$InWave, $Zoom: $Jease$.$InCubic}, $Opacity: 2, $ZIndex: -10, $Brother: {$Duration: 800, x: -0.25, $Zoom: 1.5, $Easing: {$Left: $Jease$.$InWave, $Zoom: $Jease$.$InCubic}, $Opacity: 2, $ZIndex: -10}},
      {$Duration: 1200, x: 0.5, $Cols: 2, $ChessMode: {$Column: 3}, $Easing: {$Left: $Jease$.$InOutCubic}, $Opacity: 2, $Brother: {$Duration: 1200, $Opacity: 2}},
      {$Duration: 600, x: 0.3, $During: {$Left: [0.6, 0.4]}, $Easing: {$Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear}, $Opacity: 2, $Brother: {$Duration: 600, x: -0.3, $Easing: {$Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear}, $Opacity: 2}},
      {$Duration: 800, x: 0.25, y: 0.5, $Rotate: -0.1, $Easing: {$Left: $Jease$.$InQuad, $Top: $Jease$.$InQuad, $Opacity: $Jease$.$Linear, $Rotate: $Jease$.$InQuad}, $Opacity: 2, $Brother: {$Duration: 800, x: -0.1, y: -0.7, $Rotate: 0.1, $Easing: {$Left: $Jease$.$InQuad, $Top: $Jease$.$InQuad, $Opacity: $Jease$.$Linear, $Rotate: $Jease$.$InQuad}, $Opacity: 2}},
      {$Duration: 1000, x: 1, $Rows: 2, $ChessMode: {$Row: 3}, $Easing: {$Left: $Jease$.$InOutQuart, $Opacity: $Jease$.$Linear}, $Opacity: 2, $Brother: {$Duration: 1000, x: -1, $Rows: 2, $ChessMode: {$Row: 3}, $Easing: {$Left: $Jease$.$InOutQuart, $Opacity: $Jease$.$Linear}, $Opacity: 2}},
      {$Duration: 1000, y: -1, $Cols: 2, $ChessMode: {$Column: 12}, $Easing: {$Top: $Jease$.$InOutQuart, $Opacity: $Jease$.$Linear}, $Opacity: 2, $Brother: {$Duration: 1000, y: 1, $Cols: 2, $ChessMode: {$Column: 12}, $Easing: {$Top: $Jease$.$InOutQuart, $Opacity: $Jease$.$Linear}, $Opacity: 2}},
      {$Duration: 800, y: 1, $Easing: {$Top: $Jease$.$InOutQuart, $Opacity: $Jease$.$Linear}, $Opacity: 2, $Brother: {$Duration: 800, y: -1, $Easing: {$Top: $Jease$.$InOutQuart, $Opacity: $Jease$.$Linear}, $Opacity: 2}},
      {$Duration: 1000, x: -0.1, y: -0.7, $Rotate: 0.1, $During: {$Left: [0.6, 0.4], $Top: [0.6, 0.4], $Rotate: [0.6, 0.4]}, $Easing: {$Left: $Jease$.$InQuad, $Top: $Jease$.$InQuad, $Opacity: $Jease$.$Linear, $Rotate: $Jease$.$InQuad}, $Opacity: 2, $Brother: {$Duration: 1000, x: 0.2, y: 0.5, $Rotate: -0.1, $Easing: {$Left: $Jease$.$InQuad, $Top: $Jease$.$InQuad, $Opacity: $Jease$.$Linear, $Rotate: $Jease$.$InQuad}, $Opacity: 2}},
      {$Duration: 800, x: -0.2, $Delay: 40, $Cols: 12, $During: {$Left: [0.4, 0.6]}, $SlideOut: true, $Formation: $JssorSlideshowFormations$.$FormationStraight, $Assembly: 260, $Easing: {$Left: $Jease$.$InOutExpo, $Opacity: $Jease$.$InOutQuad}, $Opacity: 2, $Outside: true, $Round: {$Top: 0.5}, $Brother: {$Duration: 800, x: 0.2, $Delay: 40, $Cols: 12, $Formation: $JssorSlideshowFormations$.$FormationStraight, $Assembly: 1028, $Easing: {$Left: $Jease$.$InOutExpo, $Opacity: $Jease$.$InOutQuad}, $Opacity: 2, $Round: {$Top: 0.5}, $Shift: -200}},
      {$Duration: 700, $Opacity: 2, $Brother: {$Duration: 700, $Opacity: 2}},
      {$Duration: 800, x: 1, $Easing: {$Left: $Jease$.$InOutQuart, $Opacity: $Jease$.$Linear}, $Opacity: 2, $Brother: {$Duration: 800, x: -1, $Easing: {$Left: $Jease$.$InOutQuart, $Opacity: $Jease$.$Linear}, $Opacity: 2}}
    ];

    var jssor_10_options = {
      $AutoPlay: 1,
      $FillMode: 5,
      $SlideshowOptions: {
        $Class: $JssorSlideshowRunner$,
        $Transitions: jssor_10_SlideshowTransitions,
        $TransitionsOrder: 1
      },
      $ArrowNavigatorOptions: {
        $Class: $JssorArrowNavigator$
      },
      $BulletNavigatorOptions: {
        $Class: $JssorBulletNavigator$,
        $SpacingX: 16,
        $SpacingY: 16
      }
    };

    var jssor_10_slider = new $JssorSlider$('jssor_10', jssor_10_options);
    var MAX_WIDTH = 600;

    function ScaleSlider() {
      var containerElement = jssor_10_slider.$Elmt.parentNode;
      var containerWidth = containerElement.clientWidth;

      if (containerWidth) {

        var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

        jssor_10_slider.$ScaleWidth(expectedWidth);
      } else {
        window.setTimeout(ScaleSlider, 30);
      }
    }

    ScaleSlider();

    $Jssor$.$AddEvent(window, 'load', ScaleSlider);
    $Jssor$.$AddEvent(window, 'resize', ScaleSlider);
    $Jssor$.$AddEvent(window, 'orientationchange', ScaleSlider);

  };

  jssor_11_slider_init = function () {

    var jssor_11_options = {
      $Idle: 2000,
      $SlideEasing: $Jease$.$InOutSine,
      $DragOrientation: 3,
      $ArrowNavigatorOptions: {
        $Class: $JssorArrowNavigator$
      },
      $BulletNavigatorOptions: {
        $Class: $JssorBulletNavigator$,
        $SpacingX: 16,
        $SpacingY: 16
      }
    };

    var jssor_11_slider = new $JssorSlider$('jssor_11', jssor_11_options);

    // make sure to clear margin of the slider container element.
    jssor_11_slider.$Elmt.style.margin = '';


    var MAX_WIDTH = 3000;
    var MAX_HEIGHT = 3000;
    var MAX_BLEEDING = 1;

    function ScaleSlider() {
      var containerElement = jssor_11_slider.$Elmt.parentNode;
      var containerWidth = containerElement.clientWidth;

      if (containerWidth) {
        var originalWidth = jssor_11_slider.$OriginalWidth();
        var originalHeight = jssor_11_slider.$OriginalHeight();

        var containerHeight = containerElement.clientHeight || originalHeight;

        var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);
        var expectedHeight = Math.min(MAX_HEIGHT || containerHeight, containerHeight);

        // scale the slider to expected size.
        jssor_11_slider.$ScaleSize(expectedWidth, expectedHeight, MAX_BLEEDING);

        // position slider at center in vertical orientation.
        jssor_11_slider.$Elmt.style.top = ((containerHeight - expectedHeight) / 2) + "px";

        // position slider at center in horizontal orientation.
        jssor_11_slider.$Elmt.style.left = ((containerWidth - expectedWidth) / 2) + "px";
      } else {
        window.setTimeout(ScaleSlider, 30);
      }
    }

    function OnOrientationChange() {
      ScaleSlider();
      window.setTimeout(ScaleSlider, 800);
    }

    ScaleSlider();

    $Jssor$.$AddEvent(window, 'load', ScaleSlider);
    $Jssor$.$AddEvent(window, 'resize', ScaleSlider);
    $Jssor$.$AddEvent(window, 'orientationchange', OnOrientationChange);

  };
})(jQuery);

jQuery(document).ready(function () {
  slider_tyle = drupalSettings.image_slider.slider_tyle;
  if (slider_tyle === 'image-gallery') {
    jssor_2_slider_init();
  }
  else if (slider_tyle === 'image-slider') {
    jssor_1_slider_init();
  }
  else if (slider_tyle === 'banner-rotator') {
    jssor_3_slider_init();
  }
  else if (slider_tyle === 'banner-slider') {
    jssor_4_slider_init();
  }
  else if (slider_tyle === 'carousel-slider') {
    jssor_5_slider_init();
  }
  else if (slider_tyle === 'nearby-image-partial-visible-slider') {
    jssor_6_slider_init();
  }
  else if (slider_tyle === 'image-gallery-with-vertical-thumbnail') {
    jssor_7_slider_init();
  }
  else if (slider_tyle === 'scrolling-logo-thumbnail-slider') {
    jssor_8_slider_init();
  }
  else if (slider_tyle === 'full-width-slider') {
    jssor_9_slider_init();
  }
  else if (slider_tyle === 'different-size-photo-slider') {
    jssor_10_slider_init();
  }
  else if (slider_tyle === 'full-window-for-pc') {
    jssor_11_slider_init();
  }
});
;
//  json2.js
//  2017-06-12
//  Public Domain.
//  NO WARRANTY EXPRESSED OR IMPLIED. USE AT YOUR OWN RISK.

//  USE YOUR OWN COPY. IT IS EXTREMELY UNWISE TO LOAD CODE FROM SERVERS YOU DO
//  NOT CONTROL.

//  This file creates a global JSON object containing two methods: stringify
//  and parse. This file provides the ES5 JSON capability to ES3 systems.
//  If a project might run on IE8 or earlier, then this file should be included.
//  This file does nothing on ES5 systems.

//      JSON.stringify(value, replacer, space)
//          value       any JavaScript value, usually an object or array.
//          replacer    an optional parameter that determines how object
//                      values are stringified for objects. It can be a
//                      function or an array of strings.
//          space       an optional parameter that specifies the indentation
//                      of nested structures. If it is omitted, the text will
//                      be packed without extra whitespace. If it is a number,
//                      it will specify the number of spaces to indent at each
//                      level. If it is a string (such as "\t" or "&nbsp;"),
//                      it contains the characters used to indent at each level.
//          This method produces a JSON text from a JavaScript value.
//          When an object value is found, if the object contains a toJSON
//          method, its toJSON method will be called and the result will be
//          stringified. A toJSON method does not serialize: it returns the
//          value represented by the name/value pair that should be serialized,
//          or undefined if nothing should be serialized. The toJSON method
//          will be passed the key associated with the value, and this will be
//          bound to the value.

//          For example, this would serialize Dates as ISO strings.

//              Date.prototype.toJSON = function (key) {
//                  function f(n) {
//                      // Format integers to have at least two digits.
//                      return (n < 10)
//                          ? "0" + n
//                          : n;
//                  }
//                  return this.getUTCFullYear()   + "-" +
//                       f(this.getUTCMonth() + 1) + "-" +
//                       f(this.getUTCDate())      + "T" +
//                       f(this.getUTCHours())     + ":" +
//                       f(this.getUTCMinutes())   + ":" +
//                       f(this.getUTCSeconds())   + "Z";
//              };

//          You can provide an optional replacer method. It will be passed the
//          key and value of each member, with this bound to the containing
//          object. The value that is returned from your method will be
//          serialized. If your method returns undefined, then the member will
//          be excluded from the serialization.

//          If the replacer parameter is an array of strings, then it will be
//          used to select the members to be serialized. It filters the results
//          such that only members with keys listed in the replacer array are
//          stringified.

//          Values that do not have JSON representations, such as undefined or
//          functions, will not be serialized. Such values in objects will be
//          dropped; in arrays they will be replaced with null. You can use
//          a replacer function to replace those with JSON values.

//          JSON.stringify(undefined) returns undefined.

//          The optional space parameter produces a stringification of the
//          value that is filled with line breaks and indentation to make it
//          easier to read.

//          If the space parameter is a non-empty string, then that string will
//          be used for indentation. If the space parameter is a number, then
//          the indentation will be that many spaces.

//          Example:

//          text = JSON.stringify(["e", {pluribus: "unum"}]);
//          // text is '["e",{"pluribus":"unum"}]'

//          text = JSON.stringify(["e", {pluribus: "unum"}], null, "\t");
//          // text is '[\n\t"e",\n\t{\n\t\t"pluribus": "unum"\n\t}\n]'

//          text = JSON.stringify([new Date()], function (key, value) {
//              return this[key] instanceof Date
//                  ? "Date(" + this[key] + ")"
//                  : value;
//          });
//          // text is '["Date(---current time---)"]'

//      JSON.parse(text, reviver)
//          This method parses a JSON text to produce an object or array.
//          It can throw a SyntaxError exception.

//          The optional reviver parameter is a function that can filter and
//          transform the results. It receives each of the keys and values,
//          and its return value is used instead of the original value.
//          If it returns what it received, then the structure is not modified.
//          If it returns undefined then the member is deleted.

//          Example:

//          // Parse the text. Values that look like ISO date strings will
//          // be converted to Date objects.

//          myData = JSON.parse(text, function (key, value) {
//              var a;
//              if (typeof value === "string") {
//                  a =
//   /^(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2}):(\d{2}(?:\.\d*)?)Z$/.exec(value);
//                  if (a) {
//                      return new Date(Date.UTC(
//                         +a[1], +a[2] - 1, +a[3], +a[4], +a[5], +a[6]
//                      ));
//                  }
//                  return value;
//              }
//          });

//          myData = JSON.parse(
//              "[\"Date(09/09/2001)\"]",
//              function (key, value) {
//                  var d;
//                  if (
//                      typeof value === "string"
//                      && value.slice(0, 5) === "Date("
//                      && value.slice(-1) === ")"
//                  ) {
//                      d = new Date(value.slice(5, -1));
//                      if (d) {
//                          return d;
//                      }
//                  }
//                  return value;
//              }
//          );

//  This is a reference implementation. You are free to copy, modify, or
//  redistribute.

/*jslint
    eval, for, this
*/

/*property
    JSON, apply, call, charCodeAt, getUTCDate, getUTCFullYear, getUTCHours,
    getUTCMinutes, getUTCMonth, getUTCSeconds, hasOwnProperty, join,
    lastIndex, length, parse, prototype, push, replace, slice, stringify,
    test, toJSON, toString, valueOf
*/


// Create a JSON object only if one does not already exist. We create the
// methods in a closure to avoid creating global variables.

if (typeof JSON !== "object") {
    JSON = {};
}

(function () {
    "use strict";

    var rx_one = /^[\],:{}\s]*$/;
    var rx_two = /\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g;
    var rx_three = /"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g;
    var rx_four = /(?:^|:|,)(?:\s*\[)+/g;
    var rx_escapable = /[\\"\u0000-\u001f\u007f-\u009f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g;
    var rx_dangerous = /[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g;

    function f(n) {
        // Format integers to have at least two digits.
        return (n < 10)
            ? "0" + n
            : n;
    }

    function this_value() {
        return this.valueOf();
    }

    if (typeof Date.prototype.toJSON !== "function") {

        Date.prototype.toJSON = function () {

            return isFinite(this.valueOf())
                ? (
                    this.getUTCFullYear()
                    + "-"
                    + f(this.getUTCMonth() + 1)
                    + "-"
                    + f(this.getUTCDate())
                    + "T"
                    + f(this.getUTCHours())
                    + ":"
                    + f(this.getUTCMinutes())
                    + ":"
                    + f(this.getUTCSeconds())
                    + "Z"
                )
                : null;
        };

        Boolean.prototype.toJSON = this_value;
        Number.prototype.toJSON = this_value;
        String.prototype.toJSON = this_value;
    }

    var gap;
    var indent;
    var meta;
    var rep;


    function quote(string) {

// If the string contains no control characters, no quote characters, and no
// backslash characters, then we can safely slap some quotes around it.
// Otherwise we must also replace the offending characters with safe escape
// sequences.

        rx_escapable.lastIndex = 0;
        return rx_escapable.test(string)
            ? "\"" + string.replace(rx_escapable, function (a) {
                var c = meta[a];
                return typeof c === "string"
                    ? c
                    : "\\u" + ("0000" + a.charCodeAt(0).toString(16)).slice(-4);
            }) + "\""
            : "\"" + string + "\"";
    }


    function str(key, holder) {

// Produce a string from holder[key].

        var i;          // The loop counter.
        var k;          // The member key.
        var v;          // The member value.
        var length;
        var mind = gap;
        var partial;
        var value = holder[key];

// If the value has a toJSON method, call it to obtain a replacement value.

        if (
            value
            && typeof value === "object"
            && typeof value.toJSON === "function"
        ) {
            value = value.toJSON(key);
        }

// If we were called with a replacer function, then call the replacer to
// obtain a replacement value.

        if (typeof rep === "function") {
            value = rep.call(holder, key, value);
        }

// What happens next depends on the value's type.

        switch (typeof value) {
        case "string":
            return quote(value);

        case "number":

// JSON numbers must be finite. Encode non-finite numbers as null.

            return (isFinite(value))
                ? String(value)
                : "null";

        case "boolean":
        case "null":

// If the value is a boolean or null, convert it to a string. Note:
// typeof null does not produce "null". The case is included here in
// the remote chance that this gets fixed someday.

            return String(value);

// If the type is "object", we might be dealing with an object or an array or
// null.

        case "object":

// Due to a specification blunder in ECMAScript, typeof null is "object",
// so watch out for that case.

            if (!value) {
                return "null";
            }

// Make an array to hold the partial results of stringifying this object value.

            gap += indent;
            partial = [];

// Is the value an array?

            if (Object.prototype.toString.apply(value) === "[object Array]") {

// The value is an array. Stringify every element. Use null as a placeholder
// for non-JSON values.

                length = value.length;
                for (i = 0; i < length; i += 1) {
                    partial[i] = str(i, value) || "null";
                }

// Join all of the elements together, separated with commas, and wrap them in
// brackets.

                v = partial.length === 0
                    ? "[]"
                    : gap
                        ? (
                            "[\n"
                            + gap
                            + partial.join(",\n" + gap)
                            + "\n"
                            + mind
                            + "]"
                        )
                        : "[" + partial.join(",") + "]";
                gap = mind;
                return v;
            }

// If the replacer is an array, use it to select the members to be stringified.

            if (rep && typeof rep === "object") {
                length = rep.length;
                for (i = 0; i < length; i += 1) {
                    if (typeof rep[i] === "string") {
                        k = rep[i];
                        v = str(k, value);
                        if (v) {
                            partial.push(quote(k) + (
                                (gap)
                                    ? ": "
                                    : ":"
                            ) + v);
                        }
                    }
                }
            } else {

// Otherwise, iterate through all of the keys in the object.

                for (k in value) {
                    if (Object.prototype.hasOwnProperty.call(value, k)) {
                        v = str(k, value);
                        if (v) {
                            partial.push(quote(k) + (
                                (gap)
                                    ? ": "
                                    : ":"
                            ) + v);
                        }
                    }
                }
            }

// Join all of the member texts together, separated with commas,
// and wrap them in braces.

            v = partial.length === 0
                ? "{}"
                : gap
                    ? "{\n" + gap + partial.join(",\n" + gap) + "\n" + mind + "}"
                    : "{" + partial.join(",") + "}";
            gap = mind;
            return v;
        }
    }

// If the JSON object does not yet have a stringify method, give it one.

    if (typeof JSON.stringify !== "function") {
        meta = {    // table of character substitutions
            "\b": "\\b",
            "\t": "\\t",
            "\n": "\\n",
            "\f": "\\f",
            "\r": "\\r",
            "\"": "\\\"",
            "\\": "\\\\"
        };
        JSON.stringify = function (value, replacer, space) {

// The stringify method takes a value and an optional replacer, and an optional
// space parameter, and returns a JSON text. The replacer can be a function
// that can replace values, or an array of strings that will select the keys.
// A default replacer method can be provided. Use of the space parameter can
// produce text that is more easily readable.

            var i;
            gap = "";
            indent = "";

// If the space parameter is a number, make an indent string containing that
// many spaces.

            if (typeof space === "number") {
                for (i = 0; i < space; i += 1) {
                    indent += " ";
                }

// If the space parameter is a string, it will be used as the indent string.

            } else if (typeof space === "string") {
                indent = space;
            }

// If there is a replacer, it must be a function or an array.
// Otherwise, throw an error.

            rep = replacer;
            if (replacer && typeof replacer !== "function" && (
                typeof replacer !== "object"
                || typeof replacer.length !== "number"
            )) {
                throw new Error("JSON.stringify");
            }

// Make a fake root object containing our value under the key of "".
// Return the result of stringifying the value.

            return str("", {"": value});
        };
    }


// If the JSON object does not yet have a parse method, give it one.

    if (typeof JSON.parse !== "function") {
        JSON.parse = function (text, reviver) {

// The parse method takes a text and an optional reviver function, and returns
// a JavaScript value if the text is a valid JSON text.

            var j;

            function walk(holder, key) {

// The walk method is used to recursively walk the resulting structure so
// that modifications can be made.

                var k;
                var v;
                var value = holder[key];
                if (value && typeof value === "object") {
                    for (k in value) {
                        if (Object.prototype.hasOwnProperty.call(value, k)) {
                            v = walk(value, k);
                            if (v !== undefined) {
                                value[k] = v;
                            } else {
                                delete value[k];
                            }
                        }
                    }
                }
                return reviver.call(holder, key, value);
            }


// Parsing happens in four stages. In the first stage, we replace certain
// Unicode characters with escape sequences. JavaScript handles many characters
// incorrectly, either silently deleting them, or treating them as line endings.

            text = String(text);
            rx_dangerous.lastIndex = 0;
            if (rx_dangerous.test(text)) {
                text = text.replace(rx_dangerous, function (a) {
                    return (
                        "\\u"
                        + ("0000" + a.charCodeAt(0).toString(16)).slice(-4)
                    );
                });
            }

// In the second stage, we run the text against regular expressions that look
// for non-JSON patterns. We are especially concerned with "()" and "new"
// because they can cause invocation, and "=" because it can cause mutation.
// But just to be safe, we want to reject all unexpected forms.

// We split the second stage into 4 regexp operations in order to work around
// crippling inefficiencies in IE's and Safari's regexp engines. First we
// replace the JSON backslash pairs with "@" (a non-JSON character). Second, we
// replace all simple value tokens with "]" characters. Third, we delete all
// open brackets that follow a colon or comma or that begin the text. Finally,
// we look to see that the remaining characters are only whitespace or "]" or
// "," or ":" or "{" or "}". If that is so, then the text is safe for eval.

            if (
                rx_one.test(
                    text
                        .replace(rx_two, "@")
                        .replace(rx_three, "]")
                        .replace(rx_four, "")
                )
            ) {

// In the third stage we use the eval function to compile the text into a
// JavaScript structure. The "{" operator is subject to a syntactic ambiguity
// in JavaScript: it can begin a block or an object literal. We wrap the text
// in parens to eliminate the ambiguity.

                j = eval("(" + text + ")");

// In the optional fourth stage, we recursively walk the new structure, passing
// each name/value pair to a reviver function for possible transformation.

                return (typeof reviver === "function")
                    ? walk({"": j}, "")
                    : j;
            }

// If the text is not JSON parseable, then a SyntaxError is thrown.

            throw new SyntaxError("JSON.parse");
        };
    }
}());
;
/*!
 * jQuery Cycle Plugin (with Transition Definitions)
 * Examples and documentation at: http://jquery.malsup.com/cycle/
 * Copyright (c) 2007-2013 M. Alsup
 * Version: 3.0.3 (11-JUL-2013)
 * Dual licensed under the MIT and GPL licenses.
 * http://jquery.malsup.com/license.html
 * Requires: jQuery v1.7.1 or later
 */
;(function($, undefined) {
    "use strict";

    var ver = '3.0.3';

    function debug(s) {
        if ($.fn.cycle.debug)
            log(s);
    }
    function log() {
        /*global console */
        if (window.console && console.log)
            console.log('[cycle] ' + Array.prototype.join.call(arguments,' '));
    }
    $.expr[':'].paused = function(el) {
        return el.cyclePause;
    };


    // the options arg can be...
    //   a number  - indicates an immediate transition should occur to the given slide index
    //   a string  - 'pause', 'resume', 'toggle', 'next', 'prev', 'stop', 'destroy' or the name of a transition effect (ie, 'fade', 'zoom', etc)
    //   an object - properties to control the slideshow
    //
    // the arg2 arg can be...
    //   the name of an fx (only used in conjunction with a numeric value for 'options')
    //   the value true (only used in first arg == 'resume') and indicates
    //	 that the resume should occur immediately (not wait for next timeout)

    $.fn.cycle = function(options, arg2) {
        var o = { s: this.selector, c: this.context };

        // in 1.3+ we can fix mistakes with the ready state
        if (this.length === 0 && options != 'stop') {
            if (!$.isReady && o.s) {
                log('DOM not ready, queuing slideshow');
                $(function() {
                    $(o.s,o.c).cycle(options,arg2);
                });
                return this;
            }
            // is your DOM ready?  http://docs.jquery.com/Tutorials:Introducing_$(document).ready()
            log('terminating; zero elements found by selector' + ($.isReady ? '' : ' (DOM not ready)'));
            return this;
        }

        // iterate the matched nodeset
        return this.each(function() {
            var opts = handleArguments(this, options, arg2);
            if (opts === false)
                return;

            opts.updateActivePagerLink = opts.updateActivePagerLink || $.fn.cycle.updateActivePagerLink;

            // stop existing slideshow for this container (if there is one)
            if (this.cycleTimeout)
                clearTimeout(this.cycleTimeout);
            this.cycleTimeout = this.cyclePause = 0;
            this.cycleStop = 0; // issue #108

            var $cont = $(this);
            var $slides = opts.slideExpr ? $(opts.slideExpr, this) : $cont.children();
            var els = $slides.get();

            if (els.length < 2) {
                log('terminating; too few slides: ' + els.length);
                return;
            }

            var opts2 = buildOptions($cont, $slides, els, opts, o);
            if (opts2 === false)
                return;

            var startTime = opts2.continuous ? 10 : getTimeout(els[opts2.currSlide], els[opts2.nextSlide], opts2, !opts2.backwards);

            // if it's an auto slideshow, kick it off
            if (startTime) {
                startTime += (opts2.delay || 0);
                if (startTime < 10)
                    startTime = 10;
                debug('first timeout: ' + startTime);
                this.cycleTimeout = setTimeout(function(){go(els,opts2,0,!opts.backwards);}, startTime);
            }
        });
    };

    function triggerPause(cont, byHover, onPager) {
        var opts = $(cont).data('cycle.opts');
        if (!opts)
            return;
        var paused = !!cont.cyclePause;
        if (paused && opts.paused)
            opts.paused(cont, opts, byHover, onPager);
        else if (!paused && opts.resumed)
            opts.resumed(cont, opts, byHover, onPager);
    }

    // process the args that were passed to the plugin fn
    function handleArguments(cont, options, arg2) {
        if (cont.cycleStop === undefined)
            cont.cycleStop = 0;
        if (options === undefined || options === null)
            options = {};
        if (options.constructor == String) {
            switch(options) {
            case 'destroy':
            case 'stop':
                var opts = $(cont).data('cycle.opts');
                if (!opts)
                    return false;
                cont.cycleStop++; // callbacks look for change
                if (cont.cycleTimeout)
                    clearTimeout(cont.cycleTimeout);
                cont.cycleTimeout = 0;
                if (opts.elements)
                    $(opts.elements).stop();
                $(cont).removeData('cycle.opts');
                if (options == 'destroy')
                    destroy(cont, opts);
                return false;
            case 'toggle':
                cont.cyclePause = (cont.cyclePause === 1) ? 0 : 1;
                checkInstantResume(cont.cyclePause, arg2, cont);
                triggerPause(cont);
                return false;
            case 'pause':
                cont.cyclePause = 1;
                triggerPause(cont);
                return false;
            case 'resume':
                cont.cyclePause = 0;
                checkInstantResume(false, arg2, cont);
                triggerPause(cont);
                return false;
            case 'prev':
            case 'next':
                opts = $(cont).data('cycle.opts');
                if (!opts) {
                    log('options not found, "prev/next" ignored');
                    return false;
                }
                if (typeof arg2 == 'string')
                    opts.oneTimeFx = arg2;
                $.fn.cycle[options](opts);
                return false;
            default:
                options = { fx: options };
            }
            return options;
        }
        else if (options.constructor == Number) {
            // go to the requested slide
            var num = options;
            options = $(cont).data('cycle.opts');
            if (!options) {
                log('options not found, can not advance slide');
                return false;
            }
            if (num < 0 || num >= options.elements.length) {
                log('invalid slide index: ' + num);
                return false;
            }
            options.nextSlide = num;
            if (cont.cycleTimeout) {
                clearTimeout(cont.cycleTimeout);
                cont.cycleTimeout = 0;
            }
            if (typeof arg2 == 'string')
                options.oneTimeFx = arg2;
            go(options.elements, options, 1, num >= options.currSlide);
            return false;
        }
        return options;

        function checkInstantResume(isPaused, arg2, cont) {
            if (!isPaused && arg2 === true) { // resume now!
                var options = $(cont).data('cycle.opts');
                if (!options) {
                    log('options not found, can not resume');
                    return false;
                }
                if (cont.cycleTimeout) {
                    clearTimeout(cont.cycleTimeout);
                    cont.cycleTimeout = 0;
                }
                go(options.elements, options, 1, !options.backwards);
            }
        }
    }

    function removeFilter(el, opts) {
        if (!$.support.opacity && opts.cleartype && el.style.filter) {
            try { el.style.removeAttribute('filter'); }
            catch(smother) {} // handle old opera versions
        }
    }

    // unbind event handlers
    function destroy(cont, opts) {
        if (opts.next)
            $(opts.next).unbind(opts.prevNextEvent);
        if (opts.prev)
            $(opts.prev).unbind(opts.prevNextEvent);

        if (opts.pager || opts.pagerAnchorBuilder)
            $.each(opts.pagerAnchors || [], function() {
                this.unbind().remove();
            });
        opts.pagerAnchors = null;
        $(cont).unbind('mouseenter.cycle mouseleave.cycle');
        if (opts.destroy) // callback
            opts.destroy(opts);
    }

    // one-time initialization
    function buildOptions($cont, $slides, els, options, o) {
        var startingSlideSpecified;
        // support metadata plugin (v1.0 and v2.0)
        var opts = $.extend({}, $.fn.cycle.defaults, options || {}, $.metadata ? $cont.metadata() : $.meta ? $cont.data() : {});
        var meta = $.isFunction($cont.data) ? $cont.data(opts.metaAttr) : null;
        if (meta)
            opts = $.extend(opts, meta);
        if (opts.autostop)
            opts.countdown = opts.autostopCount || els.length;

        var cont = $cont[0];
        $cont.data('cycle.opts', opts);
        opts.$cont = $cont;
        opts.stopCount = cont.cycleStop;
        opts.elements = els;
        opts.before = opts.before ? [opts.before] : [];
        opts.after = opts.after ? [opts.after] : [];

        // push some after callbacks
        if (!$.support.opacity && opts.cleartype)
            opts.after.push(function() { removeFilter(this, opts); });
        if (opts.continuous)
            opts.after.push(function() { go(els,opts,0,!opts.backwards); });

        saveOriginalOpts(opts);

        // clearType corrections
        if (!$.support.opacity && opts.cleartype && !opts.cleartypeNoBg)
            clearTypeFix($slides);

        // container requires non-static position so that slides can be position within
        if ($cont.css('position') == 'static')
            $cont.css('position', 'relative');
        if (opts.width)
            $cont.width(opts.width);
        if (opts.height && opts.height != 'auto')
            $cont.height(opts.height);

        if (opts.startingSlide !== undefined) {
            opts.startingSlide = parseInt(opts.startingSlide,10);
            if (opts.startingSlide >= els.length || opts.startSlide < 0)
                opts.startingSlide = 0; // catch bogus input
            else
                startingSlideSpecified = true;
        }
        else if (opts.backwards)
            opts.startingSlide = els.length - 1;
        else
            opts.startingSlide = 0;

        // if random, mix up the slide array
        if (opts.random) {
            opts.randomMap = [];
            for (var i = 0; i < els.length; i++)
                opts.randomMap.push(i);
            opts.randomMap.sort(function(a,b) {return Math.random() - 0.5;});
            if (startingSlideSpecified) {
                // try to find the specified starting slide and if found set start slide index in the map accordingly
                for ( var cnt = 0; cnt < els.length; cnt++ ) {
                    if ( opts.startingSlide == opts.randomMap[cnt] ) {
                        opts.randomIndex = cnt;
                    }
                }
            }
            else {
                opts.randomIndex = 1;
                opts.startingSlide = opts.randomMap[1];
            }
        }
        else if (opts.startingSlide >= els.length)
            opts.startingSlide = 0; // catch bogus input
        opts.currSlide = opts.startingSlide || 0;
        var first = opts.startingSlide;

        // set position and zIndex on all the slides
        $slides.css({position: 'absolute', top:0, left:0}).hide().each(function(i) {
            var z;
            if (opts.backwards)
                z = first ? i <= first ? els.length + (i-first) : first-i : els.length-i;
            else
                z = first ? i >= first ? els.length - (i-first) : first-i : els.length-i;
            $(this).css('z-index', z);
        });

        // make sure first slide is visible
        $(els[first]).css('opacity',1).show(); // opacity bit needed to handle restart use case
        removeFilter(els[first], opts);

        // stretch slides
        if (opts.fit) {
            if (!opts.aspect) {
                if (opts.width)
                    $slides.width(opts.width);
                if (opts.height && opts.height != 'auto')
                    $slides.height(opts.height);
            } else {
                $slides.each(function(){
                    var $slide = $(this);
                    var ratio = (opts.aspect === true) ? $slide.width()/$slide.height() : opts.aspect;
                    if( opts.width && $slide.width() != opts.width ) {
                        $slide.width( opts.width );
                        $slide.height( opts.width / ratio );
                    }

                    if( opts.height && $slide.height() < opts.height ) {
                        $slide.height( opts.height );
                        $slide.width( opts.height * ratio );
                    }
                });
            }
        }

        if (opts.center && ((!opts.fit) || opts.aspect)) {
            $slides.each(function(){
                var $slide = $(this);
                $slide.css({
                    "margin-left": opts.width ?
                        ((opts.width - $slide.width()) / 2) + "px" :
                        0,
                    "margin-top": opts.height ?
                        ((opts.height - $slide.height()) / 2) + "px" :
                        0
                });
            });
        }

        if (opts.center && !opts.fit && !opts.slideResize) {
            $slides.each(function(){
                var $slide = $(this);
                $slide.css({
                    "margin-left": opts.width ? ((opts.width - $slide.width()) / 2) + "px" : 0,
                    "margin-top": opts.height ? ((opts.height - $slide.height()) / 2) + "px" : 0
                });
            });
        }

        // stretch container
        var reshape = (opts.containerResize || opts.containerResizeHeight) && $cont.innerHeight() < 1;
        if (reshape) { // do this only if container has no size http://tinyurl.com/da2oa9
            var maxw = 0, maxh = 0;
            for(var j=0; j < els.length; j++) {
                var $e = $(els[j]), e = $e[0], w = $e.outerWidth(), h = $e.outerHeight();
                if (!w) w = e.offsetWidth || e.width || $e.attr('width');
                if (!h) h = e.offsetHeight || e.height || $e.attr('height');
                maxw = w > maxw ? w : maxw;
                maxh = h > maxh ? h : maxh;
            }
            if (opts.containerResize && maxw > 0 && maxh > 0)
                $cont.css({width:maxw+'px',height:maxh+'px'});
            if (opts.containerResizeHeight && maxh > 0)
                $cont.css({height:maxh+'px'});
        }

        var pauseFlag = false;  // https://github.com/malsup/cycle/issues/44
        if (opts.pause)
            $cont.bind('mouseenter.cycle', function(){
                pauseFlag = true;
                this.cyclePause++;
                triggerPause(cont, true);
            }).bind('mouseleave.cycle', function(){
                    if (pauseFlag)
                        this.cyclePause--;
                    triggerPause(cont, true);
            });

        if (supportMultiTransitions(opts) === false)
            return false;

        // apparently a lot of people use image slideshows without height/width attributes on the images.
        // Cycle 2.50+ requires the sizing info for every slide; this block tries to deal with that.
        var requeue = false;
        options.requeueAttempts = options.requeueAttempts || 0;
        $slides.each(function() {
            // try to get height/width of each slide
            var $el = $(this);
            this.cycleH = (opts.fit && opts.height) ? opts.height : ($el.height() || this.offsetHeight || this.height || $el.attr('height') || 0);
            this.cycleW = (opts.fit && opts.width) ? opts.width : ($el.width() || this.offsetWidth || this.width || $el.attr('width') || 0);

            if ( $el.is('img') ) {
                var loading = (this.cycleH === 0 && this.cycleW === 0 && !this.complete);
                // don't requeue for images that are still loading but have a valid size
                if (loading) {
                    if (o.s && opts.requeueOnImageNotLoaded && ++options.requeueAttempts < 100) { // track retry count so we don't loop forever
                        log(options.requeueAttempts,' - img slide not loaded, requeuing slideshow: ', this.src, this.cycleW, this.cycleH);
                        setTimeout(function() {$(o.s,o.c).cycle(options);}, opts.requeueTimeout);
                        requeue = true;
                        return false; // break each loop
                    }
                    else {
                        log('could not determine size of image: '+this.src, this.cycleW, this.cycleH);
                    }
                }
            }
            return true;
        });

        if (requeue)
            return false;

        opts.cssBefore = opts.cssBefore || {};
        opts.cssAfter = opts.cssAfter || {};
        opts.cssFirst = opts.cssFirst || {};
        opts.animIn = opts.animIn || {};
        opts.animOut = opts.animOut || {};

        $slides.not(':eq('+first+')').css(opts.cssBefore);
        $($slides[first]).css(opts.cssFirst);

        if (opts.timeout) {
            opts.timeout = parseInt(opts.timeout,10);
            // ensure that timeout and speed settings are sane
            if (opts.speed.constructor == String)
                opts.speed = $.fx.speeds[opts.speed] || parseInt(opts.speed,10);
            if (!opts.sync)
                opts.speed = opts.speed / 2;

            var buffer = opts.fx == 'none' ? 0 : opts.fx == 'shuffle' ? 500 : 250;
            while((opts.timeout - opts.speed) < buffer) // sanitize timeout
                opts.timeout += opts.speed;
        }
        if (opts.easing)
            opts.easeIn = opts.easeOut = opts.easing;
        if (!opts.speedIn)
            opts.speedIn = opts.speed;
        if (!opts.speedOut)
            opts.speedOut = opts.speed;

        opts.slideCount = els.length;
        opts.currSlide = opts.lastSlide = first;
        if (opts.random) {
            if (++opts.randomIndex == els.length)
                opts.randomIndex = 0;
            opts.nextSlide = opts.randomMap[opts.randomIndex];
        }
        else if (opts.backwards)
            opts.nextSlide = opts.startingSlide === 0 ? (els.length-1) : opts.startingSlide-1;
        else
            opts.nextSlide = opts.startingSlide >= (els.length-1) ? 0 : opts.startingSlide+1;

        // run transition init fn
        if (!opts.multiFx) {
            var init = $.fn.cycle.transitions[opts.fx];
            if ($.isFunction(init))
                init($cont, $slides, opts);
            else if (opts.fx != 'custom' && !opts.multiFx) {
                log('unknown transition: ' + opts.fx,'; slideshow terminating');
                return false;
            }
        }

        // fire artificial events
        var e0 = $slides[first];
        if (!opts.skipInitializationCallbacks) {
            if (opts.before.length)
                opts.before[0].apply(e0, [e0, e0, opts, true]);
            if (opts.after.length)
                opts.after[0].apply(e0, [e0, e0, opts, true]);
        }
        if (opts.next)
            $(opts.next).bind(opts.prevNextEvent,function(){return advance(opts,1);});
        if (opts.prev)
            $(opts.prev).bind(opts.prevNextEvent,function(){return advance(opts,0);});
        if (opts.pager || opts.pagerAnchorBuilder)
            buildPager(els,opts);

        exposeAddSlide(opts, els);

        return opts;
    }

    // save off original opts so we can restore after clearing state
    function saveOriginalOpts(opts) {
        opts.original = { before: [], after: [] };
        opts.original.cssBefore = $.extend({}, opts.cssBefore);
        opts.original.cssAfter  = $.extend({}, opts.cssAfter);
        opts.original.animIn	= $.extend({}, opts.animIn);
        opts.original.animOut   = $.extend({}, opts.animOut);
        $.each(opts.before, function() { opts.original.before.push(this); });
        $.each(opts.after,  function() { opts.original.after.push(this); });
    }

    function supportMultiTransitions(opts) {
        var i, tx, txs = $.fn.cycle.transitions;
        // look for multiple effects
        if (opts.fx.indexOf(',') > 0) {
            opts.multiFx = true;
            opts.fxs = opts.fx.replace(/\s*/g,'').split(',');
            // discard any bogus effect names
            for (i=0; i < opts.fxs.length; i++) {
                var fx = opts.fxs[i];
                tx = txs[fx];
                if (!tx || !txs.hasOwnProperty(fx) || !$.isFunction(tx)) {
                    log('discarding unknown transition: ',fx);
                    opts.fxs.splice(i,1);
                    i--;
                }
            }
            // if we have an empty list then we threw everything away!
            if (!opts.fxs.length) {
                log('No valid transitions named; slideshow terminating.');
                return false;
            }
        }
        else if (opts.fx == 'all') {  // auto-gen the list of transitions
            opts.multiFx = true;
            opts.fxs = [];
            for (var p in txs) {
                if (txs.hasOwnProperty(p)) {
                    tx = txs[p];
                    if (txs.hasOwnProperty(p) && $.isFunction(tx))
                        opts.fxs.push(p);
                }
            }
        }
        if (opts.multiFx && opts.randomizeEffects) {
            // munge the fxs array to make effect selection random
            var r1 = Math.floor(Math.random() * 20) + 30;
            for (i = 0; i < r1; i++) {
                var r2 = Math.floor(Math.random() * opts.fxs.length);
                opts.fxs.push(opts.fxs.splice(r2,1)[0]);
            }
            debug('randomized fx sequence: ',opts.fxs);
        }
        return true;
    }

    // provide a mechanism for adding slides after the slideshow has started
    function exposeAddSlide(opts, els) {
        opts.addSlide = function(newSlide, prepend) {
            var $s = $(newSlide), s = $s[0];
            if (!opts.autostopCount)
                opts.countdown++;
            els[prepend?'unshift':'push'](s);
            if (opts.els)
                opts.els[prepend?'unshift':'push'](s); // shuffle needs this
            opts.slideCount = els.length;

            // add the slide to the random map and resort
            if (opts.random) {
                opts.randomMap.push(opts.slideCount-1);
                opts.randomMap.sort(function(a,b) {return Math.random() - 0.5;});
            }

            $s.css('position','absolute');
            $s[prepend?'prependTo':'appendTo'](opts.$cont);

            if (prepend) {
                opts.currSlide++;
                opts.nextSlide++;
            }

            if (!$.support.opacity && opts.cleartype && !opts.cleartypeNoBg)
                clearTypeFix($s);

            if (opts.fit && opts.width)
                $s.width(opts.width);
            if (opts.fit && opts.height && opts.height != 'auto')
                $s.height(opts.height);
            s.cycleH = (opts.fit && opts.height) ? opts.height : $s.height();
            s.cycleW = (opts.fit && opts.width) ? opts.width : $s.width();

            $s.css(opts.cssBefore);

            if (opts.pager || opts.pagerAnchorBuilder)
                $.fn.cycle.createPagerAnchor(els.length-1, s, $(opts.pager), els, opts);

            if ($.isFunction(opts.onAddSlide))
                opts.onAddSlide($s);
            else
                $s.hide(); // default behavior
        };
    }

    // reset internal state; we do this on every pass in order to support multiple effects
    $.fn.cycle.resetState = function(opts, fx) {
        fx = fx || opts.fx;
        opts.before = []; opts.after = [];
        opts.cssBefore = $.extend({}, opts.original.cssBefore);
        opts.cssAfter  = $.extend({}, opts.original.cssAfter);
        opts.animIn	= $.extend({}, opts.original.animIn);
        opts.animOut   = $.extend({}, opts.original.animOut);
        opts.fxFn = null;
        $.each(opts.original.before, function() { opts.before.push(this); });
        $.each(opts.original.after,  function() { opts.after.push(this); });

        // re-init
        var init = $.fn.cycle.transitions[fx];
        if ($.isFunction(init))
            init(opts.$cont, $(opts.elements), opts);
    };

    // this is the main engine fn, it handles the timeouts, callbacks and slide index mgmt
    function go(els, opts, manual, fwd) {
        var p = opts.$cont[0], curr = els[opts.currSlide], next = els[opts.nextSlide];

        // opts.busy is true if we're in the middle of an animation
        if (manual && opts.busy && opts.manualTrump) {
            // let manual transitions requests trump active ones
            debug('manualTrump in go(), stopping active transition');
            $(els).stop(true,true);
            opts.busy = 0;
            clearTimeout(p.cycleTimeout);
        }

        // don't begin another timeout-based transition if there is one active
        if (opts.busy) {
            debug('transition active, ignoring new tx request');
            return;
        }


        // stop cycling if we have an outstanding stop request
        if (p.cycleStop != opts.stopCount || p.cycleTimeout === 0 && !manual)
            return;

        // check to see if we should stop cycling based on autostop options
        if (!manual && !p.cyclePause && !opts.bounce &&
            ((opts.autostop && (--opts.countdown <= 0)) ||
            (opts.nowrap && !opts.random && opts.nextSlide < opts.currSlide))) {
            if (opts.end)
                opts.end(opts);
            return;
        }

        // if slideshow is paused, only transition on a manual trigger
        var changed = false;
        if ((manual || !p.cyclePause) && (opts.nextSlide != opts.currSlide)) {
            changed = true;
            var fx = opts.fx;
            // keep trying to get the slide size if we don't have it yet
            curr.cycleH = curr.cycleH || $(curr).height();
            curr.cycleW = curr.cycleW || $(curr).width();
            next.cycleH = next.cycleH || $(next).height();
            next.cycleW = next.cycleW || $(next).width();

            // support multiple transition types
            if (opts.multiFx) {
                if (fwd && (opts.lastFx === undefined || ++opts.lastFx >= opts.fxs.length))
                    opts.lastFx = 0;
                else if (!fwd && (opts.lastFx === undefined || --opts.lastFx < 0))
                    opts.lastFx = opts.fxs.length - 1;
                fx = opts.fxs[opts.lastFx];
            }

            // one-time fx overrides apply to:  $('div').cycle(3,'zoom');
            if (opts.oneTimeFx) {
                fx = opts.oneTimeFx;
                opts.oneTimeFx = null;
            }

            $.fn.cycle.resetState(opts, fx);

            // run the before callbacks
            if (opts.before.length)
                $.each(opts.before, function(i,o) {
                    if (p.cycleStop != opts.stopCount) return;
                    o.apply(next, [curr, next, opts, fwd]);
                });

            // stage the after callacks
            var after = function() {
                opts.busy = 0;
                $.each(opts.after, function(i,o) {
                    if (p.cycleStop != opts.stopCount) return;
                    o.apply(next, [curr, next, opts, fwd]);
                });
                if (!p.cycleStop) {
                    // queue next transition
                    queueNext();
                }
            };

            debug('tx firing('+fx+'); currSlide: ' + opts.currSlide + '; nextSlide: ' + opts.nextSlide);

            // get ready to perform the transition
            opts.busy = 1;
            if (opts.fxFn) // fx function provided?
                opts.fxFn(curr, next, opts, after, fwd, manual && opts.fastOnEvent);
            else if ($.isFunction($.fn.cycle[opts.fx])) // fx plugin ?
                $.fn.cycle[opts.fx](curr, next, opts, after, fwd, manual && opts.fastOnEvent);
            else
                $.fn.cycle.custom(curr, next, opts, after, fwd, manual && opts.fastOnEvent);
        }
        else {
            queueNext();
        }

        if (changed || opts.nextSlide == opts.currSlide) {
            // calculate the next slide
            var roll;
            opts.lastSlide = opts.currSlide;
            if (opts.random) {
                opts.currSlide = opts.nextSlide;
                if (++opts.randomIndex == els.length) {
                    opts.randomIndex = 0;
                    opts.randomMap.sort(function(a,b) {return Math.random() - 0.5;});
                }
                opts.nextSlide = opts.randomMap[opts.randomIndex];
                if (opts.nextSlide == opts.currSlide)
                    opts.nextSlide = (opts.currSlide == opts.slideCount - 1) ? 0 : opts.currSlide + 1;
            }
            else if (opts.backwards) {
                roll = (opts.nextSlide - 1) < 0;
                if (roll && opts.bounce) {
                    opts.backwards = !opts.backwards;
                    opts.nextSlide = 1;
                    opts.currSlide = 0;
                }
                else {
                    opts.nextSlide = roll ? (els.length-1) : opts.nextSlide-1;
                    opts.currSlide = roll ? 0 : opts.nextSlide+1;
                }
            }
            else { // sequence
                roll = (opts.nextSlide + 1) == els.length;
                if (roll && opts.bounce) {
                    opts.backwards = !opts.backwards;
                    opts.nextSlide = els.length-2;
                    opts.currSlide = els.length-1;
                }
                else {
                    opts.nextSlide = roll ? 0 : opts.nextSlide+1;
                    opts.currSlide = roll ? els.length-1 : opts.nextSlide-1;
                }
            }
        }
        if (changed && opts.pager)
            opts.updateActivePagerLink(opts.pager, opts.currSlide, opts.activePagerClass);

        function queueNext() {
            // stage the next transition
            var ms = 0, timeout = opts.timeout;
            if (opts.timeout && !opts.continuous) {
                ms = getTimeout(els[opts.currSlide], els[opts.nextSlide], opts, fwd);
             if (opts.fx == 'shuffle')
                ms -= opts.speedOut;
          }
            else if (opts.continuous && p.cyclePause) // continuous shows work off an after callback, not this timer logic
                ms = 10;
            if (ms > 0)
                p.cycleTimeout = setTimeout(function(){ go(els, opts, 0, !opts.backwards); }, ms);
        }
    }

    // invoked after transition
    $.fn.cycle.updateActivePagerLink = function(pager, currSlide, clsName) {
       $(pager).each(function() {
           $(this).children().removeClass(clsName).eq(currSlide).addClass(clsName);
       });
    };

    // calculate timeout value for current transition
    function getTimeout(curr, next, opts, fwd) {
        if (opts.timeoutFn) {
            // call user provided calc fn
            var t = opts.timeoutFn.call(curr,curr,next,opts,fwd);
            while (opts.fx != 'none' && (t - opts.speed) < 250) // sanitize timeout
                t += opts.speed;
            debug('calculated timeout: ' + t + '; speed: ' + opts.speed);
            if (t !== false)
                return t;
        }
        return opts.timeout;
    }

    // expose next/prev function, caller must pass in state
    $.fn.cycle.next = function(opts) { advance(opts,1); };
    $.fn.cycle.prev = function(opts) { advance(opts,0);};

    // advance slide forward or back
    function advance(opts, moveForward) {
        var val = moveForward ? 1 : -1;
        var els = opts.elements;
        var p = opts.$cont[0], timeout = p.cycleTimeout;
        if (timeout) {
            clearTimeout(timeout);
            p.cycleTimeout = 0;
        }
        if (opts.random && val < 0) {
            // move back to the previously display slide
            opts.randomIndex--;
            if (--opts.randomIndex == -2)
                opts.randomIndex = els.length-2;
            else if (opts.randomIndex == -1)
                opts.randomIndex = els.length-1;
            opts.nextSlide = opts.randomMap[opts.randomIndex];
        }
        else if (opts.random) {
            opts.nextSlide = opts.randomMap[opts.randomIndex];
        }
        else {
            opts.nextSlide = opts.currSlide + val;
            if (opts.nextSlide < 0) {
                if (opts.nowrap) return false;
                opts.nextSlide = els.length - 1;
            }
            else if (opts.nextSlide >= els.length) {
                if (opts.nowrap) return false;
                opts.nextSlide = 0;
            }
        }

        var cb = opts.onPrevNextEvent || opts.prevNextClick; // prevNextClick is deprecated
        if ($.isFunction(cb))
            cb(val > 0, opts.nextSlide, els[opts.nextSlide]);
        go(els, opts, 1, moveForward);
        return false;
    }

    function buildPager(els, opts) {
        var $p = $(opts.pager);
        $.each(els, function(i,o) {
            $.fn.cycle.createPagerAnchor(i,o,$p,els,opts);
        });
        opts.updateActivePagerLink(opts.pager, opts.startingSlide, opts.activePagerClass);
    }

    $.fn.cycle.createPagerAnchor = function(i, el, $p, els, opts) {
        var a;
        if ($.isFunction(opts.pagerAnchorBuilder)) {
            a = opts.pagerAnchorBuilder(i,el);
            debug('pagerAnchorBuilder('+i+', el) returned: ' + a);
        }
        else
            a = '<a href="#">'+(i+1)+'</a>';

        if (!a)
            return;
        var $a = $(a);
        // don't reparent if anchor is in the dom
        if ($a.parents('body').length === 0) {
            var arr = [];
            if ($p.length > 1) {
                $p.each(function() {
                    var $clone = $a.clone(true);
                    $(this).append($clone);
                    arr.push($clone[0]);
                });
                $a = $(arr);
            }
            else {
                $a.appendTo($p);
            }
        }

        opts.pagerAnchors =  opts.pagerAnchors || [];
        opts.pagerAnchors.push($a);

        var pagerFn = function(e) {
            e.preventDefault();
            opts.nextSlide = i;
            var p = opts.$cont[0], timeout = p.cycleTimeout;
            if (timeout) {
                clearTimeout(timeout);
                p.cycleTimeout = 0;
            }
            var cb = opts.onPagerEvent || opts.pagerClick; // pagerClick is deprecated
            if ($.isFunction(cb))
                cb(opts.nextSlide, els[opts.nextSlide]);
            go(els,opts,1,opts.currSlide < i); // trigger the trans
    //		return false; // <== allow bubble
        };

        if ( /mouseenter|mouseover/i.test(opts.pagerEvent) ) {
            $a.hover(pagerFn, function(){/* no-op */} );
        }
        else {
            $a.bind(opts.pagerEvent, pagerFn);
        }

        if ( ! /^click/.test(opts.pagerEvent) && !opts.allowPagerClickBubble)
            $a.bind('click.cycle', function(){return false;}); // suppress click

        var cont = opts.$cont[0];
        var pauseFlag = false; // https://github.com/malsup/cycle/issues/44
        if (opts.pauseOnPagerHover) {
            $a.hover(
                function() {
                    pauseFlag = true;
                    cont.cyclePause++;
                    triggerPause(cont,true,true);
                }, function() {
                    if (pauseFlag)
                        cont.cyclePause--;
                    triggerPause(cont,true,true);
                }
            );
        }
    };

    // helper fn to calculate the number of slides between the current and the next
    $.fn.cycle.hopsFromLast = function(opts, fwd) {
        var hops, l = opts.lastSlide, c = opts.currSlide;
        if (fwd)
            hops = c > l ? c - l : opts.slideCount - l;
        else
            hops = c < l ? l - c : l + opts.slideCount - c;
        return hops;
    };

    // fix clearType problems in ie6 by setting an explicit bg color
    // (otherwise text slides look horrible during a fade transition)
    function clearTypeFix($slides) {
        debug('applying clearType background-color hack');
        function hex(s) {
            s = parseInt(s,10).toString(16);
            return s.length < 2 ? '0'+s : s;
        }
        function getBg(e) {
            for ( ; e && e.nodeName.toLowerCase() != 'html'; e = e.parentNode) {
                var v = $.css(e,'background-color');
                if (v && v.indexOf('rgb') >= 0 ) {
                    var rgb = v.match(/\d+/g);
                    return '#'+ hex(rgb[0]) + hex(rgb[1]) + hex(rgb[2]);
                }
                if (v && v != 'transparent')
                    return v;
            }
            return '#ffffff';
        }
        $slides.each(function() { $(this).css('background-color', getBg(this)); });
    }

    // reset common props before the next transition
    $.fn.cycle.commonReset = function(curr,next,opts,w,h,rev) {
        $(opts.elements).not(curr).hide();
        if (typeof opts.cssBefore.opacity == 'undefined')
            opts.cssBefore.opacity = 1;
        opts.cssBefore.display = 'block';
        if (opts.slideResize && w !== false && next.cycleW > 0)
            opts.cssBefore.width = next.cycleW;
        if (opts.slideResize && h !== false && next.cycleH > 0)
            opts.cssBefore.height = next.cycleH;
        opts.cssAfter = opts.cssAfter || {};
        opts.cssAfter.display = 'none';
        $(curr).css('zIndex',opts.slideCount + (rev === true ? 1 : 0));
        $(next).css('zIndex',opts.slideCount + (rev === true ? 0 : 1));
    };

    // the actual fn for effecting a transition
    $.fn.cycle.custom = function(curr, next, opts, cb, fwd, speedOverride) {
        var $l = $(curr), $n = $(next);
        var speedIn = opts.speedIn, speedOut = opts.speedOut, easeIn = opts.easeIn, easeOut = opts.easeOut, animInDelay = opts.animInDelay, animOutDelay = opts.animOutDelay;
        $n.css(opts.cssBefore);
        if (speedOverride) {
            if (typeof speedOverride == 'number')
                speedIn = speedOut = speedOverride;
            else
                speedIn = speedOut = 1;
            easeIn = easeOut = null;
        }
        var fn = function() {
            $n.delay(animInDelay).animate(opts.animIn, speedIn, easeIn, function() {
                cb();
            });
        };
        $l.delay(animOutDelay).animate(opts.animOut, speedOut, easeOut, function() {
            $l.css(opts.cssAfter);
            if (!opts.sync)
                fn();
        });
        if (opts.sync) fn();
    };

    // transition definitions - only fade is defined here, transition pack defines the rest
    $.fn.cycle.transitions = {
        fade: function($cont, $slides, opts) {
            $slides.not(':eq('+opts.currSlide+')').css('opacity',0);
            opts.before.push(function(curr,next,opts) {
                $.fn.cycle.commonReset(curr,next,opts);
                opts.cssBefore.opacity = 0;
            });
            opts.animIn	   = { opacity: 1 };
            opts.animOut   = { opacity: 0 };
            opts.cssBefore = { top: 0, left: 0 };
        }
    };

    $.fn.cycle.ver = function() { return ver; };

    // override these globally if you like (they are all optional)
    $.fn.cycle.defaults = {
        activePagerClass: 'activeSlide', // class name used for the active pager link
        after:            null,     // transition callback (scope set to element that was shown):  function(currSlideElement, nextSlideElement, options, forwardFlag)
        allowPagerClickBubble: false, // allows or prevents click event on pager anchors from bubbling
        animIn:           null,     // properties that define how the slide animates in
        animInDelay:      0,        // allows delay before next slide transitions in
        animOut:          null,     // properties that define how the slide animates out
        animOutDelay:     0,        // allows delay before current slide transitions out
        aspect:           false,    // preserve aspect ratio during fit resizing, cropping if necessary (must be used with fit option)
        autostop:         0,        // true to end slideshow after X transitions (where X == slide count)
        autostopCount:    0,        // number of transitions (optionally used with autostop to define X)
        backwards:        false,    // true to start slideshow at last slide and move backwards through the stack
        before:           null,     // transition callback (scope set to element to be shown):     function(currSlideElement, nextSlideElement, options, forwardFlag)
        center:           null,     // set to true to have cycle add top/left margin to each slide (use with width and height options)
        cleartype:        !$.support.opacity,  // true if clearType corrections should be applied (for IE)
        cleartypeNoBg:    false,    // set to true to disable extra cleartype fixing (leave false to force background color setting on slides)
        containerResize:  1,        // resize container to fit largest slide
        containerResizeHeight:  0,  // resize containers height to fit the largest slide but leave the width dynamic
        continuous:       0,        // true to start next transition immediately after current one completes
        cssAfter:         null,     // properties that defined the state of the slide after transitioning out
        cssBefore:        null,     // properties that define the initial state of the slide before transitioning in
        delay:            0,        // additional delay (in ms) for first transition (hint: can be negative)
        easeIn:           null,     // easing for "in" transition
        easeOut:          null,     // easing for "out" transition
        easing:           null,     // easing method for both in and out transitions
        end:              null,     // callback invoked when the slideshow terminates (use with autostop or nowrap options): function(options)
        fastOnEvent:      0,        // force fast transitions when triggered manually (via pager or prev/next); value == time in ms
        fit:              0,        // force slides to fit container
        fx:               'fade',   // name of transition effect (or comma separated names, ex: 'fade,scrollUp,shuffle')
        fxFn:             null,     // function used to control the transition: function(currSlideElement, nextSlideElement, options, afterCalback, forwardFlag)
        height:           'auto',   // container height (if the 'fit' option is true, the slides will be set to this height as well)
        manualTrump:      true,     // causes manual transition to stop an active transition instead of being ignored
        metaAttr:         'cycle',  // data- attribute that holds the option data for the slideshow
        next:             null,     // element, jQuery object, or jQuery selector string for the element to use as event trigger for next slide
        nowrap:           0,        // true to prevent slideshow from wrapping
        onPagerEvent:     null,     // callback fn for pager events: function(zeroBasedSlideIndex, slideElement)
        onPrevNextEvent:  null,     // callback fn for prev/next events: function(isNext, zeroBasedSlideIndex, slideElement)
        pager:            null,     // element, jQuery object, or jQuery selector string for the element to use as pager container
        pagerAnchorBuilder: null,   // callback fn for building anchor links:  function(index, DOMelement)
        pagerEvent:       'click.cycle', // name of event which drives the pager navigation
        pause:            0,        // true to enable "pause on hover"
        pauseOnPagerHover: 0,       // true to pause when hovering over pager link
        prev:             null,     // element, jQuery object, or jQuery selector string for the element to use as event trigger for previous slide
        prevNextEvent:    'click.cycle',// event which drives the manual transition to the previous or next slide
        random:           0,        // true for random, false for sequence (not applicable to shuffle fx)
        randomizeEffects: 1,        // valid when multiple effects are used; true to make the effect sequence random
        requeueOnImageNotLoaded: true, // requeue the slideshow if any image slides are not yet loaded
        requeueTimeout:   250,      // ms delay for requeue
        rev:              0,        // causes animations to transition in reverse (for effects that support it such as scrollHorz/scrollVert/shuffle)
        shuffle:          null,     // coords for shuffle animation, ex: { top:15, left: 200 }
        skipInitializationCallbacks: false, // set to true to disable the first before/after callback that occurs prior to any transition
        slideExpr:        null,     // expression for selecting slides (if something other than all children is required)
        slideResize:      1,        // force slide width/height to fixed size before every transition
        speed:            1000,     // speed of the transition (any valid fx speed value)
        speedIn:          null,     // speed of the 'in' transition
        speedOut:         null,     // speed of the 'out' transition
        startingSlide:    undefined,// zero-based index of the first slide to be displayed
        sync:             1,        // true if in/out transitions should occur simultaneously
        timeout:          4000,     // milliseconds between slide transitions (0 to disable auto advance)
        timeoutFn:        null,     // callback for determining per-slide timeout value:  function(currSlideElement, nextSlideElement, options, forwardFlag)
        updateActivePagerLink: null,// callback fn invoked to update the active pager link (adds/removes activePagerClass style)
        width:            null      // container width (if the 'fit' option is true, the slides will be set to this width as well)
    };

    })(jQuery);


    /*!
     * jQuery Cycle Plugin Transition Definitions
     * This script is a plugin for the jQuery Cycle Plugin
     * Examples and documentation at: http://malsup.com/jquery/cycle/
     * Copyright (c) 2007-2010 M. Alsup
     * Version:	 2.73
     * Dual licensed under the MIT and GPL licenses:
     * http://www.opensource.org/licenses/mit-license.php
     * http://www.gnu.org/licenses/gpl.html
     */
    (function($) {
    "use strict";

    //
    // These functions define slide initialization and properties for the named
    // transitions. To save file size feel free to remove any of these that you
    // don't need.
    //
    $.fn.cycle.transitions.none = function($cont, $slides, opts) {
        opts.fxFn = function(curr,next,opts,after){
            $(next).show();
            $(curr).hide();
            after();
        };
    };

    // not a cross-fade, fadeout only fades out the top slide
    $.fn.cycle.transitions.fadeout = function($cont, $slides, opts) {
        $slides.not(':eq('+opts.currSlide+')').css({ display: 'block', 'opacity': 1 });
        opts.before.push(function(curr,next,opts,w,h,rev) {
            $(curr).css('zIndex',opts.slideCount + (rev !== true ? 1 : 0));
            $(next).css('zIndex',opts.slideCount + (rev !== true ? 0 : 1));
        });
        opts.animIn.opacity = 1;
        opts.animOut.opacity = 0;
        opts.cssBefore.opacity = 1;
        opts.cssBefore.display = 'block';
        opts.cssAfter.zIndex = 0;
    };

    // scrollUp/Down/Left/Right
    $.fn.cycle.transitions.scrollUp = function($cont, $slides, opts) {
        $cont.css('overflow','hidden');
        opts.before.push($.fn.cycle.commonReset);
        var h = $cont.height();
        opts.cssBefore.top = h;
        opts.cssBefore.left = 0;
        opts.cssFirst.top = 0;
        opts.animIn.top = 0;
        opts.animOut.top = -h;
    };
    $.fn.cycle.transitions.scrollDown = function($cont, $slides, opts) {
        $cont.css('overflow','hidden');
        opts.before.push($.fn.cycle.commonReset);
        var h = $cont.height();
        opts.cssFirst.top = 0;
        opts.cssBefore.top = -h;
        opts.cssBefore.left = 0;
        opts.animIn.top = 0;
        opts.animOut.top = h;
    };
    $.fn.cycle.transitions.scrollLeft = function($cont, $slides, opts) {
        $cont.css('overflow','hidden');
        opts.before.push($.fn.cycle.commonReset);
        var w = $cont.width();
        opts.cssFirst.left = 0;
        opts.cssBefore.left = w;
        opts.cssBefore.top = 0;
        opts.animIn.left = 0;
        opts.animOut.left = 0-w;
    };
    $.fn.cycle.transitions.scrollRight = function($cont, $slides, opts) {
        $cont.css('overflow','hidden');
        opts.before.push($.fn.cycle.commonReset);
        var w = $cont.width();
        opts.cssFirst.left = 0;
        opts.cssBefore.left = -w;
        opts.cssBefore.top = 0;
        opts.animIn.left = 0;
        opts.animOut.left = w;
    };
    $.fn.cycle.transitions.scrollHorz = function($cont, $slides, opts) {
        $cont.css('overflow','hidden').width();
        opts.before.push(function(curr, next, opts, fwd) {
            if (opts.rev)
                fwd = !fwd;
            $.fn.cycle.commonReset(curr,next,opts);
            opts.cssBefore.left = fwd ? (next.cycleW-1) : (1-next.cycleW);
            opts.animOut.left = fwd ? -curr.cycleW : curr.cycleW;
        });
        opts.cssFirst.left = 0;
        opts.cssBefore.top = 0;
        opts.animIn.left = 0;
        opts.animOut.top = 0;
    };
    $.fn.cycle.transitions.scrollVert = function($cont, $slides, opts) {
        $cont.css('overflow','hidden');
        opts.before.push(function(curr, next, opts, fwd) {
            if (opts.rev)
                fwd = !fwd;
            $.fn.cycle.commonReset(curr,next,opts);
            opts.cssBefore.top = fwd ? (1-next.cycleH) : (next.cycleH-1);
            opts.animOut.top = fwd ? curr.cycleH : -curr.cycleH;
        });
        opts.cssFirst.top = 0;
        opts.cssBefore.left = 0;
        opts.animIn.top = 0;
        opts.animOut.left = 0;
    };

    // slideX/slideY
    $.fn.cycle.transitions.slideX = function($cont, $slides, opts) {
        opts.before.push(function(curr, next, opts) {
            $(opts.elements).not(curr).hide();
            $.fn.cycle.commonReset(curr,next,opts,false,true);
            opts.animIn.width = next.cycleW;
        });
        opts.cssBefore.left = 0;
        opts.cssBefore.top = 0;
        opts.cssBefore.width = 0;
        opts.animIn.width = 'show';
        opts.animOut.width = 0;
    };
    $.fn.cycle.transitions.slideY = function($cont, $slides, opts) {
        opts.before.push(function(curr, next, opts) {
            $(opts.elements).not(curr).hide();
            $.fn.cycle.commonReset(curr,next,opts,true,false);
            opts.animIn.height = next.cycleH;
        });
        opts.cssBefore.left = 0;
        opts.cssBefore.top = 0;
        opts.cssBefore.height = 0;
        opts.animIn.height = 'show';
        opts.animOut.height = 0;
    };

    // shuffle
    $.fn.cycle.transitions.shuffle = function($cont, $slides, opts) {
        var i, w = $cont.css('overflow', 'visible').width();
        $slides.css({left: 0, top: 0});
        opts.before.push(function(curr,next,opts) {
            $.fn.cycle.commonReset(curr,next,opts,true,true,true);
        });
        // only adjust speed once!
        if (!opts.speedAdjusted) {
            opts.speed = opts.speed / 2; // shuffle has 2 transitions
            opts.speedAdjusted = true;
        }
        opts.random = 0;
        opts.shuffle = opts.shuffle || {left:-w, top:15};
        opts.els = [];
        for (i=0; i < $slides.length; i++)
            opts.els.push($slides[i]);

        for (i=0; i < opts.currSlide; i++)
            opts.els.push(opts.els.shift());

        // custom transition fn (hat tip to Benjamin Sterling for this bit of sweetness!)
        opts.fxFn = function(curr, next, opts, cb, fwd) {
            if (opts.rev)
                fwd = !fwd;
            var $el = fwd ? $(curr) : $(next);
            $(next).css(opts.cssBefore);
            var count = opts.slideCount;
            $el.animate(opts.shuffle, opts.speedIn, opts.easeIn, function() {
                var hops = $.fn.cycle.hopsFromLast(opts, fwd);
                for (var k=0; k < hops; k++) {
                    if (fwd)
                        opts.els.push(opts.els.shift());
                    else
                        opts.els.unshift(opts.els.pop());
                }
                if (fwd) {
                    for (var i=0, len=opts.els.length; i < len; i++)
                        $(opts.els[i]).css('z-index', len-i+count);
                }
                else {
                    var z = $(curr).css('z-index');
                    $el.css('z-index', parseInt(z,10)+1+count);
                }
                $el.animate({left:0, top:0}, opts.speedOut, opts.easeOut, function() {
                    $(fwd ? this : curr).hide();
                    if (cb) cb();
                });
            });
        };
        $.extend(opts.cssBefore, { display: 'block', opacity: 1, top: 0, left: 0 });
    };

    // turnUp/Down/Left/Right
    $.fn.cycle.transitions.turnUp = function($cont, $slides, opts) {
        opts.before.push(function(curr, next, opts) {
            $.fn.cycle.commonReset(curr,next,opts,true,false);
            opts.cssBefore.top = next.cycleH;
            opts.animIn.height = next.cycleH;
            opts.animOut.width = next.cycleW;
        });
        opts.cssFirst.top = 0;
        opts.cssBefore.left = 0;
        opts.cssBefore.height = 0;
        opts.animIn.top = 0;
        opts.animOut.height = 0;
    };
    $.fn.cycle.transitions.turnDown = function($cont, $slides, opts) {
        opts.before.push(function(curr, next, opts) {
            $.fn.cycle.commonReset(curr,next,opts,true,false);
            opts.animIn.height = next.cycleH;
            opts.animOut.top   = curr.cycleH;
        });
        opts.cssFirst.top = 0;
        opts.cssBefore.left = 0;
        opts.cssBefore.top = 0;
        opts.cssBefore.height = 0;
        opts.animOut.height = 0;
    };
    $.fn.cycle.transitions.turnLeft = function($cont, $slides, opts) {
        opts.before.push(function(curr, next, opts) {
            $.fn.cycle.commonReset(curr,next,opts,false,true);
            opts.cssBefore.left = next.cycleW;
            opts.animIn.width = next.cycleW;
        });
        opts.cssBefore.top = 0;
        opts.cssBefore.width = 0;
        opts.animIn.left = 0;
        opts.animOut.width = 0;
    };
    $.fn.cycle.transitions.turnRight = function($cont, $slides, opts) {
        opts.before.push(function(curr, next, opts) {
            $.fn.cycle.commonReset(curr,next,opts,false,true);
            opts.animIn.width = next.cycleW;
            opts.animOut.left = curr.cycleW;
        });
        $.extend(opts.cssBefore, { top: 0, left: 0, width: 0 });
        opts.animIn.left = 0;
        opts.animOut.width = 0;
    };

    // zoom
    $.fn.cycle.transitions.zoom = function($cont, $slides, opts) {
        opts.before.push(function(curr, next, opts) {
            $.fn.cycle.commonReset(curr,next,opts,false,false,true);
            opts.cssBefore.top = next.cycleH/2;
            opts.cssBefore.left = next.cycleW/2;
            $.extend(opts.animIn, { top: 0, left: 0, width: next.cycleW, height: next.cycleH });
            $.extend(opts.animOut, { width: 0, height: 0, top: curr.cycleH/2, left: curr.cycleW/2 });
        });
        opts.cssFirst.top = 0;
        opts.cssFirst.left = 0;
        opts.cssBefore.width = 0;
        opts.cssBefore.height = 0;
    };

    // fadeZoom
    $.fn.cycle.transitions.fadeZoom = function($cont, $slides, opts) {
        opts.before.push(function(curr, next, opts) {
            $.fn.cycle.commonReset(curr,next,opts,false,false);
            opts.cssBefore.left = next.cycleW/2;
            opts.cssBefore.top = next.cycleH/2;
            $.extend(opts.animIn, { top: 0, left: 0, width: next.cycleW, height: next.cycleH });
        });
        opts.cssBefore.width = 0;
        opts.cssBefore.height = 0;
        opts.animOut.opacity = 0;
    };

    // blindX
    $.fn.cycle.transitions.blindX = function($cont, $slides, opts) {
        var w = $cont.css('overflow','hidden').width();
        opts.before.push(function(curr, next, opts) {
            $.fn.cycle.commonReset(curr,next,opts);
            opts.animIn.width = next.cycleW;
            opts.animOut.left   = curr.cycleW;
        });
        opts.cssBefore.left = w;
        opts.cssBefore.top = 0;
        opts.animIn.left = 0;
        opts.animOut.left = w;
    };
    // blindY
    $.fn.cycle.transitions.blindY = function($cont, $slides, opts) {
        var h = $cont.css('overflow','hidden').height();
        opts.before.push(function(curr, next, opts) {
            $.fn.cycle.commonReset(curr,next,opts);
            opts.animIn.height = next.cycleH;
            opts.animOut.top   = curr.cycleH;
        });
        opts.cssBefore.top = h;
        opts.cssBefore.left = 0;
        opts.animIn.top = 0;
        opts.animOut.top = h;
    };
    // blindZ
    $.fn.cycle.transitions.blindZ = function($cont, $slides, opts) {
        var h = $cont.css('overflow','hidden').height();
        var w = $cont.width();
        opts.before.push(function(curr, next, opts) {
            $.fn.cycle.commonReset(curr,next,opts);
            opts.animIn.height = next.cycleH;
            opts.animOut.top   = curr.cycleH;
        });
        opts.cssBefore.top = h;
        opts.cssBefore.left = w;
        opts.animIn.top = 0;
        opts.animIn.left = 0;
        opts.animOut.top = h;
        opts.animOut.left = w;
    };

    // growX - grow horizontally from centered 0 width
    $.fn.cycle.transitions.growX = function($cont, $slides, opts) {
        opts.before.push(function(curr, next, opts) {
            $.fn.cycle.commonReset(curr,next,opts,false,true);
            opts.cssBefore.left = this.cycleW/2;
            opts.animIn.left = 0;
            opts.animIn.width = this.cycleW;
            opts.animOut.left = 0;
        });
        opts.cssBefore.top = 0;
        opts.cssBefore.width = 0;
    };
    // growY - grow vertically from centered 0 height
    $.fn.cycle.transitions.growY = function($cont, $slides, opts) {
        opts.before.push(function(curr, next, opts) {
            $.fn.cycle.commonReset(curr,next,opts,true,false);
            opts.cssBefore.top = this.cycleH/2;
            opts.animIn.top = 0;
            opts.animIn.height = this.cycleH;
            opts.animOut.top = 0;
        });
        opts.cssBefore.height = 0;
        opts.cssBefore.left = 0;
    };

    // curtainX - squeeze in both edges horizontally
    $.fn.cycle.transitions.curtainX = function($cont, $slides, opts) {
        opts.before.push(function(curr, next, opts) {
            $.fn.cycle.commonReset(curr,next,opts,false,true,true);
            opts.cssBefore.left = next.cycleW/2;
            opts.animIn.left = 0;
            opts.animIn.width = this.cycleW;
            opts.animOut.left = curr.cycleW/2;
            opts.animOut.width = 0;
        });
        opts.cssBefore.top = 0;
        opts.cssBefore.width = 0;
    };
    // curtainY - squeeze in both edges vertically
    $.fn.cycle.transitions.curtainY = function($cont, $slides, opts) {
        opts.before.push(function(curr, next, opts) {
            $.fn.cycle.commonReset(curr,next,opts,true,false,true);
            opts.cssBefore.top = next.cycleH/2;
            opts.animIn.top = 0;
            opts.animIn.height = next.cycleH;
            opts.animOut.top = curr.cycleH/2;
            opts.animOut.height = 0;
        });
        opts.cssBefore.height = 0;
        opts.cssBefore.left = 0;
    };

    // cover - curr slide covered by next slide
    $.fn.cycle.transitions.cover = function($cont, $slides, opts) {
        var d = opts.direction || 'left';
        var w = $cont.css('overflow','hidden').width();
        var h = $cont.height();
        opts.before.push(function(curr, next, opts) {
            $.fn.cycle.commonReset(curr,next,opts);
            opts.cssAfter.display = '';
            if (d == 'right')
                opts.cssBefore.left = -w;
            else if (d == 'up')
                opts.cssBefore.top = h;
            else if (d == 'down')
                opts.cssBefore.top = -h;
            else
                opts.cssBefore.left = w;
        });
        opts.animIn.left = 0;
        opts.animIn.top = 0;
        opts.cssBefore.top = 0;
        opts.cssBefore.left = 0;
    };

    // uncover - curr slide moves off next slide
    $.fn.cycle.transitions.uncover = function($cont, $slides, opts) {
        var d = opts.direction || 'left';
        var w = $cont.css('overflow','hidden').width();
        var h = $cont.height();
        opts.before.push(function(curr, next, opts) {
            $.fn.cycle.commonReset(curr,next,opts,true,true,true);
            if (d == 'right')
                opts.animOut.left = w;
            else if (d == 'up')
                opts.animOut.top = -h;
            else if (d == 'down')
                opts.animOut.top = h;
            else
                opts.animOut.left = -w;
        });
        opts.animIn.left = 0;
        opts.animIn.top = 0;
        opts.cssBefore.top = 0;
        opts.cssBefore.left = 0;
    };

    // toss - move top slide and fade away
    $.fn.cycle.transitions.toss = function($cont, $slides, opts) {
        var w = $cont.css('overflow','visible').width();
        var h = $cont.height();
        opts.before.push(function(curr, next, opts) {
            $.fn.cycle.commonReset(curr,next,opts,true,true,true);
            // provide default toss settings if animOut not provided
            if (!opts.animOut.left && !opts.animOut.top)
                $.extend(opts.animOut, { left: w*2, top: -h/2, opacity: 0 });
            else
                opts.animOut.opacity = 0;
        });
        opts.cssBefore.left = 0;
        opts.cssBefore.top = 0;
        opts.animIn.left = 0;
    };

    // wipe - clip animation
    $.fn.cycle.transitions.wipe = function($cont, $slides, opts) {
        var w = $cont.css('overflow','hidden').width();
        var h = $cont.height();
        opts.cssBefore = opts.cssBefore || {};
        var clip;
        if (opts.clip) {
            if (/l2r/.test(opts.clip))
                clip = 'rect(0px 0px '+h+'px 0px)';
            else if (/r2l/.test(opts.clip))
                clip = 'rect(0px '+w+'px '+h+'px '+w+'px)';
            else if (/t2b/.test(opts.clip))
                clip = 'rect(0px '+w+'px 0px 0px)';
            else if (/b2t/.test(opts.clip))
                clip = 'rect('+h+'px '+w+'px '+h+'px 0px)';
            else if (/zoom/.test(opts.clip)) {
                var top = parseInt(h/2,10);
                var left = parseInt(w/2,10);
                clip = 'rect('+top+'px '+left+'px '+top+'px '+left+'px)';
            }
        }

        opts.cssBefore.clip = opts.cssBefore.clip || clip || 'rect(0px 0px 0px 0px)';

        var d = opts.cssBefore.clip.match(/(\d+)/g);
        var t = parseInt(d[0],10), r = parseInt(d[1],10), b = parseInt(d[2],10), l = parseInt(d[3],10);

        opts.before.push(function(curr, next, opts) {
            if (curr == next) return;
            var $curr = $(curr), $next = $(next);
            $.fn.cycle.commonReset(curr,next,opts,true,true,false);
            opts.cssAfter.display = 'block';

            var step = 1, count = parseInt((opts.speedIn / 13),10) - 1;
            (function f() {
                var tt = t ? t - parseInt(step * (t/count),10) : 0;
                var ll = l ? l - parseInt(step * (l/count),10) : 0;
                var bb = b < h ? b + parseInt(step * ((h-b)/count || 1),10) : h;
                var rr = r < w ? r + parseInt(step * ((w-r)/count || 1),10) : w;
                $next.css({ clip: 'rect('+tt+'px '+rr+'px '+bb+'px '+ll+'px)' });
                (step++ <= count) ? setTimeout(f, 13) : $curr.css('display', 'none');
            })();
        });
        $.extend(opts.cssBefore, { display: 'block', opacity: 1, top: 0, left: 0 });
        opts.animIn	   = { left: 0 };
        opts.animOut   = { left: 0 };
    };

    })(jQuery);
;
/**
 *  @file
 * A simple jQuery Cycle Div Slideshow Rotator.
 */

/**
 * This will set our initial behavior, by starting up each individual slideshow.
 */
(function ($, Drupal, drupalSettings) {
    Drupal.behaviors.viewsSlideshowCycle = {
        attach: function (context) {
            $('.views_slideshow_cycle_main:not(.viewsSlideshowCycle-processed)', context).addClass('viewsSlideshowCycle-processed').each(function () {
                var fullId = '#' + $(this).attr('id');
                var settings = drupalSettings.viewsSlideshowCycle[fullId];
                settings.targetId = '#' + $(fullId + " :first").attr('id');

                settings.slideshowId = settings.targetId.replace('#views_slideshow_cycle_teaser_section_', '');
                // Pager after function.
                var pager_after_fn = function (curr, next, opts) {
                    // Need to do some special handling on first load.
                    var slideNum = opts.currSlide;
                    if (typeof settings.processedAfter == 'undefined' || !settings.processedAfter) {
                        settings.processedAfter = 1;
                        slideNum = (typeof settings.opts.startingSlide == 'undefined') ? 0 : settings.opts.startingSlide;
                    }
                    Drupal.viewsSlideshow.action({ "action": 'transitionEnd', "slideshowID": settings.slideshowId, "slideNum": slideNum });
                }
                // Pager before function.
                var pager_before_fn = function (curr, next, opts) {
                    var slideNum = opts.nextSlide;

                    // Remember last slide.
                    if (settings.remember_slide) {
                        createCookie(settings.vss_id, slideNum, settings.remember_slide_days);
                    }

                    // Make variable height.
                    if (!settings.fixed_height) {
                        // Get the height of the current slide.
                        var $ht = $(next).height();
                        // Set the container's height to that of the current slide.
                        $(next).parent().animate({height: $ht});
                    }

                    // Need to do some special handling on first load.
                    if (typeof settings.processedBefore == 'undefined' || !settings.processedBefore) {
                        settings.processedBefore = 1;
                        slideNum = (typeof opts.startingSlide == 'undefined') ? 0 : opts.startingSlide;
                    }

                    Drupal.viewsSlideshow.action({ "action": 'transitionBegin', "slideshowID": settings.slideshowId, "slideNum": slideNum });
                }
                settings.loaded = false;

                settings.opts = {
                    speed:settings.speed,
                    timeout:settings.timeout,
                    delay:settings.delay,
                    sync:settings.sync,
                    random:settings.random,
                    nowrap:settings.nowrap,
                    after:pager_after_fn,
                    before:pager_before_fn,
                    cleartype:(settings.cleartype) ? true : false,
                    cleartypeNoBg:(settings.cleartypenobg) ? true : false
                }

                // Set the starting slide if we are supposed to remember the slide.
                if (settings.remember_slide) {
                    var startSlide = readCookie(settings.vss_id);
                    if (startSlide == null) {
                        startSlide = 0;
                    }
                    settings.opts.startingSlide = parseInt(startSlide);
                }

                if (settings.effect == 'none') {
                    settings.opts.speed = 1;
                }
                else {
                    settings.opts.fx = settings.effect;
                }

                // Take starting item from fragment.
                var hash = location.hash;
                if (hash) {
                    var hash = hash.replace('#', '');
                    var aHash = hash.split(';');
                    var aHashLen = aHash.length;

                    // Loop through all the possible starting points.
                    for (var i = 0; i < aHashLen; i++) {
                        // Split the hash into two parts. One part is the slideshow id the
                        // other is the slide number.
                        var initialInfo = aHash[i].split(':');
                        // The id in the hash should match our slideshow.
                        // The slide number chosen shouldn't be larger than the number of
                        // slides we have.
                        if (settings.slideshowId == initialInfo[0] && settings.num_divs > initialInfo[1]) {
                            settings.opts.startingSlide = parseInt(initialInfo[1]);
                        }
                    }
                }

                // Pause on hover.
                if (settings.pause) {
                    var mouseIn = function () {
                        Drupal.viewsSlideshow.action({ "action": 'pause', "slideshowID": settings.slideshowId });
                    }

                    var mouseOut = function () {
                        Drupal.viewsSlideshow.action({ "action": 'play', "slideshowID": settings.slideshowId });
                    }

                    if (jQuery.fn.hoverIntent) {
                        $('#views_slideshow_cycle_teaser_section_' + settings.vss_id).hoverIntent(mouseIn, mouseOut);
                    }
                    else {
                        $('#views_slideshow_cycle_teaser_section_' + settings.vss_id).hover(mouseIn, mouseOut);
                    }
                }

                // Pause on clicking of the slide.
                if (settings.pause_on_click) {
                    $('#views_slideshow_cycle_teaser_section_' + settings.vss_id).click(function () {
                        Drupal.viewsSlideshow.action({ "action": 'pause', "slideshowID": settings.slideshowId, "force": true });
                    });
                }

                if (typeof JSON != 'undefined' && typeof settings.advanced_options != 'undefined') {
                    var advancedOptions = JSON.parse(settings.advanced_options);
                    for (var option in advancedOptions) {
                        switch (option) {

                            // Standard Options.
                            case "activePagerClass":
                            case "allowPagerClickBubble":
                            case "autostop":
                            case "autostopCount":
                            case "backwards":
                            case "bounce":
                            case "cleartype":
                            case "cleartypeNoBg":
                            case "containerResize":
                            case "continuous":
                            case "delay":
                            case "easeIn":
                            case "easeOut":
                            case "easing":
                            case "fastOnEvent":
                            case "fit":
                            case "fx":
                            case "height":
                            case "manualTrump":
                            case "metaAttr":
                            case "next":
                            case "nowrap":
                            case "pager":
                            case "pagerEvent":
                            case "pause":
                            case "pauseOnPagerHover":
                            case "prev":
                            case "prevNextEvent":
                            case "random":
                            case "randomizeEffects":
                            case "requeueOnImageNotLoaded":
                            case "requeueTimeout":
                            case "rev":
                            case "slideExpr":
                            case "slideResize":
                            case "speed":
                            case "speedIn":
                            case "speedOut":
                            case "startingSlide":
                            case "sync":
                            case "timeout":
                            case "width":
                                var optionValue = advancedOptions[option];
                                optionValue = Drupal.viewsSlideshowCycle.advancedOptionCleanup(optionValue);
                                settings.opts[option] = optionValue;
                                break;

                            // These process options that look like {top:50, bottom:20}.
                            case "animIn":
                            case "animOut":
                            case "cssBefore":
                            case "cssAfter":
                            case "shuffle":
                                var cssValue = advancedOptions[option];
                                cssValue = Drupal.viewsSlideshowCycle.advancedOptionCleanup(cssValue);
                                settings.opts[option] = eval('(' + cssValue + ')');
                                break;

                            // These options have their own functions.
                            case "after":
                                var afterValue = advancedOptions[option];
                                afterValue = Drupal.viewsSlideshowCycle.advancedOptionCleanup(afterValue);
                                // Transition callback (scope set to element that was shown): function(currSlideElement, nextSlideElement, options, forwardFlag)
                                settings.opts[option] = function (currSlideElement, nextSlideElement, options, forwardFlag) {
                                    pager_after_fn(currSlideElement, nextSlideElement, options);
                                    eval(afterValue);
                                }
                                break;

                            case "before":
                                var beforeValue = advancedOptions[option];
                                beforeValue = Drupal.viewsSlideshowCycle.advancedOptionCleanup(beforeValue);
                                // Transition callback (scope set to element to be shown):     function(currSlideElement, nextSlideElement, options, forwardFlag)
                                settings.opts[option] = function (currSlideElement, nextSlideElement, options, forwardFlag) {
                                    pager_before_fn(currSlideElement, nextSlideElement, options);
                                    eval(beforeValue);
                                }
                                break;

                            case "end":
                                var endValue = advancedOptions[option];
                                endValue = Drupal.viewsSlideshowCycle.advancedOptionCleanup(endValue);
                                // Callback invoked when the slideshow terminates (use with autostop or nowrap options): function(options)
                                settings.opts[option] = function (options) {
                                    eval(endValue);
                                }
                                break;

                            case "fxFn":
                                var fxFnValue = advancedOptions[option];
                                fxFnValue = Drupal.viewsSlideshowCycle.advancedOptionCleanup(fxFnValue);
                                // Function used to control the transition: function(currSlideElement, nextSlideElement, options, afterCalback, forwardFlag)
                                settings.opts[option] = function (currSlideElement, nextSlideElement, options, afterCalback, forwardFlag) {
                                    eval(fxFnValue);
                                }
                                break;

                            case "onPagerEvent":
                                var onPagerEventValue = advancedOptions[option];
                                onPagerEventValue = Drupal.viewsSlideshowCycle.advancedOptionCleanup(onPagerEventValue);
                                settings.opts[option] = function (zeroBasedSlideIndex, slideElement) {
                                    eval(onPagerEventValue);
                                }
                                break;

                            case "onPrevNextEvent":
                                var onPrevNextEventValue = advancedOptions[option];
                                onPrevNextEventValue = Drupal.viewsSlideshowCycle.advancedOptionCleanup(onPrevNextEventValue);
                                settings.opts[option] = function (isNext, zeroBasedSlideIndex, slideElement) {
                                    eval(onPrevNextEventValue);
                                }
                                break;

                            case "pagerAnchorBuilder":
                                var pagerAnchorBuilderValue = advancedOptions[option];
                                pagerAnchorBuilderValue = Drupal.viewsSlideshowCycle.advancedOptionCleanup(pagerAnchorBuilderValue);
                                // Callback fn for building anchor links:  function(index, DOMelement)
                                settings.opts[option] = function (index, DOMelement) {
                                    var returnVal = '';
                                    eval(pagerAnchorBuilderValue);
                                    return returnVal;
                                }
                                break;

                            case "pagerClick":
                                var pagerClickValue = advancedOptions[option];
                                pagerClickValue = Drupal.viewsSlideshowCycle.advancedOptionCleanup(pagerClickValue);
                                // Callback fn for pager clicks:    function(zeroBasedSlideIndex, slideElement)
                                settings.opts[option] = function (zeroBasedSlideIndex, slideElement) {
                                    eval(pagerClickValue);
                                }
                                break;

                            case "paused":
                                var pausedValue = advancedOptions[option];
                                pausedValue = Drupal.viewsSlideshowCycle.advancedOptionCleanup(pausedValue);
                                // Undocumented callback when slideshow is paused:    function(cont, opts, byHover)
                                settings.opts[option] = function (cont, opts, byHover) {
                                    eval(pausedValue);
                                }
                                break;

                            case "resumed":
                                var resumedValue = advancedOptions[option];
                                resumedValue = Drupal.viewsSlideshowCycle.advancedOptionCleanup(resumedValue);
                                // Undocumented callback when slideshow is resumed:    function(cont, opts, byHover)
                                settings.opts[option] = function (cont, opts, byHover) {
                                    eval(resumedValue);
                                }
                                break;

                            case "timeoutFn":
                                var timeoutFnValue = advancedOptions[option];
                                timeoutFnValue = Drupal.viewsSlideshowCycle.advancedOptionCleanup(timeoutFnValue);
                                settings.opts[option] = function (currSlideElement, nextSlideElement, options, forwardFlag) {
                                    eval(timeoutFnValue);
                                }
                                break;

                            case "updateActivePagerLink":
                                var updateActivePagerLinkValue = advancedOptions[option];
                                updateActivePagerLinkValue = Drupal.viewsSlideshowCycle.advancedOptionCleanup(updateActivePagerLinkValue);
                                // Callback fn invoked to update the active pager link (adds/removes activePagerClass style)
                                settings.opts[option] = function (pager, currSlideIndex) {
                                    eval(updateActivePagerLinkValue);
                                }
                                break;
                        }
                    }
                }

                // If selected wait for the images to be loaded.
                // otherwise just load the slideshow.
                if (settings.wait_for_image_load) {
                    // For IE/Chrome/Opera we if there are images then we need to make
                    // sure the images are loaded before starting the slideshow.
                    settings.totalImages = $(settings.targetId + ' img').length;
                    if (settings.totalImages) {
                        settings.loadedImages = 0;

                        // Add a load event for each image.
                        $(settings.targetId + ' img').each(function () {
                            var $imageElement = $(this);
                            $imageElement.bind('load', function () {
                                Drupal.viewsSlideshowCycle.imageWait(fullId);
                            });

                            // Removing the source and adding it again will fire the load event.
                            var imgSrc = $imageElement.attr('src');
                            $imageElement.attr('src', '');
                            $imageElement.attr('src', imgSrc);
                        });

                        // We need to set a timeout so that the slideshow doesn't wait
                        // indefinitely for all images to load.
                        setTimeout("Drupal.viewsSlideshowCycle.load('" + fullId + "')", settings.wait_for_image_load_timeout);
                    }
                    else {
                        Drupal.viewsSlideshowCycle.load(fullId);
                    }
                }
                else {
                    Drupal.viewsSlideshowCycle.load(fullId);
                }
            });
        }
    };

    Drupal.viewsSlideshowCycle = Drupal.viewsSlideshowCycle || {};

    // Cleanup the values of advanced options.
    Drupal.viewsSlideshowCycle.advancedOptionCleanup = function (value) {
        value = $.trim(value);
        value = value.replace(/\n/g, '');
        if (!isNaN(parseInt(value))) {
            value = parseInt(value);
        }
        else if (value.toLowerCase() == 'true') {
            value = true;
        }
        else if (value.toLowerCase() == 'false') {
            value = false;
        }

        return value;
    }

    // This checks to see if all the images have been loaded.
    // If they have then it starts the slideshow.
    Drupal.viewsSlideshowCycle.imageWait = function (fullId) {
        if (++drupalSettings.viewsSlideshowCycle[fullId].loadedImages == drupalSettings.viewsSlideshowCycle[fullId].totalImages) {
            Drupal.viewsSlideshowCycle.load(fullId);
        }
    };

    // Start the slideshow.
    Drupal.viewsSlideshowCycle.load = function (fullId) {
        var settings = drupalSettings.viewsSlideshowCycle[fullId];

        // Make sure the slideshow isn't already loaded.
        if (!settings.loaded) {
            $(settings.targetId).cycle(settings.opts);
            settings.loaded = true;

            // Start Paused.
            if (settings.start_paused) {
                Drupal.viewsSlideshow.action({ "action": 'pause', "slideshowID": settings.slideshowId, "force": true });
            }

            // Pause if hidden.
            if (settings.pause_when_hidden) {
                var checkPause = function (settings) {
                    // If the slideshow is visible and it is paused then resume.
                    // otherwise if the slideshow is not visible and it is not paused then
                    // pause it.
                    var visible = viewsSlideshowCycleIsVisible(settings.targetId, settings.pause_when_hidden_type, settings.amount_allowed_visible);
                    if (visible) {
                        Drupal.viewsSlideshow.action({ "action": 'play', "slideshowID": settings.slideshowId });
                    }
                    else {
                        Drupal.viewsSlideshow.action({ "action": 'pause', "slideshowID": settings.slideshowId });
                    }
                }

                // Check when scrolled.
                $(window).scroll(function () {
                    checkPause(settings);
                });

                // Check when the window is resized.
                $(window).resize(function () {
                    checkPause(settings);
                });
            }
        }
    };

    Drupal.viewsSlideshowCycle.pause = function (options) {
        // Eat TypeError, cycle doesn't handle pause well if options isn't defined.
        try {
            if (options.pause_in_middle && $.fn.pause) {
                $('#views_slideshow_cycle_teaser_section_' + options.slideshowID).pause();
            }
            else {
                $('#views_slideshow_cycle_teaser_section_' + options.slideshowID).cycle('pause');
            }
        }
        catch (e) {
            if (!e instanceof TypeError) {
                throw e;
            }
        }
    };

    Drupal.viewsSlideshowCycle.play = function (options) {
        drupalSettings.viewsSlideshowCycle['#views_slideshow_cycle_main_' + options.slideshowID].paused = false;
        if (options.pause_in_middle && $.fn.resume) {
            $('#views_slideshow_cycle_teaser_section_' + options.slideshowID).resume();
        }
        else {
            $('#views_slideshow_cycle_teaser_section_' + options.slideshowID).cycle('resume');
        }
    };

    Drupal.viewsSlideshowCycle.previousSlide = function (options) {
        $('#views_slideshow_cycle_teaser_section_' + options.slideshowID).cycle('prev');
    };

    Drupal.viewsSlideshowCycle.nextSlide = function (options) {
        $('#views_slideshow_cycle_teaser_section_' + options.slideshowID).cycle('next');
    };

    Drupal.viewsSlideshowCycle.goToSlide = function (options) {
        $('#views_slideshow_cycle_teaser_section_' + options.slideshowID).cycle(options.slideNum);
    };

    // Verify that the value is a number.
    function IsNumeric(sText) {
        var ValidChars = "0123456789";
        var IsNumber = true;
        var Char;

        for (var i = 0; i < sText.length && IsNumber == true; i++) {
            Char = sText.charAt(i);
            if (ValidChars.indexOf(Char) == -1) {
                IsNumber = false;
            }
        }
        return IsNumber;
    }

    /**
     * Cookie Handling Functions.
     */
    function createCookie(name,value,days) {
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            var expires = "; expires=" + date.toGMTString();
        }
        else {
            var expires = "";
        }
        document.cookie = name + "=" + value + expires + "; path=/";
    }

    function readCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
c = c.substring(1,c.length);
            }
            if (c.indexOf(nameEQ) == 0) {
                return c.substring(nameEQ.length,c.length);
            }
        }
        return null;
    }

    function eraseCookie(name) {
        createCookie(name,"",-1);
    }

    /**
     * Checks to see if the slide is visible enough.
     *
     * A elem = element to check.
     *
     * A type = The way to calculate how much is visible.
     *
     * A amountVisible = amount that should be visible. Either in percent or px.
     *
     * If it's not defined then all of the slide must be visible.
     *
     * Returns true or false.
     */
    function viewsSlideshowCycleIsVisible(elem, type, amountVisible) {
        // Get the top and bottom of the window;.
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();
        var docViewLeft = $(window).scrollLeft();
        var docViewRight = docViewLeft + $(window).width();

        // Get the top, bottom, and height of the slide;.
        var elemTop = $(elem).offset().top;
        var elemHeight = $(elem).height();
        var elemBottom = elemTop + elemHeight;
        var elemLeft = $(elem).offset().left;
        var elemWidth = $(elem).width();
        var elemRight = elemLeft + elemWidth;
        var elemArea = elemHeight * elemWidth;

        // Calculate what's hiding in the slide.
        var missingLeft = 0;
        var missingRight = 0;
        var missingTop = 0;
        var missingBottom = 0;

        // Find out how much of the slide is missing from the left.
        if (elemLeft < docViewLeft) {
            missingLeft = docViewLeft - elemLeft;
        }

        // Find out how much of the slide is missing from the right.
        if (elemRight > docViewRight) {
            missingRight = elemRight - docViewRight;
        }

        // Find out how much of the slide is missing from the top.
        if (elemTop < docViewTop) {
            missingTop = docViewTop - elemTop;
        }

        // Find out how much of the slide is missing from the bottom.
        if (elemBottom > docViewBottom) {
            missingBottom = elemBottom - docViewBottom;
        }

        // If there is no amountVisible defined then check to see if the whole slide
        // is visible.
        if (type == 'full') {
            return ((elemBottom >= docViewTop) && (elemTop <= docViewBottom)
            && (elemBottom <= docViewBottom) &&  (elemTop >= docViewTop)
            && (elemLeft >= docViewLeft) && (elemRight <= docViewRight)
            && (elemLeft <= docViewRight) && (elemRight >= docViewLeft));
        }
        else if (type == 'vertical') {
            var verticalShowing = elemHeight - missingTop - missingBottom;

            // If user specified a percentage then find out if the current shown percent
            // is larger than the allowed percent.
            // Otherwise check to see if the amount of px shown is larger than the
            // allotted amount.
            if (amountVisible.indexOf('%')) {
                return (((verticalShowing / elemHeight) * 100) >= parseInt(amountVisible));
            }
            else {
                return (verticalShowing >= parseInt(amountVisible));
            }
        }
        else if (type == 'horizontal') {
            var horizontalShowing = elemWidth - missingLeft - missingRight;

            // If user specified a percentage then find out if the current shown percent
            // is larger than the allowed percent.
            // Otherwise check to see if the amount of px shown is larger than the
            // allotted amount.
            if (amountVisible.indexOf('%')) {
                return (((horizontalShowing / elemWidth) * 100) >= parseInt(amountVisible));
            }
            else {
                return (horizontalShowing >= parseInt(amountVisible));
            }
        }
        else if (type == 'area') {
            var areaShowing = (elemWidth - missingLeft - missingRight) * (elemHeight - missingTop - missingBottom);

            // If user specified a percentage then find out if the current shown percent
            // is larger than the allowed percent.
            // Otherwise check to see if the amount of px shown is larger than the
            // allotted amount.
            if (amountVisible.indexOf('%')) {
                return (((areaShowing / elemArea) * 100) >= parseInt(amountVisible));
            }
            else {
                return (areaShowing >= parseInt(amountVisible));
            }
        }
    }
})(jQuery, Drupal, drupalSettings);
;
/**
 * @file
 */

(function ($, Drupal, drupalSettings) {
  'use strict';
  Drupal.viewsSlideshow = Drupal.viewsSlideshow || {};
  var pagerLocation;
  var slideNum;
  var error;
  var excludeMethods;
  /**
   * Views Slideshow Controls.
   */
  Drupal.viewsSlideshowControls = Drupal.viewsSlideshowControls || {};

  /**
   * Implement the play hook for controls.
   */
  Drupal.viewsSlideshowControls.play = function (options) {
    // Route the control call to the correct control type.
    // Need to use try catch so we don't have to check to make sure every part
    // of the object is defined.
    try {
      if (typeof drupalSettings.viewsSlideshowControls[options.slideshowID].top.type != "undefined" && typeof Drupal[drupalSettings.viewsSlideshowControls[options.slideshowID].top.type].play == 'function') {
        Drupal[drupalSettings.viewsSlideshowControls[options.slideshowID].top.type].play(options);
      }
    }
    catch (err) {
      // Don't need to do anything on error.
    }

    try {
      if (typeof drupalSettings.viewsSlideshowControls[options.slideshowID].bottom.type != "undefined" && typeof Drupal[drupalSettings.viewsSlideshowControls[options.slideshowID].bottom.type].play == 'function') {
        Drupal[drupalSettings.viewsSlideshowControls[options.slideshowID].bottom.type].play(options);
      }
    }
    catch (err) {
      // Don't need to do anything on error.
    }
  };

  /**
   * Implement the pause hook for controls.
   */
  Drupal.viewsSlideshowControls.pause = function (options) {
    // Route the control call to the correct control type.
    // Need to use try catch so we don't have to check to make sure every part
    // of the object is defined.
    try {
      if (typeof drupalSettings.viewsSlideshowControls[options.slideshowID].top.type != "undefined" && typeof Drupal[drupalSettings.viewsSlideshowControls[options.slideshowID].top.type].pause == 'function') {
        Drupal[drupalSettings.viewsSlideshowControls[options.slideshowID].top.type].pause(options);
      }
    }
    catch (err) {
      // Don't need to do anything on error.
    }

    try {
      if (typeof drupalSettings.viewsSlideshowControls[options.slideshowID].bottom.type != "undefined" && typeof Drupal[drupalSettings.viewsSlideshowControls[options.slideshowID].bottom.type].pause == 'function') {
        Drupal[drupalSettings.viewsSlideshowControls[options.slideshowID].bottom.type].pause(options);
      }
    }
    catch (err) {
      // Don't need to do anything on error.
    }
  };

  /**
   * Views Slideshow Text Controls.
   */

  // Add views slieshow api calls for views slideshow text controls.
  Drupal.behaviors.viewsSlideshowControlsText = {
    attach: function (context) {

      // Process previous link.
      $('.views_slideshow_controls_text_previous:not(.views-slideshow-controls-text-previous-processed)', context).addClass('views-slideshow-controls-text-previous-processed').each(function () {
        var uniqueID = $(this).attr('id').replace('views_slideshow_controls_text_previous_', '');
        $(this).click(function () {
          Drupal.viewsSlideshow.action({"action": 'previousSlide', "slideshowID": uniqueID});
          return false;
        });
      });

      // Process next link.
      $('.views_slideshow_controls_text_next:not(.views-slideshow-controls-text-next-processed)', context).addClass('views-slideshow-controls-text-next-processed').each(function () {
        var uniqueID = $(this).attr('id').replace('views_slideshow_controls_text_next_', '');
        $(this).click(function () {
          Drupal.viewsSlideshow.action({"action": 'nextSlide', "slideshowID": uniqueID});
          return false;
        });
      });

      // Process pause link.
      $('.views_slideshow_controls_text_pause:not(.views-slideshow-controls-text-pause-processed)', context).addClass('views-slideshow-controls-text-pause-processed').each(function () {
        var uniqueID = $(this).attr('id').replace('views_slideshow_controls_text_pause_', '');
        $(this).click(function () {
          if (drupalSettings.viewsSlideshow[uniqueID].paused) {
            Drupal.viewsSlideshow.action({"action": 'play', "slideshowID": uniqueID, "force": true});
          }
          else {
            Drupal.viewsSlideshow.action({"action": 'pause', "slideshowID": uniqueID, "force": true});
          }
          return false;
        });
      });
    }
  };

  Drupal.viewsSlideshowControlsText = Drupal.viewsSlideshowControlsText || {};

  /**
   * Implement the pause hook for text controls.
   */
  Drupal.viewsSlideshowControlsText.pause = function (options) {
    var pauseText = Drupal.theme.viewsSlideshowControlsPause ? Drupal.theme('viewsSlideshowControlsPause') : '';
    var $element = $('#views_slideshow_controls_text_pause_' + options.slideshowID);
    $element.find('a').text(pauseText);
    $element.removeClass('views-slideshow-controls-text-status-play');
    $element.addClass('views-slideshow-controls-text-status-pause');
  };

  /**
   * Implement the play hook for text controls.
   */
  Drupal.viewsSlideshowControlsText.play = function (options) {
    var playText = Drupal.theme.viewsSlideshowControlsPlay ? Drupal.theme('viewsSlideshowControlsPlay') : '';
    var $element = $('#views_slideshow_controls_text_pause_' + options.slideshowID);
    $element.find('a').text(playText);
    $element.removeClass('views-slideshow-controls-text-status-pause');
    $element.addClass('views-slideshow-controls-text-status-play');
  };

  // Theme the resume control.
  Drupal.theme.viewsSlideshowControlsPause = function () {
    return Drupal.t('Resume');
  };

  // Theme the pause control.
  Drupal.theme.viewsSlideshowControlsPlay = function () {
    return Drupal.t('Pause');
  };

  /**
   * Views Slideshow Pager.
   */
  Drupal.viewsSlideshowPager = Drupal.viewsSlideshowPager || {};

  /**
   * Implement the transitionBegin hook for pagers.
   */
  Drupal.viewsSlideshowPager.transitionBegin = function (options) {
    // Route the pager call to the correct pager type.
    // Need to use try catch so we don't have to check to make sure every part
    // of the object is defined.
    try {
      if (typeof drupalSettings.viewsSlideshowPager != "undefined" && typeof drupalSettings.viewsSlideshowPager[options.slideshowID].top.type != "undefined" && typeof Drupal[drupalSettings.viewsSlideshowPager[options.slideshowID].top.type].transitionBegin == 'function') {
        Drupal[drupalSettings.viewsSlideshowPager[options.slideshowID].top.type].transitionBegin(options);
      }
    }
    catch (err) {
      // Don't need to do anything on error.
    }

    try {
      if (typeof drupalSettings.viewsSlideshowPager != "undefined" && typeof drupalSettings.viewsSlideshowPager[options.slideshowID].bottom.type != "undefined" && typeof Drupal[drupalSettings.viewsSlideshowPager[options.slideshowID].bottom.type].transitionBegin == 'function') {
        Drupal[drupalSettings.viewsSlideshowPager[options.slideshowID].bottom.type].transitionBegin(options);
      }
    }
    catch (err) {
      // Don't need to do anything on error.
    }
  };

  /**
   * Implement the goToSlide hook for pagers.
   */
  Drupal.viewsSlideshowPager.goToSlide = function (options) {
    // Route the pager call to the correct pager type.
    // Need to use try catch so we don't have to check to make sure every part
    // of the object is defined.
    try {
      if (typeof drupalSettings.viewsSlideshowPager[options.slideshowID].top.type != "undefined" && typeof Drupal[drupalSettings.viewsSlideshowPager[options.slideshowID].top.type].goToSlide == 'function') {
        Drupal[drupalSettings.viewsSlideshowPager[options.slideshowID].top.type].goToSlide(options);
      }
    }
    catch (err) {
      // Don't need to do anything on error.
    }

    try {
      if (typeof drupalSettings.viewsSlideshowPager[options.slideshowID].bottom.type != "undefined" && typeof Drupal[drupalSettings.viewsSlideshowPager[options.slideshowID].bottom.type].goToSlide == 'function') {
        Drupal[drupalSettings.viewsSlideshowPager[options.slideshowID].bottom.type].goToSlide(options);
      }
    }
    catch (err) {
      // Don't need to do anything on error.
    }
  };

  /**
   * Implement the previousSlide hook for pagers.
   */
  Drupal.viewsSlideshowPager.previousSlide = function (options) {
    // Route the pager call to the correct pager type.
    // Need to use try catch so we don't have to check to make sure every part
    // of the object is defined.
    try {
      if (typeof drupalSettings.viewsSlideshowPager[options.slideshowID].top.type != "undefined" && typeof Drupal[drupalSettings.viewsSlideshowPager[options.slideshowID].top.type].previousSlide == 'function') {
        Drupal[drupalSettings.viewsSlideshowPager[options.slideshowID].top.type].previousSlide(options);
      }
    }
    catch (err) {
      // Don't need to do anything on error.
    }

    try {
      if (typeof drupalSettings.viewsSlideshowPager[options.slideshowID].bottom.type != "undefined" && typeof Drupal[drupalSettings.viewsSlideshowPager[options.slideshowID].bottom.type].previousSlide == 'function') {
        Drupal[drupalSettings.viewsSlideshowPager[options.slideshowID].bottom.type].previousSlide(options);
      }
    }
    catch (err) {
      // Don't need to do anything on error.
    }
  };

  /**
   * Implement the nextSlide hook for pagers.
   */
  Drupal.viewsSlideshowPager.nextSlide = function (options) {
    // Route the pager call to the correct pager type.
    // Need to use try catch so we don't have to check to make sure every part
    // of the object is defined.
    try {
      if (typeof drupalSettings.viewsSlideshowPager[options.slideshowID].top.type != "undefined" && typeof Drupal[drupalSettings.viewsSlideshowPager[options.slideshowID].top.type].nextSlide == 'function') {
        Drupal[drupalSettings.viewsSlideshowPager[options.slideshowID].top.type].nextSlide(options);
      }
    }
    catch (err) {
      // Don't need to do anything on error.
    }

    try {
      if (typeof drupalSettings.viewsSlideshowPager[options.slideshowID].bottom.type != "undefined" && typeof Drupal[drupalSettings.viewsSlideshowPager[options.slideshowID].bottom.type].nextSlide == 'function') {
        Drupal[drupalSettings.viewsSlideshowPager[options.slideshowID].bottom.type].nextSlide(options);
      }
    }
    catch (err) {
      // Don't need to do anything on error.
    }
  };

  /**
   * Views Slideshow Pager Fields.
   */

  // Add views slieshow api calls for views slideshow pager fields.
  Drupal.behaviors.viewsSlideshowPagerFields = {
    attach: function (context) {
      // Process pause on hover.
      $('.views_slideshow_pager_field:not(.views-slideshow-pager-field-processed)', context).addClass('views-slideshow-pager-field-processed').each(function () {
        // Parse out the location and unique id from the full id.
        var pagerInfo = $(this).attr('id').split('_');
        var location = pagerInfo[2];
        pagerInfo.splice(0, 3);
        var uniqueID = pagerInfo.join('_');

        // Add the activate and pause on pager hover event to each pager item.
        if (drupalSettings.viewsSlideshowPagerFields[uniqueID][location].activatePauseOnHover) {
          $(this).children().each(function (index, pagerItem) {
            var mouseIn = function () {
              Drupal.viewsSlideshow.action({"action": 'goToSlide', "slideshowID": uniqueID, "slideNum": index});
              Drupal.viewsSlideshow.action({"action": 'pause', "slideshowID": uniqueID});
            };

            var mouseOut = function () {
              Drupal.viewsSlideshow.action({"action": 'play', "slideshowID": uniqueID});
            };

            if (jQuery.fn.hoverIntent) {
              $(pagerItem).hoverIntent(mouseIn, mouseOut);
            }
            else {
              $(pagerItem).hover(mouseIn, mouseOut);
            }
          });
        }
        else {
          $(this).children().each(function (index, pagerItem) {
            $(pagerItem).click(function () {
              Drupal.viewsSlideshow.action({"action": 'goToSlide', "slideshowID": uniqueID, "slideNum": index});
            });
          });
        }
      });
    }
  };

  Drupal.viewsSlideshowPagerFields = Drupal.viewsSlideshowPagerFields || {};

  /**
   * Implement the transitionBegin hook for pager fields pager.
   */
  Drupal.viewsSlideshowPagerFields.transitionBegin = function (options) {
    for (pagerLocation in drupalSettings.viewsSlideshowPager[options.slideshowID]) {
      if (drupalSettings.viewsSlideshowPager[options.slideshowID]) {
        // Remove active class from pagers.
        $('[id^="views_slideshow_pager_field_item_' + pagerLocation + '_' + options.slideshowID + '"]').removeClass('active');

        // Add active class to active pager.
        $('#views_slideshow_pager_field_item_' + pagerLocation + '_' + options.slideshowID + '_' + options.slideNum).addClass('active');
      }
    }
  };

  /**
   * Implement the goToSlide hook for pager fields pager.
   */
  Drupal.viewsSlideshowPagerFields.goToSlide = function (options) {
    for (pagerLocation in drupalSettings.viewsSlideshowPager[options.slideshowID]) {
      if (drupalSettings.viewsSlideshowPager[options.slideshowID]) {
        // Remove active class from pagers.
        $('[id^="views_slideshow_pager_field_item_' + pagerLocation + '_' + options.slideshowID + '"]').removeClass('active');

        // Add active class to active pager.
        $('#views_slideshow_pager_field_item_' + pagerLocation + '_' + options.slideshowID + '_' + options.slideNum).addClass('active');
      }
    }
  };

  /**
   * Implement the previousSlide hook for pager fields pager.
   */
  Drupal.viewsSlideshowPagerFields.previousSlide = function (options) {
    for (pagerLocation in drupalSettings.viewsSlideshowPager[options.slideshowID]) {
      if (drupalSettings.viewsSlideshowPager[options.slideshowID]) {
        // Get the current active pager.
        var pagerNum = $('[id^="views_slideshow_pager_field_item_' + pagerLocation + '_' + options.slideshowID + '"].active').attr('id').replace('views_slideshow_pager_field_item_' + pagerLocation + '_' + options.slideshowID + '_', '');

        // If we are on the first pager then activate the last pager.
        // Otherwise activate the previous pager.
        if (pagerNum === 0) {
          pagerNum = $('[id^="views_slideshow_pager_field_item_' + pagerLocation + '_' + options.slideshowID + '"]').length() - 1;
        }
        else {
          pagerNum--;
        }

        // Remove active class from pagers.
        $('[id^="views_slideshow_pager_field_item_' + pagerLocation + '_' + options.slideshowID + '"]').removeClass('active');

        // Add active class to active pager.
        $('#views_slideshow_pager_field_item_' + pagerLocation + '_' + options.slideshowID + '_' + pagerNum).addClass('active');
      }
    }
  };

  /**
   * Implement the nextSlide hook for pager fields pager.
   */
  Drupal.viewsSlideshowPagerFields.nextSlide = function (options) {
    for (pagerLocation in drupalSettings.viewsSlideshowPager[options.slideshowID]) {
      if (drupalSettings.viewsSlideshowPager[options.slideshowID]) {
        // Get the current active pager.
        var pagerNum = $('[id^="views_slideshow_pager_field_item_' + pagerLocation + '_' + options.slideshowID + '"].active').attr('id').replace('views_slideshow_pager_field_item_' + pagerLocation + '_' + options.slideshowID + '_', '');
        var totalPagers = $('[id^="views_slideshow_pager_field_item_' + pagerLocation + '_' + options.slideshowID + '"]').length();

        // If we are on the last pager then activate the first pager.
        // Otherwise activate the next pager.
        pagerNum++;
        if (pagerNum === totalPagers) {
          pagerNum = 0;
        }

        // Remove active class from pagers.
        $('[id^="views_slideshow_pager_field_item_' + pagerLocation + '_' + options.slideshowID + '"]').removeClass('active');

        // Add active class to active pager.
        $('#views_slideshow_pager_field_item_' + pagerLocation + '_' + options.slideshowID + '_' + slideNum).addClass('active');
      }
    }
  };

  // Copy the pager hooks from fields pager to the bullets one.
  Drupal.viewsSlideshowPagerBullets = Drupal.viewsSlideshowPagerFields || {};

  /**
   * Views Slideshow Slide Counter.
   */

  Drupal.viewsSlideshowSlideCounter = Drupal.viewsSlideshowSlideCounter || {};

  /**
   * Implement the transitionBegin for the slide counter.
   */
  Drupal.viewsSlideshowSlideCounter.transitionBegin = function (options) {
    $('#views_slideshow_slide_counter_' + options.slideshowID + ' .num').text(options.slideNum + 1);
  };

  /**
   * This is used as a router to process actions for the slideshow.
   */
  Drupal.viewsSlideshow.action = function (options) {
    // Set default values for our return status.
    var status = {
      'value': true,
      'text': ''
    };

    // If an action isn't specified return false.
    if (typeof options.action == 'undefined' || options.action === '') {
      status.value = false;
      status.text = Drupal.t('There was no action specified.');
      return error;
    }

    // If we are using pause or play switch paused state accordingly.
    if (options.action === 'pause') {
      drupalSettings.viewsSlideshow[options.slideshowID].paused = 1;
      // If the calling method is forcing a pause then mark it as such.
      if (options.force) {
        drupalSettings.viewsSlideshow[options.slideshowID].pausedForce = 1;
      }
    }
    else if (options.action === 'play') {
      // If the slideshow isn't forced pause or we are forcing a play then play
      // the slideshow.
      // Otherwise return telling the calling method that it was forced paused.
      if (!drupalSettings.viewsSlideshow[options.slideshowID].pausedForce || options.force) {
        drupalSettings.viewsSlideshow[options.slideshowID].paused = 0;
        drupalSettings.viewsSlideshow[options.slideshowID].pausedForce = 0;
      }
      else {
        status.value = false;
        status.text += ' ' + Drupal.t('This slideshow is forced paused.');
        return status;
      }
    }

    // We use a switch statement here mainly just to limit the type of actions
    // that are available.
    switch (options.action) {
      case "goToSlide":
      case "transitionBegin":
      case "transitionEnd":
        // The three methods above require a slide number. Checking if it is
        // defined and it is a number that is an integer.
        if (typeof options.slideNum == 'undefined' || typeof options.slideNum !== 'number' || parseInt(options.slideNum) !== (options.slideNum - 0)) {
          status.value = false;
          status.text = Drupal.t('An invalid integer was specified for slideNum.');
        }
      case "pause":
      case "play":
      case "nextSlide":
      case "previousSlide":
        // Grab our list of methods.
        var methods = drupalSettings.viewsSlideshow[options.slideshowID]['methods'];

        // If the calling method specified methods that shouldn't be called then
        // exclude calling them.
        var excludeMethodsObj = {};
        if (typeof options.excludeMethods !== 'undefined') {
          // We need to turn the excludeMethods array into an object so we can use the in
          // function.
          for (var i = 0; i < excludeMethods.length; i++) {
            excludeMethodsObj[excludeMethods[i]] = '';
          }
        }

        // Call every registered method and don't call excluded ones.
        for (var i = 0; i < methods[options.action].length; i++) {
          if (Drupal[methods[options.action][i]] !== 'undefined' && typeof Drupal[methods[options.action][i]][options.action] == 'function' && !(methods[options.action][i] in excludeMethodsObj)) {
            Drupal[methods[options.action][i]][options.action](options);
          }
        }
        break;

      // If it gets here it's because it's an invalid action.
      default:
        status.value = false;
        status.text = Drupal.t('An invalid action "@action" was specified.', {"@action": options.action});
    }
    return status;
  };
})(jQuery, Drupal, drupalSettings);
;
