<!-- Footer -->
<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 bg-dark shadow-lg text-white">
    <div class="col-md-4 d-flex align-items-center">
        <span class="ms-3">© 2022</span>
        <a href="https://github.com/devsimsek" class="ms-1 mb-3 me-2 mb-md-0 text-white text-decoration-none">
            devsimsek.
        </a>
    </div>
    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
        <li class="ms-3 me-3">
            <a class="text-muted" href="https://github.com/devsimsek/sdf-go">
                <i class="bi bi-github"></i>
            </a>
        </li>
    </ul>
</footer>

<!-- Scripts -->
<script src="/assets/lib/jquery/jquery.min.js"></script>
<script src="/assets/lib/bootstrap/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@15/dist/smooth-scroll.polyfills.min.js"></script>
<script src="/assets/js/app.js"></script>
<script>
    const params = new URLSearchParams(window.location.search)
    if (params.has("error")) {
        var err = document.getElementById("errors")
        err.classList.remove("visually-hidden")
        var errt = document.getElementById("error")
        var msg = document.getElementById("message")
        console.log(errorAlert(params.get("error")))
        errt.innerText = errorAlert(params.get("error")).error
        msg.innerText = errorAlert(params.get("error")).message
    }
    var scroll = new SmoothScroll('a[href*="#"]');
</script>
</body>
</html>