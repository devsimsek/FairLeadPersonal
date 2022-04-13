function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function switchTheme() {
    switch (getCookie("theme")) {
        case "dark":
            setCookie("theme", "white", 365)
            $("#darkMode").remove()
            break;
        case "white":
            setCookie("theme", "dark", 365)
            $("head").append('<style id="darkMode">/* Dark Mode */@media (prefers-color-scheme:dark){body{background-color:var(--bs-dark);color:var(--bs-light)}}</style>')
            break;
    }
}

function errorAlert(code) {
    switch (code) {
        case "0xcnf":
            return {
                "error": "Content Not Found",
                "message": "Content that you've searched is not found. (Maybe a typo?)",
            };
        case "0xnr":
            return {
                "error": "Not Ready",
                "message": "Functionality is not yet ready. Please be avare that sdf website is under development.",
            };
        case "0xnsq":
            return {
                "error": "Search Parameter Does Not Exists",
                "message": "Search parameter does not exists on the query.",
            };
    }
}

if (getCookie("theme") !== "") {
    switch (getCookie("theme")) {
        case "dark":
            setCookie("theme", "dark", 365)
            $("head").append('<style id="darkMode">/* Dark Mode */@media (prefers-color-scheme:dark){body{background-color:var(--bs-dark);color:var(--bs-light)}}</style>')
            break;
        case "white":
            setCookie("theme", "white", 365)
            $("#darkMode").remove()
            break;
    }
} else {
    setCookie("theme", "white", 365)
}