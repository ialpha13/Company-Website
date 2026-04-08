/* ============================================================
   AVENOR — script.js
   ============================================================ */

(function () {
    "use strict";

    /* ---- Floating tags gentle idle drift ---- */
    const tags = document.querySelectorAll(".tag");

    tags.forEach(function (tag, i) {
        var offset = i * 420;
        var amp = 5 + (i % 3) * 2;

        function drift(ts) {
            var y = Math.sin((ts + offset) / 2200) * amp;
            var x = Math.cos((ts + offset) / 3100) * (amp * 0.5);
            tag.style.transform = "translate(" + x + "px, " + y + "px)";
            requestAnimationFrame(drift);
        }

        requestAnimationFrame(drift);
    });

    /* ---- Hero heading typewriter ---- */
    var heroHeading = document.querySelector(".hero__heading");
    var typeTarget = document.getElementById("heroTypewriter");
    var caret = document.querySelector(".hero__caret");

    function runTypewriter() {
        if (!heroHeading || !typeTarget) return;

        var source = heroHeading.getAttribute("data-text") || "";
        var index = 0;

        typeTarget.textContent = "";

        function typeNext() {
            if (index < source.length) {
                typeTarget.textContent += source.charAt(index);
                index += 1;
                setTimeout(typeNext, index < 12 ? 55 : 34);
            } else if (caret) {
                setTimeout(function () {
                    caret.style.opacity = "0";
                }, 1400);
            }
        }

        setTimeout(typeNext, 250);
    }

    runTypewriter();


    /* ---- Intersection observer for about section ---- */
    var aboutHeading = document.querySelector(".about__heading");

    if (aboutHeading && "IntersectionObserver" in window) {
        var observer = new IntersectionObserver(
            function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.style.animation = "fadeUp 0.9s cubic-bezier(0.22,1,0.36,1) both";
                        observer.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.2 }
        );

        aboutHeading.style.opacity = "0";
        observer.observe(aboutHeading);

        /* Reset opacity once animation fires */
        aboutHeading.addEventListener("animationstart", function () {
            aboutHeading.style.opacity = "";
        });
    }


    /* ---- Pause logo scroll on hover ---- */
    var logoTrack = document.getElementById("logoTrack");

    if (logoTrack) {
        logoTrack.addEventListener("mouseenter", function () {
            logoTrack.style.animationPlayState = "paused";
        });
        logoTrack.addEventListener("mouseleave", function () {
            logoTrack.style.animationPlayState = "running";
        });
    }


    /* ---- Subtle cursor glow that follows mouse in hero ---- */
    var hero = document.querySelector(".hero");
    var glowEl = null;

    if (hero) {
        glowEl = document.createElement("div");
        glowEl.style.cssText = [
            "position:absolute",
            "width:320px",
            "height:320px",
            "border-radius:50%",
            "pointer-events:none",
            "z-index:3",
            "transform:translate(-50%,-50%)",
            "background:radial-gradient(circle, rgba(90,158,100,0.10) 0%, transparent 70%)",
            "transition:opacity 0.4s",
            "opacity:0",
        ].join(";");

        hero.appendChild(glowEl);

        hero.addEventListener("mousemove", function (e) {
            var rect = hero.getBoundingClientRect();
            var x = e.clientX - rect.left;
            var y = e.clientY - rect.top;
            glowEl.style.left = x + "px";
            glowEl.style.top  = y + "px";
            glowEl.style.opacity = "1";
        });

        hero.addEventListener("mouseleave", function () {
            glowEl.style.opacity = "0";
        });
    }


    /* ---- CTA buttons ripple ---- */
    document.querySelectorAll(".btn").forEach(function (btn) {
        btn.addEventListener("click", function (e) {
            var ripple = document.createElement("span");
            var rect   = btn.getBoundingClientRect();
            var size   = Math.max(rect.width, rect.height) * 2;
            var x      = e.clientX - rect.left - size / 2;
            var y      = e.clientY - rect.top  - size / 2;

            ripple.style.cssText = [
                "position:absolute",
                "width:"  + size + "px",
                "height:" + size + "px",
                "left:"   + x + "px",
                "top:"    + y + "px",
                "border-radius:50%",
                "background:rgba(255,255,255,0.15)",
                "transform:scale(0)",
                "animation:rippleOut 0.55s ease-out forwards",
                "pointer-events:none",
            ].join(";");

            /* Inject keyframes once */
            if (!document.getElementById("rippleStyle")) {
                var style = document.createElement("style");
                style.id = "rippleStyle";
                style.textContent =
                    "@keyframes rippleOut{to{transform:scale(1);opacity:0}}";
                document.head.appendChild(style);
            }

            btn.style.position = "relative";
            btn.style.overflow  = "hidden";
            btn.appendChild(ripple);

            ripple.addEventListener("animationend", function () {
                ripple.remove();
            });
        });
    });

})();
