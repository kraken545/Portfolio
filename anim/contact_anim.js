document
        .getElementById("contactForm")
        .addEventListener("submit", function (e) {
          e.preventDefault();
          const btn = this.querySelector(".submit-btn");
          const originalText = btn.textContent;

          btn.textContent = "✓ Message Sent!";
          btn.style.background = "#00FF00";
          btn.style.color = "#000000";

          setTimeout(() => {
            btn.textContent = originalText;
            btn.style.background = "";
            btn.style.color = "";
            this.reset();
          }, 2000);
        });

      document.querySelectorAll("nav a").forEach((link) => {
        if (link.href === window.location.href) {
          link.classList.add("active");
        }
      });

      