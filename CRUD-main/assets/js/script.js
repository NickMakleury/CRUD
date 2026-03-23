const courseSelect = document.getElementById("course");
const body = document.body;
const registerForm = document.querySelector(".register-form");
const courseLogo = document.getElementById("courseLogo");

const themeMap = {
    contabeis: "theme-contabeis",
    direito: "theme-direito",
    enfermagem: "theme-enfermagem",
    fisioterapia: "theme-fisioterapia",
    gti: "theme-gti",
    veterinaria: "theme-veterinaria",
    nutricao: "theme-nutricao",
    odontologia: "theme-odontologia",
    pedagogia: "theme-pedagogia",
    psicologia: "theme-psicologia",
};

const logoMap = {
    gti: "assets/images/gti.png",
    contabeis: "assets/images/contabeis.png",
    direito:"assets/images/direito.png",
    enfermagem:"assets/images/enfermagem.png",
    fisioterapia:"assets/images/fisioterapia.png",
    veterinaria:"assets/images/veterinaria.png",
    nutricao:"assets/images/nutricao.png",
    odontologia:"assets/images/odontologia.png",
    pedagogia:"assets/images/pedagogia.png",
    psicologia:"assets/images/psicologia.png",
};

function applyTheme(course) {
    body.classList.remove(
        "theme-default",
        "theme-contabeis",
        "theme-direito",
        "theme-enfermagem",
        "theme-fisioterapia",
        "theme-gti",
        "theme-veterinaria",
        "theme-nutricao",
        "theme-odontologia",
        "theme-pedagogia",
        "theme-psicologia",
    );

    body.classList.add(themeMap[course] || "theme-default");
}

function applyCourseLogo(course) {
    if (!courseLogo) return;

    if (logoMap[course]) {
        courseLogo.src = logoMap[course];
        courseLogo.alt = `Logo do curso ${course}`;
    } else {
        courseLogo.src = "";
        courseLogo.alt = "";
    }
}

const savedCourse = localStorage.getItem("selectedCourse");
const previewHidden = localStorage.getItem("previewHidden");

if (savedCourse) {
    applyTheme(savedCourse);
    applyCourseLogo(savedCourse);

    if (courseSelect) {
        courseSelect.value = savedCourse;
    }

    if (previewHidden === "true") {
        body.classList.remove("course-preview-active");
    } else {
        body.classList.add("course-preview-active");
    }
} else {
    body.classList.add("theme-default");
    applyCourseLogo("");
}

if (courseSelect) {
    courseSelect.addEventListener("change", function () {
        const selectedCourse = this.value;

        applyTheme(selectedCourse);
        applyCourseLogo(selectedCourse);
        localStorage.setItem("selectedCourse", selectedCourse);

        if (selectedCourse) {
            body.classList.add("course-preview-active");
            localStorage.setItem("previewHidden", "false");
        } else {
            body.classList.remove("course-preview-active");
            localStorage.removeItem("previewHidden");
        }
    });
}

if (registerForm) {
    registerForm.addEventListener("submit", function (e) {
        e.preventDefault();

        body.classList.remove("course-preview-active");
        localStorage.setItem("previewHidden", "true");

        setTimeout(() => {
            registerForm.submit();
        }, 450);
    });
}

if (accessBtn) {
    accessBtn.addEventListener("click", function (e) {
        e.preventDefault(); // segura o link

        body.classList.remove("course-preview-active");
        localStorage.setItem("previewHidden", "true");

        setTimeout(() => {
            window.location.href = accessBtn.href;
        }, 450);
    });
}