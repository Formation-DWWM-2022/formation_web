let defaultOptions = {
    items: 1,
    nav: true,
    autoplayButtonOutput: false,
    mouseDrag: true,
    autoplay: true,
    navPosition: 'bottom',
    gutter: 40,
    controlsContainer: "#customize-controls",
    "responsive": {
        "992": {
            "items": 3
        },
        "768": {
            "items": 2
        },
        "576": {
            "items": 1
        }
    }
};

function initSlider($section = document.body) {
    let sliders = $section.querySelectorAll('[data-slider]');
    if (sliders.length > 0) {
        for (const $element of sliders) {
            let option = defaultOptions;
            option.container = $element;
            const packSlider = tns(option);
        }
    }
}

window.addEventListener('DOMContentLoaded', () => {
    initSlider();
});